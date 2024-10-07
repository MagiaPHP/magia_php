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
        <div class="container marketing">

            <?php
            //vardump($blog);
            ?>
            <h1><?php echo $blog['title']; ?></h1>

            <h3>fecha <?php echo $blog['date_registre']; ?> - <?php echo $blog['author']; ?></h3>

            <h4><?php echo blog_categories_field_id("name", $blog['category_id']); ?> </h4>

            <p>
                <?php echo $blog['body']; ?>

            </p>

            <hr>



            <!-- FOOTER -->
            <footer>
                <p class="pull-right"><a href="#">Back to top</a></p>
                <p>&copy; 2016 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
            </footer>

        </div><!-- /.container -->

        <?php //include "marketing.php"; ?>
        <?php include "footer.php"; ?>

    </body>
</html>


