import mysql.connector
import sys

# Configuración de la conexión a la base de datos
DB_CONFIG = {
    'user': 'root',
    'password': 'root',
    'host': 'localhost',
    'database': 'factuxorg_demo'
}

def fetch_table_structure(cursor, table_name):
    """Obtiene la estructura de la tabla en formato SQL"""
    query = f"SHOW CREATE TABLE `{table_name}`;"
    cursor.execute(query)
    result = cursor.fetchone()
    return result[1]  # La segunda columna contiene el SQL de creación

def fetch_columns_info(cursor, table_name):
    """Obtiene información sobre las columnas de la tabla"""
    query = f"DESCRIBE `{table_name}`;"
    cursor.execute(query)
    return cursor.fetchall()

def fetch_foreign_keys(cursor, table_name):
    """Obtiene las claves foráneas de la tabla"""
    query = f"""
    SELECT
        CONSTRAINT_NAME, COLUMN_NAME, REFERENCED_TABLE_NAME, REFERENCED_COLUMN_NAME
    FROM
        INFORMATION_SCHEMA.KEY_COLUMN_USAGE
    WHERE
        TABLE_NAME = '{table_name}'
        AND REFERENCED_TABLE_NAME IS NOT NULL;
    """
    cursor.execute(query)
    return cursor.fetchall()

def generate_markdown_doc(table_name, table_structure, columns_info, foreign_keys):
    """Genera el archivo Markdown con la documentación de la tabla"""
    with open(f"{table_name}_documentation.md", "w") as file:
        file.write(f"## Documentación de la Tabla `{table_name}`\n\n")
        file.write(f"### Estructura de la Tabla\n\n")
        file.write(f"```sql\n{table_structure}\n```\n\n")
        
        file.write(f"### Columnas\n\n")
        file.write(f"| Nombre      | Tipo        | Null | Valor Predeterminado | Comentario | Ejemplos de Valores |\n")
        file.write(f"|-------------|-------------|------|----------------------|------------|---------------------|\n")
        for col in columns_info:
            col_name, col_type, col_null, col_key, col_default, col_extra = col
            null_str = 'NO' if col_null == 'NO' else 'YES'
            file.write(f"| {col_name} | {col_type} | {null_str} | {col_default} | {col_extra} | \n")
        file.write("\n")

        if foreign_keys:
            file.write(f"### Claves Foráneas\n\n")
            file.write(f"| Constraint Name | Columna | Tabla Referenciada | Columna Referenciada |\n")
            file.write(f"|-----------------|---------|--------------------|-----------------------|\n")
            for constraint_name, column_name, ref_table_name, ref_column_name in foreign_keys:
                file.write(f"| {constraint_name} | {column_name} | {ref_table_name} | {ref_column_name} |\n")
        else:
            file.write(f"### Claves Foráneas\n\nNo hay claves foráneas en esta tabla.\n")

        file.write("\n### Restricciones y Usos\n\n")
        for col in columns_info:
            col_name, col_type, col_null, col_key, col_default, col_extra = col
            null_str = 'NO' if col_null == 'NO' else 'YES'
            description = f"Descripción: Clave primaria de la tabla. Identifica de manera única a cada entrada en la tabla." if col_key == 'PRI' else ""
            description += f" Usos: Se usa para referenciar de manera única cada registro en operaciones CRUD y relaciones entre tablas." if col_key == 'PRI' else ""
            description += f" Tipo de Información: Número entero autoincrementable." if col_type.startswith('int') else ""
            description += f" Ejemplo de Valor: 1, 2, 3." if col_key == 'PRI' else ""

            if col_key != 'PRI':
                description += f" Descripción: {col_name} - Descripción de la columna.\n"
                description += f" Usos: Descripción de cómo se utiliza esta columna.\n"
                description += f" Tipo de Información: {col_type}\n"
                description += f" Ejemplo de Valor: Ejemplo de valor para esta columna.\n"

            file.write(f"- **{col_name}**:\n")
            file.write(f"    {description}\n")
            file.write("\n")

def main():
    if len(sys.argv) != 2:
        print("Uso: python generate_docs.py <nombre_de_la_tabla>")
        sys.exit(1)
    
    table_name = sys.argv[1]

    # Conectar a la base de datos
    connection = mysql.connector.connect(**DB_CONFIG)
    cursor = connection.cursor()

    try:
        # Obtener la estructura de la tabla
        table_structure = fetch_table_structure(cursor, table_name)
        
        # Obtener información de columnas
        columns_info = fetch_columns_info(cursor, table_name)
        
        # Obtener claves foráneas
        foreign_keys = fetch_foreign_keys(cursor, table_name)
        
        # Generar archivo Markdown
        generate_markdown_doc(table_name, table_structure, columns_info, foreign_keys)
        
        print(f"Documentación generada en '{table_name}_documentation.md'.")
    
    finally:
        cursor.close()
        connection.close()

if __name__ == "__main__":
    main()
