<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal_<?php echo $office['id']; ?>">
    <span class="glyphicon glyphicon-plus-sign"></span>
    <?php _t("Add user"); ?>
</button>




<div class="modal fade" id="myModal_<?php echo $office['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" 
                        class="close" 
                        data-dismiss="modal" 
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title" id="myModalLabel">
                    <?php echo _t("Add user"); ?>
                </h4>

            </div>
            <div class="modal-body">

                <?php //include "form_user_new.php";   ?>

                <form class="form-horizontal" action="index.php" method="post">
                    <input type="hidden" name="c" value="shop">
                    <input type="hidden" name="a" value="ok_user_new">  
                    <input type="hidden" name="redi" value="1">  


                    <input type="hidden" name="office_id" value="<?php echo $office['id']; ?>" >
                    <input type="hidden" name="id" value="<?php echo $office['id']; ?>" >


                    <div class="form-group">
                        <label class="control-label col-sm-3" for=""><?php _t("Office"); ?></label>
                        <div class="col-sm-7">    
                            <input 
                                type="text" 
                                class="form-control" 
                                name="officeName" 
                                id="officeName"  
                                placeholder="<?php echo _t("Office name"); ?>" 
                                value="<?php echo contacts_formated($office['id']) ?>"
                                disabled=""
                                >
                        </div>
                    </div>


                    <div class="form-group">       
                        <label class="control-label col-sm-3" for="title"><?php _t("Title"); ?></label>

                        <div class="col-sm-7">    

                            <select class="selectpicker" data-live-search="true" name="title" required="">
                                <option value=""><?php _t("Select one"); ?></option>

                                <?php
                                //echo var_dump(contacts_titles_list());
                                foreach (contacts_titles_list() as $key => $contacts_titles) {

                                    // $selected = ($contacts_titles['abbreviation'] == $contact['title']) ? " selected " : "";
                                    ?>
                                    <option value="<?php echo $contacts_titles['title'] ?>" <?php //echo "$selected";                     ?>><?php echo _t($contacts_titles['title']); ?></option>
                                <?php } ?>
                            </select>

                        </div>
                    </div>






                    <div class="form-group">
                        <label class="control-label col-sm-3" for=""><?php _t("Name"); ?></label>
                        <div class="col-sm-7">    
                            <input 
                                type="text" 
                                class="form-control" 
                                name="name" 
                                id="name"  
                                placeholder="<?php echo _t("Name"); ?>" 

                                >
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-sm-3" for=""><?php _t("Lastname"); ?></label>
                        <div class="col-sm-7">    
                            <input 
                                type="text" 
                                class="form-control" 
                                name="lastname" 
                                id="lastname"  
                                placeholder="<?php echo _t("Lastname"); ?>" 

                                >
                        </div>
                    </div>




                    <div class="form-group">
                        <label class="control-label col-sm-3" for="name"><?php _t("Birthdate"); ?></label>
                        <div class="col-sm-8">


                            <div class="row">

                                <div class="col-xs-3">
                                    <select class="form-control" name="day">
                                        <?php
                                        for ($i = 1; $i <= 31; $i++) {
                                            echo "<option value=\"$i\">$i</option>";
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="col-xs-3">
                                    <select class="form-control" name="month">
                                        <?php
                                        for ($i = 1; $i <= 12; $i++) {
                                            echo "<option value=\"$i\">$i " . _tr($months[$i]) . "</option>";
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="col-xs-5">
                                    <select class="form-control" name="year">
                                        <?php
                                        for ($i = 1900; $i <= date("Y"); $i++) {
                                            echo "<option value=\"$i\">$i</option>";
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>


                        </div>
                    </div>






                    <div class="form-group">
                        <label class="control-label col-sm-3" for=""><?php _t("Rol"); ?></label>
                        <div class="col-sm-7">    
                            <select  class="form-control" name="rol">                
                                <?php
                                foreach (rols_list() as $key => $value) {
                                    if ($value['rango'] <= $config_rango_max_for_labo && $value['rango'] <= rols_rango_by_rol($u_rol)) {
                                        echo '<option value="' . $value['rol'] . '">';
                                        echo ("$value[rol]") . ' </option> ';
                                    }
                                }
                                ?>            
                            </select>
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="control-label col-sm-3" for=""><?php _t("Email"); ?></label>
                        <div class="col-sm-7">    
                            <input 
                                type="email" 
                                class="form-control" 
                                name="email" 
                                id="email"  
                                placeholder="<?php echo _t("User email"); ?>" 

                                >
                        </div>
                    </div>




                    <div class="form-group">
                        <label class="control-label col-sm-3" for=""><?php _t("Password"); ?></label>
                        <div class="col-sm-7">    
                            <input 
                                type="text" 
                                class="form-control" 
                                name="password" 
                                id="np"  
                                placeholder=""                 
                                >
                        </div>
                    </div>

                    <?php
                    /*
                      <div class="form-group">
                      <label class="control-label col-sm-3" for=""></label>
                      <input type="checkbox" onclick="showPasswordNp()"> <?php _t("Show password"); ?>
                      </div>
                     */
                    ?>






                    <div class="form-group">
                        <label class="control-label col-sm-3" for=""></label>
                        <div class="col-sm-7">    
                            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
                        </div>      							
                    </div>  


                </form>

            </div>

        </div>
    </div>
</div>