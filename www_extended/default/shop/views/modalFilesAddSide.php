<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#filesAdd_<?php echo $side; ?>">
    <?php echo _t("Add file"); ?> 
    <?php //echo _t($side); ?>
</button>


<div class="modal fade" id="filesAdd_<?php echo $side; ?>" tabindex="-1" role="dialog" aria-labelledby="filesAdd_<?php echo $side; ?>Label">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="filesAdd_<?php echo $side; ?>Label">
                    <?php echo _t("Add file"); ?> <?php echo $side; ?>
                </h4>
            </div>
            <div class="modal-body"> 




                <?php
                /*                Lista de empreintes lato L de este paciente
                 * 
                 *                 <h2><?php echo _t("Earprint"); ?></h2>
                  <p>
                  <?php _t("You can use the files sent above"); ?>
                  </p>
                 * 
                 * 

                  <table class="table table-striped" border>
                  <thead>
                  <tr>
                  <th>1</th>
                  <th><?php echo _t("Date registre"); ?></th>
                  <th><?php echo _t("Side"); ?></th>
                  <th><?php echo _t("File name"); ?></th>
                  <th>3</th>
                  </tr>
                  </thead>
                  <tbody>


                  <?php
                  $i=1;
                  foreach (array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20) as $key => $value) { ?>
                  <tr>
                  <td><?php echo $i; ?></td>

                  <td>2022-02-12</td>
                  <td>L</td>
                  <td>203010-5<?php echo $i; ?>-L.STL</td>
                  <td>

                  <form class="form-inline" method="post" action="index.php">
                  <input type="hidden" name="c" value="xxx">
                  <input type="hidden" name="a" value="y">
                  <input type="hidden" name="order_id" value="111111">
                  <input type="hidden" name="side" value="x">


                  <button type="submit" class="btn btn-default">
                  <?php _t("Use this earprint"); ?>
                  </button>
                  </form>



                  </td>
                  </tr>
                  <?php $i++; } ?>

                  </tbody>



                  </table>
                 */
                ?>


                <h2><?php echo _t("Download a new file"); ?></h2>

                <?php
//                vardump(intval(orders_field_id("status", $id)));
//                if (!intval(orders_field_id("status", $id)) > 20) {
                if (1 == 1) {
                    ?>


                    <p>
                        <?php _t("Please make sure that the files you want to send have the following characteristics"); ?> :
                    </p>

                    <ul>
                        <li><?php _t("Accepted file types"); ?>: STL</li>
                        <ul>
                            <?php
                            $f = new fileUpdate("f");
                            $extentions = $f->get_ExtentionAceptedOnly();

                            foreach ($extentions as $key => $value) {
                                $ex = explode("/", $value);
                                //echo "<li>$value -*** $ex[1]</li>";
                                // echo "<li>.$ex[1]</li>";
                            }
                            ?>
                            <?php
//        $nf = new update_File_Class();
//        $extentions = $nf->get_exts();
//        foreach ($extentions as $key => $extention) {
//            $ex = explode("/", $extention);
//            if($ex[1] == "plain"){ $ex[1] = "txt"; }
//            echo "<span class=\"label label-info\">.$ex[1]</span> ";
//        }
                            ?>
                        </ul>
                        <li><?php _t("Max weight of accepted files"); ?>: <b><?php echo $f->get_max_size(); ?> MB</b></li>
                    </ul>
                    <p>
                        <?php _t("If you have any errors, please send the file via email"); ?>
                    </p>
                    <?php include "formFilesAddSide.php"; ?>

                    <?php
                    /*
                      <hr>
                      <h1><?php _t("Update"); ?></h1>
                      <p>
                      <?php _t("Update in progress, please send your molds via email"); ?>
                      </p>
                      <p>
                      <a href="mailto:web@skynet.be?subject=Order <?php echo $id; ?> - <?php echo $order['bac']; ?>&body=Hi Gabriela,
                      I send you the molds for my order number <?php echo $id; ?>
                      Thanks a lot.
                      <?php echo contacts_field_id('name', $u_id) ?>">web@skynet.be</a>
                      </p>
                      <?php
                      _t("Thank you");
                      ?>

                     */
                    ?>

                    <?php
                } else {
                    message("info", "Attention to the order has entered the manufacturing process");
                }
                ?>


            </div>
        </div>
    </div>
</div>

