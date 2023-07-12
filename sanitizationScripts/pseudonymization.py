import sys
import string
import random
from docx import Document

if sys.argv[1]=="document":
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
    doc = Document('test.docx')

    # Process each paragraph in the document
    for paragraph in doc.paragraphs:
        original_text = paragraph.text
        masked_text = mask_data(original_text)
        paragraph.text = masked_text

    # Save the modified document
    doc.save('pseudonyms.docx')
    print("Done! Check save folder.")

elif sys.argv[1]=="excel":
    pass