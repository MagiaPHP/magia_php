<div class="row">


    <div class="col-sm-6 col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo icon("user"); ?>
                <?php _t("Employee"); ?>
            </div>
            <div class="panel-body">
                <a href="index.php?c=contacts&a=hr_payroll&id=<?php echo $hr_payroll->getEmployee_id(); ?>">
                    <?php echo contacts_formated($hr_payroll->getEmployee_id()); ?>
                </a>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php _t('Account number'); ?>
            </div>
            <div class="panel-body">
                <?php echo ($hr_payroll->getAccount_number()); ?> 
                
                
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php _t("Address"); ?>
            </div>
            <div class="panel-body">

                <?php
                echo addresses_formated_html($hr_payroll->getAddress());
                ?>


                <?php
                /**
                 *                 <form method="post" action="index">

                  <input type="hidden" name="c" value="projects">
                  <input type="hidden" name="a" value="ok_add_short">
                  <input type="hidden" name="redi[redi]" value="1">

                  <div class="form-group">
                  <label for="FiledName"><?php _t("Account number"); ?></label>

                  <select class="form-control" name="" id="">
                  <option value=""></option>
                  </select>
                  </div>





                  <button type="submit" class="btn btn-default">
                  <?php echo icon("ok"); ?>
                  <?php _t("Submit"); ?>
                  </button>
                  </form>
                 */
                ?>











            </div>
        </div>
    </div>


</div>

