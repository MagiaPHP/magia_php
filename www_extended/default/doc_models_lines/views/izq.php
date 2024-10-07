
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

    <?php
    $open = false;
    $section = false;

//    vardump(doc_models_lines_list_section_by_modele_doc($modele, $doc));
//  foreach (doc_models_lines_list_section_by_modele_doc($modele, $doc) as $key => $doc_sections) {

    $lines_array = doc_models_lines_search_modele_doc($modele, $doc);
//    $lines_array = array_unique(doc_models_lines_search_modele_doc($modele, $doc));
    //vardump($lines_array);
//    vardump($modele);
//    vardump($doc);

    foreach ($lines_array as $key => $doc_sections) {


//        if ($section !== $doc_sections['section']) {
        echo '    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading_' . $doc_sections["section"] . '">
            <h4 class="panel-title">
                <a class="collapsed"
                   role="button" 
                   data-toggle="collapse" 
                   data-parent="#accordion" 
                   href="#collapse_' . $doc_sections["section"] . '" 
                   aria-expanded="true"
                   aria-controls="collapse_' . $doc_sections["section"] . '">
                    ' . $doc_sections["section"] . '
                </a>
            </h4>
        </div>
        
        <div id="collapse_' . $doc_sections["section"] . '" class="panel-collapse collapse ';

        // si se ha escojido una linea
        if (isset($id)) {
            echo ($doc_sections["section"] == doc_models_lines_field_id('section', $id)) ? ' in ' : '';
        } else {
            $id = null;
        }


        echo '" role="tabpanel" aria-labelledby="heading_' . $doc_sections["section"] . '">
            <div class="panel-body">';

        doc_models_create_menu($modele, $doc, $doc_sections["section"], $id);

        //include 'modal_reverse.php';
//        include 'modal_hide.php';
//        include 'modal_show.php';
//        include 'modal_delete.php';
//        include 'modal_chage_section.php';
//        include 'modal_color.php';
//        include 'modal_change_order_by.php';
//        //include 'modal_action_multi_cell.php';
//        include 'modal_font.php';
//        include 'modal_setdrawcolor.php';
//        include 'modal_setfillcolor.php';
//        include 'modal_settextcolor.php';
        //include 'modal_import.php';
        //include 'modal_export.php';

        /**
         *             
          <ul class="list-group">
          <li class="list-group-item">Action all items</li>
          </ul>
         */
        echo '     



            </div>
        </div>
    </div>
    ';

//            $section = $doc_sections['section'];
//        }
    }
    ?>

</div>




<div class="list-group">
    <a href="#" class="list-group-item "  data-toggle="modal" data-target="#addSection"">
        <span class="glyphicon glyphicon-plus"></span>
        <?php _t("Add section"); ?>
    </a>
    <a href="index.php?c=doc_sections" class="list-group-item">
        <?php echo icon("pencil"); ?>
        <?php _t("Config section"); ?>
    </a>

    <a href="index.php?c=doc_models&a=doc&modele=<?php echo $modele; ?>" class="list-group-item">
        <span class="glyphicon glyphicon-file"></span> 
        <?php _t("Document"); ?>
    </a>




    <?php if (_options_option('config_pdf_debug')) { ?>
        <a class="list-group-item" href="index.php?c=config&a=ok_pdf_debug&data=0&redi[redi]=2&redi[modele]=<?php echo $modele; ?>&redi[doc]=<?php echo $doc; ?>"><?php _t("Debug mode off"); ?></a>

    <?php } else { ?>
        <a class="list-group-item" href="index.php?c=config&a=ok_pdf_debug&data=1&redi[redi]=2&redi[modele]=<?php echo $modele; ?>&redi[doc]=<?php echo $doc; ?>"><?php _t("Debug mode on"); ?></a>
    <?php }
    ?>

    <?php
