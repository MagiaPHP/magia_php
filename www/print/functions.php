<?php

function print_icon_nav($url, $contact_id, $label = "Print") {

    //$url = "index.php?c=$c&a=$a&id=$id";
    // si la opcion de impresion multiidioma esta activa, sino 
    if (_options_option('config_print_multilang')) {
        // $contact_id = invoices_field_id('client_id', $id);
        //$url = "index.php?c=invoices&a=export_pdf&id=$id";
        ?>
        <li class="dropdown">
            <a href="#" 
               class="dropdown-toggle" 
               data-toggle="dropdown" 
               role="button" 
               aria-haspopup="true" 
               aria-expanded="false">
                <span class="glyphicon glyphicon-print"></span>
                <?php // _t("Print");  ?>
                <?php echo $label ?>
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <?php
                foreach (_languages_list_by_status(1) as $key => $lang) {
                    $icon = ($lang['language'] == contacts_field_id('language', $contact_id)) ? '<span class="glyphicon glyphicon-chevron-right"></span>' : '';
                    ?>
                    <li>
                        <a href="<?php echo "$url"; ?>&lang=<?php echo $lang['language']; ?>" target="_print">
                            <?php echo $icon; ?>
                            <?php echo _t($lang['name']); ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </li>
        <?php
    } else {
        // Se imprime en el idioma del cliente (la sede)
        $contacts_language = contacts_language(contacts_headoffice_of_contact_id($contact_id));
        $lang = ($contacts_language) ? $contacts_language : _options_option('config_print_default_lang');
        ?>
        <li>
            <a href="<?php echo "$url"; ?>&lang=<?php echo $lang; ?>&1" target="_print">
                <span class="glyphicon glyphicon-print"></span>
                <?php //echo _t("Print");  ?>
                <?php echo $label ?>
            </a>
        </li>
        <?php
    }
}

function print_dropdown($url, $contact_id, $label = "Print", $glyphicon = "glyphicon glyphicon-print") {

    if (_options_option('config_print_multilang')) {

        // index.php?c=invoices&a=export_pdf&id=<?php echo $invoice['id'];
        ?>

        <div class="dropdown">
            <button class="btn btn-sm btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <span class="<?php echo $glyphicon; ?>"></span>
                <?php // _t("Print");    ?>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <?php
                foreach (_languages_list_by_status(1) as $key => $lang) {
                    $icon = ($lang['language'] == contacts_field_id('language', $contact_id)) ? '<span class="glyphicon glyphicon-chevron-right"></span>' : '';
                    ?>
                    <li>
                        <a href="<?php echo $url; ?>&lang=<?php echo $lang['language']; ?>" target="_print">
                            <?php echo $icon; ?>
                            <?php echo _t($lang['name']); ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>

        <?php
    } else {

        // Se imprime en el idioma del cliente (la sede)
        $contacts_language = contacts_language(contacts_headoffice_of_contact_id($contact_id));
        $lang = ($contacts_language) ? $contacts_language : _options_option('config_print_default_lang');
        ?> 
        <a class="btn btn-sm btn-default" href="<?php echo $url; ?>&lang=<?php echo $lang; ?>" target="_print">
            <span class="<?php echo $glyphicon; ?>"></span>
            <?php //echo _t('Print');   ?>
        </a>
        <?php
    }
}
