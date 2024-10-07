<?php include view("home", "header"); ?> 

<?php // include "nav_details.php"; ?>

<div class="row">

    <div class="col-sm-2 col-md-2 col-lg-2">
        <?php include view("api", "izq"); ?>
    </div>


    <div class="col-sm- col-md-8 col-lg-8">
        <?php include view("api", "nav"); ?>

        <h1>
            <?php _t("Invoices"); ?>     
        </h1>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <table class="table table-condensed table-striped table-bordered">
            <thead>
                <tr>
                    <th>tipo</th>
                    <th>que es?</th>
                    <th><?php echo _t("More info"); ?></th>
                </tr>
            </thead>

            <tbody>
                <?php
                $valores = array(
                    array("field" => 'id', "description" => "identificador", null),
                    array("field" => 'client_id', "description" => "identificador del cliente", "more" => "http://localhost/jiho_23/index.php?c=contacts&a=doc"),
                );

                foreach ($valores as $value) {

                    $field = ($value['more']) ? '<a href="' . $value['more'] . '">' . $value['field'] . '</a>' : $value['field'];

                    echo '<tr>
                    <td>' . $field . '</td>
                    <td>' . $value['description'] . '</td>
                    <td>' . $value['more'] . '</td>
                    
                </tr>';
                }
                ?>
            </tbody>
        </table>



























        <?php include "page_docs.php"; ?>

    </div>

    <div class="col-sm-4 col-md-4 col-lg-4">
        <?php // include "der.php";  ?> 
    </div>
</div>

<?php include view("home", "footer"); ?>