//    vardump(_options_option('config_pdf_grid'));

    if (_options_option('config_pdf_grid')) {
        ?>
        <a class="list-group-item" href="index.php?c=config&a=ok_pdf_grid&data=0&redi[redi]=2&redi[modele]=<?php echo $modele; ?>&redi[doc]=<?php echo $doc; ?>"><?php _t("Grid off"); ?></a>

    <?php } else { ?>
        <a class="list-group-item" href="index.php?c=config&a=ok_pdf_grid&data=1&redi[redi]=2&redi[modele]=<?php echo $modele; ?>&redi[doc]=<?php echo $doc; ?>"><?php _t("Grid on"); ?></a>
    <?php }
    ?>




    <?php
    if (_options_option('config_debug_number_line')) {
        ?>
        <a class="list-group-item"  href="index.php?c=config&a=ok_pdf_debug_number_line&data=0&redi[redi]=2&redi[modele]=<?php echo $modele; ?>&redi[doc]=<?php echo $doc; ?>"><?php _t("Hidden number lines"); ?></a>

    <?php } else { ?>
        <a class="list-group-item"  href="index.php?c=config&a=ok_pdf_debug_number_line&data=1&redi[redi]=2&redi[modele]=<?php echo $modele; ?>&redi[doc]=<?php echo $doc; ?>"><?php _t("Show number lines"); ?></a>
    <?php }
    ?>



    <?php
// index.php?c=&a=&doc=payroll

    if (_options_option('config_doc_models_debug_color_working_element')) {
        ?>
        <a class="list-group-item"  href="index.php?c=config&a=ok_doc_models_debug_color_working_element&data=0&redi[redi]=5&redi[c]=doc_models_lines&redi[a]=details_by_modele_doc&redi[params]=<?php echo "doc=$doc"; ?>"><?php _t("No color working element"); ?></a>

    <?php } else { ?>
        <a class="list-group-item"  href="index.php?c=config&a=ok_doc_models_debug_color_working_element&data=1&redi[redi]=5&redi[c]=doc_models_lines&redi[a]=details_by_modele_doc&redi[params]=<?php echo "doc=$doc"; ?>"><?php _t("Color working element"); ?></a>
    <?php }
    ?>






</div>





<div class="panel panel-default">
    <div class="panel-body">


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#copyLines">
            <span class="glyphicon glyphicon-copy"></span>
            <?php _t("Copy lines"); ?>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="copyLines" tabindex="-1" role="dialog" aria-labelledby="copyLinesLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="copyLinesLabel">
                            <?php _t("Copy lines"); ?>
                        </h4>
                    </div>
                    <div class="modal-body">



                        <p>
                            <?php _t("You are going to copy the lines of this document"); ?>
                        </p>

                        <form class="form-inline" action="index.php" method="post">
                            <input type="hidden" name="c" value="doc_models_lines">
                            <input type="hidden" name="a" value="ok_doc_copy">
                            <input type="hidden" name="modele" value="<?php echo $modele; ?>">
                            <input type="hidden" name="new_doc" value="<?php echo $doc; ?>">
                            <input type="hidden" name="redi" value="1">


                            <div class="form-group">
                                <label class="sr-only" for="doc">doc</label>

                                <select class="form-control" name="doc">
                                    <option value=""><?php _t('Select one'); ?></option>
                                    <?php
                                    foreach (doc_docs_list() as $doc_list) {
//                        $selected = ($doc_list['doc'] == $doc) ? " selected " : "";
                                        $disabled = ($doc_list['doc'] == $doc) ? " disabled " : "";
                                        echo '<option value="' . $doc_list['doc'] . '" ' . $disabled . '>' . _tr($doc_list['doc']) . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-default">
                                <?php _t('Copy from'); ?>
                            </button>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="panel panel-default">
    <div class="panel-body">       
        <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#deleteLines">
            <span class="glyphicon glyphicon-trash"></span>
            <?php _t('Delete all lines'); ?>
        </button>       
        <div class="modal fade" id="deleteLines" tabindex="-1" role="dialog" aria-labelledby="deleteLinesLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="deleteLinesLabel">
                            <?php _t('Delete all lines'); ?>
                        </h4>
                    </div>
                    <div class="modal-body text-center">
                        <h1><?php _t("Atention"); ?></h1>
                        <h1><?php _t("Delete all lines"); ?></h1>

                        <p>
                            <?php _t("You are going to delete all the lines of this document"); ?>
                        </p>
                        <p>
                            <?php _t("Are you sure you want to do it?"); ?>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <a 
                            href="index.php?c=doc_models_lines&a=ok_delete_lines&modele=<?php echo $modele; ?>&doc=<?php echo $doc; ?>&redi[redi]=4&redi[modele]=<?php echo $modele; ?>&redi[doc]=<?php echo $doc; ?>&#2" type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-trash"></span>
                            <?php _t('Delete'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="addSection" tabindex="-1" role="dialog" aria-labelledby="addSectionLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="addSectionLabel">
                    <?php _t("Add new section"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <?php
                include view("doc_sections", 'form_add');
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>






