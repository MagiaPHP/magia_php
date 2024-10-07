
<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal_action_multi_cell_<?php echo $doc_sections["section"]; ?>">
    <?php echo icon("th-list"); ?>
</button>

<div class="modal fade" id="myModal_action_multi_cell_<?php echo $doc_sections["section"]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModal_action_multi_cell_<?php echo $doc_sections["section"]; ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModal_action_multi_cell_<?php echo $doc_sections["section"]; ?>Label">
                    <?php _t("Change section"); ?>
                </h4>
            </div>
            <div class="modal-body">


                <form method="post" action='index.php'>
                    <input type="hidden" name="c" value="doc_models_lines">
                    <input type="hidden" name="a" value="ok_params_update_multi">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="modele" value="<?php echo $modele; ?>">
                    <input type="hidden" name="doc" value="<?php echo $doc; ?>">

                    <input type="hidden" name="redi[c]" value="doc_models">
                    <input type="hidden" name="redi[a]" value="doc">

                    <?php
                    foreach (doc_models_lines_search_modele_doc_section($modele, $doc, $doc_sections["section"]) as $key => $dmlsbds) {
                        echo '<div class="checkbox">
                            <label>
                                <input type="checkbox" name="ids[]" value="' . $dmlsbds['id'] . '"> ' . $dmlsbds['order_by'] . ' : ' . $dmlsbds['name'] . '
                            </label>
                        </div>';
                    }
                    ?>




                    <div>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation"><a href="#part_form_panel_cell" aria-controls="part_form_panel_cell" role="tab" data-toggle="tab"><?php _t("Cell"); ?></a></li>
                            <li role="presentation"><a href="#part_form_panel_section" aria-controls="part_form_panel_section" role="tab" data-toggle="tab"><?php _t("Section"); ?></a></li>
                            <li role="presentation"  class="active"><a href="#part_form_panel_fonts" aria-controls="part_form_panel_fonts" role="tab" data-toggle="tab"><?php _t("Font"); ?></a></li>
                            <li role="presentation"><a href="#part_form_panel_settextcolor" aria-controls="part_form_panel_settextcolor" role="tab" data-toggle="tab"><?php _t("Text color"); ?></a></li>
                            <li role="presentation"><a href="#part_form_panel_setdrawcolor" aria-controls="part_form_panel_setdrawcolor" role="tab" data-toggle="tab"><?php _t("Draw color"); ?></a></li>
                            <li role="presentation"><a href="#part_form_panel_setfillcolor" aria-controls="part_form_panel_setfillcolor" role="tab" data-toggle="tab"><?php _t("Fill color"); ?></a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane " id="part_form_panel_cell">

                                <?php
                                //include "part_form_panel_cell.php";
                                ?>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="part_form_panel_section">
                                <?php
                                //include "part_form_panel_section.php";
                                ?>
                            </div>
                            <div role="tabpanel" class="tab-pane active" id="part_form_panel_fonts">
                                <?php
                                include "part_form_panel_fonts.php";
                                ?>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="part_form_panel_settextcolor">
                                <?php
                                include "part_form_panel_settextcolor.php";
                                ?>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="part_form_panel_setdrawcolor">
                                <?php
                                include "part_form_panel_setdrawcolor.php";
                                ?>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="part_form_panel_setfillcolor">
                                <?php
                                include "part_form_panel_setfillcolor.php";
                                ?>
                            </div>
                        </div>

                    </div>

                </form>




            </div>
        </div>
    </div>
</div>


