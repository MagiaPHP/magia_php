

<form class="form-horizontal" action="index.php" method="post">
    <input type="hidden" name="c" value="users">
    <input type="hidden" name="a" value="ok_add">  

    <input type="hidden" name="office_id" value="<?php echo (isset($arg['office_id']) && $arg['office_id']) ? $arg['office_id'] : null; ?>">
    <input type="hidden" name="owner_id" value="<?php echo (isset($arg['owner_id']) && $arg['owner_id']) ? $arg['owner_id'] : null; ?>">
    <input type="hidden" name="id" value="<?php echo (isset($arg['id']) && $arg['id']) ? $arg['id'] : null; ?>">


    <input type="hidden" name="redi[redi]" value="<?php echo (isset($arg['redi']) && $arg['redi']) ? $arg['redi'] : 1; ?>">
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg['c']) && $arg['c']) ? $arg['c'] : 'home'; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg['a']) && $arg['a']) ? $arg['a'] : 'index'; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo (isset($arg['params']) && $arg['params']) ? $arg['params'] : ''; ?>">



    <?php
//vardump($arg); 
    ?>

    <div class="form-group">
        <label class="control-label col-sm-2" for="office_id"><?php _t("Office"); ?></label>
        <div class="col-sm-8">    
            <?php if (isset($arg['office_id_selected'])) { ?>
                <input type="hidden" name="office_id" value="<?php echo ((isset($arg['office_id_selected']) && $arg['office_id_selected']) ? $arg['office_id_selected'] : '') ?>">

                <input 
                    type="text"
                    name=""
                    id="" 
                    class="form-control" 
                    placeholder="<?php echo contacts_formated((isset($arg['office_id_selected']) && $arg['office_id_selected']) ? $arg['office_id_selected'] : '') ?>"                 
                    readonly=""                
                    >      


            <?php } else { ?>
                <select class="form-control" name="office_id" id="office_id" >
                    <?php
                    foreach (offices_list_by_headoffice($u_owner_id) as $key => $office) {

                        $office_selected = ( isset($arg['office_id_selected']) && $arg['office_id_selected'] == $office['id']) ? ' selected ' : '';

                        echo '<option value="' . $office['id'] . '" ' . $office_selected . '>' . contacts_formated($office['id']) . '</option>';
                    }
                    ?>
                </select>
            <?php }
            ?>



        </div>     
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Contact"); ?></label>

        <div class="col-sm-2">    
            <select class="form-control" name="title">
                <?php foreach (contacts_titles_list() as $key => $value) { ?>
                    <option value="<?php echo $value['title']; ?>"><?php echo _tr($value['title']); ?></option>
                <?php } ?>
            </select>     
        </div>

        <div class="col-sm-3">    
            <input type="text"  name="name" class="form-control" id="name" placeholder="<?php _t("Name"); ?>" required="" >            
        </div>

        <div class="col-sm-3">    
            <input type="text"  name="lastname" class="form-control" id="lastname" placeholder="<?php _t("Lastname"); ?>" required="">
        </div>

    </div>






    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Job title"); ?></label>        

        <div class="col-sm-10">    

            <select class="selectpicker" data-live-search="true" name="cargo" id="cargo" >
                <?php
                foreach (employees_categories_list() as $key => $category) {

                    echo '<option value="' . $category['category'] . '">' . $category['category'] . '</option>';
                }
                ?>
            </select>
        </div>
    </div>





    <div class="form-group">

        <label class="control-label col-sm-2" for=""><?php _t("Billing Address"); ?></label>

        <div class="col-sm-2">    
            <input type="text"  name="number" class="form-control" id="number" placeholder="<?php _t("Number"); ?>" >
        </div>

        <div class="col-sm-6">    
            <input type="text"  name="address" class="form-control" id="address" placeholder="<?php _t("Address"); ?>" >
        </div>

    </div>


    <div class="form-group">

        <label class="control-label col-sm-2" for="postcode"></label>

        <div class="col-sm-2">    
            <input type="text"  name="postcode" class="form-control" id="postcode" placeholder="<?php _t("Postal code"); ?>">
        </div>

        <div class="col-sm-3">    
            <input type="text"  name="barrio" class="form-control" id="barrio" placeholder="<?php _t("Municipality"); ?>">
        </div>

        <div class="col-sm-3">    
            <input type="text"  name="city" class="form-control" id="city" placeholder="<?php _t("City"); ?>" >
        </div>

    </div>



    <div class="form-group">

        <label class="control-label col-sm-2" for="region"></label>
        <div class="col-sm-5">    

        </div>

        <div class="col-sm-8">    
            <select class="form-control" name="country">
                <?php
                foreach (countries_list() as $key => $country_item) {
                    $selected = ($country_item['countryCode'] == addresses_billing_by_contact_id($u_owner_id)['country']) ? " selected " : "";
                    echo "<option value=\"$country_item[countryCode]\" $selected >" . _tr($country_item['countryName']) . "</option>";
                }
                ?>
            </select>
        </div>

    </div>


    <hr>







    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>  


</form>


<p>
    * <?php _t('Mandatory'); ?>
</p>



