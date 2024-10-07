<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    <div class="footer-content position-relative">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6">
                    <div class="footer-info">
                        <h3><?php echo contacts_formated($html->getId()); ?></h3>
                        <p>
                            <?php echo "$config_company_a_number $config_company_a_address "; ?> <br>
                            <?php echo "$config_company_a_postal_code $config_company_a_city "; ?> <br>
                            <?php echo "$config_company_a_country "; ?> <br>
                            <br>
                            <br>
                            <strong>Phone:</strong> <?php echo $config_company_tel; ?><br>
                            <strong>Email:</strong> <?php echo $config_company_email; ?><br>
                        </p>
                        <div class="social-links d-flex mt-3">
                            <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div><!-- End footer info column-->

                <div class="col-lg-4 col-md-4 footer-links">
                    <h4>Useful Links</h4>

                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Terms of service</a></li>
                        <li><a href="#">Privacy policy</a></li>
                    </ul>
                </div><!-- End footer links column-->

                <div class="col-lg-4 col-md-4 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Web Development</a></li>
                        <li><a href="#">Product Management</a></li>
                        <li><a href="#">Marketing</a></li>
                        <li><a href="#">Graphic Design</a></li>
                        <li><a href="https://factuz.com">Factuz</a></li>
                    </ul>

                    <p>
                        <b>Member area</b>
                    </p>




                    <form class=" form-horizontal form-signin" method="post" >
                        <input type="hidden" name="c" value="users">
                        <input type="hidden" name="a" value="identification">   




                        <div class="form-group">
                            <label for="login" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="login" name="login" placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Sign in</button>
                            </div>
                        </div>
                    </form>


                </div><!-- End footer links column-->

                <?php
                /*          <div class="col-lg-2 col-md-3 footer-links">
                  <h4>Hic solutasetp</h4>
                  <ul>
                  <li><a href="#">Molestiae accusamus iure</a></li>
                  <li><a href="#">Excepturi dignissimos</a></li>
                  <li><a href="#">Suscipit distinctio</a></li>
                  <li><a href="#">Dilecta</a></li>
                  <li><a href="#">Sit quas consectetur</a></li>
                  </ul>
                  </div><!-- End footer links column-->

                  <div class="col-lg-2 col-md-3 footer-links">
                  <h4>Nobis illum</h4>
                  <ul>
                  <li><a href="#">Ipsam</a></li>
                  <li><a href="#">Laudantium dolorum</a></li>
                  <li><a href="#">Dinera</a></li>
                  <li><a href="#">Trodelas</a></li>
                  <li><a href="#">Flexo</a></li>
                  </ul>
                  </div><!-- End footer links column--> */
                ?>

            </div>
        </div>
    </div>

    <div class="footer-legal text-center position-relative">
        <div class="container">

            <a href="https://factuz.com">Powered by factuz.com</a>


            <?php
            /**
             * <div class="copyright">
              &copy; Copyright <strong><span>UpConstruction</span></strong>. All Rights Reserved
              </div>
              <div class="credits">
              <!-- All the links in the footer should remain intact. -->
              <!-- You can delete the links only if you purchased the pro version. -->
              <!-- Licensing information: https://bootstrapmade.com/license/ -->
              <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/ -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>

             */
            ?>

        </div>
    </div>

</footer>
<!-- End Footer -->