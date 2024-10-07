
<?php
// si en config de contactos 
// se desea usar las fotos en las busquedas 
// sino
// _options_option("config_invoices_checked_by_default")
//vardump(_options_option('config_contacts_pics_in_search'));
//vardump($vista);
if (_options_option('config_contacts_pics_in_search')) {

    switch ($vista) {
        case "table_index_headoffice":
            include "cv_index_headoffice.php";
            break;

        case "table_index_headofficeandoffices":
            include "cv_index_headofficeandoffices.php";
            break;

        case "table_index_contacts":
            include "cv_index_contacts.php";
            break;

        case "table_index_all":
            include "cv_index_all.php";
            break;

        default:
            include "cv_index.php";
            break;
    }
} else {

//    vardump(__LINE__);
//    vardump($vista);

    switch ($vista) {
        case "table_index_headoffice":
            include "table_index_headoffice.php";
            break;

        case "table_index_headofficeandoffices":
            //include "table_index_headoffice.php";
            include "table_index_headofficeandoffices.php";
            break;

        case "table_index_contacts":
            include "table_index_contacts.php";
            break;

        case "table_index_all":
            include "table_index_all.php";
            break;

        default:
            include "table_index.php";
//                    include "cv_index.php";
            break;
    }
}
?>


<div class="container-fluid">
    <div class="col-sm-12 col-md-6 col-lg-6">
        <?php
        $pagination->createHtml();
        ?>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6 text-right">
        <?php
        include view('contacts', 'form_pagination_items_limit', $redi = 5);
        ?>
    </div>
</div>

