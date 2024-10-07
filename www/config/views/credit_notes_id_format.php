<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-lg-2">
        <?php include view("config", "izq_credit_notes"); ?>
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
            <?php _t("Credit notes id format"); ?>
        </h1>





        <?php
        $arg['redi'] = '5';
        $arg['c'] = 'config';
        $arg['a'] = 'credit_notes_id_format';
        $arg['params'] = "";

        include view('config', 'form_credit_notes_id_format');
        ?>



        <br>
        <br>
        <p>
            <code>
                {office_id}/NDC/{year}/{office_id_counter}
            </code>
        </p>

        <br>

        <?php
        $placeholders = [
            "{id}" => "Unique identifier for this document within the system.",
            "{year}" => "The year extracted from the document's date.",
            "{month}" => "The month extracted from the document's date.",
            "{day}" => "The day extracted from the document's date.",
            "{trimestre}" => "Fiscal quarter based on the document's date (1 for Jan-Mar, 2 for Apr-Jun, etc.).",
            "{office_id}" => "The ID of the office associated with this document.",
            "{office_id_counter}" => "Sequential counter specific to the office, reset for each new document.",
            "{office_id_counter_year}" => "Annual counter for the office, resets at the start of each year.",
            "{office_id_counter_year_month}" => "Monthly counter for the office, specific to a year and month, resets at the start of each month.",
            "{office_id_counter_year_trimestre}" => "Quarterly counter for the office, specific to a year and fiscal quarter, resets at the start of each quarter.",
            "{client_id}" => "ID of the client associated with this transaction.",
            "{invoice_id}" => "Unique ID for the invoice related to this document.",
            "{seller_id}" => "ID of the seller associated with the document."
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

