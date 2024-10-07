## Documentación de la Tabla `yellow_pages_categories`

En esta entrada, vamos a detallar la estructura y el propósito de la tabla `yellow_pages_categories`, que forma parte de la base de datos `factuxorg_demo`. Esta tabla es utilizada para almacenar información relevante sobre diferentes recursos. A continuación, se presenta una descripción completa de su estructura, columnas y relaciones.

### Estructura de la Tabla

```sql
  `id` int(11) NOT NULL AUTO_INCREMENT
```

### Columnas

- **id** (int(11)): NO, Valor predeterminado: NULL, Comentario: auto_increment
- **category** (varchar(50)): NO, Valor predeterminado: NULL, Comentario: 
- **order_by** (int(11)): NO, Valor predeterminado: , Comentario: 
- **status** (int(1)): NO, Valor predeterminado: , Comentario: 

### Índices

La tabla `yellow_pages_categories` incluye los siguientes índices para mejorar el rendimiento de las consultas:

```sql
Table	Non_unique	Key_name	Seq_in_index	Column_name	Collation	Cardinality	Sub_part	Packed	Null	Index_type	Comment	Index_comment	Ignored
yellow_pages_categories	0	PRIMARY	1	id	A	9	NULL	NULL		BTREE			NO
yellow_pages_categories	0	category	1	category	A	9	NULL	NULL		BTREE			NO
```

### Relaciones

La tabla `yellow_pages_categories` tiene las siguientes claves foráneas:

```sql
CONSTRAINT_NAME	COLUMN_NAME	REFERENCED_TABLE_NAME	REFERENCED_COLUMN_NAME
PRIMARY	id	NULL	NULL
category	category	NULL	NULL
```

### Datos Ejemplares

Para ilustrar cómo se utilizan los datos en esta tabla, aquí algunos ejemplos de entradas:

```sql
id	category	order_by	status
1	Shops	1	1
2	Tel	1	1
3	Home	1	1
4	Personal	1	1
5	Web	1	1
```

