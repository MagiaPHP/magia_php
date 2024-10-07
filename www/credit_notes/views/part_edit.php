<?php include view("home", "header"); ?> 


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 text-center">
        <form>
            <input type="hidden" name="c" value="credit_notes"> 
            <input type="hidden" name="a" value="details"> 
            <input type="hidden" name="id" value="<?php echo $cn->getId(); ?>"> 
            <div class="form-group">
            </div>
            <button type="submit" class="btn btn-danger">
                <span class="glyphicon glyphicon-floppy-disk"></span> 
                <?php _t("Save"); ?>
            </button>
        </form>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
</div>

<br><br>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <div class="well">


            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <h1>
                        <?php _t("Credit note"); ?>: <?php echo $cn->getId(); ?>
                    </h1>
                </div>
            </div>


            <?php
            if ($_REQUEST) {
                foreach ($error as $key => $value) {
                    message("info", "$value");
                }
            }
            ?>

            <?php # SAVE ################## ?>
            <?php # SAVE ################## ?>
            <?php # SAVE ################## ?>
            <?php # SAVE ################## ?>
            <?php # SAVE ################## ?>

            <div class="row">

                <div class="col-sm-12 col-md-3 col-lg-3">
                    <?php include "part_details_company.php"; ?>
                </div>

                <div class="col-sm-12 col-md-3 col-lg-3">
                    <?php include "part_details_dates.php"; ?>
                </div>

                <div class="col-sm-12 col-md-3 col-lg-3">
                    <?php include "part_details_billing_address.php"; ?>
                </div>

                <div class="col-sm-12 col-md-3 col-lg-3">
                    <?php
                    if (_options_option('config_address_use_delivery')) {
                        // include "part_details_delivery_address.php";
                    }
                    ?>
                </div>

            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <a name="items"><?php _t("items"); ?></a>
                </div>
                <div class="panel-body">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th><?php _t("#"); ?></th>
                                <th><?php _t("Quantity"); ?></th>
                                <th><?php _t("Description"); ?></th>
                                <th class="text-right"><?php _t("Value"); ?></th>
                                <th class="text-right"><?php _t("Sub total"); ?></th>
                                <th class="text-right"><?php _t("Htva"); ?></th>
                                <th class="text-right"><?php _t("Tva"); ?></th>
                                <th class="text-right"><?php _t("Tvac"); ?></th>
                                <th class=""><?php _t("Edit"); ?></th>
                                <th class=""><?php _t("Delete"); ?></th>
                            </tr>
                        </thead>

                        <tbody class="row_position">
                            <?php
                            $i = 1;
                            $subtotal = 0;
                            $totaltax = 0;
                            $totaltaxc = 0;

                            $i = 1;
                            foreach (credit_note_lines_list_by_credit_note_id($cn->getId()) as $key => $item) {

                                $subtotal = $subtotal + $item['subtotal'];
                                $totaltax = $totaltax + $item['totaltax'];
                                $totaltaxc = $totaltaxc + $item['totaltaxc'];

                                $class = ( stripos($item['description'], "---") == false ) ? "" : " success ";
                                ?>

                                <tr class="<?php echo $class; ?>" id="<?php echo "$item[id]"; ?>">    

                                    <?php if (!$class) { ?> 

                                        <td><?php echo "$i"; ?></td>                                    
                                        <td><?php echo "$item[quantity]"; ?></td>                                    
                                        <td><?php echo "$item[description]"; ?></td>

                                        <td class="text-right"><?php echo moneda($item['value']); ?> </td>
                                        <td class="text-right"><?php echo moneda($item['subtotal']); ?> </td>                                    
                                        <td class="text-right">(<?php echo moneda($item['tax']); ?> %) <?php echo moneda($item['totaltax']); ?></td>                                                                                                   
                                        <td class="text-right"><?php echo moneda($item["totaltaxc"]); ?> </td>                                
                                        <td class="text-right"><?php echo moneda($item["totaltaxc"]); ?> </td>                                

                                    <?php } else { ?> 

                                        <td><?php echo "$item[quantity]"; ?></td>        
                                        <td colspan="7"><?php echo strtoupper($item[description]); ?></td>

                                    <?php } ?>


                                    <td><?php include "modal_items_edit.php"; ?></td>

                                    <td class=""> 

                                        <a class="btn btn-danger btn-md" href="index.php?c=credit_notes&a=linesDeleteOk&id=<?php echo "$item[id]"; ?>">
                                            <span class="glyphicon glyphicon-trash"></span>             
                                            <?php // _t("Delete"); ?>
                                        </a>

                                    </td>
                                </tr>                            

                                <?php
                                $i++;
                            }
                            ?>



                            <tr>
                                <th><?php _t("#"); ?></th>
                                <th><?php _t("Quantity"); ?></th>
                                <th><?php _t("Description"); ?></th>
                                <th class="text-right"><?php _t("Value"); ?></th>
                                <th class="text-right"><?php _t("Sub total"); ?></th>
                                <th class="text-right"><?php _t("Htva"); ?></th>
                                <th class="text-right"><?php _t("Tva"); ?></th>
                                <th class="text-right"><?php _t("Tvac"); ?></th>
                                <th class=""><?php _t("Edit"); ?></th>
                                <th class=""><?php _t("Delete"); ?></th>
                            </tr>






                            <tr>
                                <td colspan="4" class="text-right"><?php _t("Totals"); ?></td>                                                                                
                                <td class="text-right"><?php echo moneda($subtotal); ?></td>
                                <td class="text-right"><?php // echo moneda($subtotal) ;                               ?></td>                            
                                <td class="text-right"><?php echo moneda($totaltax); ?></td>
                                <td class="text-right"><?php echo moneda($totaltaxc); ?></td>
                                <td></td>                            
                                <td></td>


                            </tr>










                            <?php
                            /*
                              <?php # Tax items total ############################################   ?>
                              <?php foreach ( tax_list() as $key => $tax ) { ?>
                              <tr>
                              <td colspan=""></td>
                              <td colspan=""></td>
                              <td colspan=""></td>
                              <td colspan=""></td>
                              <td colspan=""></td>
                              <td colspan="2" class="text-right">
                              <?php
                              _t("Total tax") ;
                              echo " $tax[value] %" ;
                              ?>
                              </td>
                              <td colspan="2" class="text-right"><?php echo moneda(credit_note_lines_total_by_tax($id , $tax['value'])) ; ?></td>
                              <td></td>
                              <td></td>
                              </tr>
                              <?php } ?> */
                            ?>             





                            <?php # Tax items total ############################################       ?>

                            <?php
                            /* <tr>
                              <td colspan="6"></td>
                              <td class="text-right"><?php _t("Advance"); ?></td>
                              <td class="text-right"><?php echo monedaf(credit_notes_field_id("advance", $id)); ?></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              </tr> */
                            ?>


                            <tr>

                                <td colspan="6" class="text-right"><?php _t("To refund"); ?></td>                        
                                <td colspan="2"class="text-right"  ><?php echo moneda($subtotal + $totaltax - credit_notes_field_id("returned", $id)); ?></td>

                                <td></td>
                                <td></td>
                            </tr>

                            <tr>
                                <td colspan="11">
                                    <?php // include "form_items_add.php"; ?>
                                </td>
                            </tr>   


                        </tbody>
                    </table>



                </div>
            </div>








            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <?php include "form_items_add.php"; ?>
                        </div>
                    </div>


                </div>
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
            </div>












            <?php
            include view("credit_notes", "part_comments");
            ?>







        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>



</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 text-center">
        <form>
            <input type="hidden" name="c" value="credit_notes"> 
            <input type="hidden" name="a" value="details"> 
            <input type="hidden" name="id" value="<?php echo $cn->getId(); ?>"> 
            <div class="form-group">
            </div>
            <button type="submit" class="btn btn-danger">
                <span class="glyphicon glyphicon-floppy-disk"></span> 
                <?php _t("Save"); ?>
            </button>
        </form>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
</div>
<?php
/*


  <form action="index.php" method="get" class="form-horizontal">
  <input type="hidden" name="c" value="credit_notes">
  <input type="hidden" name="a" value="details">
  <input type="hidden" name="id" value="<?php echo "$id"; ?>">

  <div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
  <button type="submit" class="btn btn-default"><?php _t("End"); ?></button>
  </div>
  </div>
  </form>

 */
?>



<?php // include("www/home/views/footer.php");      ?>  

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>



<?php include view("home", "footer"); ?>

