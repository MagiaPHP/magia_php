<!-- Website created by www.coello.be -->

<?php
/**
 * <meta charset="UTF-8" />
 * 
 * <link rel="shortcut icon" type=image/x-icon href=<?php echo $config_favicon; ?>>
  <?php vardump($config_favicon); ?>
 */
?>
<!-- Ignora la traduccion de Google Translate -->
<meta name="google" content="notranslate">


<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<?php # esto es para bootstrap  ?>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<?php # template de bootstrap  ?>
<link href="includes/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

<?php
$u_colors = (user_options('colors')) ?? "default";

if ($u_colors) {
    echo '<link href="includes/themeroller/' . $u_colors . '/bootstrap.min.css" rel="stylesheet" type="text/css"/>';
    echo "\n";
    echo '<link href="includes/themeroller/default/factux.css" rel="stylesheet" type="text/css"/>';
    echo "\n";
}
?>

<?php # Es el tema de base, con este funciona el calendario  en   ?>
<link href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css">

<link href="includes/fontawesome-5.13.1/css/all.css" rel="stylesheet" type="text/css"/>

<?php # para el select searhc in live    ?>
<link href="includes/bootstrap-select/1.13.9/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>
<script src="includes/bootstrap-select/1.13.9/js/bootstrap-select.min.js" type="text/javascript"></script>
<?php #/ para el select searhc in live    ?>
<?php #/ esto es para bootstrap   ?>

<?php
/*
 * Con este no me funcion el menu  
  <script src="includes/bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
  <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/f4aee34c3834515dd5345c940/604318d606b15454d3f634c7d.js");</script>
 */
?>             
<?php if (is_logued() && $c != "shop" && $c == "aboutxxxxxxx") { ?>
    <script type="text/javascript" id="hs-script-loader" async defer src="//js-na1.hs-scripts.com/20343268.js"></script>
<?php } ?>



<?php
/**
 * <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
 */
?>


<?php
/**
 * Esto para sortable las tablas
 * <link rel="stylesheet" href="hffffffffffffttps://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
 * 
 * 
 * Esto me da error, y no s epara que es
 * <script src="https://ajax.googsssleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 * <script src="https://cdnjs.cloudfssslare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
 * 
 */
?>



<?php
/**
 * ESto es para el campo textarea enriquecido
 * <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>

 * Que lo remplazamos por este 
 * https://github.com/JiHong88/suneditor
 * 
 * 
 * https://www.sceditor.com/documentation/getting-started/
 * 
 * https://www.sceditor.com/documentation/options/
 * 
 * <link href="includes/sceditor-3.2.0/minified/themes/default.min.css" rel="stylesheet" type="text/css"/>

  <script src="includes/sceditor-3.2.0/minified/sceditor.min.js" type="text/javascript"></script>
  <script src="includes/sceditor-3.2.0/minified/formats/bbcode.js" type="text/javascript"></script>
  <script src="includes/sceditor-3.2.0/minified/formats/xhtml.js" type="text/javascript"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sceditor@3/minified/themes/default.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sceditor@3/minified/sceditor.min.js"></script>
 * 
 *  */
?>

<?php /**
 * 
 *
  <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
 */ ?>



<?php
// iconos
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


                                    

<link href="includes/primeui-4.1.15/primeui.min.css" rel="stylesheet" type="text/css"/>
<script src="includes/primeui-4.1.15/primeui.min.js" type="text/javascript"></script>

<?php
/**
 * Esto es para la ventana emergente que agrega y oculta columnas en las tablas 
 */
?>


<link href="www_extended/default/home/views/css/form_show_col_from_table.css" rel="stylesheet" type="text/css"/>
<link href="www_extended/default/home/views/css/home.css" rel="stylesheet" type="text/css"/>


<title>Factuz - <?php echo $config_company_name; ?></title>
