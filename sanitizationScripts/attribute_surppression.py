import sys
from docx import Document

if sys.argv[1]=="document":
    def suppress_data(text):
        suppressed_text = ''
        words = text.split()
        for word in words:
            if is_name(word):  # Suppress names
                suppressed_text += ''  # Suppress the name by not appending it
            elif is_email(word):  # Suppress email addresses
                suppressed_text += ''  # Suppress the email address by not appending it
            elif is_number(word):  # Suppress numbers (including phone numbers)
                suppressed_text += ''  # Suppress the number by not appending it
            else:
                suppressed_text += word + ' '  # Append non-sensitive words
        return suppressed_text.strip()

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

    # Open the Word document
    doc = Document('test.docx')

    # Process each paragraph in the document
    for paragraph in doc.paragraphs:
        original_text = paragraph.text
        suppressed_text = suppress_data(original_text)
        paragraph.text = suppressed_text

    # Save the modified document
    doc.save('suppress.docx')
    print("Done! Check save folder.")

elif sys.argv[1]=="excel":
    pass