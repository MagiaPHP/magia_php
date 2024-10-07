<footer id="footer" class="section-bg">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">

                        <div class="col-sm-6">

                            <div class="footer-info">
                                <h3>Factuz</h3>
                                <p>

                                    <?php _t("No more unpaid bills"); ?> !!! 

                                </p>
                            </div>





                            <?php
                            /**
                             *                             <div class="footer-newsletter">
                              <h4>Our Newsletter</h4>

                              <p>
                              </p>


                              <form action="" method="post">
                              <input type="email" name="email"><input type="submit" value="Subscribe">
                              </form>
                              </div>
                             */
                            ?>

                        </div>

                        <div class="col-sm-6">
                            <div class="footer-links">
                                <ul>
                                    <li><a href="#"><?php _t("Home"); ?></a></li>
                                    <li><a href="#about"><?php _t("About Us"); ?></a></li>
                                    <li><a href="#services"><?php _t("Services"); ?></a></li>
                                    <li><a href="#why-us"><?php _t("Why us"); ?></a></li>
                                    <li><a href="#pricing"><?php _t("Price"); ?></a></li>
                                    <li><a href="#faq"><?php _t("FAQ"); ?></a></li>
                                    <li><a href="#registrarse"><?php _t("New account"); ?></a></li>
                                    <li><a href="#login"><?php _t("Login"); ?></a></li>
                                    <?php
                                    /**
                                     *                                     <li><a href="index.php?c=public_html&a=terms_of_service">Terms of service</a></li>
                                      <li><a href="index.php?c=public_html&a=privacy_policy">Privacy policy</a></li>
                                     */
                                    ?>
                                </ul>
                            </div>

                            <?php
                            /**
                             *                             <div class="footer-links">
                              <h4>Contact Us</h4>
                              <p>

                              <strong>Phone:</strong> +32 474 62 47 07<br>
                              <strong>Email:</strong> info@factuz.be<br>
                              </p>
                              </div>

                              <div class="social-links">
                              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                              </div>
                             */
                            ?>

                        </div>

                    </div>

                </div>


                <?php
                /**
                 *                 <div class="col-lg-3">
                  <div class="form">
                  <h4>Factuz</h4>
                  <p>
                  Robinson Coello<br>
                  Productions Associées asbl<br>
                  TVA N° BE 0896755397.<br>
                  Rue Coenraets 72, <br>
                  1060 Saint-Gilles<br>
                  Bélgica<br>
                  <br>

                  <b>
                  Tel: +32 474 62 47 07
                  </b>


                  </p>

                  <?php // include "form_contact.php"; ?>
                  <?php
                  // si la url corresponde a un usuario
                  // le da el login
                  // sino el registro
                  if (1 == 1) {
                  // echo "<p>Bienvenido estimado cliente</p>";
                  //include "form_login.php";
                  } else {
                  // echo "<p>Si no tiene cuenta, registrese</p>";
                  // include "form_login.php";
                  }
                  ?>
                  </div>
                  </div>
                 */
                ?>


                <div class="col-lg-3">
                    <div class="form">
                        <h4>
                            <?php _t("Friends website"); ?>
                        </h4>
                        <?php
                        /**
                         * <p><a href="https://www.ejustice.just.fgov.be/tsv/tsvf.htm" target="top">ejustice</a></p>
                          <p><a href="https://economie.fgov.be/fr" target="top">economie</a></p>
                         */
                        ?>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="footer-links">
                        <h4>
                            <?php _t("Links"); ?>
                        </h4>
                        <ul>

                            <li><a href="index.php?a=about"><?php _t("General description"); ?></a></li>
                            <li><a href="index.php?a=privacy_policy"><?php _t("Privacy policy"); ?></a></li>
                            <li><a href="index.php?a=terms_of_service"><?php _t('Terms of service'); ?></a></li>
                            <li><a href="index.php?a=technologies"><?php _t('Technologies'); ?></a></li>
                            <li><a href="index.php?a=frequent_questions"><?php _t('F.A.Q'); ?></a></li>
                            <li><a href="index.php?a=documentation"><?php _t('Documentation'); ?></a></li>
                            <li><a href="index.php?a=jobs"><?php _t('Jobs'); ?></a></li>
                            <li><a href="#"></a></li>
                            <?php
                            /**
                             *                             <li><a href="index.php?c=public_html&a=terms_of_service">Terms of service</a></li>
                              <li><a href="index.php?c=public_html&a=privacy_policy">Privacy policy</a></li>
                             */
                            ?>
                        </ul>
                    </div>

                    <?php
                    //    include "form_login.php";
                    ?>

                </div>



            </div>

        </div>
    </div>

    <div class="container">
        <?php
        /**
         * <div class="copyright">
          &copy; Copyright <strong>Rapid</strong>. All Rights Reserved
          </div>
         */
        ?>
        <div class="credits">
            <?php
            /**
             *             <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Rapid
              -->
             *  Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
             */
            ?>

        </div>
    </div>
</footer>



<?php
// dont delete the code, i you want desactivate go to 
// http://localhost/factuz/index.php?c=config&a=tawk
// and desacrtive there 
if (_options_option('config_tawk_activated')) {
    ?>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
        (function () {
            var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/664cd389981b6c564772f6c9/1hue1kklu';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
<?php }
?>
