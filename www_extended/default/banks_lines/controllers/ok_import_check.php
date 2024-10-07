<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$file = (!empty($_FILES['file']) ) ? $_FILES['file'] : false;
$account_number = (!empty($_POST['redi'])) ? clean($_POST['account_number']) : false;
// tomar en cuenta la primer linea?
$fl = (!empty($_POST['fl'])) ? clean($_POST['fl']) : false;
$redi = (!empty($_POST['redi'])) ? clean($_POST['redi']) : false;

$date_registre = date("Y-m-d H:i:s");
$error = array();

#################################################################################
// si hay 3 o mas archivos ya no se puede subir 
if (files_get_total_files_in_folder('tmp') >= 3) {
    array_push($error, 'You have reached the maximum number of possible files, delete some to continue uploading more files');
}
#################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    $sendfile = new Gallery($file);
    $sendfile->_set_ext_acepted(array(
        "text/csv",
    ));
    $sendfile->_set_path("www/gallery/img/_" . $config_db . "/");
    $sendfile->sendFile();

    if ($sendfile->get_Error()) {
        foreach ($sendfile->get_Error() as $key => $value) {
            array_push($error, $value);
        }
    }
// Si no hay el archivo en el servidor
    if (!$sendfile->checkDownloadCorrectly()) {
        array_push($error, "There was an error sending the file to the server, please send it by email");
    }


    $code = uniqid();

    gallery_add(
            $u_id,
            'banks_lines',
            null,
            $sendfile->get_formatedName(),
            'Bank lines', // title
            '', // description
            '', // alt
            '', // url
            $date_registre,
            $code,
            1,
            1
    );

    ############################################################################     


    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=banks_lines");
            break;

        case 2:
            header("Location: index.php?c=banks_lines&a=import_check");
            break;

        case 3:
            header("Location: index.php?c=docu_blocs");
            break;

        case 4:
            header("Location: index.php?c=banks_lines&a=import");
            break;

        case 5:
            //                index.php?c=banks_lines&a=import_check&file=2024-04-30-15-25-17-x-6630f13d7dc30.csv&account_number=BE15363235107630&redi=1
            header("Location: index.php?c=banks_lines&a=import_check&file=" . $sendfile->get_formatedName() . "&account_number=$account_number#5");
            break;

        default:
            header("Location: index.php");
            break;
    }
} else {

    include view("home", "pageError");
}
