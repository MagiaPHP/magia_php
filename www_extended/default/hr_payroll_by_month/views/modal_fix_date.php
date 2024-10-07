<a 
    data-toggle="modal" 
    data-target="#fix_date"
    href="#"                             
    >
        <?php echo icon("pushpin"); ?>
</a>

<div class="modal fade" id="fix_date" tabindex="-1" role="dialog" aria-labelledby="fix_dateLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="hr_payroll_by_month_addLabel">
                    <?php _t("Fix date"); ?>                
                </h4>
            </div>
            <div class="modal-body">

                <?php
                //vardump(_options_option('config_hr_payroll_by_month_fix_date'));
                ?>

                <?php
                if (json_decode_safe(_options_option('config_hr_payroll_by_month_fix_date'), true)['fix']) {
                    ?>

                    <h3><?php echo _tr("Unfix the date"); ?></h3>

                    <h4>
                        <?php _t("Month"); ?> : <?php echo $month; ?>
                    </h4>

                    <h4>
                        <?php _t("Year"); ?> : <?php echo $year; ?>
                    </h4>




                    <p>
                        <?php _t("The date will no longer be set"); ?>
                    </p>
                    <a href="index.php?c=config&a=ok_hr_payroll_by_month_fix_date&data[fix]=0&data[month]=<?php echo $month; ?>&data[year]=<?php echo $year; ?>&redi[redi]=4" class="btn btn-danger">                    
                        <?php echo icon("pushpin"); ?>
                        <?php _t("Unfix"); ?>
                    </a>

                <?php } else { ?>

                    <h3><?php echo _tr("Fix a date"); ?></h3>
                    <p>
                        <?php _t("If you set a month and year, these will not change even if you change the page in this section of the system"); ?>
                    </p>
                    <a href="index.php?c=config&a=ok_hr_payroll_by_month_fix_date&data[fix]=1&data[month]=<?php echo $month; ?>&data[year]=<?php echo $year; ?>&redi[redi]=4" class="btn btn-primary">                    
                        <?php echo icon("pushpin"); ?>
                        <?php _t("Fix"); ?>
                    </a>

                <?php } ?>
            </div>
        </div>
    </div>
</div>