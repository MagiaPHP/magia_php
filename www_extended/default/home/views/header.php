<!DOCTYPE html>
<html 
    lang="<?php echo substr(users_field_contact_id('language', $u_id), 0, 2) ?>"
    dir="<?php echo (substr(users_field_contact_id('language', $u_id), 0, 2) == "ar") ? "rtl" : "ltr"; ?>">    
    <head>
        <?php  include view("home", "head"); ?>
        <?php //include 'head.php'; ?>
    </head> 
    
    <body>

        <div class="container-fluid">   

            <?php    include view("home", 'menu'); ?> 

            <?php
            if ($u_owner_id == 1022 && contacts_field_id('status', 1022) == -1) {
                message('danger', "Blocked account, please contact the admin");
            }
            ?>

            <?php
            if (is_logued()) {
                // existen actualizaciones?
            }
            ?>
            <?php
            // Para los que estan logueados
            if (is_logued()) {
                // Todos los mensajes 
                messages_show(messages_search_all());
                // segun un controllador en especial
                messages_show(messages_search_by_controller($c));
                // para un controllador y un id en especial
                if (isset($id)) {
                    messages_show(messages_search_by_controller_doc_id($c, $id));
                }
                // para un usuario en especial
                messages_show(messages_search_by_contact_id($u_id));
                // para un rol especifico
                messages_show(messages_search_by_rol($u_rol));
                // un dia especifico
                messages_show(messages_search_by_date(date("Y-m-d")));
                // desde hasta
                messages_show(messages_search_by_date_from_to(date("Y-m-d")));
            }
            ?>
        </div>
        
        <div class="container-fluid">


