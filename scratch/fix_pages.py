import os
import glob

pages_dir = 'resources/views/pages'
files = glob.glob(os.path.join(pages_dir, '*.blade.php'))

for f in files:
    with open(f, 'r', encoding='utf-8') as file:
        content = file.read()
    
    # Escape @
    content = content.replace('@', '@@')
    
    # Remove .html from links
    content = content.replace('.html', '')
    
    with open(f, 'w', encoding='utf-8') as file:
        file.write(content)

print(f"Processed {len(files)} files.")
