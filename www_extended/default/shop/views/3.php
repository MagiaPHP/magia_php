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


<h1>Acceso a otros usuarios</h1>


<br>
<br>
<br>
<br>




<div class="row">



    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img src="..." alt="...">
            <div class="caption">
                <h3>Secretaria</h3>
                <p>
                    Le llamamos perfil secretaria, pero bien puede ser tu compañea o companero, esposa o esposo 
                    o tu socio, en realidad cualquier persona que te ayude en la gestion

                </p>
                <p>
                    <a href="index.php?c=shop&a=31" class="btn btn-primary" role="button">
                        dar acceso
                    </a> 
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                        ??
                    </button>

                    <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                            </div>
                            <div class="modal-body">
                                <h1>Permisos del rol secretaria</h1>
                                <ul>
                                    <li>Casi todo lo que tu haces</li>
                                    <li>Que no hace</li>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                </p>
            </div>
        </div>
    </div>



    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img src="..." alt="...">
            <div class="caption">
                <h3>Contador</h3>
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



<p>
    O simplemente puedes seguir,ya despues podras ver esto
</p>





<?php
shop_registre_next(41);
?>




<?php include "00_footer.php"; ?>



<?php
/*
  <div>









  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">

  <li role="presentation" class="active">
  <a href="#registred" aria-controls="profile" role="tab" data-toggle="tab">
  <?php _t("Registered addresses"); ?>
  </a>
  </li>

  <li role="presentation" >
  <a href="#new" aria-controls="home" role="tab" data-toggle="tab">
  <?php _t("New"); ?>
  </a>
  </li>

  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
  <div role="tabpanel" class="tab-pane" id="new">
  <?php ############################################################  ?>
  <p></p>


  <form class="form-horizontal" action="index.php" method="post" >
  <input type="hidden" name="c" value="shop">
  <input type="hidden" name="a" value="ok_3">
  <input type="hidden" name="name" value="<?php echo addresses_name()[0]; ?>">


  <div class="form-group">
  <label class="control-label col-sm-2" for="office_name"><?php _t("Office name"); ?></label>
  <div class="col-sm-8">
  <input
  type="text"
  name="office_name"
  class="form-control"
  id="office_name"
  placeholder=""
  required=""
  value="<?php echo $office_name; ?>"
  <?php
  // si es sede esto esta desactivado
  if( $office_id_work_for == $office_id_work_at ){
  echo " readonly ";
  }
  ?>

  >
  </div>
  </div>


  <div class="form-group">
  <label class="control-label col-sm-2" for=""><?php _t("Address"); ?></label>
  <div class="col-sm-2">
  <input type="text"  name="number" class="form-control" id="number" placeholder="Number" required="">
  </div>
  <div class="col-sm-6">
  <input type="text"  name="address" class="form-control" id="address" placeholder="Av. Louise" required="">
  </div>
  </div>






  <div class="form-group">
  <label class="control-label col-sm-2" for="postcode"></label>
  <div class="col-sm-2">
  <input type="text"  name="postcode" class="form-control" id="postcode" placeholder="1050" required="">
  </div>

  <div class="col-sm-3">
  <input type="text"  name="barrio" class="form-control" id="barrio" placeholder="Ixelles" required="">
  </div>

  <div class="col-sm-3">
  <input type="text"  name="city" class="form-control" id="city" placeholder="Bruxelles" required="">
  </div>
  </div>



  <div class="form-group">

  <label class="control-label col-sm-2" for="region"></label>
  <div class="col-sm-5">

  </div>

  <div class="col-sm-8">
  <select name="country" class="form-control selectpicker" data-live-search="true" data-width="100%">
  <?php
  foreach (countries_list() as $key => $value) {

  $selected = ($value['countryCode'] == offices_country_headoffice($u_owner_id) ) ? " selected " : "";

  echo "<option value=\"$value[countryCode]\" $selected >" . utf8_decode($value['countryName']) . "</option>";
  }
  ?>
  </select>
  </div>
  </div>

  <hr>



  <div class="form-group">
  <label class="control-label col-sm-2" for=""><?php _t("Telephone"); ?></label>
  <div class="col-sm-2">
  <input type="text"  name="tel_name" class="form-control" id="tel_name" placeholder="Office">
  </div>
  <div class="col-sm-6">
  <input type="text"  name="tel_data" class="form-control" id="tel_data" placeholder="+322621951">
  </div>
  </div>




  <div class="form-group">
  <label class="control-label col-sm-2" for="postcode"><?php _t('Transport'); ?></label>
  <div class="col-sm-8">
  <select class="form-control" name="transport_code">
  <?php foreach (transport_list() as $key => $transport) { ?>
  <option value="<?php echo "$transport[code]" ?>">
  <?php echo "$transport[name] - " . monedaf($transport['price']); ?>
  </option>
  <?php } ?>
  </select>
  </div>
  </div>




  <div class="form-group">
  <label class="control-label col-sm-2" for=""></label>
  <div class="col-sm-8">
  <input class="btn btn-primary active" type ="submit" value ="<?php _t("Next >>"); ?>">
  </div>
  </div>
  </form>


  <?php ############################################################  ?>


  </div>
  <div role="tabpanel" class="tab-pane active" id="registred">
  <?php ############################################################  ?>

  <p></p>

  <form class="form-horizontal" action="index.php" method="post" >
  <input type="hidden" name="c" value="shop">
  <input type="hidden" name="a" value="ok_3">
  <input type="hidden" name="name" value="<?php echo addresses_name()[0]; ?>">


  <div class="form-group">
  <label class="control-label col-sm-2" for="office_name"><?php _t("Office name"); ?></label>
  <div class="col-sm-8">
  <input
  type="text"
  name="office_name"
  class="form-control"
  id="office_name"
  placeholder=""
  required=""
  value="<?php echo $office_name; ?>"
  <?php
  // si es sede esto esta desactivado
  if( $office_id_work_for == $office_id_work_at ){
  echo " readonly ";
  }
  ?>

  >
  </div>
  </div>


  <div class="form-group">
  <label class="control-label col-sm-2" for=""><?php _t("Address"); ?></label>
  <div class="col-sm-2">
  <input type="text"  name="number" class="form-control" id="number" placeholder="Number" required="" value="<?php echo $ba['number']; ?>">
  </div>
  <div class="col-sm-6">
  <input type="text"  name="address" class="form-control" id="address" placeholder="Av. Louise" required="" value="<?php echo $ba['address']; ?>">
  </div>
  </div>






  <div class="form-group">
  <label class="control-label col-sm-2" for="postcode"></label>
  <div class="col-sm-2">
  <input type="text"  name="postcode" class="form-control" id="postcode" placeholder="1050" required="" value="<?php echo $ba['postcode']; ?>">
  </div>

  <div class="col-sm-3">
  <input type="text"  name="barrio" class="form-control" id="barrio" placeholder="Ixelles" required="" value="<?php echo $ba['barrio']; ?>">
  </div>

  <div class="col-sm-3">
  <input type="text"  name="city" class="form-control" id="city" placeholder="Bruxelles" required="" value="<?php echo $ba['city']; ?>">
  </div>
  </div>



  <div class="form-group">

  <label class="control-label col-sm-2" for="region"></label>
  <div class="col-sm-5">

  </div>

  <div class="col-sm-8">
  <select name="country" class="form-control selectpicker" data-live-search="true" data-width="100%">
  <?php
  foreach (countries_list() as $key => $value) {

  $selected = ($value['countryCode'] == offices_country_headoffice($u_owner_id) ) ? " selected " : "";

  echo "<option value=\"$value[countryCode]\" $selected >" . utf8_decode($value['countryName']) . "</option>";
  }
  ?>
  </select>
  </div>
  </div>

  <hr>



  <div class="form-group">
  <label class="control-label col-sm-2" for=""><?php _t("Telephone"); ?></label>
  <div class="col-sm-2">
  <input type="text"  name="tel_name" class="form-control" id="tel_name" placeholder="Office">
  </div>
  <div class="col-sm-6">
  <input type="text"  name="tel_data" class="form-control" id="tel_data" placeholder="+322621951">
  </div>
  </div>




  <div class="form-group">
  <label class="control-label col-sm-2" for="postcode"><?php _t('Transport'); ?></label>
  <div class="col-sm-8">
  <select class="form-control" name="transport_code">
  <?php foreach (transport_list() as $key => $transport) { ?>
  <option value="<?php echo "$transport[code]" ?>">
  <?php echo "$transport[name] - " . monedaf($transport['price']); ?>
  </option>
  <?php } ?>
  </select>
  </div>
  </div>




  <div class="form-group">
  <label class="control-label col-sm-2" for=""></label>
  <div class="col-sm-8">
  <input class="btn btn-primary active" type ="submit" value ="<?php _t("Next >>"); ?>">
  </div>
  </div>
  </form>


  <?php ############################################################  ?>

  </div>


  </div>

  </div>



 */
?>





<?php include "00_footer.php"; ?>