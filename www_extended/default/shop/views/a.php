<?php include view("home", "header"); ?>
<div class="row">
    <div class="col-md-3">
        <?php // include "izq_myInfo.php"; ?>
    </div>
    <div class="col-md-6">              
        <?php // include "nav_address.php"; ?>
        <?php
        if ($error) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <h2><?php _t("Company info"); ?></h2>   

        <p><?php _t("Please, update you company name"); ?></p>


        <form action="index.php" method="post">
            <input type="hidden" name="c" value="shop">
            <input type="hidden" name="a" value="ok_1">
            <input type="hidden" name="contact_id" value="<?php echo $u_id; ?>">

            <div class="form-group">
                <label for="company_name"><?php _t("Company"); ?> *</label>
                <input 
                    name="company_name" 
                    type="text" 
                    class="form-control" 
                    id="company_name" 
                    placeholder="Audio SPRL" 
                    value="<?php echo contacts_field_id("name", $u_owner_id); ?>"
                    required=""
                    >
            </div>

            <?php //echo vardump(directory_names_format("Telefoop32 0478 65 65", "tel", $format)) ; ?>


            <div class="form-group">
                <label for="tel"><?php _t("Tel"); ?> *</label>                    
                <input 
                    name="tel" 
                    type="text" 
                    class="form-control" 
                    id="tel" 
                    placeholder="+32...." 
                    value="+32"
                    required=""
                    >
            </div>

            <div class="form-group">
                <label for="tel2"><?php _t("Tel"); ?> 2 </label>                    
                <input 
                    name="tel2" 
                    type="text" 
                    class="form-control" 
                    id="tel" 
                    placeholder="+32...." 
                    value="<?php // echo  directory_names_format("+32", "tel", $format) ;    ?>"

                    >
            </div>







            <?php
            // https://ec.europa.eu/taxation_customs/vies/technicalInformation.html
            // http://ywilien.fr/2012/08/21/verifier-un-siren-un-siret-ou-un-numero-de-tva-en-php/
            ?>
            <div class="form-group">
                <label for="company_name">
                    <a href="https://ec.europa.eu/taxation_customs/vies/vatResponse.html" target="top">
                    </a>

                    <?php _t("TVA"); ?> *
                </label>

                <input 
                    name="tva" 
                    type="text" 
                    class="form-control" 
                    id="tva" 
                    placeholder="BE0508539920" 
                    value="<?php echo contacts_field_id("tva", $u_owner_id); ?>"

                    >
            </div>



            <button type="submit" class="btn btn-primary"><?php _t("Next >> "); ?></button>
        </form>

        <p></p>

        <p>* <?php _t("Required"); ?></p>

    </div>
</div>
<?php include view("home", "footer"); ?>