<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("hr_employee_money_advance", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">

        <?php include view("hr_employee_money_advance", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <?php
//        if ($fix_date['fix']) {
//            message('info', 'You have a fixed date activated');
//        }
        ?>

        <?php include view("hr_payroll_by_month", "tabs"); ?>

        <?php
//        if ($hr_employee_money_advance) {
//            include view("hr_employee_money_advance", "table_index_all");
//        } else {
//            message("info", "No items");
//        }

        include view("hr_employee_money_advance", "table_index_all");
        
        
        ?>

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



    </div>
</div>

<?php include view("home", "footer"); ?> 
