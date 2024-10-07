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

                    <?php include "izq_details.php"; ?>

                </div>

                <div class="col-sm-12 col-md-9 blog-post">

                    <h2 class="blog-post-title">
                        <?php echo $blog->getTitle(); ?>
                    </h2>


                    <p class="blog-post-meta"><?php // echo $blog->getDate()?> by <a href="#"><?php echo contacts_formated($blog->getAuthor_id()) ?></a></p>

                    <p><?php _t('Topic'); ?> : <a href="index.php?c=public_html&a=search&w=by_controller&controller=<?php echo $blog->getController(); ?>"><?php echo $blog->getController(); ?></a></p>


                    <?php echo $blog->getDescription(); ?>


                    <h3><?php _t("Comments"); ?></h3>

                    <?php
                    foreach (blog_comments_search_by('blog_id', $blog->getId()) as $key => $blogcl) {

                        $comment = new Blog_comments();
                        $comment->setBlog_comments($blogcl['id']);

                        echo '<div class="panel panel-default">
                    <div class="panel-body">
                      <p>
                      <b>' . $comment->getTitle() . '</b><br>
                      ' . $comment->getComment() . '
                      </p>
                      <p><b>' . contacts_formated($comment->getAuthor_id()) . '</b> ' . $comment->getDate() . '</p>
                          
                        

                    </div>
                  </div>';
                    }
                    ?>


                    <h3> <?php _t("Add comment"); ?></h3>



                    <?php if (is_logued()) { ?>
                        <form method="post" action="index">

                            <input type="hidden" name="c" value="blog">
                            <input type="hidden" name="a" value="ok_add_short">
                            <input type="hidden" name="redi[redi]" value="1">


                            <div class="form-group">
                                <label for="comment"><?php _t("Comments"); ?></label>
                                <textarea class="form-control" name="comment" rows="5"></textarea>
                            </div>


                            <button type="submit" class="btn btn-default">
                                <?php echo icon("ok"); ?>
                                <?php _t("Submit"); ?>
                            </button>
                        </form>
                    <?php } else {
                        ?>
                        <p>
                            <?php
                            _t("You must be registered to post comments");
                            ?>, 
                            <a href="index.php?c=public_html&a=registre"><?php //  _t("Registre here");         ?></a>
                        </p>
                    <?php }
                    ?>



                    <h3><?php _t("On the same topic"); ?></h3>


                    <ul>
                        <?php
                        if (isset($blog)) {
                            foreach (blog_search_by('controller', $blog->getController()) as $key => $bsb) {
                                echo '<li><a href="index.php?c=public_html&a=details&id=' . $bsb['id'] . '">' . $bsb['title'] . '</a></li>';
                            }
                        }
                        ?>
                    </ul>




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

