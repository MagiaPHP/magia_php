<footer id="footer" class="section-bg">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4">



                    <div class="col-sm-6">
                        <div class="footer-info">
                            <h3>Factuz</h3>
                            <p>
                                <?php _t("No more unpaid bills"); ?> !!! 
                            </p>
                        </div>

                        <div class="footer-newsletter">
                            <h4>Our Newsletter</h4>
                            <p>
                            </p>
                            <?php
                            /**
                             *  <form action="" method="post">
                              <input type="email" name="email"><input type="submit" value="Subscribe">
                              </form>
                             */
                            ?>
                        </div>
                        <div class="footer-newsletter">
                            <h4></h4>
                            <p>
                            </p>

                            <a href="">Español</a>
                            <a href="">Français</a>
                            <a href="">English</a>
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

                <div class="col-sm-12 col-md-4 col-lg-4">



                    <div class="footer-links">
                        <ul>
                            <li><a href="#"><?php _t("Home"); ?></a></li>
                            <li><a href="#about"><?php _t("About Us"); ?></a></li>
                            <li><a href="#services"><?php _t("Services"); ?></a></li>
                            <li><a href="#why-us"><?php _t("Why us"); ?></a></li>
                            <li><a href="#pricing"><?php _t("Price"); ?></a></li>
                            <li><a href="#faq"><?php _t("FAQ"); ?></a></li>
                            <?php if (modules_field_module('status', 'shop')) { ?>                    
                                <li><a href="#registrarse"><?php _t("New account"); ?></a></li>
                            <?php } ?>
                            <li><a href="#login"><?php _t("Login"); ?></a></li>                                  
                        </ul>
                    </div>

                    <div class="footer-links">
                        <h4><?php _t("Contact us"); ?></h4>

                    </div>


                    <div class="social-links">

                        <a href="https://chat.whatsapp.com/JedtmrDtYQcBT4B3gq6UZc" target="_new" class="whatsapp"><i class="bi bi-whatsapp"></i></a>                        
                        <a href="https://t.me/+0mNZ44Y980FlMDE0" target="_new" class="whatsapp"><i class="bi bi-telegram"></i></a>                        
                        <a href="https://twitter.com/Factuzsystem" target="_new" class="twitter"><i class="bi bi-twitter"></i></a>                        
                        <a href="https://www.facebook.com/groups/factuzsystem" target="_new" class="facebook"><i class="bi bi-facebook"></i></a>                        
                        <a href="https://www.instagram.com/factuzsystem/" target="_new" class="instagram"><i class="bi bi-instagram"></i></a>                        
                        <a href="https://www.linkedin.com/in/factuzsystem/" target="_new" class="linkedin"><i class="bi bi-linkedin"></i></a>                        
                        <a href="https://www.youtube.com/@FACTUZSYSTEM" target="_new" class="youtube"><i class="bi bi-youtube"></i></a>

                    </div>


                </div>


                <div class="col-sm-12 col-md-4 col-lg-4">                   
                    <div class="footer-links">

                        <ul>
                            <li><a href="index.php?a=about"><?php _t("General description"); ?></a></li>
                            <li><a href="index.php?a=privacy_policy"><?php _t("Privacy policy"); ?></a></li>
                            <li><a href="index.php?a=terms_of_service"><?php _t('Terms of service'); ?></a></li>
                            <li><a href="index.php?a=technologies"><?php _t('Technologies'); ?></a></li>
                            <li><a href="index.php?a=frequent_questions"><?php _t('F.A.Q'); ?></a></li>
                            <li><a href="index.php?a=documentation"><?php _t('Documentation'); ?></a></li>

                            <li><a href="https://blog.factuz.com"><?php _t('Blog'); ?></a></li>

                            <li><a href="index.php?a=jobs"><?php _t('Jobs'); ?>.</a></li>
                            <li><a href="#"></a></li>                            
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
