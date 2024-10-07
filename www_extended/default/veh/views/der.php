

<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("My vehicles"); ?>
    </div>
    <div class="panel-body">
        <form class="form-inline" action="index.php" method="get">
            <input type="hidden" name="c" value="veh_vehicles">
            <input type="hidden" name="a" value="<?php echo $a; ?>">
            <div class="form-group">
                <label for="id" class="sr-only"><?php _t("Vehicles"); ?></label>

                <select class="form-control" name="id">
                    <?php
                    foreach (veh_vehicles_list() as $key => $veh) {
                        $veh_selected = ($veh['id'] == $id) ? " selected " : "";
                        echo '<option value="' . $veh['id'] . '"  ' . $veh_selected . '>' . ($veh['name']) . '</option>';
                    }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-default">
                <?php echo icon("refresh"); ?> 
                <?php _t("Change"); ?>
            </button>


        </form>
    </div>
</div>