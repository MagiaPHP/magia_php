<?php
# MagiaPHP 
# file date creation: 2024-03-30 
?>
<?php include view("home", "header"); ?> 

<?php include view('projects', 'nav'); ?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include "izq_index.php"; ?>
    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">
        <?php



        
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php if (permissions_has_permission($u_rol, 'config', 'update')) { ?>
            <a href="index.php?c=config&a=ok_projects_index_tmp&data=cdv"><?php echo icon("th-large"); ?></a>
            <a href="index.php?c=config&a=ok_projects_index_tmp&data=list"><?php echo icon("th-list"); ?></a>
        <?php } ?>

        <?php
        switch (_options_option("projects_index_tmp")) {
            case 'cdv':
                include "part_index_cdv.php";
                break;

            case 'list':
                include "table_index.php";
                break;

            default:
                include "table_index.php";
                break;
        }
        ?>


        <?php //include view("projects", "form_details", $arg = ["redi" => 1]);    ?>


    </div>


</div>

<?php include view("home", "footer"); ?>
