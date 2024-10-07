

<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("My projects"); ?>
    </div>
    <div class="panel-body">
        
        <form class="form-inline" action="index.php" method="get">
            
            <input type="hidden" name="c" value="projects">
            <input type="hidden" name="a" value="<?php echo $a; ?>">
            
            <div class="form-group">
                <label for="id" class="sr-only"><?php _t("Employee"); ?></label>
                <select class="form-control" name="id">
                    <?php
                    foreach (projects_list() as $key => $project_all) {
                        $project_all_selected = ($project_all['id'] == $id) ? " selected " : "";
                        echo '<option value="' . $project_all['id'] . '"  ' . $project_all_selected . '>' . ($project_all['name']) . '</option>';
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