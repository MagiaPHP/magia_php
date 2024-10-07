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
        <?php //include "marketing.php"; ?>


        <div class="container">
            <div class="blog-header">
                <h1 class="blog-title">By place</h1>
                <p class="lead blog-description">Av; de la merced 15 - 1000 Bruxelles</p>
            </div>
            <div class="row">
                <div class="col-sm-8 blog-main">
                    <?php include "post1.php"; ?>
                    <hr>
                    <?php include "post2.php"; ?>
                    <nav>
                        <ul class="pager">
                            <li><a href="#">Previous</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </nav>
                </div><!-- /.blog-main -->
                <?php include "sidebar_by_place.php"; ?>
            </div><!-- /.row -->
        </div><!-- /.container -->

        <?php include "footer.php"; ?>


    </body>
</html>
