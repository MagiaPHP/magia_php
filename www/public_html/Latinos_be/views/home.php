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





<div class="container marketing">





    <div class="col-sm-12 col-md-12 col-lg-12">

        <div class="row">
            <?php foreach ($contacts as $key => $contact) { ?>
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="https://picsum.photos/320/200" alt="...">
                        <div class="caption">
                            <h4><?php echo $contact['name']; ?></h4>
                            <h5><?php echo "Discoteca"; ?></h5>
                            <p>
                                2, Av de la liberte<br>
                                1020 - Bruselas
                                Belgica
                            </p>
                            <p>
                                <a href="index.php?c=public_html&a=details&id=<?php echo $contact['id']; ?>" class="btn btn-primary" role="button">
                                    <?php _t("Details"); ?>
                                </a> 
                                <a href="#" class="btn btn-default" role="button">Button</a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</div>