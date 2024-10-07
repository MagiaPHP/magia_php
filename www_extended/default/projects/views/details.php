<?php
# MagiaPHP 
# file date creation: 2024-03-30 
?>
<?php include view("home", "header"); ?> 

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include 'izq_details.php'; ?>
    </div>

    <div class="col-xs-0 col-sm-0 col-md-0 col-lg-0">
        <?php //include 'izq_details2.php'; ?>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



        <h3>
            <?php echo $projects->getName(); ?> 
            <small><?php echo $projects->getAddress(); ?> </small>
        </h3>

        <?php
        include "nav_tabs_details.php";
        ?>






        <?php if (permissions_has_permission($u_rol, 'config', 'update')) { ?>
            <p>
                <b><?php _t("Situation"); ?></b> : 
                <a href="index.php?c=config&a=ok_projects_part_details_in_out&data=c&redi[redi]=1&redi[id]=<?php echo $projects->getId(); ?>"><?php echo icon("calendar"); ?></a>
                <a href="index.php?c=config&a=ok_projects_part_details_in_out&data=t&redi[redi]=1&redi[id]=<?php echo $projects->getId(); ?>"><?php echo icon("sort"); ?></a>            
                <a href="index.php?c=config&a=ok_projects_part_details_in_out&data=d&redi[redi]=1&redi[id]=<?php echo $projects->getId(); ?>"><?php echo icon("minus"); ?></a>            
            </p>
        <?php } else { ?>
            <b><?php _t("Situation"); ?></b> : 
        <?php } ?>

        <?php
        switch (_options_option('projects_part_details_in_out')) {
            case 't':
                include "part_details_in_out_t.php";
                break;
            case 'c':
                include "part_details_in_out_c.php";
                break;
            default:
                include "part_details_in_out.php";
                break;
        }
        ?>



        <?php //include view("projects", "form_details", $arg = ["redi" => 1]);       ?>




        <?php
// include 'part_details_budgets.php';
        ?>


    </div>


    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <?php include "der_all.php"; ?>
        <?php include "der_details.php"; ?>
    </div>


    <div class="col-xs-0 col-sm-0 col-md-0 col-lg-0">
        <?php // include "der_details2.php";   ?>
    </div>

</div>

<?php include view("home", "footer"); ?>
