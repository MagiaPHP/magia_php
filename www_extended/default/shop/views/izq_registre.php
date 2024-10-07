
<h2><?php _t("Create new account"); ?></h2>

<p><?php _t("Do you want to create an account on this site?"); ?> <?php _t("Please follow the steps, read each of them carefully, once finished
We will notify you when the system is ready to be used by your company"); ?>

</p>


<ul class="list-group">

    <li class="list-group-item <?php echo($a == 1) ? 'list-group-item-info' : ""; ?>">
        <span class="glyphicon <?php echo ($company->getName()) ? "glyphicon-ok" : "glyphicon-question-sign"; ?>"></span>
        <a href="index.php?c=shop&a=1"><?php _t("Company name"); ?></a>
    </li>

    <?php
    /**
     *     <li class="list-group-item <?php echo($a == 11) ? 'list-group-item-info' : ""; ?>">
      <span class="glyphicon glyphicon-ok"></span>
      <a href="index.php?c=shop&a=11"><?php _t("Var number"); ?></a>
      </li>
     */
    ?>




    <li class="list-group-item <?php echo($a == 12) ? 'list-group-item-info' : ""; ?>">
        <span class="glyphicon <?php echo ($company->getAddresses('Billing')->getAddress() !== '') ? "glyphicon-ok" : "glyphicon-question-sign"; ?>"></span>
        <a href = "index.php?c=shop&a=12"><?php _t("Billing Address"); ?></a>
    </li>

    <li class="list-group-item <?php echo($a == 13) ? 'list-group-item-info' : ""; ?>">
        <span class="glyphicon <?php echo ($company->getDirectory('Email')) ? "glyphicon-ok" : "glyphicon-question-sign"; ?>"></span>
        <a href="index.php?c=shop&a=13"><?php _t("Company Directory"); ?></a>
    </li>

    <li class="list-group-item <?php echo($a == 14) ? 'list-group-item-info' : ""; ?>">
        <span class="glyphicon <?php echo ($company->getBanks()) ? "glyphicon-ok" : "glyphicon-question-sign"; ?>"></span>
        <a href="index.php?c=shop&a=14"><?php _t("Bank info"); ?></a>
    </li>

    <li class="list-group-item <?php echo($a == 2) ? 'list-group-item-info' : ""; ?>">
        <span class="glyphicon <?php echo (!$company->getEmployees()[0]->getName() || !$company->getEmployees()[0]->getLastname()) ? "glyphicon-question-sign" : "glyphicon-ok"; ?>"></span>
        <a href="index.php?c=shop&a=2"><?php _t("Name Lastname"); ?></a>
    </li>

    <li class="list-group-item <?php echo($a == 21) ? 'list-group-item-info' : ""; ?>">
        <span class="glyphicon <?php echo ($company->getEmployees()[0]->getDirectory("Email")) ? "glyphicon-ok" : "glyphicon-question-sign"; ?>"></span>
        <a href="index.php?c=shop&a=21"><?php _t("Directory Personal"); ?></a>
    </li>

    <li class="list-group-item <?php echo($a == 22) ? 'list-group-item-info' : ""; ?>">
        <span class="glyphicon <?php echo (!verifi_login_password($company->getEmployees()[0]->getDirectory("Email"), $company->getEmployees()[0]->getDirectory("Email"))) ? "glyphicon-ok" : "glyphicon-question-sign"; ?>"></span>
        <a href="index.php?c=shop&a=22"><?php _t("Password"); ?></a>
    </li>

    <?php
    /**
     *     <li class="list-group-item <?php echo($a == 3) ? 'list-group-item-info' : ""; ?>">
      <span class="glyphicon glyphicon-question-sign"></span>
      <a href="index.php?c=shop&a=3"><?php _t("Users"); ?></a>
      </li>

     */
    ?>


    <?php
    /**
     *     <li class="list-group-item <?php echo($a == 4) ? 'list-group-item-info' : ""; ?>">
      <span class="glyphicon glyphicon-question-sign"></span>
      <a href="index.php?c=shop&a=4"><?php _t("Condiciones de Venta"); ?></a>
      </li>
     */
    ?>


    <?php
    /**
     * 
     *     <li class="list-group-item <?php echo($a == 41) ? 'list-group-item-info' : ""; ?>">
      <span class="glyphicon glyphicon-question-sign"></span>
      <a href="index.php?c=shop&a=41"><?php _t("Logo"); ?></a>
      </li>
     *     <li class="list-group-item <?php echo($a == 42) ? 'list-group-item-info' : ""; ?>">
      <span class="glyphicon glyphicon-question-sign"></span>
      <a href="index.php?c=shop&a=42"><?php _t("Modelo Documentos"); ?></a>
      </li>
     *    
     */
    ?>

    <li class="list-group-item <?php echo($a == 6) ? 'list-group-item-info' : ""; ?>">
        <span class="glyphicon <?php echo (subdomains_search_by_unique('plan', 'subdomain', $company->getTva())) ? "glyphicon-ok" : "glyphicon-question-sign"; ?>"></span>
        <a href="index.php?c=shop&a=6"><?php _t("Membership"); ?></a>
    </li>



    <li class="list-group-item <?php echo($a == 7) ? 'list-group-item-info' : ""; ?>">
        <span class="glyphicon <?php echo ($company->Why_can_not_be_approved()) ? "glyphicon-question-sign" : "glyphicon-ok"; ?>"></span>
        <a href="index.php?c=shop&a=7"><?php _t("Resumen"); ?></a>
    </li>

    <?php if (budgets_search_by_client_id($u_owner_id)) { ?>
        <li class="list-group-item <?php echo($a == 8) ? 'list-group-item-info' : ""; ?>">
            <span class="glyphicon glyphicon-question-sign"></span>
            <a href="index.php?c=shop&a=8"><?php _t("Payment"); ?></a>
        </li>
    <?php } ?>

</ul>

<p class="text-right">
    <?php
    foreach (_languages_list_by_status(1) as $key => $lang) {
        if (users_field_contact_id('language', $u_id) == $lang['language']) {
            echo ' ' . _tr($lang['name']) . ' |';
        } else {
            echo ' <a href="index.php?c=shop&a=ok_update_language&language=' . $lang['language'] . '&redi=2">' . _tr($lang['name']) . '</a> |';
        }
    }
    ?>
<p>








    <?php // vardump($company->Why_can_not_be_approved()); ?>
    <?php // vardump($company);          ?>
    <?php // vardump($company->getName());     ?>
    <?php //vardump($company->getEmployees()[0]->getDirectory("Email")); ?>
    <?php //vardump($company->getEmployees()[0]->getName()); ?>
    <?php // vardump($company->getDirectory('Email')); ?>
    <?php //vardump($company->getBanks()); ?>
    <?php // vardump($company->getDirectoryAll()); ?>
    <?php // vardump($company->getDirectory('Email')); ?>
    <?php // vardump($company->why_can_not_be_approved()); ?>
    <?php // vardump(count($company->getBanks())); ?>
    <?php // vardump($company->getAddresses('Billing')->getAddress()); ?>


    <?php /**
      <p>
      <a href="index.php?c=shop&a=0">PAGE 0</a><br>
      <a href="index.php?c=shop&a=1">Pagina 1</a><br>
      <h3>Empresa</h3>
      <a href="index.php?c=shop&a=1">PAGE 1 Nombre empresa y tva</a><br>
      <a href="index.php?c=shop&a=11">PAGE 11 Tipo de empresa</a><br>
      <a href="index.php?c=shop&a=12">PAGE 12 direccion de la emporea</a><br>
      <a href="index.php?c=shop&a=123">PAGE 123 direccion de entrega</a><br>
      <a href="index.php?c=shop&a=13">PAGE 13 directorio de la emprea</a><br>
      <a href="index.php?c=shop&a=14">PAGE 14 Banco de la empresa</a><br>
      <h3>info personal</h3>
      <a href="index.php?c=shop&a=2">PAGE 2 Datos personales</a><br>
      <a href="index.php?c=shop&a=21">PAGE 21 Directorio personal</a><br>
      <a href="index.php?c=shop&a=22">PAGE 22 Registrar una clave</a><br>
      <a href="index.php?c=shop&a=25">PAGE 25???</a><br>
      <a href="index.php?c=shop&a=25_edit">PAGE 25_edit???</a><br>
      <a href="index.php?c=shop&a=2_details">PAGE 2_details ???</a><br>
      <a href="index.php?c=shop&a=2_edit">PAGE 2_edit????</a><br>
      <h3>Usuarios</h3>
      <a href="index.php?c=shop&a=3">PAGE 3Deseas dar acceso a otra persona?</a><br>
      <a href="index.php?c=shop&a=31">PAGE 31 Secretaria</a><br>
      <a href="index.php?c=shop&a=32">PAGE 32 dar aceeso al contador</a><br>
      <a href="index.php?c=shop&a=35">PAGE 35 ????</a><br>
      <a href="index.php?c=shop&a=3_edit">PAGE 3_edit ?????</a><br>
      <h3>Imagen empresarial</h3>
      <a href="index.php?c=shop&a=4">PAGE 4 Crear un logo </a><br>
      <a href="index.php?c=shop&a=41">PAGE 41 Condiciones de uso</a><br>
      <a href="index.php?c=shop&a=42">PAGE 42 Modelo pdf</a><br>

      <h3>Membresia y pago</h3>
      <a href="index.php?c=shop&a=5">PAGE 5 ???</a><br>
      <a href="index.php?c=shop&a=55">PAGE 55 ????</a><br>
      <a href="index.php?c=shop&a=57">PAGE 57 ???</a><br>
      <a href="index.php?c=shop&a=6">PAGE 6 Membresia</a><br>
      <a href="index.php?c=shop&a=7">PAGE 7 preview</a><br>
      <a href="index.php?c=shop&a=8">PAGE 8 pago</a><br>


      </p>






      <br>
      <br>
      <br>
      <br>
      <br>


      <div class="panel panel-default">
      <div class="panel-heading">
      <?php if ($office_id_work_for == $office_id_work_at) { ?>
      <a href="index.php?c=shop&a=1"><span class="glyphicon glyphicon-pencil"></span></a>
      <?php } ?>
      <?php _t("Company name"); ?>

      </div>
      <div class="panel-body">
      <h3><?php echo contacts_formated($office_id_work_for) ?></h3>
      <p><b><?php _t("TVA"); ?>:</b>
      <?php echo (isset($office_id_work_for)) ? contacts_field_id('tva', $office_id_work_for) : ""; ?></p>
      </div>
      </div>





      <?php if ($ba) { ?>

      <div class="panel panel-default">
      <div class="panel-heading">
      <?php if ($office_id_work_for == $office_id_work_at) { ?>
      <a href="index.php?c=shop&a=2"><span class="glyphicon glyphicon-pencil"></span></a>
      <?php } ?>
      <?php _t("Billing address"); ?>
      </div>
      <div class="panel-body">
      <p>
      <?php
      if (isset($ba)) {
      echo " $ba[number], $ba[address] <br> ";
      echo " $ba[postcode] $ba[barrio] <br> ";
      echo " $ba[city] $ba[country] <br> ";
      }
      ?>
      </p>
      </div>
      </div>
      <?php } ?>



      <?php
      /**
     * 
      <div class="panel panel-default">
      <div class="panel-heading">
      <a href="index.php?c=shop&a=3"><span class="glyphicon glyphicon-pencil"></span></a>
      <?php _t("Delivery address"); ?>

      </div>
      <div class="panel-body">

      <h4><?php echo contacts_field_id('name', $office_id_work_at); ?></h4>
      <p>

      <?php
      if (isset($da)) {
      echo " $da[number], $da[address] <br> ";
      echo " $da[postcode] $da[barrio] <br> ";
      echo " $da[city] $da[country] <br> ";
      }
      ?>
      </p>
      <p>
      <b><?php _t("Tel"); ?>: </b>
      <?php echo directory_list_by_contact_name($office_id_work_at, 'Tel') ?>
      </p>



      <?php _t("Transport"); ?> : <?php echo transport_field_code('name', $transport_code) ?>
      </div>
      </div>





      <?php // if( contacts_field_id("name", $u_id)){ ?>
      <div class="panel panel-default">
      <div class="panel-heading">
      <a href="index.php?c=shop&a=4"><span class="glyphicon glyphicon-pencil"></span></a>
      <?php _t("Personal info"); ?>
      </div>
      <div class="panel-body">
      <p>
      <?php echo contacts_formated($u_id); ?> <?php //echo users_field_contact_id("rol", $u_id) ?><br>
      <?php echo users_field_contact_id('login', $u_id) ?>
      </p>
      </div>
      </div>
      <?php // }  ?>




      <div class="panel panel-default">
      <div class="panel-heading">
      <a href="index.php?c=shop&a=5"><span class="glyphicon glyphicon-pencil"></span></a>
      <?php _t("Password"); ?>
      </div>
      <div class="panel-body">
      <p>
     * *****
      </p>
      </div>
      </div>


      <div class="panel panel-default">
      <div class="panel-heading">
      <?php _t("Status"); ?>
      </div>
      <div class="panel-body">
      <p>
      <?php echo _tr(contacts_status(contacts_field_id('status', $office_id_work_at))); ?>
      </p>
      </div>
      </div>



      <p>* <?php _t("Required"); ?></p>
      <hr>


     */ ?>