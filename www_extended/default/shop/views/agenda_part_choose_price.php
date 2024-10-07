<h3><?php _t("Precio de las entradas"); ?></h3>
<p>
    <?php _t("Si este evento es gratis, pon cero en el precio"); ?>
</p>
<table class="table table-border">
    <thead>
        <tr>
            <th><?php _t("Sector"); ?></th>
            <th><?php _t("Price"); ?></th>
            <th><?php _t("Delete"); ?></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Generales</td>
            <td>Free</td>
            <td><a href="index.php"><span class="glyphicon glyphicon-trash"></span></a></td>
        </tr>
        <tr>
            <td>Gradas</td>
            <td>25</td>
            <td><a href="index.php"><span class="glyphicon glyphicon-trash"></span></a></td>
        </tr>
        <tr>
            <td>Palco</td>
            <td>45</td>
            <td><a href="index.php"><span class="glyphicon glyphicon-trash"></span></a></td>
        </tr>
    </tbody>
</table>



<form class="form-horizontal" action="index.php" method="post">
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="addressNewOk">   




    <div class="form-group">
        <label class="control-label col-sm-2" for=""><?php _t("Price"); ?></label>


        <div class="col-sm-6">    
            <input type="text"  
                   name="address" 
                   class="form-control" 
                   id="address" 
                   placeholder="<?php echo _t("Generales"); ?>" 
                   required=""
                   value="Generales"
                   >
        </div>

        <div class="col-sm-2">    
            <input type="text"  
                   name="number" 
                   class="form-control" 
                   id="number" 
                   placeholder="<?php echo _t("Put 0 if it's free"); ?>"
                   required=""
                   >
        </div>

    </div>



    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>  
</form>

