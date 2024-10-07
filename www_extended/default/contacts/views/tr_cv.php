<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <img src="..." alt="...">
        <div class="caption">
            <h3><?php echo $contact["name"] ?> <?php echo $contact["lastname"] ?></h3>
            <p>Empresa</p>
            <p>Empresa</p>
            <p>
                <a href="index.php?c=contacts&a=details&id=<?php echo "$contact[id]"; ?>" class="btn btn-primary" role="button"><?php _t("Details"); ?></a> 
                <a href="#" class="btn btn-default" role="button">Button</a></p>
        </div>
    </div>

</div>
