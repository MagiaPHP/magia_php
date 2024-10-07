
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">        
            <?php _t("Send by email"); ?>
        </h3>
    </div>
    <div class="panel-body">


        <table class="table table-striped">
            <tr>
                <td>
                    <span class="glyphicon glyphicon-send"></span>

                    <?php _t("Send by email"); ?>
                </td>

                <td>
                    <?php if (_options_option('config_print_multilang')) { ?> 
                        <div class="dropdown">
                            <button 
                                class="btn btn-sm btn-default dropdown-toggle" 
                                type="button" 
                                id="dropdownMenu1" 
                                data-toggle="dropdown" 
                                aria-haspopup="true" 
                                aria-expanded="true">
                                <span class="glyphicon glyphicon-print"></span>
                                <?php // _t("Print");   ?>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <?php
                                foreach (_languages_list_by_status(1) as $key => $lang) {
                                    $icon = ($lang['language'] == contacts_field_id('language', budgets_field_id('client_id', $id))) ?
                                            '<span class="glyphicon glyphicon-chevron-right"></span>' :
                                            '';
                                    ?>
                                    <li>
                                        <a href="index.php?c=budgets&a=export_pdf&id=<?php echo $id; ?>&lang=<?php echo $lang['language']; ?>" target="_print">
                                            <?php echo $icon; ?>                                    
                                            <?php echo _t($lang['name']); ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } else { ?> 
                        <a class="btn btn-sm btn-default" href="index.php?c=budgets&a=export_pdf&id=<?php echo $id; ?>" target="_print">
                            <span class="glyphicon glyphicon-print"></span>
                            <?php // echo _t('Print');  ?>
                        </a>
                    <?php } ?>
                </td>

                <td>
                    <?php
                    include "modal_send_by_email.php";
                    ?>
                </td>

            </tr>

        </table>



    </div>
</div>
