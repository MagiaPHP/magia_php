<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("doc_models", "izq_index"); ?>
        <?php include view("config", "izq_doc_models"); ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
        <?php // include view("doc_models", "nav"); ?>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1>
            <?php _t("Import from JSON"); ?>
        </h1>

        <form method="post" action="index.php">
            <input type="hidden" name="c" value="doc_models">
            <input type="hidden" name="a" value="ok_import_from_json">


            <div class="form-group">
                <label for="json">Json file</label>
                <textarea class="form-control" name="json" id="json" rows="20"><?php echo $json; ?>
                    
                </textarea>
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox"> Check me out
                </label>
            </div>

            <button type="submit" class="btn btn-default">
                <?php _t("Import"); ?>
            </button>

        </form>



    </div>
</div>

<?php include view("home", "footer"); ?> 

