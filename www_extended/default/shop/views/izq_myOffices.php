


<div class="list-group">
    <a href="#" class="list-group-item active">
        <i class="fas fa-home"></i>
        <?php _t("My offices"); ?>
    </a>



    <a href="index.php?c=shop&a=offices" class="list-group-item"><?php _t("All"); ?></a>


    <?php
    // si puedes crear, puedes ver todas, sino solo la que trabajas
//if ( permissions_has_permission($u_rol , "shop_offices" , "create") ) {
    if (users_can_see_others_offices($u_id)) {
        $my_offices = shop_offices_list_of_my_company();
    } else {

        $my_offices = shop_offices_where_i_work();
    }


    $class = "";
    $icon = "";
    foreach ($my_offices as $key => $my_office) {

        $headoffice = ($my_office['tva']) ? "(" . _tr("Headoffice") . ")" : '';

        if (isset($id) && $id == $my_office['id']) {
            $class = 'list-group-item-info';
            $icon = '<span class="glyphicon glyphicon-chevron-right"></span>';
        }


        echo '<a href="index.php?c=shop&a=offices_details&id=' . $my_office['id'] . '" class="list-group-item ' . $class . '">' . $icon . ' ' . $my_office['name'] . '  ' . $headoffice . '</a>';

        $class = "";
        $icon = "";
    }
    ?>

</div>

