


<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _t("My employees"); ?>
    </a>



    <a href="index.php?c=shop&a=offices" class="list-group-item"><?php _t("All"); ?></a>


    <?php
    // si puedes crear, puedes ver todas, sino solo la que trabajas
//if ( permissions_has_permission($u_rol , "shop_offices" , "create") ) {
    if (users_can_see_others_offices($u_id)) {
        $my_employees = employees_list_by_company($u_owner_id);
    } else {

        $my_employees = employees_list_by_office($u_owner_id);
    }


    $class = "";
    $icon = "";
    $lock = "";
    foreach ($my_employees as $key => $my_employe) {


        if (users_field_contact_id('status', $my_employe['contact_id']) == USER_BLOCKED) {
            $lock = '<span class="glyphicon glyphicon-lock"></span>';
        }

        if ($my_employe['contact_id'] == $id) {
            $class = 'list-group-item-info';
            $icon = '<span class="glyphicon glyphicon-chevron-right"></span>';
        }



        echo '<a href="index.php?c=shop&a=contacts_details&id=' . $my_employe['contact_id'] . '" class="list-group-item ' . $class . ' ">' . $icon . ' ' . contacts_formated($my_employe['contact_id']) . ' ' . $lock . '</a>';

        $class = "";
        $icon = "";
        $lock = "";
    }
    ?>

</div>



