<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-lg-2">
        <?php include view("config", "izq_invoices"); ?>
    </div>

    <div class="col-lg-8">
        <?php include view("config", "nav"); ?>


        <?php
        if ($m) {
            foreach ($m as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1>
            <span class="glyphicon glyphicon-hourglass"></span>
            <?php _t("Invoices id format"); ?>
        </h1>





        <?php
        $arg['redi'] = '5';
        $arg['c'] = 'config';
        $arg['a'] = 'invoices_id_format';
        $arg['params'] = "";

        include view('config', 'form_invoices_id_format');
        ?>



        <br>
        <br>
        <p>
            <code>
                {office_id}/INV/{year}/{trimestre}/{counter}
            </code>
        </p>

        <br>

        <?php
        // Placeholders with explanations
        $placeholders = [
            '{year}' => 'Year when the invoice was issued, obtained from the invoice date.',
            '{month}' => 'Month when the invoice was issued, obtained from the invoice date.',
            '{day}' => 'Day when the invoice was issued, obtained from the invoice date.',
            '{trimestre}' => 'Fiscal quarter calculated based on the invoice month (e.g., 1 for January-March, 2 for April-June, etc.).',
            '{office_id}' => 'ID of the office from which the invoice was issued, usually tied to the company location.',
            '{seller_id}' => 'ID of the seller who is associated with the invoice.',
            '{counter}' => 'Sequential number for the invoice, maintained per office to ensure uniqueness.',
            '{type}' => 'Invoice type: individual, monthly, or unknown, used to categorize the invoice.',
            '{id}' => 'Unique document number within the system, used as the invoice identifier.'
        ];
        ?>


        <ul>
            <?php
            foreach ($placeholders as $key => $description) {
                echo '<li><b>' . $key . '</b> : ' . _tr($description) . '</li>';
            }
            ?>
        </ul>





    </div>
</div>

<?php include view("home", "footer"); ?> 

