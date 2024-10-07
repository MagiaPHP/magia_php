<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Text"); ?>
    </div>
    <div class="panel-body">
        <p>

            <?php
//            _t("If the content of the cell is wider than the sheet, it does not return to the line automatically");
//            _t("Prints a character string."); 
//            _t("The origin is on the left of the first character, on the baseline."); 
//            _t("This method allows to place a string precisely on the page, but it is usually easier to use Cell, MultiCell or Write which are the standard methods to print text.");
//            
            ?>
        </p>




        <div class="form-group">
            <label for="name"><?php _t("Text name"); ?></label>
            <input 
                type="text" 
                class="form-control" 
                name="name" 
                id="name" 
                placeholder="<?php echo $element['name']; ?>" 
                value="<?php echo $element['name']; ?>"
                >
        </div>


        <div class="form-group">
            <label for="label"><?php _t("Text in PDF"); ?></label>


            <a href="" data-toggle="modal" data-target="#myModalHelpText">
                <span class="glyphicon glyphicon-question-sign"></span>
            </a>

            <!-- Modal -->
            <div class="modal fade" id="myModalHelpText" tabindex="-1" role="dialog" aria-labelledby="myModalHelpTextLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalHelpTextLabel">
                                <?php _t("Pdf tags"); ?>
                            </h4>
                        </div>
                        <div class="modal-body">
                            <?php include view("doc_models", "help_cell"); ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <input 
                type="text" 
                class="form-control" 
                name="Text[label]" 
                id="label" 
                placeholder="" 
                value="<?php echo $params['Text']['label']; ?>">
        </div>




        <div class="checkbox">
            <label>
                <input 
                    type="checkbox"
                    name="Text[translate]"
                    <?php echo ( ($params['Text']['translate']) && $params['Text']['translate']) ? " checked='true' " : " false "; ?>
                    > <?php _t('Translate'); ?>
            </label>
        </div>







        <div class="form-group">
            <label for="x">X <?php _t("Distance from left margin"); ?></label>

            <input 
                type="number" 
                class="form-control" 
                name="Text[x]" 
                id="x" 
                placeholder="" 
                value="<?php echo $params['Text']['x']; ?>"
                required=""

                >
        </div>




        <div class="form-group">
            <label for="y">Y 
                <?php _t("Distance from top margin"); ?>
            </label>

            <input 
                type="number" 
                class="form-control" 
                name="Text[y]" 
                id="y" 
                placeholder="" 
                value="<?php echo $params['Text']['y']; ?>"
                required=""


                >
        </div>


        <div class="form-group">
            <label for="angle">
                <?php _t("Rotation text, angle in degrees"); ?>
            </label>

            <input 
                type="number" 
                class="form-control" 
                name="Text[angle]" 
                id="Text[angle]" 
                placeholder="" 
                value="<?php echo $params['Text']['angle'] ?? 0; ?>"
                required=""
                >


            <?php
            /**
             *  <select class="form-control" name="Text[angle]" id="Text[angle]">
              <?php
              for ($i = 0; $i <= 360; $i++) {
              $selectd_angle = ((int) $params['Text']['angle'] == $i ) ? ' selected ' : '';
              echo '<option value="' . $i . '" ' . $selectd_angle . '>' . $i . '</option>';
              }
              ?>
              </select>
             */
            ?>
        </div>

        <?php
//        vardump($params['Text']);
//        vardump($params['Text']['angle']);
        ?>










        <div class="form-group">
            <label>

                <input 
                    type="checkbox" 
                    name="Text[hidden]" 
                    value="1"
                    <?php echo (isset($params['Text']['hidden']) && $params['Text']['hidden'] == 1 ) ? ' checked="" ' : ""; ?>
                    > <?php _t("Hidden"); ?>

            </label>
        </div>

        <button type="submit" class="btn btn-default">
            <span class="glyphicon glyphicon-floppy-disk"></span>
            <?php _t("Save"); ?>
        </button>

    </div>
</div>