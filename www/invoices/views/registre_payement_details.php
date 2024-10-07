<?php include view("home", "header"); ?> 

<?php
include view("invoices", "nav_details");
?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        if ($invoices['date'] == null) {
            echo message('info', 'This invoice has no date');
        }
        ?>
        <?php
//        if ($u_rol == 'root') {
//            include "page_details_extended.php";
//        } else {
//            include "page_details.php";
//        }
//        

        include "page_details.php";
        ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <?php include "der.php"; ?> 
    </div>
</div>

<?php include view("home", "footer"); ?>




<?php include view("home", "header"); ?> 

<?php
//include view("invoices", "nav_details");
?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">


        <h3><?php _t("Invoice details"); ?></h3>

        <table class="table table-condensed" border>
            <tr>
                <td><b><?php echo _t("Invoice id"); ?></b></td>
                <td><b><?php echo _t("Client"); ?></b></td>
                <td><b><?php echo _t("Date"); ?></b></td>
                <td><b><?php echo _t("Total"); ?></b></td>
                <td><b><?php echo _t("Tva"); ?></b></td>
                <td><b><?php echo _t("Total tvac"); ?></b></td>
                <td><b><?php echo _t("Advance"); ?></b></td>
                <td><b><?php echo _t("Solde"); ?></b></td>
            </tr>

            <tr>
                <td>1</td>
                <td>Andres Peralta</td>
                <td>02-01-2024</td>
                <td><?php echo moneda(1000); ?></td>
                <td><?php echo moneda(210); ?></td>
                <td><?php echo moneda(1210); ?></td>
                <td><?php echo moneda(200); ?></td>
                <td><?php echo moneda(1010); ?></td>
            </tr>
        </table>

        <h3><?php _t("Payment history"); ?></h3>


        <table class="table table-condensed" border>
            <tr>
                <td><b><?php echo _t("Invoice id"); ?></b></td>
                <td><b><?php echo _t("Client"); ?></b></td>
                <td><b><?php echo _t("Date"); ?></b></td>
                <td><b><?php echo _t("Adelanto"); ?></b></td>

            </tr>

            <?php
            for ($i = 1; $i <= 10; $i++) {
                ?>

                <tr>
                    <td><?php echo $i; ?></td>
                    <td>Andres Peralta</td>
                    <td>02-01-2024</td>
                    <td class="text-right" ><?php echo moneda(100 + $i); ?></td>
                </tr>
            <?php }
            ?>

            <tr>
                <td  class="text-right"  colspan="3">Total advance</td>
                <td class="text-right"><b><?php echo moneda(2500); ?></b></td>
            </tr>

            <tr>
                <td  class="text-right"  colspan="3">Saldo a cobrar</td>
                <td class="text-right"><b><?php echo moneda(1200); ?></b></td>
            </tr>

            <tr>
                <td  class="text-right"  colspan="3"></td>
                <td class="text-right">
                    <form method="get" action="index.php">

                        <input type="hidden" name="c" value="invoices">
                        <input type="hidden" name="a" value="registre_payement_details">
                        <input type="hidden" name="id" value="90">

                        <button type="submit" class="btn btn-primary">

                            <?php _t("Search"); ?>

                            <?php echo icon("search"); ?> 


                        </button>
                    </form>
                </td>
            </tr>

        </table>















        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php
        //  include "page_registre_payement.php";
        ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

        <hr>


        <?php //include "der_registre_payement.php";  ?> 
    </div>
</div>

<?php include view("home", "footer"); ?>