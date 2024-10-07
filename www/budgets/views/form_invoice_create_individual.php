<?php
/**
 * Registra budgets aceptado y crea una factura indivdual
 * 
 */
?>

<?php if (1 == 1) { ?>

    <form action="index.php" method="post" class="form-inline" >
        <input type="hidden" name="c" value="budgets">
        <input type="hidden" name="a" value="ok_create_individual">
        <input type="hidden" name="id" value="<?php echo $id; ?>">            

        <?php
        if (1 == 2) {


            // lista de projectos donde esta este budgets
            projects_inout_search_by_unique('id', 'budget_id', $budget->getId());

            if (modules_field_module('status', 'projects') && !projects_inout_search_by('budget_id', $budget->getId())) {
                ?>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="create_project" value="1" checked=""> <?php _t("Create a proyect"); ?>
                    </label>
                </div>

                <?php
            } else {

//            echo _tr("This budget is present in the following projects");
//            foreach (projects_inout_search_by('budget_id', $budget->getId()) as $key => $bpip) {
//                echo '<p>' . $bpip['project_id'] . ' : ' . projects_field_id('name', $bpip['project_id']) . '</p>';
//            }
            }
        }
        ?>



        <div class="form-group">
            <button type="submit" class="btn btn-primary"><?php _t("Accept"); ?></button>
        </div>
    </form>

    <?php
} else {
    message("info", "This budget has partial invoices, continue with that modality");
}
?>



