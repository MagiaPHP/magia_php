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
                <h1 class="blog-title">Agenda</h1>
                <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
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
                <?php include "sidebar_agenda.php"; ?>
            </div><!-- /.row -->
        </div><!-- /.container -->

        <?php include "footer.php"; ?>


    </body>
</html>
