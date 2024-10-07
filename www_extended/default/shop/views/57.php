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




<h2><?php _t("PDF"); ?></h2>




<div class="row">
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img src="..." alt="...">
            <div class="caption">
                <h3>Gratis</h3>
                <p>
                    Si recien empiezas como personal o empresa, y no tienes mucho dinero esta es la mejor opcion
                </p>
                <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
            </div>
        </div>
    </div>


    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img src="..." alt="...">
            <div class="caption">
                <h3>Personal</h3>
                <p>
                    Abrir una empresa es muy costoso, te ayudamos a que no gastes mas plata con este plan 

                </p>
                <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
            </div>
        </div>
    </div>



    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img src="..." alt="...">
            <div class="caption">
                <h3>Empresa</h3>
                <p>
                    Ya tienes una SPRL, SA, o cualquier otro tipo de empresa? esta opcion es la mejor para ti
                </p>
                <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
            </div>
        </div>
    </div>
</div>


<?php include "00_footer.php"; ?>
        

