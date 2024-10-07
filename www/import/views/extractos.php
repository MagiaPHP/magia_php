<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-0 col-sm-0 col-md-0 col-lg-0">
        <?php // include view("import", "izq"); ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <?php include view("import", "nav"); ?>

        <h1>EXTRACTOS</h1>
        <p>
            <b><?php _t("Bank"); ?></b>: Fortis 
            <b><?php _t("Account number"); ?>:</b>10203040506070809 
            <b><?php _t("From"); ?></b>: 34 <b><?php _t("To"); ?>: </b> 54</p>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



        <table class="table table-condensed table-bordered">       
            <thead>
                <tr>
                    <th>1</th>
                    <th>1</th>
                    <th>1</th>
                    <th>1</th>
                    <th>1</th>
                    <th>1</th>
                    <th>1</th>
                    <th>1</th>
                    <th>1</th>
                    <th>1</th>
                    <th>1</th>
                    <th>1</th>
                    <th>1</th>
                    <th>1</th>

                </tr>
            </thead>


            <?php
            foreach ($lines as $key => $value) {

//                $n_compte = $value[1];
                $operation = ($value[0]) ?? null;
                $date_operation = ($value[1]) ?? null;
                $description = ($value[2]) ?? null;
                $total = ($value[3]) ?? null;
                $currency = ($value[4]) ?? null;
                $date_val = ($value[5]) ?? null;
                $account = ($value[6]) ?? null;
                $sender = ($value[7]) ?? null;
                $comunication = ($value[8]) ?? null;
                $ref = ($value[9]) ?? null;
                $ref2 = ($value[10]) ?? null;
                $ref3 = ($value[11]) ?? null;
                $order_by = ($value[12]) ?? 1;
                $status = ($value[13]) ?? 1;

                echo "<tr>";
//                echo "<td>$n_compte</td>";
                echo "<td>$operation</td>";
                echo "<td>$date_operation</td>";
                echo "<td>$description </td>";
                echo "<td>$total</td>";
                echo "<td>$currency</td>";
                echo "<td>$date_val</td>";
                echo "<td>$account</td>";
                echo "<td>$sender</td>";
                echo "<td>$comunication</td>";
                echo "<td>$ref</td>";
                echo "<td>$ref2</td>";
                echo "<td>$ref3</td>";
                echo "<td>$order_by</td>";
                echo "<td>$status</td>";
                echo "<tr/>";

//                extractos_add(
//                        $my_account,
//                        $operation,
//                        $date_operation,
//                        $description,
//                        $total,
//                        $currency,
//                        $date_val,
//                        $account,
//                        $sender,
//                        $comunication,
//                        $ref,
//                        $ref2,
//                        $ref3,
//                        $order_by,
//                        $status);
            }
//            
            ?>


        </table>







        <a href="BE37000442448928EURd2023-08-30.csv">BE37000442448928EURd2023-08-30.csv</a>












    </div>
</div>

<?php include view("home", "footer"); ?> 

