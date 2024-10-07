<?php
# MagiaPHP 
# file date creation: 2024-01-11 
?>
<?php include view("home", "header"); ?> 

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">   
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>




        <a href="index.php?c=expenses&a=add_pdf"><?php echo icon("remove"); ?></a>

        <iframe 
            src="FC24-101.pdf" 
            width="100%"
            height="1900"
            frameborder="0"></iframe>   


    </div>

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">     
        <?php include "add_der_from_pdf.php"; ?>
    </div>


</div>

<?php include view("home", "footer"); ?>
