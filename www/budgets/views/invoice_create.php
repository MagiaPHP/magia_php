<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("budgets", "izq"); ?>
    </div>

    <div class="col-lg-9">
        <?php include view("budgets", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



        <?php
// https://api.jquery.com/prop/
        ?>


        <?php //include "form_make_actions.php"; ?>



        <?php
        // con esto seleciona todo 
        ?>









        <div class="row">
            <div class="col-lg-6">
                <h2><?php _t("Create an invoice"); ?></h2>

            </div>
            <div class="col-lg-6">
                <?php include "part_details_billing_address.php"; ?>
            </div>
        </div>




        <div>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#one" aria-controls="one" role="tab" data-toggle="tab">
                        <?php _t("One Line"); ?>
                    </a>
                </li>
                <li role="presentation">
                    <a href="#full" aria-controls="full" role="tab" data-toggle="tab">
                        <?php _t("All Lines"); ?>
                    </a>
                </li>                                
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="one">

                    <?php include "form_1_line_invoice_create.php"; ?>


                </div>
                <div role="tabpanel" class="tab-pane" id="full">

                    <?php include "form_full_lines_invoice_create.php"; ?>

                </div>                                
            </div>

        </div>



















        <?php
        /*
          Export:
          <a href="index.php?c=addresses&a=export_json">JSON</a>
          <a href="index.php?c=addresses&a=export_pdf">pdf</a>
         */
        ?>


    </div>
</div>

<?php include view("home", "footer"); ?> 




