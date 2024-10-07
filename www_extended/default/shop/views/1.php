<?php include "00_header.php"; ?>


<?php // include "nav_address.php";  ?>
<?php
// Gestion de mensajes cortos
sms($sms);

if ($error) {
    foreach ($error as $key => $value) {
        message("info", "$value");
    }
}
?>


<h2><?php _t("Company Details"); ?></h2>   

<p><?php _t("Como sabes el nombre de tu empresa y el numero de tva son importanes y necesarios en docuementos como factuas, presupuesto, etc"); ?></p>

<p><?php _t('Escribe el nombre de tu empresa de la forma que quieres verlo impreso en tus documentos'); ?></p>

<a name="next"></a>

<form action="index.php" class="form-horizontal" method="post">
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_1">
    <input type="hidden" name="contact_id" value="<?php echo $u_id; ?>">


    <div class = "form-group">
        <label for = "company_name" class = "col-sm-3 control-label"><?php _t("Company name"); ?> </label>
        <div class="col-sm-9">
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
    </div>


    <div class = "form-group">
        <label for = "tva" class = "col-sm-3 control-label"><?php _t("Vat number"); ?> </label>
        <div class="col-sm-9">
            <input
                name="tva"
                type="text"
                class="form-control"
                id="tva"
                placeholder=""
                value="<?php echo $company->getTva(); ?>"
                required=""
                >
        </div>
    </div>



    <?php
// https://ec.europa.eu/taxation_customs/vies/technicalInformation.html
// http://ywilien.fr/2012/08/21/verifier-un-siren-un-siret-ou-un-numero-de-tva-en-php/

    /**
     * 
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
      readonly=""
      >
      </div>


     *        
     */
    ?>




    <div class="form-group">
        <label for="" class="col-sm-3 control-label"></label>
        <div class="col-sm-9">

            <button type="submit" class="btn btn-primary">
                <span class="glyphicon glyphicon-floppy-disk"></span>
                <?php _t("Save"); ?>
            </button>
        </div>
    </div>
</form>


<?php
if (!$error) {
    shop_registre_next(12);
}
?>


<?php include "00_footer.php"; ?>




