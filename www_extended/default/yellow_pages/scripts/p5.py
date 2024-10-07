# Genera la documentacion de las funciones en dos idiomas 
## un archivo por idioma 

import re
import os

def extract_docs_from_php(file_path):
    """Extrae la documentación de las funciones desde el archivo PHP."""
    try:
        with open(file_path, 'r') as file:
            content = file.read()
    except FileNotFoundError:
        print(f"Error: El archivo {file_path} no se encuentra.")
        return [], []
    except Exception as e:
        print(f"Error al leer el archivo {file_path}: {e}")
        return [], []
    
    # Buscar todas las funciones y sus comentarios de documentación
    doc_pattern = re.compile(r'/\*\*([\s\S]*?)\*/\s*function\s+(\w+)\s*\(', re.MULTILINE)
    matches = doc_pattern.findall(content)
    
    en_docs = []
    es_docs = []
    
    for match in matches:
        doc_block, function_name = match
        # Extraer documentación en inglés y español
        en_doc = re.findall(r'\[EN\](.*?)\n', doc_block)
        es_doc = re.findall(r'\[ES\](.*?)\n', doc_block)
        
        if en_doc:
            en_docs.append((function_name, en_doc))
        if es_doc:
            es_docs.append((function_name, es_doc))
    
    return en_docs, es_docs

def write_docs_to_md(docs, output_file, language):
    """Escribe la documentación en un archivo Markdown."""
    try:
        with open(output_file, 'w') as file:
            file.write(f'# Documentation for PHP Functions ({language})\n\n')

            for function_name, doc in docs:
                file.write(f'## Function: {function_name}\n\n')

                file.write('\n'.join(doc) + '\n\n')
    except Exception as e:
        print(f"Error al escribir el archivo {output_file}: {e}")

# Configuración del script
php_file_path = '../../../../www/permissions/functions.php'  # Actualiza con la ruta correcta al archivo PHP
output_file_en = 'functions_documentation_EN.md'  # Archivo para documentación en inglés
output_file_es = 'functions_documentation_ES.md'  # Archivo para documentación en español

# Ejecución del script
en_docs, es_docs = extract_docs_from_php(php_file_path)
if en_docs:
    write_docs_to_md(en_docs, output_file_en, 'English')
    print(f'Documentation in English has been generated in the file: {output_file_en}')
else:
    print('No English documentation was generated.')

if es_docs:
    write_docs_to_md(es_docs, output_file_es, 'Spanish')
    print(f'Documentation in Spanish has been generated in the file: {output_file_es}')
else:
    print('No Spanish documentation was generated.')
