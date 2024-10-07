<a name="80"></a>

<div class="panel panel-default">
    <div class="panel-body">
        <h3>
            <?php _t("Finalizar"); ?>
        </h3>


        <p>
            <a href="index.php?c=expenses" class="btn btn-primary" role="button">Finlizar</a> 
            <a href="index.php?c=expenses&a=ok_add&provider_id=<?php echo $expense->getProvider_id(); ?>" class="btn btn-primary" role="button">Agregar otra factura del mismo provehedor</a>
            <a href="#" class="btn btn-primary" role="button">Registrar el pago</a>
        </p>





    </div>
</div>

