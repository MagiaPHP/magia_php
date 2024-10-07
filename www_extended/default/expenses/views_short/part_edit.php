


<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <?php
//        include "part_edit_top.php"; 
        ?>




        <a name="items"></a>
        <?php
        $transport_tvac = 0;

        echo '<table class="table table-striped" border>';
        include "tabla_items_edit.php";
        include "part_tva.php";
        echo "</table>";

//        switch ($invoices['type']) {
//            case "I": // individual     
//                include "items_individual.php";
////                include view("invoices", "part_items_add_individual");
//                break;
//
//            case "M": // Mensual
//                echo '<table class="table table-striped"  >';
//                //    include "tabla_items_monthly_edit.php";
//                //    include "table_transport_montly.php";
//                echo "</table>";
//
//                include "table_form_items_monthly.php";
//                 include "part_tva.php";
//                break;
//
//            default:
//                include "items_individual.php";
////                include view("invoices", "part_items_add_individual");
////                include "part_items_add.php";
//                break;
//        }
        ?>



        <a name="ce"></a>        
        <?php include "part_ce.php"; ?>

        <a name="comments"></a>
        <?php include "part_comments.php"; ?>


    </div>
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
</div>


