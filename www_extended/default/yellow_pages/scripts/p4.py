import re
import os

def extract_docs_from_php(file_path):
    """Extrae la documentación de las funciones desde el archivo PHP."""
    try:
        with open(file_path, 'r') as file:
            content = file.read()
    except FileNotFoundError:
        print(f"Error: El archivo {file_path} no se encuentra.")
        return []
    except Exception as e:
        print(f"Error al leer el archivo {file_path}: {e}")
        return []
    
    # Buscar todas las funciones y sus comentarios de documentación
    doc_pattern = re.compile(r'/\*\*([\s\S]*?)\*/\s*function\s+(\w+)\s*\(', re.MULTILINE)
    matches = doc_pattern.findall(content)
    
    docs = []
    for match in matches:
        doc_block, function_name = match
        # Extraer documentación en inglés y español
        en_doc = re.findall(r'\[EN\](.*?)\n', doc_block)
        es_doc = re.findall(r'\[ES\](.*?)\n', doc_block)
        docs.append((function_name, en_doc, es_doc))
    
    return docs

def write_docs_to_md(docs, output_file):
    """Escribe la documentación en un archivo Markdown."""
    try:
        with open(output_file, 'w') as file:
            file.write('# Documentation for PHP Functions\n\n')

            for function_name, en_doc, es_doc in docs:
                file.write(f'## Function: {function_name}\n\n')

                file.write('### English Documentation\n')
                file.write('\n'.join(en_doc) + '\n\n')

                file.write('### Documentación en Español\n')
                file.write('\n'.join(es_doc) + '\n\n')
    except Exception as e:
        print(f"Error al escribir el archivo {output_file}: {e}")

# Configuración del script
php_file_path = '../../../../www/permissions/functions.php'  # Actualiza con la ruta correcta al archivo PHP
output_file = 'functions_documentation.md'  # Archivo único para toda la documentación

# Ejecución del script
docs = extract_docs_from_php(php_file_path)
if docs:
    write_docs_to_md(docs, output_file)
    print(f'Documentation has been generated in the file: {output_file}')
else:
    print('No documentation was generated.')
