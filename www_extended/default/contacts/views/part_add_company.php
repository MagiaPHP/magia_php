<?php
if ($new) {

    $arg['redi'] = '8';
    $arg['c'] = 'contacts';
    $arg['a'] = 'details';
    $arg['params'] = "id=$id";

    include "form_contacts_company_add.php";
} else {
    ?>
    <h3><?php _t("What is the TVA number of the new company?"); ?></h3>

    <form class="form-inline" action="index.php" method="get">
        <input type="hidden" name="c" value="contacts">
        <input type="hidden" name="a" value="add">
        <div class="form-group">

            <label class="sr-only" for="vat"><?php echo _t("Vat number"); ?></label>

            <input 
                type="text" 
                class="form-control" 
                id="vat" 
                name="vat" 
                placeholder="123456789"
                value="<?php echo $vat; ?>"
                required=""
                >
        </div>

        <script>
            $(document).ready(function () {
                $('#vat').on('input', function () {
                    // Remueve cualquier carácter que no sea letras o números
                    var input = $(this).val();
                    var sanitized = input.replace(/[^a-zA-Z0-9]/g, '').toUpperCase(); // Permite solo letras y números
                    $(this).val(sanitized);
                });
            });
        </script>


        <button type="submit" class="btn btn-default">
    <?php _t("Next"); ?>
            <span class="glyphicon glyphicon-chevron-right"></span>
        </button>
    </form>

    <br>

    <?php
    if (modules_field_module('status', "docu")) {
        echo docu_modal_bloc('tasks', 'index', _menus_get_file_name(__FILE__));
    }
    ?>

    <p>
    <?php // _t("Search for a company on the Factux network");       ?>
        <?php //_t("Search for a company by vat number");    ?>
    </p>

    <?php
    if ($vat) { // muestro la tabla si hay alguna bisqueda
        if ($contacts) {
            include "cloud_table_contact_list.php";
        } else {
            // solo si no hay contactos, 
            // dejo agregar un contacto nuevo
            echo "<h3></h3>";
//            echo '<meta http-equiv="refresh" content="30">';
            echo '<meta http-equiv="refresh" content="0; URL=index.php?c=contacts&a=add_company&tva=' . $vat . '" />';
            include "form_add_new_company.php";
        }
    }
    ?>
    <?php
}
//include "form_contacts_company_add.php";
?>

