
<div class="modal fade" 
     id="addElement_<?php echo $elements_list['element']; ?>" 
     tabindex="-1" 
     role="dialog" 
     aria-labelledby="addElementLabel_<?php echo $elements_list['element']; ?>"
     >

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button 
                    type="button" 
                    class="close" 
                    data-dismiss="modal" 
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title" id="addElementLabel_<?php echo $elements_list['element']; ?>">
                    <?php _t("Add element"); ?> <?php echo $elements_list['element']; ?>
                </h4>
            </div>
            <div class="modal-body">



                <form class="form-horizontal" action="index.php" method="post" >
                    <input type="hidden" name="c" value="doc_models_lines">
                    <input type="hidden" name="a" value="ok_add">
                    <input type="hidden" name="modele" value="<?php echo $modele; ?>">
                    <input type="hidden" name="doc" value="<?php echo $doc; ?>">

                    <input type="hidden" name="redi" value="3">


                    <?php
                    /**
                     * 
                      <?php # modele ?>
                      <div class="form-group">
                      <label class="control-label col-sm-3" for="modele"><?php _t("Modele"); ?></label>
                      <div class="col-sm-8">
                      <select name="modele" class="form-control selectpicker" id="modele" data-live-search="true" >
                      <?php doc_models_select("name", "name", "$modele", array()); ?>
                      </select>
                      </div>
                      </div>
                      <?php # /modele ?>


                      <?php # doc ?>
                      <div class="form-group">
                      <label class="control-label col-sm-3" for="doc"><?php _t("doc"); ?></label>
                      <div class="col-sm-8">
                      <select class="form-control" name="doc">
                      <option value=""><?php _t('Select one'); ?></option>
                      <?php
                      foreach (doc_docs_list() as $doc_list) {
                      $selected = ($doc_list['doc'] == $doc) ? " selected " : "";
                      echo '<option value="' . $doc_list['doc'] . '" ' . $selected . '>' . _tr($doc_list['doc']) . '</option>';
                      }
                      ?>
                      </select>
                      </div>
                      </div>
                      <?php # /doc ?>
                     */
                    ?>



                    <?php # section ?>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="section"><?php _t("Section"); ?></label>
                        <div class="col-sm-8">

                            <?php
                            /**
                             * <select name="section" class="form-control selectpicker" id="section" data-live-search="true" >
                             */
                            ?>
                            <select name="section" class="form-control" id="section"  >

                                <?php
                                foreach (doc_sections_list() as $key => $doc_sections_list_items) {
                                    echo '<option value="' . $doc_sections_list_items['section'] . '">' . $doc_sections_list_items['section'] . '</option>';
                                }
                                ?>
                                <?php // doc_sections_select("section", "section", "body", array()); ?>                        
                            </select>
                        </div>	
                    </div>
                    <?php # /section ?>

                    <?php # element ?>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="element"><?php _t("Element"); ?></label>
                        <div class="col-sm-8">
                            <input class="form-control" value="<?php echo $elements_list['element']; ?>" disabled="">
                            <input type="hidden" name="element" value="<?php echo $elements_list['element']; ?>">
                        </div>	
                    </div>
                    <?php # /element ?>



                    <?php # name ?>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="name"><?php _t("Cell name"); ?></label>
                        <div class="col-sm-8">
                            <input type="text" name="name" class="form-control" id="name" placeholder="name" value="" required>
                        </div>	
                    </div>
                    <?php # /name ?>

                    <?php # name ?>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="name"><?php _t("Label"); ?></label>
                        <div class="col-sm-8">
                            <input type="text" name="label" class="form-control" id="label" placeholder="%label%" value="" required>
                        </div>	
                    </div>
                    <?php # /name ?>



                    <?php # order_by ?>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
                        <div class="col-sm-8">
                            <input 
                                type="number" 
                                name="order_by" 
                                class="form-control" 
                                id="order_by" 
                                placeholder="order_by" value="<?php echo doc_models_lines_val_max_from('order_by') + 1 ?>" >
                        </div>	
                    </div>
                    <?php # /order_by ?>




                    <div class="form-group">
                        <label class="control-label col-sm-2" for=""></label>
                        <div class="col-sm-8">    
                            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Add"); ?>">
                        </div>      							
                    </div>      							

                </form>


            </div>
        </div>
    </div>
</div>