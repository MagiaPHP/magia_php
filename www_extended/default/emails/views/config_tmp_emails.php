<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include "izq.php"; ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include "izq_config.php"; ?>
    </div>

    <div class="col-sm-12 col-md-3 col-lg-3">
        <?php include "izq_tmp_emails.php"; ?>
    </div>

    <div class="col-sm-12 col-md-5 col-lg-5">
        <?php include "nav.php"; ?>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>






        <?php
//        include "form_tmp_emails.php";
        ?>

        <br>








        <?php
        $redi = 5;
        include view("emails_tmp", "form_add");
        $redi = "";
        ?>



        <?php
        /**
         * 
          <form>
          <div class="form-group">
          <label for="exampleInputEmail1">Tmp Email</label>
          <select class="form-control" name="tmp">
          <option value="1">Send invoice</option>
          <option value="2">Send budget</option>
          <option value="3">Send credit note</option>
          </select>
          </div>


          <button type="submit" class="btn btn-default">Edit</button>

          <button type="submit" class="btn btn-default">New template</button>



          </form>

          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
         */
        ?>






    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php // include "der_config.php"; ?>
    </div>


</div>

<?php include view("home", "footer"); ?> 
