#!/bin/bash

# Verifica que se hayan proporcionado los argumentos necesarios
if [ "$#" -ne 2 ]; then
    echo "Uso: $0 <nombre_de_base_de_datos> <nombre_de_tabla>"
    exit 1
fi

# Configuración
DB_NAME="$1"
TABLE_NAME="$2"
OUTPUT_FILE="${TABLE_NAME}_documentation.md"
MYSQL_USER="root"        # Cambia esto por tu usuario de MySQL
MYSQL_PASSWORD="root" # Cambia esto por tu contraseña de MySQL

echo "Generando documentación para la tabla '$TABLE_NAME' en la base de datos '$DB_NAME'..."

# Obtiene la estructura de la tabla
STRUCTURE=$(mysql -u"$MYSQL_USER" -p"$MYSQL_PASSWORD" -D"$DB_NAME" -e "SHOW CREATE TABLE $TABLE_NAME\G" | grep -A 1 "Create Table" | tail -n 1 | sed -e 's/^ *Create Table: //' -e 's/,$//')

# Obtiene los índices de la tabla
INDEXES=$(mysql -u"$MYSQL_USER" -p"$MYSQL_PASSWORD" -D"$DB_NAME" -e "SHOW INDEX FROM $TABLE_NAME")

# Obtiene las relaciones de la tabla
FOREIGN_KEYS=$(mysql -u"$MYSQL_USER" -p"$MYSQL_PASSWORD" -D"$DB_NAME" -e "SELECT CONSTRAINT_NAME, COLUMN_NAME, REFERENCED_TABLE_NAME, REFERENCED_COLUMN_NAME FROM information_schema.KEY_COLUMN_USAGE WHERE TABLE_NAME='$TABLE_NAME' AND TABLE_SCHEMA='$DB_NAME';")

# Obtiene algunos datos de ejemplo
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

# Extrae las columnas
COLUMN_INFO=$(mysql -u"$MYSQL_USER" -p"$MYSQL_PASSWORD" -D"$DB_NAME" -e "DESCRIBE $TABLE_NAME")

# Agrega la información de las columnas al archivo
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
