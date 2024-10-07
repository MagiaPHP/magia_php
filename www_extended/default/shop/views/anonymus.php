<?php include view("home", "header"); ?>
<div class="row">
    <div class="col-md-3">
        <?php //    include "izq_orders.php"; ?>
    </div>
    <div class="col-md-6">  
        <?php
        if ($error) {
            foreach ($error as $key => $value) {
                message("info", $value);
            }
        }
        ?>
        <?php
        if ($mensajes) {
            foreach ($mensajes as $key => $value) {
                message("info", $value);
            }
        }
        ?>    


        <?php if (orders_list_behalf_of($anonumus_id)) { ?>

            <h1><?php _t("Orders"); ?></h1>

            <p>
                <?php _t("You have orders made from the central office of "); ?> <?php echo $config_company_name; ?>            
            </p>

            <p>
                <?php _t("these must be assigned to an employee of this office"); ?>
            </p>



            <form method="post" action="index.php">

                <input type="hidden" name="c" value="shop">
                <input type="hidden" name="a" value="ok_anonymus_2_employee">
                <input type="hidden" name="redi" value="1">



                <?php
                foreach (orders_list_behalf_of($anonumus_id) as $key => $order) {

                    // vardump($key);
                    // vardump($order);
                    ?>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="orders[]" value="<?php echo $order['id']; ?>"> <?php echo $order['id']; ?>
                        </label>
                    </div>

                <?php } ?>







                <div class="form-group">
                    <label for="employee_id">Asignar a </label>
                    <select class="form-control" name="employee_id" id="employee_id" >
                        <?php
                        foreach (employees_list_by_company($u_owner_id) as $employee) {

                            $selected = ( $employee['contact_id'] == $u_id ) ? " selected " : "";
                            ?>
                            <option value="<?php echo $employee['contact_id']; ?>" <?php echo $selected; ?>><?php echo contacts_formated($employee['contact_id']) ?></option>
                        <?php } ?>
                    </select>
                </div>




                <button type="submit" class="btn btn-default"><?php echo _t("Submit"); ?></button>
            </form>

        <?php } else { ?>


            <meta http-equiv="refresh" content="5555550; URL=index.php">

            <form method="get" action="index.php">

                <input type="hidden" name="c" value="shop">


                <button type="submit" class="btn btn-default"><?php echo _t("Continue"); ?></button>
            </form>

        <?php } ?>









    </div>
    <div class="col-md-3">
        <?php //include "der_orderDetails.php" ;    ?>
    </div>
</div>
<?php include view("home", "footer"); ?>