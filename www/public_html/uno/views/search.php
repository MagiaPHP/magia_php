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
                    <?php include "izq_search.php"; ?>
                </div>

                <div class="col-sm-12 col-md-9 blog-post">


                    <?php
                    foreach ($blog as $key => $bs) {
                        $res = new Blog();
                        $res->setBlog($bs['id']);
                        echo '<p>
                               <b>  ' . icon('file') . ' <a href="index.php?c=public_html&a=details&id=' . $res->getId() . '">' . $res->getTitle() . ' </a></b>
                                   
                                <br>                                                               
                                ' . substr($res->getDescription(), 0, 250) . ' ...<a href="index.php?c=public_html&a=details&id=' . $res->getId() . '">' . _tr("continue reading") . ' </a>
                            </p>';
                        echo '<br>';
                    }
                    ?>



                </div>


            </div>
        </div>





        <?php include "footer.php"; ?>
        <?php include "foot.php"; ?>

    </body>
</html>

