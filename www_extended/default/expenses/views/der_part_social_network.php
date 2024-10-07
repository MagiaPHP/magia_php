<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">        
            <?php _t("Whatsapp"); ?>
        </h3>
    </div>
    <div class="panel-body">

        <?php
        $url = "https://subeybaja.factux.be/index.php?c=invoices&a=export_pdf&id=1747&lang=&1";
        ?>

        <a href="whatsapp://send?text=<?php echo $url; ?>" data-action="share/whatsapp/share">
            <img src="www/gallery/img/whatsapp.jpg" alt=""/>
        </a>


    </div>
</div>
