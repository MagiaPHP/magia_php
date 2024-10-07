<div class="list-group">
    <h4 class="list-group-item active">
        <span class="glyphicon glyphicon-home"></span> 
        <?php echo _t("Companies list"); ?>
    </h4>

    <?php
    foreach (contacts_companies_list_with_tva() as $key => $company) {

        $total_offices = count(offices_list_by_headoffice($company['id']));
        $total_employees_by_office = 20;

        $total_html = ($total_offices > 1 ) ? '<span class="badge">' . $total_offices . '</span>' : '';

        if ($company['tva']) {
            ?>

            <a href="index.php?c=contacts&a=search_advanced&company_id=<?php echo $company['id']; ?>" class="list-group-item">

                <?php _menu_icon("top", "contacts"); ?>

                <?php echo $company['name']; ?> 

                <?php echo $total_html; ?>

            </a>

            <?php
        }
    }
    ?>



</div>

