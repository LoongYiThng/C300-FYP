from faker import Faker
from docx import Document

faker = Faker()

# Example original document
document = Document('sanitizationScripts/test.docx')

# Function to sanitize text
def sanitize_text(text):
    # Split the text into words
    words = text.split()
    # Generate a fake word for each original word
    fake_words = [faker.word() for _ in words]
    # Combine the fake words into a string
    fake_text = ' '.join(fake_words)
    return fake_text

# Sanitize the document
for paragraph in document.paragraphs:
    # Sanitize the text in the paragraph
    sanitized_text = sanitize_text(paragraph.text)
    # Replace the original text with the sanitized text
    paragraph.text = sanitized_text

# Save the sanitized document
document.save('sanitizationScripts/synthetic.docx')
print("Done, Check save folder")