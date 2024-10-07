<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php
            if (modules_field_module('status', "docu")) {
                echo docu_modal_bloc($c, $a, 'projects', array('c' => $c, 'a' => $a, 'id' => $id));
            }
            ?>
            <a name="projects"></a><?php _t("Projects"); ?>
        </h3>
    </div>
    <div class="panel-body">
        <?php
        include "projects_list.php";
        ?>
        <a href="index.php?c=projecs"><?php _t("See all projects"); ?></a>

    </div>
</div>

