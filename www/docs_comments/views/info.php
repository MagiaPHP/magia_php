<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("docs_comments", "izq"); ?>
    </div>

    <div class="col-lg-9">
        <?php include view("docs_comments", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <h1>doc_comments</h1>
        <p>
            Esto registra los comentrios que se agrega en cada uno de los documentos, facturas, budgets, etc
        </p>


    </div>
</div>

<?php include view("home", "footer"); ?> 

