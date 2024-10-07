<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.88.1">
        <title>Product example · Bootstrap v5.1</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/product/">



        <!-- Bootstrap core CSS -->
        <link href="includes/bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- Favicons -->
        <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
        <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
        <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
        <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
        <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
        <?php // <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
        ?>
        <meta name="theme-color" content="#7952b3">


        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>


        <!-- Custom styles for this template -->
        <link href="www/public_html/shop2/views/css/product.css" rel="stylesheet">
    </head>
    <body>

        <header class="site-header sticky-top py-1">
            <nav class="container d-flex flex-column flex-md-row justify-content-between">
                <a class="py-2" href="#" aria-label="Product">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24"><title>Product</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
                </a>
                <a class="py-2 d-none d-md-inline-block" href="index.php">Index</a>
                <a class="py-2 d-none d-md-inline-block" href="#">Product</a>
                <a class="py-2 d-none d-md-inline-block" href="#">Features</a>
                <a class="py-2 d-none d-md-inline-block" href="#">Enterprise</a>
                <a class="py-2 d-none d-md-inline-block" href="#">Support</a>
                <a class="py-2 d-none d-md-inline-block" href="#">Pricing</a>
                <a class="py-2 d-none d-md-inline-block" href="#">Cart</a>
            </nav>
        </header>

        <main>
            <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
                <div class="col-md-5 p-lg-5 mx-auto my-5">
                    <h1 class="display-4 fw-normal">
                        <?php echo $product['name']; ?>
                    </h1>
                    <p class="lead fw-normal">
                        <?php echo $product['description']; ?>
                    </p>
                    <a class="btn btn-outline-secondary" href="#">Coming soon</a>
                </div>
                <div class="product-device shadow-sm d-none d-md-block"></div>
                <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
            </div>




            <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
                <div class="bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
                    <div class="my-3 py-3">
                        <h2 class="display-5">Another headline</h2>
                        <p class="lead">And an even wittier subheading.</p>
                    </div>
                    <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
                </div>
                <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                    <div class="my-3 p-3">
                        <h2 class="display-5">Another headline</h2>
                        <p class="lead">And an even wittier subheading.</p>
                    </div>
                    <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
                </div>
            </div>









            <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
                <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                    <div class="my-3 p-3">
                        <h2 class="display-5">Another headline</h2>
                        <p class="lead">And an even wittier subheading.</p>
                    </div>
                    <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
                </div>
                <div class="bg-primary me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
                    <div class="my-3 py-3">
                        <h2 class="display-5">Another headline</h2>
                        <p class="lead">And an even wittier subheading.</p>
                    </div>
                    <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
                </div>
            </div>





            <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
                <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                    <div class="my-3 p-3">
                        <h2 class="display-5">Another headline</h2>
                        <p class="lead">And an even wittier subheading.</p>
                    </div>
                    <div class="bg-body shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
                </div>
                <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                    <div class="my-3 py-3">
                        <h2 class="display-5">Another headline</h2>
                        <p class="lead">And an even wittier subheading.</p>
                    </div>
                    <div class="bg-body shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
                </div>
            </div>






            <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
                <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                    <div class="my-3 p-3">
                        <h2 class="display-5">Another headline</h2>
                        <p class="lead">And an even wittier subheading.</p>
                    </div>
                    <div class="bg-body shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
                </div>
                <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                    <div class="my-3 py-3">
                        <h2 class="display-5">Another headline</h2>
                        <p class="lead">And an even wittier subheading.</p>
                    </div>
                    <div class="bg-body shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
                </div>
            </div>



        </main>


        <?php
        include "footer.php"
        ?>

        <script src="includes/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    </body>
</html>
