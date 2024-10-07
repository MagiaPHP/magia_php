<!doctype html>
<html lang="en">
    <head>
        <?php include "head.php"; ?>
    </head>

    <body>
        <div class="navbar-wrapper">
            <div class="container">
                <?php //include "nav.php"; ?>
            </div>
        </div>

        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="container marketing">
            <div class="col-sm-12 col-md-12 col-lg-12 text-center">




                <form class="form-inline" method="get">
                    <input type="hidden" name="c" value="public_html">
                    <input type="hidden" name="a" value="search">
                    <input type="hidden" name="w" value="all">

                    <div class="form-group">
                        <label for="exampleInputName2"></label>
                        <input type="text" class="form-control" id="txt" name="txt" placeholder="Restaurantes  ">
                    </div>
                    <button type="submit" class="btn btn-default">
                        <?php _t("Buscar"); ?>
                    </button>
                </form>



                <hr>
            </div>
        </div>



        <?php //include "carrusel.php"; ?>
        <?php include "last_products.php"; ?>
        <?php include "last_companies.php"; ?>
        <?php include "next_events.php"; ?>
        <?php include "pages.php"; ?>
        <?php //include "marketing.php"; ?>
        <?php //include "team.php"; ?>
        <?php //include "comments.php"; ?>
        <?php //include "clients.php"; ?>
        <?php include "contactus.php"; ?>
        <?php include "footer.php"; ?>
    </body>
</html>
