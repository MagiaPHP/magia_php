#!/bin/bash

# Configuración de la base de datos
DB_NAME="factuxorg_demo"
DB_USER="root"
DB_PASS="root"
DB_HOST="localhost"

# Comando para obtener la lista de tablas
get_tables() {
    mysql -u "$DB_USER" -p"$DB_PASS" -h "$DB_HOST" -e "SHOW TABLES IN $DB_NAME;" | tail -n +2
}

# Comando para obtener la estructura de la tabla
get_table_structure() {
    local table_name="$1"
    mysql -u "$DB_USER" -p"$DB_PASS" -h "$DB_HOST" -e "DESCRIBE $DB_NAME.$table_name;" | awk '
        BEGIN {
            FS="\t";
            print "| Nombre | Tipo | Null | Valor Predeterminado | Comentario |";
            print "|--------|------|------|----------------------|------------|";
        }
        {
            if (NR > 1) {
                print "| " $1 " | " $2 " | " $3 " | " $4 " | " $5 " |";
            }
        }
    '
}

# Genera documentación para una tabla
generate_docs() {
    local table_name="$1"
    local output_file="${table_name}_documentation.md"

    echo "Generando documentación para la tabla '$table_name'..."

    # Encabezado del archivo Markdown
    echo "## Documentación de la Tabla \`$table_name\`" > "$output_file"
    echo "" >> "$output_file"

    # Estructura de la tabla
    echo "### Estructura de la Tabla" >> "$output_file"
    echo "```sql" >> "$output_file"
    # Obtener la estructura de la tabla
    mysql -u "$DB_USER" -p"$DB_PASS" -h "$DB_HOST" -e "SHOW CREATE TABLE $DB_NAME.$table_name\G" | awk '
        /Create Table:/ { print $0 }
    ' >> "$output_file"
    echo "```" >> "$output_file"
    echo "" >> "$output_file"

    # Columnas
    echo "### Columnas" >> "$output_file"
    echo "" >> "$output_file"
    get_table_structure "$table_name" >> "$output_file"
    echo "" >> "$output_file"

    echo "Documentación generada en '$output_file'."
}

# Muestra las tablas con índice numérico y permite al usuario seleccionar una
echo "Lista de tablas en la base de datos '$DB_NAME':"
tables=$(get_tables)
index=1

# Imprimir tablas con índice
while read -r table; do
    echo "$index) $table"
    index=$((index + 1))
done <<< "$tables"

# Solicitar al usuario que seleccione una tabla
read -p "Ingrese el número de la tabla para documentar: " table_index

# Validar la entrada del usuario
if ! [[ "$table_index" =~ ^[0-9]+$ ]] || [ "$table_index" -lt 1 ] || [ "$table_index" -gt $((index - 1)) ]; then
    echo "Selección inválida. Asegúrate de ingresar un número válido."
    exit 1
fi

# Obtener el nombre de la tabla seleccionado por el usuario
table_name=$(echo "$tables" | sed -n "${table_index}p")

# Generar la documentación para la tabla seleccionada
generate_docs "$table_name"
