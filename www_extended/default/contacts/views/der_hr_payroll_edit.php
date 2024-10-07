<?php //  include view('contacts', 'der_hr_employee_documents_all');             ?>



<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t('Details'); ?>
    </div>
    <div class="panel-body">                       
        <a class="btn btn-primary" href="index.php?c=contacts&a=hr_payroll_details&payroll_id=<?php echo $hr_payroll->getId(); ?>&id=<?php echo $hr_payroll->getEmployee_id(); ?>"><?php echo icon('eye-open'); ?> <?php _t("Details"); ?></a>
    </div>
</div>





<div class="panel panel-default">
    <div class="panel-heading">
        -----
    </div>
    <div class="panel-body">                       


        <?php
        include view('hr_payroll_lines', 'form_add_by_employee');
        ?>


    </div>
</div>


<div class="panel panel-default">
    <div class="panel-heading">
        <?php echo icon("plus"); ?>

    </div>
    <div class="panel-body">                       

        <form method="post" action="index">

            <input type="hidden" name="c" value="projects">
            <input type="hidden" name="a" value="ok_add_short">
            <input type="hidden" name="redi[redi]" value="1">

            <div class="form-group">
                <label for="FiledName"><?php _t("From"); ?></label>
                <input type="email" class="form-control" name="FiledName" id="FiledName" placeholder="<?php echo _t("FiledName"); ?>">
            </div>

            <div class="form-group">
                <label for="FiledName"><?php _t("To"); ?></label>
                <input type="email" class="form-control" name="FiledName" id="FiledName" placeholder="<?php echo _t("FiledName"); ?>">
            </div>

            <button type="submit" class="btn btn-default">
                <?php echo icon("ok"); ?> 
                <?php _t("Submit"); ?>
            </button>
        </form>

    </div>
</div>


