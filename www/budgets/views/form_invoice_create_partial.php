<form action="index.php" method="post" class="">
    <input type="hidden" name="c" value="budgets"> 
    <input type="hidden" name="a" value="ok_invoice_create_partial"> 
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">    



    <div class="row form-group">
        <div class="col-xs-7">
            <p>
                <?php _t("Percentage of the total budget to be billed"); ?>
            </p>
        </div>
    </div>




    <div class="row form-group">
        <div class="col-xs-4">
            <label for="description"><?php _t("Percent to bill"); ?></label>
            <input 
                type="number" 
                name="percent" 
                class="form-control percent" 
                id="percent" 
                placeholder="" value="<?php
                $total_percent = (isset($total_percent) && $total_percent > 0 ) ? 100 - $total_percent : 100;

                echo number_format($total_percent, 0);
                ?>">
        </div>



        <div class="col-xs-3">
            <label for="description">.</label>
            <select class="form-control" name="type">
                <option>% </option>
            </select>
        </div>
    </div>






    <div class="row form-group">
        <div class="col-xs-7">
            <label for="description"><?php _t("Description"); ?></label>
            <input type="text" name="description" class="form-control" id="description" placeholder="" value="<?php _t("Advance payment"); ?>">
        </div>
    </div>



    <?php
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

        echo _tr("This budget is present in the following projects");
        foreach (projects_inout_search_by('budget_id', $budget->getId()) as $key => $bpip) {
            echo '<p>' . $bpip['project_id'] . ' : ' . projects_field_id('name', $bpip['project_id']) . '</p>';
        }
    }
    ?>




    <div class="row form-group">
        <div class="col-xs-7">

            <button type="submit" class="btn btn-primary"><?php _t("Create a partial invoice now"); ?></button>
        </div>
    </div>






</form>