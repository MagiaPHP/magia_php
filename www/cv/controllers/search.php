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


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$cv = null;

$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] !="" ) ? clean($_POST["order_col"]) : "id";  

$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] !="" ) ? clean($_POST["order_way"]) : "desc";  

$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;


# activa la configuracion del formulario
$config = (!empty($_GET["config"])) ? clean($_GET["config"]) : false;

# que linea del formulario esta activo
$line_id = (!empty($_GET["line_id"])) ? clean($_GET["line_id"]) : null;


$error = array();

#################################################################################

#################################################################################

switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;        
        $cv = cv_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_first_name":
        $first_name = (isset($_GET["first_name"]) && $_GET["first_name"] != "" ) ? clean($_GET["first_name"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_search_by("first_name", $first_name));
        // puede hacer falta
        $url = "index.php?c=cv&a=search&w=by_first_name&first_name=" . $first_name;
        $pagination->setUrl($url);
        $cv = cv_search_by("first_name", $first_name, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_last_name":
        $last_name = (isset($_GET["last_name"]) && $_GET["last_name"] != "" ) ? clean($_GET["last_name"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_search_by("last_name", $last_name));
        // puede hacer falta
        $url = "index.php?c=cv&a=search&w=by_last_name&last_name=" . $last_name;
        $pagination->setUrl($url);
        $cv = cv_search_by("last_name", $last_name, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_address":
        $address = (isset($_GET["address"]) && $_GET["address"] != "" ) ? clean($_GET["address"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_search_by("address", $address));
        // puede hacer falta
        $url = "index.php?c=cv&a=search&w=by_address&address=" . $address;
        $pagination->setUrl($url);
        $cv = cv_search_by("address", $address, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_city":
        $city = (isset($_GET["city"]) && $_GET["city"] != "" ) ? clean($_GET["city"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_search_by("city", $city));
        // puede hacer falta
        $url = "index.php?c=cv&a=search&w=by_city&city=" . $city;
        $pagination->setUrl($url);
        $cv = cv_search_by("city", $city, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_postal_code":
        $postal_code = (isset($_GET["postal_code"]) && $_GET["postal_code"] != "" ) ? clean($_GET["postal_code"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_search_by("postal_code", $postal_code));
        // puede hacer falta
        $url = "index.php?c=cv&a=search&w=by_postal_code&postal_code=" . $postal_code;
        $pagination->setUrl($url);
        $cv = cv_search_by("postal_code", $postal_code, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_phone_number":
        $phone_number = (isset($_GET["phone_number"]) && $_GET["phone_number"] != "" ) ? clean($_GET["phone_number"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_search_by("phone_number", $phone_number));
        // puede hacer falta
        $url = "index.php?c=cv&a=search&w=by_phone_number&phone_number=" . $phone_number;
        $pagination->setUrl($url);
        $cv = cv_search_by("phone_number", $phone_number, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_email":
        $email = (isset($_GET["email"]) && $_GET["email"] != "" ) ? clean($_GET["email"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_search_by("email", $email));
        // puede hacer falta
        $url = "index.php?c=cv&a=search&w=by_email&email=" . $email;
        $pagination->setUrl($url);
        $cv = cv_search_by("email", $email, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_driver_license":
        $driver_license = (isset($_GET["driver_license"]) && $_GET["driver_license"] != "" ) ? clean($_GET["driver_license"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_search_by("driver_license", $driver_license));
        // puede hacer falta
        $url = "index.php?c=cv&a=search&w=by_driver_license&driver_license=" . $driver_license;
        $pagination->setUrl($url);
        $cv = cv_search_by("driver_license", $driver_license, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_birth_date":
        $birth_date = (isset($_GET["birth_date"]) && $_GET["birth_date"] != "" ) ? clean($_GET["birth_date"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_search_by("birth_date", $birth_date));
        // puede hacer falta
        $url = "index.php?c=cv&a=search&w=by_birth_date&birth_date=" . $birth_date;
        $pagination->setUrl($url);
        $cv = cv_search_by("birth_date", $birth_date, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_availability":
        $availability = (isset($_GET["availability"]) && $_GET["availability"] != "" ) ? clean($_GET["availability"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_search_by("availability", $availability));
        // puede hacer falta
        $url = "index.php?c=cv&a=search&w=by_availability&availability=" . $availability;
        $pagination->setUrl($url);
        $cv = cv_search_by("availability", $availability, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_professional_goal":
        $professional_goal = (isset($_GET["professional_goal"]) && $_GET["professional_goal"] != "" ) ? clean($_GET["professional_goal"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_search_by("professional_goal", $professional_goal));
        // puede hacer falta
        $url = "index.php?c=cv&a=search&w=by_professional_goal&professional_goal=" . $professional_goal;
        $pagination->setUrl($url);
        $cv = cv_search_by("professional_goal", $professional_goal, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_summary":
        $summary = (isset($_GET["summary"]) && $_GET["summary"] != "" ) ? clean($_GET["summary"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_search_by("summary", $summary));
        // puede hacer falta
        $url = "index.php?c=cv&a=search&w=by_summary&summary=" . $summary;
        $pagination->setUrl($url);
        $cv = cv_search_by("summary", $summary, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_hobbies":
        $hobbies = (isset($_GET["hobbies"]) && $_GET["hobbies"] != "" ) ? clean($_GET["hobbies"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_search_by("hobbies", $hobbies));
        // puede hacer falta
        $url = "index.php?c=cv&a=search&w=by_hobbies&hobbies=" . $hobbies;
        $pagination->setUrl($url);
        $cv = cv_search_by("hobbies", $hobbies, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_created_at":
        $created_at = (isset($_GET["created_at"]) && $_GET["created_at"] != "" ) ? clean($_GET["created_at"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_search_by("created_at", $created_at));
        // puede hacer falta
        $url = "index.php?c=cv&a=search&w=by_created_at&created_at=" . $created_at;
        $pagination->setUrl($url);
        $cv = cv_search_by("created_at", $created_at, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_work_experience":
        $work_experience = (isset($_GET["work_experience"]) && $_GET["work_experience"] != "" ) ? clean($_GET["work_experience"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_search_by("work_experience", $work_experience));
        // puede hacer falta
        $url = "index.php?c=cv&a=search&w=by_work_experience&work_experience=" . $work_experience;
        $pagination->setUrl($url);
        $cv = cv_search_by("work_experience", $work_experience, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_education":
        $education = (isset($_GET["education"]) && $_GET["education"] != "" ) ? clean($_GET["education"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_search_by("education", $education));
        // puede hacer falta
        $url = "index.php?c=cv&a=search&w=by_education&education=" . $education;
        $pagination->setUrl($url);
        $cv = cv_search_by("education", $education, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_technologies":
        $technologies = (isset($_GET["technologies"]) && $_GET["technologies"] != "" ) ? clean($_GET["technologies"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_search_by("technologies", $technologies));
        // puede hacer falta
        $url = "index.php?c=cv&a=search&w=by_technologies&technologies=" . $technologies;
        $pagination->setUrl($url);
        $cv = cv_search_by("technologies", $technologies, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_skills":
        $skills = (isset($_GET["skills"]) && $_GET["skills"] != "" ) ? clean($_GET["skills"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_search_by("skills", $skills));
        // puede hacer falta
        $url = "index.php?c=cv&a=search&w=by_skills&skills=" . $skills;
        $pagination->setUrl($url);
        $cv = cv_search_by("skills", $skills, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_projects":
        $projects = (isset($_GET["projects"]) && $_GET["projects"] != "" ) ? clean($_GET["projects"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_search_by("projects", $projects));
        // puede hacer falta
        $url = "index.php?c=cv&a=search&w=by_projects&projects=" . $projects;
        $pagination->setUrl($url);
        $cv = cv_search_by("projects", $projects, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_languages":
        $languages = (isset($_GET["languages"]) && $_GET["languages"] != "" ) ? clean($_GET["languages"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_search_by("languages", $languages));
        // puede hacer falta
        $url = "index.php?c=cv&a=search&w=by_languages&languages=" . $languages;
        $pagination->setUrl($url);
        $cv = cv_search_by("languages", $languages, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=cv&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $cv = cv_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=cv&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $cv = cv_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_search($txt));
        // puede hacer falta
        $url = "index.php?c=cva=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $cv = cv_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$cv = cv_search($txt);
        break;
}


include view("cv", "index");      
