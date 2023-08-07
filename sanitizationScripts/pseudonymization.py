import sys
import string
import random
from docx import Document

if sys.argv[1]=="docx":
    def mask_data(text):
        masked_text = ''
        words = text.split()
        for word in words:
            if is_name(word):  # Mask names
                masked_text += generate_pseudonym(word) + ' '
            elif is_email(word):  # Mask email addresses
                masked_text += generate_pseudonym(word) + ' '
            elif is_number(word):  # Mask numbers (including phone numbers)
                masked_text += generate_pseudonym(word) + ' '
            else:
                masked_text += word + ' '
        return masked_text.strip()

    def is_name(word):
        # Check if the word is likely to be a name
        return word[0].isalpha() and word[0].isupper()

    def is_email(word):
        # Check if the word is likely to be an email address
        return '@' in word and '.' in word

    def is_number(word):
        # Check if the word is likely to be a number (including phone numbers)
        return word.isdigit() or is_phone_number(word)

    def is_phone_number(word):
        # Check if the word is likely to be a phone number
        return any(char.isdigit() for char in word)

    def generate_pseudonym(word):
        # Generate a pseudonym for a word
        pseudonym = ''.join(random.choice(string.ascii_letters) for _ in range(len(word)))
        return pseudonym

    # Open the Word document
    doc = Document(sys.argv[2])

    # Process each paragraph in the document
    for paragraph in doc.paragraphs:
        original_text = paragraph.text
        masked_text = mask_data(original_text)
        paragraph.text = masked_text

    # Save the modified document
    doc.save(sys.argv[2])
    print("Done! Check save folder.")

elif sys.argv[1]=="xlsx":
    import pandas as pd
    import re
    df=pd.read_csv(sys.argv[2])

    sanitized_df=pd.DataFrame()
    sanitized_df = sanitized_df.reindex(columns=list(df.columns))
    new_value=""
    new_row={}

    age_regex="\d{1,3}(?:\.\d{1,3}){3}"
    for rowIndex, row in df.iterrows():

        for columnIndex, value in row.items():
            value=str(value)
            if re.search(age_regex, value):
                new_value=re.sub(age_regex, "IP"+str(rowIndex), value)
                new_row[str(columnIndex)]=new_value
            else:
                new_row[str(columnIndex)]=value

        new_row=pd.Series(new_row)
        sanitized_df=pd.concat([sanitized_df, new_row.to_frame().T], ignore_index=True)

    sanitized_df.to_excel(sys.argv[2])