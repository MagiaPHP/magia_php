<?php
# MagiaPHP 
# file date creation: 2024-03-30 
?>
<?php include view("home", "header"); ?> 

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("projects", "izq_details"); ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
        <h1>
            <?php _menu_icon("top", 'projects'); ?>
            <?php _t("Expenses"); ?>
        </h1>

        <hr>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <table class="table table-bordered">
            <tr>
                <td></td>
                <td class="text-right">-</td>
                <td class="text-right">+</td>
            </tr>

            <?php
            foreach ($expenses as $key => $value) {
                echo '<tr>
                <td></td>
                <td class="text-right">-</td>
                <td class="text-right">+</td>
            </tr>';
            }
            ?>


        </table>





    </div>


    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">

        <?php include view("projects", "der_details"); ?>
    </div>
</div>

<?php include view("home", "footer"); ?>
