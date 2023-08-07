import sys
import random
from docx import Document

if sys.argv[1]=="docx":
    def swap_data(text):
        words = text.split()
        swapped_words = []
        for word in words:
            if is_name(word):  # Swap names
                swapped_words.append(swap_name(word))
            elif is_email(word):  # Swap email addresses
                swapped_words.append(swap_email(word))
            elif is_number(word):  # Swap numbers (including phone numbers)
                swapped_words.append(swap_number(word))
            else:
                swapped_words.append(word)
        return ' '.join(swapped_words)

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

    def swap_name(name):
        # Swap a name by randomly shuffling its characters
        name_characters = list(name)
        random.shuffle(name_characters)
        return ''.join(name_characters)

    def swap_email(email):
        # Swap an email address by randomly shuffling its characters
        email_parts = email.split('@')
        username = email_parts[0]
        domain = email_parts[1]
        username_characters = list(username)
        random.shuffle(username_characters)
        return ''.join(username_characters) + '@' + domain

    def swap_number(number):
        # Swap a number (including phone numbers) by randomly shuffling its digits
        number_digits = list(number)
        random.shuffle(number_digits)
        return ''.join(number_digits)

    # Open the Word document
    doc = Document(sys.argv[2])

    # Process each paragraph in the document
    for paragraph in doc.paragraphs:
        original_text = paragraph.text
        swapped_text = swap_data(original_text)
        paragraph.text = swapped_text

    # Save the modified document
    doc.save(sys.argv[2])
    print("Done! Check save folder.")

elif sys.argv[1]=="xlsx":
    import pandas as pd
    import re
    df=pd.read_csv(sys.argv[2])

    sanitized_df=pd.DataFrame()
    sanitized_df = sanitized_df.reindex(columns=list(df.columns))
    age_regex="old|age"
    all_sensitive_columns=[]
    new_column=[]

    for column in df:
        if re.match(age_regex, column):
            all_sensitive_columns.append(column)

    for sensitive_column in all_sensitive_columns:
        new_column=df[sensitive_column]
        
        for index in range(0, len(new_column)):
            new_value=float(new_column[index])
            new_value=int(round(new_value, -1))
            lower_range=new_value-10
            upper_range=new_value+10
            swap_value=str(lower_range)+"-"+str(upper_range)
            new_column[index]=re.sub("\d{1,2}", swap_value, str(new_column[index]))

        df[sensitive_column]=new_column

    sanitized_df.to_excel(sys.argv[2])