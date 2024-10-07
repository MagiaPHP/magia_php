<?php include view("home", "header"); ?>
<div class="container">


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
            <?php //include "izq_registre.php"; ?>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <p>&nbsp;</p>      


            <?php
            sms($sms);

            if ($error) {
                foreach ($error as $key => $value) {
                    message("info", "$value");
                }
            }
            ?>


            <h2>Confirmacion</h2>
            <p>Estimado <?php echo $name; ?> <?php echo $lastname; ?></p>
            <p>
                Le damos la bienvenida a la web de factux, su registro ha terminado, ya puede usar su sistema de facturacion 
            </p>

            <p>
                Un email sera enviado una vez la cuenta sea creada 
            </p>
            <br>
            <br>
            <br>
            Factux 




        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <?php //include "izq_registre.php";        ?>
        </div>
    </div>
</div>
<?php include view("home", "footer"); ?>