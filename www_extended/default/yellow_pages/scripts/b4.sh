#!/bin/bash

# Configuración
MYSQL_USER="root"        # Cambia esto por tu usuario de MySQL
MYSQL_PASSWORD="root" # Cambia esto por tu contraseña de MySQL
DB_NAME="factuxorg_demo"  # Cambia esto por el nombre de tu base de datos

# Listar todas las tablas en la base de datos
echo "Obteniendo la lista de tablas de la base de datos '$DB_NAME'..."
TABLES=$(mysql -u"$MYSQL_USER" -p"$MYSQL_PASSWORD" -D"$DB_NAME" -e "SHOW TABLES;" | tail -n +2)

# Mostrar la lista de tablas
echo "Tablas disponibles:"
select TABLE_NAME in $TABLES; do
    if [ -n "$TABLE_NAME" ]; then
        echo "Seleccionaste la tabla '$TABLE_NAME'. Generando la documentación..."
        OUTPUT_FILE="${TABLE_NAME}_documentation.md"

        # Obtener la estructura de la tabla
        STRUCTURE=$(mysql -u"$MYSQL_USER" -p"$MYSQL_PASSWORD" -D"$DB_NAME" -e "SHOW CREATE TABLE $TABLE_NAME\G" | grep -A 1 "Create Table" | tail -n 1 | sed -e 's/^ *Create Table: //' -e 's/,$//')

        # Obtener los índices de la tabla
        INDEXES=$(mysql -u"$MYSQL_USER" -p"$MYSQL_PASSWORD" -D"$DB_NAME" -e "SHOW INDEX FROM $TABLE_NAME")

        # Obtener las relaciones de la tabla
        FOREIGN_KEYS=$(mysql -u"$MYSQL_USER" -p"$MYSQL_PASSWORD" -D"$DB_NAME" -e "SELECT CONSTRAINT_NAME, COLUMN_NAME, REFERENCED_TABLE_NAME, REFERENCED_COLUMN_NAME FROM information_schema.KEY_COLUMN_USAGE WHERE TABLE_NAME='$TABLE_NAME' AND TABLE_SCHEMA='$DB_NAME';")

        # Obtener algunos datos de ejemplo
        EXAMPLES=$(mysql -u"$MYSQL_USER" -p"$MYSQL_PASSWORD" -D"$DB_NAME" -e "SELECT * FROM $TABLE_NAME LIMIT 5;")

        # Crear el archivo de salida
        cat <<EOL > "$OUTPUT_FILE"
## Documentación de la Tabla \`$TABLE_NAME\`

En esta entrada, vamos a detallar la estructura y el propósito de la tabla \`$TABLE_NAME\`, que forma parte de la base de datos \`$DB_NAME\`. Esta tabla es utilizada para almacenar información relevante sobre diferentes recursos. A continuación, se presenta una descripción completa de su estructura, columnas y relaciones.

### Estructura de la Tabla

\`\`\`sql
$STRUCTURE
\`\`\`

### Columnas

EOL

        # Extraer las columnas
        COLUMN_INFO=$(mysql -u"$MYSQL_USER" -p"$MYSQL_PASSWORD" -D"$DB_NAME" -e "DESCRIBE $TABLE_NAME")

        # Agregar la información de las columnas al archivo
        echo "$COLUMN_INFO" | awk 'NR>1 {print "- **"$1"** ("$2"): "$3", Valor predeterminado: "$5", Comentario: "$6}' >> "$OUTPUT_FILE"

        cat <<EOL >> "$OUTPUT_FILE"

### Índices

La tabla \`$TABLE_NAME\` incluye los siguientes índices para mejorar el rendimiento de las consultas:

\`\`\`sql
$INDEXES
\`\`\`

### Relaciones

La tabla \`$TABLE_NAME\` tiene las siguientes claves foráneas:

\`\`\`sql
$FOREIGN_KEYS
\`\`\`

### Datos Ejemplares

Para ilustrar cómo se utilizan los datos en esta tabla, aquí algunos ejemplos de entradas:

\`\`\`sql
$EXAMPLES
\`\`\`

EOL

        echo "Documentación generada en el archivo '$OUTPUT_FILE'."
        break
    else
        echo "Selección no válida. Por favor, elige un número de la lista."
    fi
done
