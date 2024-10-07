<?php include "00_header.php"; ?>

<?php // include "nav_address.php"; ?>

<?php
// Gestion de mensajes cortos
sms($sms);

if ($error) {
    foreach ($error as $key => $value) {
        message("info", "$value");
    }
}
?>


<h1><?php _t("Registration process completed and awaiting approval"); ?></h1>


<div class="panel panel-default">
    <div class="panel-body">

        <h3><?php _t("Once approved, you will be able to use this data to use your system"); ?></h3>

        <p><b><?php _t("Url"); ?>:</b> <a href="http://<?php echo $company->getSubdomain_Data('subdomain_domain'); ?>" target="top">http://<?php echo $company->getSubdomain_Data('subdomain_domain'); ?></a></p>
        <p><b><?php _t("Username"); ?>:</b> <?php echo users_field_contact_id('login', $u_id); ?></p>
        <p><b><?php _t("Password"); ?>:</b> <?php _t('Your password'); ?></p>



        <?php
        /**
         * 
         * <p><?php _t("You must proceed to payment, with the following references"); ?></p>

          <p><?php _t("Document number"); ?> # <b><?php echo $budget->getId(); ?></b></p>
          <p><?php _t("Code"); ?>: <b><?php echo $budget->getCode(); ?></b></p>

          <?php $url = $config_app['url'] . "&a=b&id=" . $budget->getId() . "&code=" . $budget->getCode(); ?>
          <p>
          <a target="new" href="<?php echo $url; ?>"><?php _t("PDF version"); ?></a>
          </p>

         */
        ?>



    </div>
</div>


<a name="next"></a>

<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="home">
    <input type="hidden" name="a" value="logout">
    <div class="form-group">
        <label class="control-label col-sm-0" for=""></label>
        <div class="col-sm-12"> 
            <button class="btn btn-lg btn-danger btn-block" type="submit">
                <?php _t("Finish registration and logout"); ?>
                <span class="glyphicon glyphicon-chevron-right"></span>
            </button>
        </div>      							
    </div>      							
</form>





<?php // include view('budgets', 'part_pay'); ?>











<?php
// $config_app['url'] = "http://127.0.0.43/factux_43/index.php?c=app";
//
//$url = $config_app['url'] . "&a=i&id=" . $budget->getId() . "&code=" . $budget->getCode();
//
//vardump($url);
//
//vardump($budget->getId());
//vardump($budget->getCode());
//vardump($budget);
//vardump(count(budgets_search_by_client($u_owner_id)));
//vardump(budgets_search_by_client($u_owner_id)[0]['id']);
//vardump(budgets_search_by_client($u_owner_id)[0]);
//vardump(budgets_search_by_client($u_owner_id));
//
//vardump($list);
// https://www.ebusiness.be/services-monitoring.php#OptionBackup
// https://beaubourg-avocats.fr/contrat-sauvegarde-informatique/
// file:///home/robinson/T%C3%A9l%C3%A9chargements/instructions_ransomware-sauvegarde_cpas_0.pdf
// https://ccb.belgium.be/fr
// http://e-backup.be/conditions-generales.php
//
//http://e-backup.be/conditions-generales.php
/**
 * http://e-backup.be/pdf/Commande_PC.pdf
 * https://clientarea.aspserveur.com/contrat/contrat_service_sauvegarde_en_ligne.pdf
 * 

 * Condiciones generales
 * Les présentes conditions générales sont applicables à toute fourniture de prestations de sauvegarde en ligne. En conséquence, le fait de passer commande implique l'adhésion entière et sans réserve du Client aux présentes conditions générales. Aucune condition particulière ne peut, sauf acceptation formelle et écrite de e-Backup.be, prévaloir contre les présentes conditions générales. Toute clause contraire posée par le Client sera donc, à défaut d'acceptation expresse, inopposable chez e-Backup.be, quel que soit le moment où elle aura pu être portée à la connaissance de cette dernière.
 * 
 * Objeto
 * Article 3 : Moyens
 * Article 4 : Caractéristiques générales de l'e-Backup
 * 
 */
?>














<?php include "00_footer.php"; ?>


