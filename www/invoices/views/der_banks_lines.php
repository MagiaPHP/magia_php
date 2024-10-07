<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">    
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingThree">

            <h4 class="panel-title">

                <?php
                if (modules_field_module('status', "docu")) {
                    echo docu_modal_bloc($c, $a, 'registrePayments');
                }
                ?>

                <a name="registrePayments"></a>

                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <?php _menu_icon("top", 'banks_lines'); ?>
                    <?php _t("Bank lines"); ?>
                </a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body">



                <?php
                include "part_banks_lines.php";
                ?>





            </div>
        </div>
    </div>


</div>




