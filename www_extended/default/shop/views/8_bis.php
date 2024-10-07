<?php include view("home", "header"); ?>
<div class="container">
    <p class="text-right">
        <?php
        foreach (_languages_list_by_status(1) as $key => $lang) {
            if (users_field_contact_id('language', $u_id) == $lang['language']) {
                echo ' ' . _tr($lang['name']) . ' |';
            } else {
                echo ' <a href="index.php?c=shop&a=ok_update_language&language=' . $lang['language'] . '&redi=2">' . _tr($lang['name']) . '</a> |';
            }
        }
        ?>
    <p>


    <div class="row">
        <div class="col-xs-0 col-sm-0 col-md-0 col-lg-0">
            <?php // include "izq_registre.php"; ?>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <?php
            // Gestion de mensajes cortos
            sms($sms);

            if ($error) {
                foreach ($error as $key => $value) {
                    message("info", "$value");
                }
            }
            ?>


            <div>


                <h2 class="text-center"><?php _t("Payament"); ?></h2>  

                <div class="panel panel-default">
                    <div class="panel-body">


                        <h3><?php _t("Bank deposit"); ?></h3>
                        <p><?php _t('Please make your payment with the following information, do not forget the payment communication, without this information it will be difficult to validate your payment'); ?></p>
                        <p><b><?php _t("Beneficiary"); ?>:</b> Robinson Coello </p>
                        <p><b><?php _t("Bank name"); ?>:</b>: ING</p>
                        <p><b><?php _t("Account number"); ?>:</b> BE15 3632 3510 7630</p>
                        <p><b><?php _t("IBAN"); ?>:</b> BE15 3632 3510 7630</p>
                        <p><b><?php _t("BIC"); ?>:</b> BE15 3632 3510 7630</p>
                        <p><b><?php _t("Comunication"); ?>:</b> <?php echo $company->getTva(); ?></p>
                        <p><b><?php _t("Total to pay"); ?>:</b> <?php echo $company->getTva(); ?></p>


                    </div>
                </div>


                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3><?php _t("Payment by credit card"); ?></h3>



                        <form class="form-horizontal">

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">



                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                            <img src="bancontact.png" width="50"  alt="alt"/>
                                            <?php _t("Bancontact"); ?>
                                        </label>
                                    </div>

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                            <img src="ing.jpeg" width="50"  alt="alt"/>
                                            ING
                                        </label>
                                    </div>

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                            <img src="visa.png" width="50"  alt="alt"/>
                                            Visa
                                        </label>
                                    </div>


                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">
                                        <?php _t("Pay now"); ?>
                                    </button>
                                </div>
                            </div>
                        </form>



                    </div>
                </div>


                <?php
                /**
                 * 
                  <form autocomplete="off" method="post" action="redirectPayment.cgi"
                  onsubmit="return preConfirm(this, 'PAYPAL');" translate="none">
                  <input type="hidden" name="paymentType" value="PAYPAL">
                  <input type="hidden" name="orderId" value="197057963">
                  <input type="hidden" name="orderPassword" value="SSO8ctnG70">
                  <input type="image" class="nodoubleclick" src="https://www.ovh.com/fr/images/PayPal_mark_60x38.gif" translate="none">
                  </form>


                  https://www.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=EC-7WT92852F0814870D

                  https://www.paypal.com/mu/webapps/mpp/express-checkout



                 */
                ?>



            </div>






            <?php
            /**
             * <form class="form-horizontal" method="post">
              <input type="hidden" name="c" value="shop">
              <input type="hidden" name="a" value="ok_8">


              <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Total</label>
              <div class="col-sm-9">
              <input type="number" class="form-control" id="inputEmail3" placeholder="25" value="25" readonly="">
              </div>
              </div>


              <div class="form-group">
              <label for="cc" class="col-sm-3 control-label">Carta de credito</label>
              <div class="col-sm-9">
              <input type="text" class="form-control" id="cc" placeholder="Carta de credito">
              </div>
              </div>


              <div class="form-group">
              <label for="cc" class="col-sm-3 control-label">Fecha de expiration</label>
              <div class="col-sm-9">
              <input type="text" class="form-control" id="cc" placeholder="2023-02-02">
              </div>
              </div>


              <div class="form-group">
              <div class="col-sm-offset-3 col-sm-10">
              <div class="checkbox">
              <label>
              <input type="checkbox"> Acepta las condiciones de uso
              </label>
              </div>
              </div>
              </div>





              <div class="form-group">
              <div class="col-sm-offset-3 col-sm-9">
              <button type="submit" class="btn btn-default">
              Pagar
              </button>
              </div>
              </div>
              </form>
             */
            ?>



            <?php include "00_footer.php"; ?>






