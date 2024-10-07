<div class="panel panel-default">
    <div class="panel-heading">

        <?php
        if (modules_field_module('status', "docu")) {
            echo docu_modal_bloc($c, $a, 'reminders', array('c' => $c, 'a' => $a, 'id' => $id));
        }
        ?>
        <span class="glyphicon glyphicon-thumbs-down"></span>
        <?php _t("Reminders"); ?>
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <tr>
                <td>

                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'r1', array('c' => $c, 'a' => $a, 'id' => $id));
                    }
                    ?>


                    <span class="glyphicon glyphicon-thumbs-down"></span>
                    <?php _t("1st reminder"); ?>
                </td>
                <td>
                    <?php
                    print_dropdown("index.php?c=invoices&a=export_pdf_r1&way=web&id=$id", invoices_field_id('client_id', $id), false);
                    ?>
                </td>
                <td>
                    <?php
                    // invoices_modal_reminder_send('10' , $id) ;
                    $r = 1;
                    if (invoices_field_id("r1", $id) == "") {
                        include "modal_r1_send.php";
                    } else {
                        // echo '<a href="index.php?c=invoices&a=pdf"><span class="glyphicon glyphicon-print"></span></a> ' ;
                        //echo '<span class="glyphicon glyphicon-thumbs-down"></span> '; 
                        echo invoices_field_id("r1", $id);
                    }
                    ?>
                </td>                                
            </tr>
            <tr>
                <td>


                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'r2', array('c' => $c, 'a' => $a, 'id' => $id));
                    }
                    ?>


                    <span class="glyphicon glyphicon-thumbs-down"></span>
                    <span class="glyphicon glyphicon-thumbs-down"></span>
                    <?php _t("2nd reminder"); ?>
                </td>
                <td>
                    <?php
                    print_dropdown("index.php?c=invoices&a=export_pdf_r2&way=web&id=$id", invoices_field_id('client_id', $id), false);
                    ?>
                </td>
                <td>
                    <?php
                    // invoices_modal_reminder_send('10' , $id) ;
                    $r = 2;
                    if (invoices_field_id("r2", $id) == "" && invoices_field_id("r1", $id)) {
                        include "modal_r2_send.php";
                    } else {
                        // echo '<a href="index.php?c=invoices&a=pdf"><span class="glyphicon glyphicon-print"></span></a> ' ;
                        //echo '<span class="glyphicon glyphicon-thumbs-down"></span> ';
                        echo invoices_field_id("r2", $id);
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>


                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'r3', array('c' => $c, 'a' => $a, 'id' => $id));
                    }
                    ?>


                    <span class="glyphicon glyphicon-thumbs-down"></span>
                    <span class="glyphicon glyphicon-thumbs-down"></span>
                    <span class="glyphicon glyphicon-thumbs-down"></span>
                    <?php _t("Formal notice"); ?>
                </td>
                <td>
                    <?php
                    print_dropdown("index.php?c=invoices&a=export_pdf_r3&way=web&id=$id", invoices_field_id('client_id', $id), false);
                    ?>
                </td>
                <td>
                    <?php
                    // invoices_modal_reminder_send('10' , $id) ;
                    $r = 3;
                    if (invoices_field_id("r3", $id) == "" && invoices_field_id("r2", $id)) {
                        include "modal_r3_send.php";
                    } else {
                        // echo '<a href="index.php?c=invoices&a=pdf"><span class="glyphicon glyphicon-print"></span></a> ' ;
                        //echo '<span class="glyphicon glyphicon-thumbs-down"></span> ';
                        echo invoices_field_id("r3", $id);
                    }
                    ?>
                </td>
            </tr>
        </table>
    </div>
</div>