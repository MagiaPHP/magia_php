<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("import", "izq"); ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
        <?php // include view("import", "nav"); ?>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h2><?php _t("Import contacts"); ?></h2>

        <p>
            <?php _t("You can import your contacts in various formats"); ?>: 
        </p>


        <ul>
            <li><?php _t("format"); ?> : .csv </li>
            <li><?php _t("format"); ?> : .csv </li>
        </ul>

        <?php include "form_contacts.php"; ?>

        <h2>
            <?php _t("You can paste the content of the .csv file here"); ?>
        </h2>

        <form method="post" action="index">

            <input type="hidden" name="c" value="projects">
            <input type="hidden" name="a" value="ok_add_short">
            <input type="hidden" name="redi[redi]" value="1">

            <div class="form-group">
                <label for="csv"><?php _t("csv file"); ?></label>
                <textarea class="form-control" rows="15" name="csv" id="csv" placeholder=""></textarea>
            </div>



            <button type="submit" class="btn btn-default">
                <?php echo icon("check"); ?> 
                <?php _t("Check"); ?>
            </button>
        </form>













        <?php
        if (isset($check) && $check == 1) {

            include "check_contacts.php";
        }
        ?>



    </div>
</div>

<?php include view("home", "footer"); ?> 

