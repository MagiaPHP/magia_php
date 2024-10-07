<?php include "header.php"; ?>
<p class="text-center">
    <?php logo(200, "img-responsive"); ?>
</p>
<hr>

<div class="container-fluid">
    <div class="col-lg-4">

        <?php include "izq_new.php"; ?>
    </div>
    <div class="col-lg-8">

        <h1>
            <?php _t("Delivery address"); ?>
        </h1>

        <p>
            <?php _t("What's your address?"); ?>            
        </p>

        <p>
            <?php _t("This address will also be used for the delivery of the packages that our company will send you"); ?>            
        </p>




        <p></p>
        <p></p>





        <form class="form-horizontal" action="index.php" method="post" >

            <input type="hidden" name="c" value="contacts">
            <input type="hidden" name="a" value="ok_address_edit">
            <input type="hidden" name="id" value="<?php echo "$addresses_list_by_contact_id[id]"; ?>">
            <input type="hidden" name="contact_id" value="<?php echo "$id"; ?>">





            <div class="form-group">
                <label class="control-label col-sm-2" for=""><?php _t("Address"); ?></label>
                <div class="col-sm-2">    
                    <input type="text"  name="number" class="form-control" id="number" placeholder="Number" value="">
                </div>
                <div class="col-sm-6">    
                    <input type="text"  name="address" class="form-control" id="address" placeholder="Av. Louise " value="">
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-sm-2" for="postcode"></label>
                <div class="col-sm-2">    
                    <input type="text"  name="postcode" class="form-control" id="postcode" placeholder="1050" value="">
                </div>

                <div class="col-sm-3">    
                    <input type="text"  name="barrio" class="form-control" id="barrio" placeholder="Ixelles" value="">
                </div>

                <div class="col-sm-3">    
                    <input type="text"  name="city" class="form-control" id="city" placeholder="Bruxelles" value="">
                </div>
            </div>



            <div class="form-group">
                <label class="control-label col-sm-2" for="region"></label>
                <?php
                /*
                  <div class="col-sm-5">
                  <input type="text"  name="region" class="form-control" id="region" placeholder="Region" value="<?php echo $addresses_list_by_contact_id['region'] ?>">
                  </div> */
                ?>

                <div class="col-sm-8">    
                    <select class="form-control" name="country">
                        <?php
                        foreach (countries_list() as $key => $value) {

                            $selected = ($value[countryCode] == "BE") ? " selected " : "";

                            echo "<option value=\"$value[countryCode]\" $selected >" . utf8_decode($value['countryName']) . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>










            <div class="form-group">
                <label class="control-label col-sm-2" for=""></label>
                <div class="col-sm-8">    
                    <input class="btn btn-default " type ="submit" value ="<?php _t("Save"); ?>">
                </div>      							
            </div>      							

        </form>






        <?php // ------------------------------------------------------------ ?>
        <hr>
        <a href="index.php?c=home&a=new_account_sucursal_transport" class="btn btn-primary"><?php _t("Next"); ?></a>










    </div>
    <div class="col-lg-4"></div>
</div>




<?php include "footer.php"; ?>
