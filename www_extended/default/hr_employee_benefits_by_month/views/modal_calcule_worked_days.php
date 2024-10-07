
<?php
/**
 * El boton esta puesto en el titulo de la columna
 * <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#calcule_worked_days">
  <?php _t("Recalculate values"); ?>
  </button>
 */
?>

<!-- Modal -->
<div class="modal fade" id="calcule_worked_days" tabindex="-1" role="dialog" aria-labelledby="calcule_worked_daysLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="calcule_worked_daysLabel">
                    <?php _t("Reset"); ?>
                </h4>
            </div>
            <div class="modal-body">

                <?php
//                vardump($year);
//                vardump($month);
                ?>

                <form method="get" action="index.php">

                    <input type="hidden" name="c" value="hr_employee_benefits_by_month">
                    <input type="hidden" name="a" value="ok_calcule_worked_days">
                    <input type="hidden" name="year" value="<?php echo $year; ?>">
                    <input type="hidden" name="month" value="<?php echo $month; ?>">


                    <div class="form-group">
                        <label for="FiledName"><?php _t("Calculate work days"); ?></label>                          

                        <p>
                            <?php _t("Delete all data from the quantity column and replace it with the days actually worked by all workers"); ?>
                        </p>

                        <p>
                            (<?php _t("Copy the values ​​from the worked days column"); ?>)
                        </p>

                    </div>



                    <button type="submit" class="btn btn-default">
                        <?php echo icon("ok"); ?> 
                        <?php _t("Submit"); ?>
                    </button>
                </form>



            </div>





        </div>
    </div>
</div>



