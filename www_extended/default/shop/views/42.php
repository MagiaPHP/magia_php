<?php include "00_header.php"; ?>

<?php // include "nav_address.php"; ?>

<?php
// Gestion de mensajes cortos
sms($sms);

if ($error) {
    foreach ($error as $key => $value) {
        message("info", "$value");
    }
}
?>



<h1>Modelos PDF</h1>
<p>
    Ya casi terminamos, estas al final del recorrido
</p>




<div class="row">

    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img src="..." alt="...">
            <div class="caption">
                <h3>Free</h3>
                <p>
                    Cada trimestre tu contable necesita informacion de tu empresa, 
                    es por esto que le puedes dar acceso para que busque los documento que necesitas 
                </p>
                <p>
                    <a href="index.php?c=shop&a=32" class="btn btn-primary" role="button">
                        <?php _t("Select this"); ?>
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>

                    <a href="#" class="btn btn-default" role="button">Button</a>
                </p>
            </div>
        </div>
    </div>



    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img src="..." alt="...">
            <div class="caption">
                <h3>Pequena emprsa</h3>
                <p>
                    Cada trimestre tu contable necesita informacion de tu empresa, 
                    es por esto que le puedes dar acceso para que busque los documento que necesitas 
                </p>
                <p>
                    <a href="index.php?c=shop&a=32" class="btn btn-primary" role="button">
                        dar acceso
                    </a>
                    <a href="#" class="btn btn-default" role="button">Button</a>
                </p>
            </div>
        </div>
    </div>


    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img src="..." alt="...">
            <div class="caption">
                <h3>Grande</h3>
                <p>
                    Cada trimestre tu contable necesita informacion de tu empresa, 
                    es por esto que le puedes dar acceso para que busque los documento que necesitas 
                </p>
                <p>
                    <a href="index.php?c=shop&a=32" class="btn btn-primary" role="button">
                        dar acceso
                    </a>
                    <a href="#" class="btn btn-default" role="button">Button</a>
                </p>
            </div>
        </div>
    </div>
</div>






<?php include "00_footer.php"; ?>

