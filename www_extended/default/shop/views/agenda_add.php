<?php include view("home", "header"); ?>

<?php farra_progreso(1, $config_orders_total_steps); ?>

<div class="row">
    <div class="col-md-2">
    </div>

    <div class="col-md-8">
    </div>

    <div class="col-md-2">

    </div>
</div>

<div class="row">

    <div class="col-md-2">
        <?php include "izq_agenda.php"; ?>
    </div>


    <div class="col-md-7">

        <?php
        //   vardump($_SESSION); 
//        
//       // vardump(shop_orders_waiting()); 
//        
//        $order_waiting_id = shop_orders_waiting(); 
//        
//        
//        if( $order_waiting_id  ){
//            message('info', 'You have unregistered orders, you must complete them before creating a new order');
//     
//            echo "<h3>"._tr("Orders")."</h3>"; 
//            echo '<a href="index.php?c=shop&a=order_choose_date&order_id='.$order_waiting_id.'">'._tr("Click here to finalize this order").' : '.$order_waiting_id.'</a>';  
//     
//        }else{ 
//            
//        }
        ?>




        <?php
        if (!shop_addresses_delivery_by_status(1)) {
            message('info', 'You do not have active delivery addresses');
            message('info', 'Activate or add a delivery address');
        } else {
            ?>


            <h2><?php _t('Add event'); ?></h2>
            <a name="order"></a>



            Add title, 




            <?php
# MagiaPHP 
# file date creation: 2023-04-15 
            ?>
            <form class="form-horizontal" action="index.php" method="post" >
                <input type="hidden" name="c" value="shop">
                <input type="hidden" name="a" value="ok_agenda_add">
                <input type="hidden" name="contact_id" value="<?php echo $u_id; ?>">
                <input type="hidden" name="redi" value="2">



                <?php # title ?>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="title"><?php _t("Title"); ?></label>
                    <div class="col-sm-8">
                        <input type="text" name="title" class="form-control" id="title" placeholder="title" value="" >
                    </div>	
                </div>
                <?php # /title ?>

                <?php # description ?>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
                    <div class="col-sm-8">
                        <textarea 
                            name="description" 
                            class="form-control" 
                            id="description" 
                            placeholder="" 
                            rows='10'
                            ></textarea>
                    </div>	
                </div>
                <?php # /description ?>

                <?php # category_id ?>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="category_id"><?php _t("Category_id"); ?></label>
                    <div class="col-sm-8">
                        <select name="category_id" class="form-control selectpicker" id="category_id" data-live-search="true" >
                            <?php agenda_categories_select("id", "category", "", array()); ?>                        
                        </select>
                    </div>	
                </div>
                <?php # /category_id ?>

                <?php # public_id ?>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="public_id"><?php _t("Public_id"); ?></label>
                    <div class="col-sm-8">
                        <select name="public_id" class="form-control selectpicker" id="public_id" data-live-search="true" >
                            <?php agenda_public_select("id", "public", "", array()); ?>                        
                        </select>
                    </div>	
                </div>
                <?php # /public_id ?>

                <?php
                /**
                 * 
                  <?php # allow_comments ?>
                  <div class="form-group">
                  <label class="control-label col-sm-3" for="allow_comments"><?php _t("Allow_comments"); ?></label>
                  <div class="col-sm-8">
                  <select name="allow_comments" class="form-control" id="allow_comments" >
                  <option value="0" <?php echo ($agenda["allow_comments"] == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
                  </select>
                  </div>
                  </div>
                  <?php # /allow_comments ?>
                 * 
                 *  <?php # date_registre ?>
                  <div class="form-group">
                  <label class="control-label col-sm-3" for="date_registre"><?php _t("Date_registre"); ?></label>
                  <div class="col-sm-8">
                  <input type="date" name="date_registre" class="form-control" id="date_registre" placeholder="date_registre" value="current_timestamp()" >
                  </div>
                  </div>
                  <?php # /date_registre ?>
                 * 
                 * 
                 * 
                 * 
                  <?php # order_by ?>
                  <div class="form-group">
                  <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
                  <div class="col-sm-8">
                  <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="1" >
                  </div>
                  </div>
                  <?php # /order_by ?>

                  <?php # status ?>
                  <div class="form-group">
                  <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
                  <div class="col-sm-8">
                  <select name="status" class="form-control" id="status" >
                  <option value="1" <?php echo ($agenda["status"] == 1 ) ? " selected " : ""; ?> ><?php echo _t("Actived"); ?></option>
                  <option value="0" <?php echo ($agenda["status"] == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
                  </select>
                  </div>
                  </div>
                  <?php # /status ?>
                 * 
                 * 
                 */
                ?>

                <div class="form-group">
                    <label class="control-label col-sm-3" for=""></label>
                    <div class="col-sm-8">    
                        <input class="btn btn-primary active" type ="submit" value ="<?php _t("Next"); ?>">
                    </div>      							
                </div>      							

            </form>


        <?php } ?>




        <a href="index.php?c=shop&a=agenda_choose_place">Select place</a>





    </div>

    <div class="col-md-3">







        <?php include "der_help.php"; ?>
        <?php //include "izq_orders.php"; ?>
    </div>
</div>

<?php include view("home", "footer"); ?>