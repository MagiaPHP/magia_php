## Documentación de la Tabla `users`

En esta entrada, vamos a detallar la estructura y el propósito de la tabla `users`, que forma parte de la base de datos `factuxorg_demo`. Esta tabla es utilizada para almacenar información relevante sobre diferentes recursos. A continuación, se presenta una descripción completa de su estructura, columnas y relaciones.

### Estructura de la Tabla

```sql
  `id` int(11) NOT NULL AUTO_INCREMENT
```

### Columnas

- **id** (int(11)): NO, Valor predeterminado: NULL, Comentario: auto_increment
- **contact_id** (int(11)): NO, Valor predeterminado: NULL, Comentario: 
- **language** (varchar(7)): YES, Valor predeterminado: NULL, Comentario: 
- **rol** (varchar(50)): NO, Valor predeterminado: user, Comentario: 
- **login** (varchar(250)): NO, Valor predeterminado: NULL, Comentario: 
- **password** (varchar(80)): NO, Valor predeterminado: , Comentario: 
- **email** (varchar(250)): NO, Valor predeterminado: , Comentario: 
- **code** (varchar(250)): YES, Valor predeterminado: NULL, Comentario: 
- **status** (tinyint(1)): NO, Valor predeterminado: , Comentario: 

### Índices

La tabla `users` incluye los siguientes índices para mejorar el rendimiento de las consultas:

```sql
Table	Non_unique	Key_name	Seq_in_index	Column_name	Collation	Cardinality	Sub_part	Packed	Null	Index_type	Comment	Index_comment	Ignored
users	0	PRIMARY	1	id	A	24	NULL	NULL		BTREE			NO
users	0	login	1	login	A	24	NULL	NULL		BTREE			NO
users	0	login_rol	1	login	A	24	NULL	NULL		BTREE			NO
users	0	login_rol	2	rol	A	24	NULL	NULL		BTREE			NO
users	0	login_2	1	login	A	24	NULL	NULL		BTREE			NO
users	0	code	1	code	A	24	NULL	NULL	YES	BTREE			NO
users	1	rol	1	rol	A	24	NULL	NULL		BTREE			NO
users	1	contact_id	1	contact_id	A	24	NULL	NULL		BTREE			NO
users	1	language	1	language	A	6	NULL	NULL	YES	BTREE			NO
```

### Relaciones

La tabla `users` tiene las siguientes claves foráneas:

```sql
CONSTRAINT_NAME	COLUMN_NAME	REFERENCED_TABLE_NAME	REFERENCED_COLUMN_NAME
PRIMARY	id	NULL	NULL
login	login	NULL	NULL
login_rol	login	NULL	NULL
login_rol	rol	NULL	NULL
login_2	login	NULL	NULL
code	code	NULL	NULL
users_ibfk_1	contact_id	contacts	id
users_ibfk_2	rol	rols	rol
users_ibfk_3	language	_languages	language
```

### Datos Ejemplares

Para ilustrar cómo se utilizan los datos en esta tabla, aquí algunos ejemplos de entradas:

```sql
id	contact_id	language	rol	login	password	email	code	status
148	2475	es_ES	root	root	$2y$10$2B4U9B4ado5u6DeKBTo2X.PpTkbNSA7DNhqfhtFWqn2eMNXz/YRoq	robincoello@hotmail.com	NULL	1
150	60001	en_GB	Secretary	demo@factux.org	$2y$10$uBhRDK9/h4XOSaYmwArk4utT5zOR1lq8bY7JQX7vTIuzqTkzzCv0S	demo@factux.org	2024013109121065baa99af35009149	1
152	61033	en_GB	Secretary	chenoa@factux.org	$2y$10$IXLmxOAwFVa6bfCF6gQVI.Ix9MBZ7euwF66otyIoXj3Wvy/8y9uUS	chenoa@factux.org	2024020205304665bc6ff68fa593692	1
153	61035	en_GB	User	carlos@factux.org	$2y$10$gEjeBtEk5xlkToQzPTXjyeNSQfDmghlU7ppqzKs/VdnJrtTzMuv4a	carlos@factux.org	2024020205562065bc75f4227e81617	1
154	61036	es_ES	Owner	conta@factux.org	$2y$10$03CvmwmT8s2vLNMywOzqCuAUmZk1AbKSh/ICMAGMJlCXovpOOKR.i	conta@factux.org	2024020205572665bc76366809d6965	1
```

