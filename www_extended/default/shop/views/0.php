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


<h2><?php _t("Hi"); ?>, <?php echo contacts_field_id('name', $u_id); ?></h2>

<div class="panel panel-default">
    <div class="panel-body">
        <?php _t("Welcome to the factux registration system, follow the following steps"); ?>
    </div>
</div>


<div class="panel panel-default">
    <div class="panel-body">
        <?php _t("By registering on this site, you are agreeing to the following conditions of use"); ?>
    </div>
</div>

<p><a href="index.php?a=terms_of_service" target="new"><?php _t("Conditions of use"); ?></a></p>




<?php
/**
 * <div class="panel panel-default">
  <div class="panel-body">
  <?php _t("You can now enter your system, use the following data"); ?>
  <ul>
  <li><?php _t("User"); ?>: xxxx</li>
  <li><?php _t("Password"); ?>: xxxx</li>
  <li><?php _t("Web address of your system"); ?>: xxxx</li>
  </ul>
  </div>
  </div>



  <div class="panel panel-default">
  <div class="panel-body">
  pago de membresia//
  Si tiene un presupuesto abierto no pagado
  </div>
  </div>

 */
?>



<?php
if (!$error) {
    shop_registre_next(1);
}
?>


<?php include "00_footer.php"; ?>



