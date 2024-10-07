<?php include view("home", "header"); ?> 

<div class="row">

    <div class="col-sm-2 col-md-2 col-lg-2">
        <?php include "izq_details_company.php"; ?>
    </div>

    <div class="col-sm-10 col-md-10 col-lg-10">

        <?php include "nav_projects.php"; ?>   

        <?php include "top_details_company.php"; ?>

        <?php
        //vardump($projects); 
        ?>


        <?php include "projects_table_index.php"; ?>


        <?php if ($projects && 1 == 2222222222222222222222222222222) { ?>

            <form class="form-inline" action="index.php" method="get" target="_print" onsubmit='disableButton()'>
                <input type="hidden" name="c" value="projects">
                <input type="hidden" name="a" value="export_pdf_multi">
                <input type="hidden" name="uniqid" value="<?php echo magia_uniqid(); ?>">
                <input type="hidden" name="redi" value="1">

                <?php // include view("projects", "table_index"); ?>

                <div class="form-group">
                    <label class="" for="all"><?php _t("Select all"); ?></label>
                    <input type="checkbox" name="all" id="all" onclick="sellectAll(this);" />                 
                </div>

                <div class="form-group">
                    <label class="sr-only" for=""></label>
                    <select class="form-control" name="add_to">
                        <option value="print"><?php _t("Print selected items"); ?></option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="all"></label>
                    <input type="checkbox" name="resumen" value="1"  />                 
                    <?php _t("Resumen"); ?>
                </div>

                <button type="submit" id="btn_send" class="btn btn-default"><?php _t("Ok"); ?></button>                    
            </form>

            <?php
        }
        ?>

    </div>
</div>
<?php include view("home", "footer"); ?>  








