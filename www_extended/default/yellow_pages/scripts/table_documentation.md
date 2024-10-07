## Documentación de la Tabla `yellow_pages`

En esta entrada, vamos a detallar la estructura y el propósito de la tabla `yellow_pages`, que forma parte de la base de datos `factuxorg_demo`. Esta tabla es utilizada para almacenar información relevante sobre diferentes páginas web y recursos. A continuación, se presenta una descripción completa de su estructura, columnas y relaciones.

### Estructura de la Tabla

```sql
  `id` int(11) NOT NULL AUTO_INCREMENT
```

### Columnas

- **id** (int(11)): NO, Valor predeterminado: NULL, Comentario: auto_increment
- **label** (varchar(250)): NO, Valor predeterminado: , Comentario: 
- **url** (text): NO, Valor predeterminado: , Comentario: 
- **description** (mediumtext): YES, Valor predeterminado: , Comentario: 
- **category** (varchar(50)): NO, Valor predeterminado: NULL, Comentario: 
- **target** (varchar(50)): YES, Valor predeterminado: , Comentario: 
- **order_by** (int(11)): NO, Valor predeterminado: , Comentario: 
- **status** (int(11)): NO, Valor predeterminado: , Comentario: 

### Índices

La tabla `yellow_pages` incluye los siguientes índices para mejorar el rendimiento de las consultas:

```sql
Table	Non_unique	Key_name	Seq_in_index	Column_name	Collation	Cardinality	Sub_part	Packed	Null	Index_type	Comment	Index_comment	Ignored
yellow_pages	0	PRIMARY	1	id	A	10	NULL	NULL		BTREE			NO
yellow_pages	1	yellow_pages_category	1	category	A	10	NULL	NULL		BTREE			NO
```

### Relaciones

La columna `category` en la tabla `yellow_pages` está relacionada con la tabla `yellow_pages_categories` mediante una clave foránea:

```sql
CONSTRAINT_NAME	COLUMN_NAME	REFERENCED_TABLE_NAME	REFERENCED_COLUMN_NAME
PRIMARY	id	NULL	NULL
yellow_pages_category	category	yellow_pages_categories	category
```

### Datos Ejemplares

Para ilustrar cómo se utilizan los datos en esta tabla, aquí algunos ejemplos de entradas:

```sql
id	label	url	description	category	target	order_by	status
30	factuz.com	https://factuz.com	Web para mi	Home	_new	1	1
31	Ikea	https://www.ikea.com/be/fr/	Almacen de muebles	Home	_new	1	1
32	Stib	https://www.stib-mivb.be/index.htm?l=en	empresa de transporte	Home	_new	1	1
33	Sibelga	https://www.sibelga.be/en	Sibelga is the operator of the electricity and natural gas distribution networks for the 19 municipalities in the Brussels-Capital Region.	Home	_new	1	1
34	Belgium.be	https://www.belgium.be/en	Official information and services	Home	_new	1	1
```

