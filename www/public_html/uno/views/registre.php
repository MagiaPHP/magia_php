<!doctype html>
<html lang="en">
    <head>
        <?php include "head.php"; ?>
    </head>

    <body>
        <div class="navbar-wrapper">
            <div class="container">
                <?php include "nav.php"; ?>
            </div>
        </div>

        <?php include "carrusel.php"; ?>
        <?php // include "marketing.php"; ?>



        <div class="container marketing">


            <div class="row">

                <div class="col-sm-12 col-md-3">

                    <?php
                    if (is_logued()) {
                        include "izq_details.php";
                    }
                    ?>

                </div>

                <div class="col-sm-12 col-md-9 blog-post">

                    <h2 class="blog-post-title">
                        <?php
                        if (is_logued()) {
                            echo _t("Hi") . " " . contacts_formated($u_id);
                        } else {
                            echo _t("Registre");
                        }
                        ?>
                    </h2>



                    <?php
                    if (is_logued()) {
                        echo _tr("Welcome, you are already part of our site");

//                        echo ' <br><br><br><a href="index.php?c=hole&a=logout">' . _tr("logout") . '</a>';
                        //
                    } else {
                        include 'form_registre.php';
                    }
                    ?>


                </div><!-- /.blog-post -->


                <?php
                /**
                 *                 <div class="blog-post">
                  <h2 class="blog-post-title">Sample blog post</h2>
                  <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p>


                  <hr>





                  <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
                  <blockquote>
                  <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                  </blockquote>
                  <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                  <h2>Heading</h2>
                  <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                  <h3>Sub-heading</h3>
                  <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                  <pre><code>Example code block</code></pre>
                  <p>Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
                  <h3>Sub-heading</h3>
                  <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                  <ul>
                  <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
                  <li>Donec id elit non mi porta gravida at eget metus.</li>
                  <li>Nulla vitae elit libero, a pharetra augue.</li>
                  </ul>
                  <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
                  <ol>
                  <li>Vestibulum id ligula porta felis euismod semper.</li>
                  <li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>
                  <li>Maecenas sed diam eget risus varius blandit sit amet non magna.</li>
                  </ol>
                  <p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>




                  <p>
                  This blog post shows a few different types of content that's supported and styled with Bootstrap. Basic typography, images, and code are all supported.
                  This blog post shows a few different types of content that's supported and styled with Bootstrap. Basic typography, images, and code are all supported.
                  This blog post shows a few different types of content that's supported and styled with Bootstrap. Basic typography, images, and code are all supported.

                  </p>


                  <p>
                  This blog post shows a few different types of content that's supported and styled with Bootstrap. Basic typography, images, and code are all supported.
                  This blog post shows a few different types of content that's supported and styled with Bootstrap. Basic typography, images, and code are all supported.
                  This blog post shows a few different types of content that's supported and styled with Bootstrap. Basic typography, images, and code are all supported.

                  </p>


                  <p>
                  This blog post shows a few different types of content that's supported and styled with Bootstrap. Basic typography, images, and code are all supported.
                  This blog post shows a few different types of content that's supported and styled with Bootstrap. Basic typography, images, and code are all supported.
                  This blog post shows a few different types of content that's supported and styled with Bootstrap. Basic typography, images, and code are all supported.

                  </p>

                  <hr>





                  <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
                  <blockquote>
                  <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                  </blockquote>
                  <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                  <h2>Heading</h2>
                  <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                  <h3>Sub-heading</h3>
                  <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                  <pre><code>Example code block</code></pre>
                  <p>Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
                  <h3>Sub-heading</h3>
                  <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                  <ul>
                  <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
                  <li>Donec id elit non mi porta gravida at eget metus.</li>
                  <li>Nulla vitae elit libero, a pharetra augue.</li>
                  </ul>
                  <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
                  <ol>
                  <li>Vestibulum id ligula porta felis euismod semper.</li>
                  <li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>
                  <li>Maecenas sed diam eget risus varius blandit sit amet non magna.</li>
                  </ol>
                  <p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>
                  </div><!-- /.blog-post -->


                  <div class="blog-post">
                  <img src="https://picsum.photos/800/151" alt="alt"/>
                  <h2 class="blog-post-title">Another blog post</h2>


                  <p class="blog-post-meta">December 23, 2013 by <a href="#">Jacob</a></p>

                  <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
                  <blockquote>
                  <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                  </blockquote>
                  <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                  <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                  </div><!-- /.blog-post -->

                  <hr>




                  <div class="blog-post">

                  <img src="https://picsum.photos/800/150" alt="alt"/>
                  <h2 class="blog-post-title">New feature</h2>
                  <p class="blog-post-meta">December 14, 2013 by <a href="#">Chris</a></p>

                  <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                  <ul>
                  <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
                  <li>Donec id elit non mi porta gravida at eget metus.</li>
                  <li>Nulla vitae elit libero, a pharetra augue.</li>
                  </ul>
                  <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                  <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
                  </div><!-- /.blog-post -->

                 */
                ?>






            </div>
        </div>





        <?php include "footer.php"; ?>
        <?php include "foot.php"; ?>

    </body>
</html>

