<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4">



            <h1>Details</h1>

            <?php
            vardump($product);
            echo $product->getDescription();
            ?>

            <hr>

            Comprar


        </div>
    </div>
</section>