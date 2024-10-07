<form class="form-horizontal" action ="index.php" method ="get" >

    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo $contact['id'] ?>">


    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t(""); ?></label>	
        <div class="col-sm-8">    		
            <input  disabled="" class="form-control" type ="text " name ="type" id="type" value="<?php echo ($contact['id']) ?>"/>
        </div>
    </div>	




    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Salutation"); ?></label>	
        <div class="col-sm-8">    		
            <input  disabled="" class="form-control" type ="text " name ="title" id="title" value="<?php echo ($contact['title']) ?>"/>
        </div>
    </div>	






    <?php
    /*
      <div class="form-group">
      <label class="control-label col-sm-2" for="name"><?php _t("Title"); ?></label>
      <div class="col-sm-8">
      <input  disabled="" class="form-control" type ="text " name ="title" id="title" value="<?php echo "$contact[title]"; ?>"/>
      </div>
      </div>
     */
    ?>

    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Name"); ?></label>	
        <div class="col-sm-8">    		
            <input  disabled="" class="form-control" type ="text " name ="name" id="name"value="<?php echo "$contact[name]"; ?>"/>
        </div>
    </div>	


    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Lastname"); ?></label>
        <div class="col-sm-8">
            <input  disabled="" class="form-control" type ="text " name ="lastname" id="lastname" value="<?php echo "$contact[lastname]"; ?>"/>
        </div>
    </div>
    <?php /*

      <div class="form-group">
      <label class="control-label col-sm-2" for="name"><?php _t("Birthday"); ?></label>
      <div class="col-sm-8">
      <input  disabled="" disabled="" class="form-control" type ="text " name ="birthday" id="birthday" value="<?php echo "$contact[birthdate]"; ?>"/>
      </div>
      </div>



      <div class="form-group">
      <label class="control-label col-sm-2" for="name"><?php _t("Tva"); ?></label>
      <div class="col-sm-8">
      <input  disabled="" disabled="" class="form-control" type ="text " name ="tva" id="birthday" value="<?php echo "$contact[tva]"; ?>"/>
      </div>
      </div>
     */ ?>




    <div class="form-group">
        <label class="control-label col-sm-2" for="birthdate"><?php _t("Birthdate"); ?></label>	
        <div class="col-sm-8">    		
            <div class="row">


                <div class="col-xs-3">
                    <select class="form-control" name="day" disabled="">

                        <?php
                        for ($i = 1; $i <= 31; $i++) {

                            $selected_d = (dates_day_of_date($contact['birthdate']) == $i) ? " selected " : "";

                            echo "<option value=\"$i\" $selected_d >$i</option>";
                        }
                        ?>

                    </select>
                </div>


                <div class="col-xs-5">
                    <select class="form-control" name="month" disabled="">
                        <?php
                        for ($i = 1; $i <= 12; $i++) {
                            $selected_m = (dates_month_of_date($contact['birthdate']) == $i) ? " selected " : "";
                            echo "<option value=\"$i\" $selected_m >$i " . _tr($months[$i]) . "</option>";
                        }
                        ?>

                    </select>
                </div>
                <div class="col-xs-4">
                    <select class="form-control" name="year" disabled="">
                        <?php
                        for ($i = 1900; $i <= date("Y"); $i++) {
                            $selected_a = (dates_year_of_date($contact['birthdate']) == $i) ? " selected " : "";
                            echo "<option value=\"$i\" $selected_a >$i</option>";
                        }
                        ?>

                    </select>
                </div>
            </div>


        </div>
    </div>	





    <?php
    /*            <div class="form-group">
      <label class="control-label col-sm-2" for="name"><?php _t("Status") ; ?></label>
      <div class="col-sm-8">
      <input  disabled="" class="form-control" type ="text " name ="status" id="status" value="<?php echo contacts_status($contact['status']) ; ?>"/>
      </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-2" for="name"><?php _t("") ; ?></label>
      <div class="col-sm-8">
      <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit") ; ?>">
      </div>
      </div>
     */
    ?>	


    <div class="form-group">
        <label class="control-label col-sm-2" for="name"></label>
        <div class="col-sm-8">




            <?php if (permissions_has_permission($u_rol, "contacts", "update")) { ?>    
                <button 
                    type="button" 
                    class="btn btn-primary navbar-btn" 
                    data-toggle="modal" data-target="#contacts_directory_add"
                    >
                    <span class="glyphicon glyphicon-pencil"></span>
                    <?php _t("Edit"); ?>
                </button>
            <?php } ?>

            <div class="modal fade" id="contacts_directory_add" tabindex="-1" role="dialog" aria-labelledby="contacts_directory_add">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="contacts_directory_add"><?php _t("Edit"); ?></h4>
                        </div>
                        <div class="modal-body">
                            <?php include "form_edit_patient.php"; ?>
                        </div>


                    </div>
                </div>
            </div>




        </div>
    </div>

</form>





