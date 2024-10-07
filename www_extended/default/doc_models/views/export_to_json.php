<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("doc_models", "izq_index"); ?>
        <?php include view("config", "izq_doc_models"); ?>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <?php // include view("doc_models", "nav"); ?>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1>
            <?php _t("Export to JSON"); ?>
        </h1>


        <form method="get" action="index.php">
            <input type="hidden" name="c" value="doc_models">
            <input type="hidden" name="a" value="export_to_json">

            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>#</th>
                        <th><?php _t("Modele"); ?></th>
                        <th><?php _t("Description"); ?></th>
                        <th><?php _t("Author"); ?></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach (doc_models_list() as $key => $doc_models_list) {
                        echo' 
                    <tr>
                        <td>
                        <div class="radio">
                            <label>
                              <input type="radio" name="doc_model" id="doc_model" value="' . $doc_models_list["name"] . '">
                              ' . $doc_models_list["name"] . '
                            </label>
                          </div>
                          </td>
                        <td>' . $doc_models_list["description"] . '</td>
                        <td>' . $doc_models_list["author"] . '</td>
                    </tr>'
                        ;
                    }
                    ?>
                </tbody>
            </table>

            <button type="submit" class="btn btn-default">
                <?php _t("Export"); ?>
            </button>
        </form>



    </div>

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <?php include view("doc_models", "der_export_to_json"); ?>
    </div>



</div>

<?php include view("home", "footer"); ?> 

