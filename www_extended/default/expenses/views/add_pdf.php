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



        <?php if (!isset($file)) { ?>




            <style>
                th {
                    position: -webkit-sticky;
                    position: sticky;
                    top: 0;
                    z-index: 2;
                }
            </style>


            <table class="table table-striped table-condensed table-bordered" >
                <thead>
                    <tr>
                        <th><?php _t("File name"); ?></th>
                        <th><?php _t("Date registre"); ?></th>                    
                        <th><?php _t("Date registre"); ?></th>                    
                        <th><?php _t("Date registre"); ?></th>                    
                        <th><?php _t("Action"); ?></th>                    
                    </tr>
                </thead>

                <tbody>
                    <?php
                    for ($i = 1; $i <= 15; $i++) {
                        echo '<tr>
                    <td>FC24-00' . $i . '</td>
                    <td>01 feb 2024</td>
                    <td>To be registred</td>                    
                    <td>Registred in db</td>                    
                    <td><a class="btn btn-primary" href="index.php?c=expenses&a=add_from_pdf&file=' . $i . '">' . _tr("Registre") . '</a></td>                    
                </tr> ';
                    }
                    ?>
                </tbody>

            </table>
        <?php } else { ?>

            <a href="index.php?c=expenses&a=add_from_pdf"><?php echo icon("remove"); ?></a>

            <iframe 
                src="FC24-101.pdf" 
                width="100%"
                height="1900"
                frameborder="0"></iframe>    
            <?php }
            ?>


    </div>

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">     
        <?php include "add_der_add_pdf.php"; ?>
    </div>


</div>

<?php include view("home", "footer"); ?>
