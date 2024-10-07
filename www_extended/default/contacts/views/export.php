<?php include view("home", "header"); ?>  


<?php include "nav_export.php"; ?>


<div class="row">
    <div class="col-lg-3">
        <?php include "izq_export.php"; ?>
    </div>

    <div class="col-lg-9">




        <h1>
            <?php _t("Export"); ?>

        </h1>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>










        <form class="form-horizontal">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
            </div>


            <?php
            $tables = array("contacts", "invoices", "budgets", "credit_notes", "balance");

            foreach ($tables as $table) {
                ?>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> <?php echo strtoupper($table); ?>
                            </label>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>


            <div class="form-group">
                <label for="format" class="col-sm-2 control-label"><?php _t("Format"); ?></label>
                <div class="col-sm-10">
                    <select class="form-control" name="format">
                        <?php
                        $formats = array("csv", "sql", "json", "txt");
                        foreach ($formats as $format) {
                            echo '<option value="' . $format . '">' . strtoupper($format) . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>






            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" id="btn_send" class="btn btn-default"><?php _t("Export"); ?></button>
                </div>
            </div>
        </form>



































    </div>
</div>

<?php include view("home", "footer"); ?>  

