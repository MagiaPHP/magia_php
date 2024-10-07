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

        <?php
        include "part_hours_worked.php";
        ?>

    </div>


    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <?php include "der_all.php"; ?>
        <?php include "der_hours_worked.php"; ?>
    </div>


    <div class="col-xs-0 col-sm-0 col-md-0 col-lg-0">
        <?php // include "der_details2.php";    ?>
    </div>

</div>

<?php include view("home", "footer"); ?>
