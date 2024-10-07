<?php 
#   __  __             _         _____  _    _ _____  
#  |  \/  |           (_)       |  __ \| |  | |  __ \ 
#  | \  / | __ _  __ _ _  __ _  | |__) | |__| | |__) |
#  | |\/| |/ _` |/ _` | |/ _` | |  ___/|  __  |  ___/ 
#  | |  | | (_| | (_| | | (_| | | |    | |  | | |     
#  |_|  |_|\__,_|\__, |_|\__,_| |_|    |_|  |_|_|     
#                 __/ |                         
#                |___/             
# 
# 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-18 07:09:41 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$first_name = (isset($_POST["first_name"]) && $_POST["first_name"] !=""  && $_POST["first_name"] !="null" ) ? clean($_POST["first_name"]) :  null  ;
$last_name = (isset($_POST["last_name"]) && $_POST["last_name"] !=""  && $_POST["last_name"] !="null" ) ? clean($_POST["last_name"]) :  null  ;
$address = (isset($_POST["address"]) && $_POST["address"] !=""  && $_POST["address"] !="null" ) ? clean($_POST["address"]) :  null  ;
$city = (isset($_POST["city"]) && $_POST["city"] !=""  && $_POST["city"] !="null" ) ? clean($_POST["city"]) :  null  ;
$postal_code = (isset($_POST["postal_code"]) && $_POST["postal_code"] !=""  && $_POST["postal_code"] !="null" ) ? clean($_POST["postal_code"]) :  null  ;
$phone_number = (isset($_POST["phone_number"]) && $_POST["phone_number"] !=""  && $_POST["phone_number"] !="null" ) ? clean($_POST["phone_number"]) :  null  ;
$email = (isset($_POST["email"]) && $_POST["email"] !=""  && $_POST["email"] !="null" ) ? clean($_POST["email"]) :  null  ;
$driver_license = (isset($_POST["driver_license"]) && $_POST["driver_license"] !=""  && $_POST["driver_license"] !="null" ) ? clean($_POST["driver_license"]) :  null  ;
$birth_date = (isset($_POST["birth_date"]) && $_POST["birth_date"] !=""  && $_POST["birth_date"] !="null" ) ? clean($_POST["birth_date"]) :  null  ;
$availability = (isset($_POST["availability"]) && $_POST["availability"] !=""  && $_POST["availability"] !="null" ) ? clean($_POST["availability"]) :  null  ;
$professional_goal = (isset($_POST["professional_goal"]) && $_POST["professional_goal"] !=""  && $_POST["professional_goal"] !="null" ) ? clean($_POST["professional_goal"]) :  null  ;
$summary = (isset($_POST["summary"]) && $_POST["summary"] !=""  && $_POST["summary"] !="null" ) ? clean($_POST["summary"]) :  null  ;
$hobbies = (isset($_POST["hobbies"]) && $_POST["hobbies"] !=""  && $_POST["hobbies"] !="null" ) ? clean($_POST["hobbies"]) :  null  ;
$created_at = (isset($_POST["created_at"]) && $_POST["created_at"] !="" ) ? clean($_POST["created_at"]) : current_timestamp() ;
$work_experience = (isset($_POST["work_experience"]) && $_POST["work_experience"] !=""  && $_POST["work_experience"] !="null" ) ? clean($_POST["work_experience"]) :  null  ;
$education = (isset($_POST["education"]) && $_POST["education"] !=""  && $_POST["education"] !="null" ) ? clean($_POST["education"]) :  null  ;
$technologies = (isset($_POST["technologies"]) && $_POST["technologies"] !=""  && $_POST["technologies"] !="null" ) ? clean($_POST["technologies"]) :  null  ;
$skills = (isset($_POST["skills"]) && $_POST["skills"] !=""  && $_POST["skills"] !="null" ) ? clean($_POST["skills"]) :  null  ;
$projects = (isset($_POST["projects"]) && $_POST["projects"] !=""  && $_POST["projects"] !="null" ) ? clean($_POST["projects"]) :  null  ;
$languages = (isset($_POST["languages"]) && $_POST["languages"] !=""  && $_POST["languages"] !="null" ) ? clean($_POST["languages"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
#################################################################################

# REQUIRED
#################################################################################


#################################################################################

# FORMAT
#################################################################################


#################################################################################

# CONDITIONAL
#################################################################################

  
//if( cv_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    $lastInsertId = cv_add(
        $first_name ,  $last_name ,  $address ,  $city ,  $postal_code ,  $phone_number ,  $email ,  $driver_license ,  $birth_date ,  $availability ,  $professional_goal ,  $summary ,  $hobbies ,  $created_at ,  $work_experience ,  $education ,  $technologies ,  $skills ,  $projects ,  $languages ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=cv");
            break;
            
        case 2:
            header("Location: index.php?c=cv&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=cv&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=cv&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=cv&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
    




 
} else {

    include view("home", "pageError");
}


