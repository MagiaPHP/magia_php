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




                <a href="#"  data-toggle="modal" data-target="#editAccountNumber">
                    <?php echo icon("pencil"); ?> 
                    <?php echo ($hr_payroll->getAccount_number()); ?> 
                </a>

                <div class="modal fade" id="editAccountNumber" tabindex="-1" role="dialog" aria-labelledby="editAccountNumberLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="editAccountNumberLabel">
                                    <?php _t("Edit account number"); ?>
                                </h4>
                            </div>
                            <div class="modal-body">
                                <?php
                                include "form_update_account_number.php";
                                ?>
                            </div>


                        </div>
                    </div>
                </div>






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

