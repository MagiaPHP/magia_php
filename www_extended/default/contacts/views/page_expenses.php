<?php include view("home", "header"); ?>  

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">        
        <?php include view("contacts", 'izq_details'); ?>
    </div>


    <div class="col-sm-10 col-md-10 col-lg-10">

        <?php include "nav_expenses.php"; ?>   
        <?php include "top_details_company.php"; ?>

        <?php if ($expenses) { ?>

            <form class="form-inline" action="index.php" method="get" target="_print" onsubmit='disableButton()'>
                <input type="hidden" name="c" value="expenses">
                <input type="hidden" name="a" value="export_pdf_multi">
                <input type="hidden" name="uniqid" value="<?php echo magia_uniqid(); ?>">
                <input type="hidden" name="redi" value="1">

                <?php include view("contacts", "table_index_expenses"); ?>

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
        } else {
            message('info', 'No items');
        }
        ?>

    </div>
</div>
<?php include view("home", "footer"); ?>  








