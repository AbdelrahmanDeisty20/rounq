import os
import re

directory = 'resources/views/pages'
link_html = '<p style="margin-top:5px;opacity:.8;font-size:12px">تم إنشاؤه بواسطة <a href="https://fourthpyramidagcy.com/" target="_blank" style="color: #F1C40F; text-decoration: underline;">Fourth Pyramid Agency</a></p>'

for filename in os.listdir(directory):
    if filename.endswith('.blade.php') and filename != 'index.blade.php':
        filepath = os.path.join(directory, filename)
        with open(filepath, 'r', encoding='utf-8') as f:
            content = f.read()
        
        if 'تم إنشاؤه بواسطة' in content:
            new_content = content.replace('تم إنشاؤه بواسطة', 'Designed and Developed by')
            if new_content != content:
                with open(filepath, 'w', encoding='utf-8') as f:
                    f.write(new_content)
                print(f"Updated: {filename}")
