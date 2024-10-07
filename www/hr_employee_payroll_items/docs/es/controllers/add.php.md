#add.php  

## Plugin : Types 
## controllers : add.php 
##  
Url doc: http://magiaphp.com/docs/001/types/controllers/add.php 

Fecha de creacion del documento: 2024-09-21 12:09:34 

Documento accesible via la siguiente url:  

`
if (!permissions_has_permission($u_rol, $c, "create")) {    
    header("Location: index.php?c=home&a=no_access");
    
    die("Error has permission ");
}

include view("types", "add");
`


#mg 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    #mg si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");

    #mg y matamos el proceso 
    die("Error has permission ");
}

#mg 2) si ha pasado el control anterior, incluimos la vista `add`                
include view("types", "add");

http://localhost/index.php?c=hr_employee_payroll_items&a=add 

