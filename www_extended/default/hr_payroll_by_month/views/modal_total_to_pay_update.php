<a href="#" data-toggle="modal" data-target="#total_to_pay_<?php echo $prbm->getEmployee_id(); ?>" ><?php echo moneda($total_total_to_pay); ?></a>

<div class="modal fade" id="total_to_pay_<?php echo $prbm->getEmployee_id(); ?>" 
     tabindex="-1" role="dialog" aria-labelledby="total_to_pay_<?php echo $prbm->getEmployee_id(); ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="total_to_pay_<?php echo $prbm->getEmployee_id(); ?>Label">
                    <?php _t("Update"); ?>
                </h4>
            </div>
            <div class="modal-body">


                <form method="post" action="index.php">

                    <input type="hidden" name="c" value="hr_payroll_by_month">
                    <input type="hidden" name="a" value="ok_formule_update">
                    <input type="hidden" name="employee_id" value="<?php echo $prbm->getEmployee_id(); ?>">
                    <input type="hidden" name="month" value="<?php echo $prbm->getMonth_of_payroll(); ?>">
                    <input type="hidden" name="year" value="<?php echo $prbm->getYear_of_payroll(); ?>">
                    <input type="hidden" name="column" value="total_to_pay">

                    <input type="hidden" name="redi[redi]" value="6">

                    <div class="form-group">
                        <label for="value"><?php _t("Total to pay"); ?></label>
                        <textarea 
                            class="form-control" 
                            name="formule" 
                            id="total_to_pay_<?php echo $prbm->getEmployee_id(); ?>" 
                            rows="5"><?php echo $formule_total_to_pay; ?></textarea>                                             



                        <?php
                        /**
                         *                         <script>
                          function CopyToTextarea(el) {
                          var text = el.textContent, // get this <a> text
                          textarea = document.getElementById('total_to_pay_<?php echo $prbm->getEmployee_id(); ?>'), // textarea id
                          textareaValue = textarea.value, // text area value
                          Regex = new RegExp(text + '\n', 'g'), // make new regex with <a> text and \n line break
                          textareaValue = textareaValue + ' ' + text + ' '; // this is something similar to if statement .. mean if the textarea has the <a> text and after it line break .. replace it with its line break to blank (remove it) .. if not its not on textarea add this <a> text to the textarea value
                          textarea.value = textareaValue;                     // change the textarea value with the new one
                          }
                          </script>
                          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


                         */
                        ?>


                    </div>

                    <div class="form-group">                        
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="all_employees" value="1"> <?php _t("Register this formula for all employees"); ?>
                            </label>
                        </div>
                    </div>



                    <button type="submit" class="btn btn-default">
                        <?php echo icon("ok"); ?> 
                        <?php _t("Submit"); ?>
                    </button>

                </form>

                <br>

                <?php
                /**
                 *                 <code>
                  <a href="#" onclick="CopyToTextarea(this)">%pay_to_bank% + %money_advance_bank%</a>
                  </code>
                 */
                ?>

                <code>
                    %pay_to_bank% + %money_advance_bank%
                </code>

                <br>
                <br>

                <?php
                foreach ($prbm->getTags_list() as $key => $tag) {
                    // echo '<a href="#" onclick="CopyToTextarea(this)">' . $tag . '</a><br>';
                    echo '' . $tag . '<br>';
                    //$tag . '<br>';
                }
                ?>



            </div>




        </div>
    </div>
</div>