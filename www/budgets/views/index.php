<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include "izq.php"; ?>
    </div>

    <div class="col-lg-10">
        <?php include view("budgets", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php
        // si hay resultados mostramos 
        if ($budgets) {
            ?>


            <div class="shadow-container">

                <?php include "table_index.php"; ?>

            </div>    

            <br>
            <br>

            <?php /**
              <form class="form-inline" action="index.php" method="get" target="_print" onsubmit='disableButton()'>
              <input type="hidden" name="c" value="budgets">
              <input type="hidden" name="a" value="export_pdf_multi">
              <input type="hidden" name="uniqid" value="<?php echo magia_uniqid(); ?>">
              <input type="hidden" name="redi" value="1">

              <?php include "table_index.php"; ?>

              <div class="form-group">
              <label class="" for="all"><?php _t("Select all"); ?></label>
              <input type="checkbox" name="all" id="all" onclick="sellectAll(this);"  disabled=""/>
              </div>

              <div class="form-group">
              <label class="sr-only" for=""></label>
              <select class="form-control" name="add_to" disabled="">
              <option value="print"><?php _t("Print selected items"); ?></option>
              </select>
              </div>
              <div class="form-group">
              <label class="sr-only" for="all"></label>
              <input type="checkbox" name="resumen" value="1"  disabled="" />
              <?php _t("Resumen"); ?>
              </div>

              <button disabled="" type="submit" id="btn_send" class="btn btn-default"><?php _t("Ok"); ?></button>
              </form>
             * 
             */ ?>







            <div class="container-fluid">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <?php
                    $pagination->createHtml();
                    ?>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6 text-right">
                    <?php
                    include view($c, "form_pagination_items_limit");
                    ?>
                </div>
            </div>








            <?php
            // sino mensaje de no items
        } else {
            message('info', 'There are no results of your search');
        }
        ?>


    </div>
</div>

<?php include view("home", "footer"); ?> 




