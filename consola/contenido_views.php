<?php

function contenido_views($plugin, $archivo) {
    global $config_destino;

    switch ($archivo) {

        ## add.php
        case "add.php":
            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);
            $contenido .= "?>\n";
            $contenido .= '<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
 ';
            $contenido .= ($config_destino == "www") ?
                    '       <?php // include view("' . $plugin . '", "izq_add"); ?>' :
                    '       <?php // include "izq.php"; ?>';
            $contenido .= '</div>

    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
        <h1>
            <?php _menu_icon("top" , \'' . $plugin . '\'); ?> 
            <?php _t("Add"); ?>
        </h1>
        ';

            $contenido .= ($config_destino == "www") ?
                    '<?php include view("' . $plugin . '", "form_add", $arg = ["redi" => 1]); ?>' :
                    '<?php  include "form_add.php"; ?>';
            $contenido .= '
    </div>

    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            ';
            $contenido .= ($config_destino == "www") ?
                    '<?php // include view("' . $plugin . '", "der_add"); ?>' :
                    '<?php // include "der.php"; ?>';
            $contenido .= '
        
    </div>
</div>

<?php include view("home", "footer"); ?>

';
            break;

        ## delete.php
        case "delete.php":
            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);
            $contenido .= "?>\n";
            $contenido .= '<?php include view("home", "header"); ?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
            ';
            $contenido .= ($config_destino == "www") ?
                    '<?php // include view("' . $plugin . '", "izq_delete"); ?>' :
                    '<?php // include "izq.php"; ?>';
            $contenido .= '
    </div>

    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
        <h1>
            <?php _menu_icon("top" , \'' . $plugin . '\'); ?> 
           <?php _t("Delete ' . remove_underscores($plugin) . '"); ?>
        </h1>
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
 ';
            $contenido .= ($config_destino == "www") ?
                    '<?php include view("' . $plugin . '", "form_delete" , $arg = ["redi" => 1] ); ?>' :
                    '<?php include "form_delete.php"; ?>';
            $contenido .= '

    </div>

    <div class="col-sm-12 col-md-3 col-lg-3">
 ';
            $contenido .= ($config_destino == "www") ?
                    '<?php // include view("' . $plugin . '", "der_delete"); ?>' :
                    '<?php // include "der.php"; ?>';
            $contenido .= '
    </div>
</div>
<?php include view("home", "footer"); ?>
';
            break;

        ## details.php
        case "details.php":
            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);
            $contenido .= "?>\n";
            $contenido .= '<?php  include view("home", "header"); ?> 

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
 ';
            $contenido .= ($config_destino == "www") ?
                    '       <?php // include view("' . $plugin . '", "izq_details"); ?>' :
                    '       <?php // include "izq.php"; ?>';
            $contenido .= '
    </div>

    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
        <h1>
            <?php _menu_icon("top" , \'' . $plugin . '\'); ?>
           <?php _t("' . ucfirst(remove_underscores($plugin)) . ' details"); ?>
        </h1>
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
 ';
            $contenido .= ($config_destino == "www") ?
                    '       <?php include view("' . $plugin . '", "form_details"  , $arg = ["redi" => 1]  ); ?>' :
                    '       <?php include "form_details.php"; ?>';
            $contenido .= '
    </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

 ';
            $contenido .= ($config_destino == "www") ?
                    '       <?php  // include view("' . $plugin . '", "der_details"); ?>' :
                    '       <?php // include "der.php"; ?>';
            $contenido .= '
    </div>
</div>

<?php include view("home", "footer"); ?>
';
            break;

        ## edit.php
        case "edit.php":
            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);
            $contenido .= "?>\n";
            $contenido .= '
<?php include view("home", "header"); ?>                

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">      
         ';
            $contenido .= ($config_destino == "www") ?
                    '<?php // include view("' . $plugin . '", "izq_edit"); ?>' :
                    '<?php // include "izq.php"; ?>';
            $contenido .= '
    </div>

    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
        <h1>
            <?php _menu_icon("top" , \'' . $plugin . '\'); ?>
            <?php _t("Edit"); ?>
        </h1>
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>            
 ';
            $contenido .= ($config_destino == "www") ?
                    '<?php include view("' . $plugin . '", "form_edit"  , $arg = ["redi" => 1] ); ?>' :
                    '<?php include "form_edit.php"; ?>';
            $contenido .= '
    </div>

    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
 ';
            $contenido .= ($config_destino == "www") ?
                    '<?php // include view("' . $plugin . '", "der_edit"); ?>' :
                    '<?php // include "der.php"; ?>';
            $contenido .= '
    </div>
</div>

<?php include view("home", "footer"); ?>
';
            break;

        ## export_json.php
        case "export_json.php":
            $contenido = '<?php';
            $contenido .= logo();
            $contenido .= al(80);
            $contenido .= '//
header("Content-type: application/json");
echo json_encode($' . $plugin . ');

';
            break;

        ## export_pdf.php
        case "export_pdf.php":
            $contenido = "<?php \n";

            $contenido .= logo();
            $contenido .= al(80);

            $contenido .= "// \n";
            $contenido .= "// \n";
            $contenido .= 'require("includes/fpdf185/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage("P");
$pdf->SetFont("Arial","B",16);
$pdf->Cell(0,10,"' . $plugin . ' !", 1,1,"C");
$pdf->SetFont("Arial","B",12);
$pdf->Cell(40,10,"Edit file: ' . $plugin . '/views/export_pdf.php !");
$pdf->Output();
';
            break;

        ## form_add.php
        case "form_add.php":
            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);

            $contenido .= "?>\n";
            $contenido .= '<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="' . $plugin . '">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"] ?? 1 ; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
';
            ####################################################################
            ####################################################################
            ####################################################################
            ####################################################################

            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {

                // Mostrar detalles de la columna para depuración
                var_dump($columna);
                var_dump($columna['Extra']);

                // Obtener referencias de la base de datos
                $bdd_referencias = bdd_referencias($plugin, $columna['Field']);
                $bdd_ref_tabla_externa = $bdd_referencias['REFERENCED_TABLE_NAME'] ?? false;
                $bdd_col_externa = $bdd_referencias['REFERENCED_COLUMN_NAME'] ?? false;

                // Inicialización de variables con valores predeterminados
                $marca_agua = $columna['Field'] ?? '';
                $valor = $columna['Default'] ?? '';
                $campos_tipo = campos_tipo($columna['Type']);
                $nombre = $columna['Field'];
                $id = $nombre;  // El id es el mismo que el nombre en este contexto
                // Determinación de si el campo es requerido
                $is_null = ($columna['Null'] === 'YES');
                $required = $is_null ? false : ' required="" ';
                $required_label = $required ? ' * ' : '';

                // Comentarios del campo
                $comments = $columna['Comment'] ?? false;

                // Crear campos según tipo
                $campo_select = campos_crear_campo("select", $nombre, $id, "form-control", $marca_agua, '""', false, $columna);
                $campo = ($campos_tipo === 'boolean') ? campos_crear_campo('boolean_add', $nombre, $id, 'form-control', $marca_agua, $valor, false, $columna) : campos_crear_campo($campos_tipo, $nombre, $id, 'form-control', $marca_agua, $valor, false, $columna);

                // Excluir ciertos campos de procesamiento adicional
                if ($columna['Field'] !== 'id' && !in_array($columna['Extra'], ['STORED GENERATED', 'VIRTUAL'])) {

                    //
                    //
                    //
                    $contenido .= "    <!-- mg_start $nombre -->\n";

                    // Excluir campos específicos del procesamiento adicional
                    if (!in_array($columna['Field'], ['date_registre', 'order_by', 'status'])) {
                        $contenido .= <<<HTML
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="$id"><?php _t(ucfirst("{$nombre}")); ?> $required_label</label>
                                <div class="col-sm-8">
                        HTML;

                        $contenido .= $bdd_ref_tabla_externa ? "               $campo_select" : "            $campo";
                        $contenido .= "\n";
                        $contenido .= $comments ? '<p class="help-block"><?php echo _tr("' . $comments . '"); ?></p>' : '';
                        $contenido .= "</div>\n    </div>\n";

                        $contenido .= "    <!-- mg_end $nombre -->\n\n";
                    }
                }
            }

            ####################################################################
            ####################################################################
            ####################################################################
            ####################################################################
            ####################################################################

            $contenido .= '  
    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus");  ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>   

<p>* <?php _t("Required"); ?></p>

</form>
';

            break;

        ## form_delete.php
        case "form_delete.php":
            $contenido = "<?php \n";

            $contenido .= logo();
            $contenido .= al(80);

            $contenido .= "?>\n";

            $contenido .= '<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="' . $plugin . '">
    <input type="hidden" name="a" value="ok_delete">
    <input type="hidden" name="id" value="<?php echo $' . $plugin . '->getId(); ?>">

    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">

    ';

            ####################################################################
            ####################################################################
            ####################################################################
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
                $bdd_referencias = bdd_referencias($plugin, $columna['Field']);
                $bdd_ref_tabla_externa = (isset($bdd_referencias['REFERENCED_TABLE_NAME'])) ? $bdd_referencias['REFERENCED_TABLE_NAME'] : false;
                $bdd_col_externa = (isset($bdd_referencias['REFERENCED_COLUMN_NAME'])) ? $bdd_referencias['REFERENCED_COLUMN_NAME'] : false;

                //echo ($bdd_ref_tabla_externa) ? $bdd_ref_tabla_externa . '\n' : false;
                //echo ($bdd_col_externa) ? $bdd_col_externa . '\n' : false;
                // 
                $marca_agua = ($columna['Field']) ? $columna['Field'] : "";

//                $valor = ($columna['Default']) ? $columna['Default'] : "";


                $valor = '<?php echo $' . $plugin . '->get' . ucfirst($columna['Field']) . '(); ?>';

//                $valor = '$' . $plugin . '[\'' . $columna['Field'] . '\']';
                $campos_tipo = campos_tipo($columna['Type']);
                $nombre = $columna['Field'];
                $id = $columna['Field'];
//
                $campo_select = campos_crear_campo("select", $nombre, $id, "form-control", $marca_agua, '$' . $plugin . '->get' . ucfirst($columna['Field']) . '()', true, $columna);
                // Campo
                $campo = campos_crear_campo($campos_tipo, $nombre, $id, 'form-control', $marca_agua, $valor, true, $columna);
                //*************************************************************
                if ($columna['Field'] != 'id') {
                    $contenido .= '    <?php # ' . $nombre . ' ?>' . "\n";
                    $contenido .= '    <div class="form-group">
        <label class="control-label col-sm-3" for="' . $id . '"><?php _t("' . ucfirst($nombre) . '"); ?></label>
        <div class="col-sm-8">' . "\n";
                    $contenido .= ( $bdd_ref_tabla_externa ) ? "               " . $campo_select : "            " . $campo;
                    $contenido .= "\n        </div>	
    </div>" . "\n";
                    $contenido .= '    <?php # /' . $nombre . ' ?>' . "\n\n";
                    // echo "\n\n";
                }
            }
            ####################################################################
            ####################################################################
            ####################################################################

            $contenido .= '

    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-danger active" type ="submit" value ="<?php _t("Delete"); ?>">
        </div>      							
    </div>      							

</form>

';
            break;

        ## form_details.php
        case "form_details.php":

            $contenido = "<?php \n";

            $contenido .= logo();
            $contenido .= al(80);

            $contenido .= "?>\n";

            $contenido .= '<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="' . $plugin . '">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo $' . $plugin . '->getId(); ?>">
    ';

            ////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////
            /**
              foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
              // $contenido .= 'echo "<td>$' . $plugin . '[' . $columna['Field'] . ']</td>";' . "\n";
              $contenido .= '<?php # ' . $columna['Field'] . ' ?>' . "\n";
              $contenido .= '<div class="form-group">
              <label class="control-label col-sm-2" for="contact_id"><?php _t("' . ucfirst($columna['Field']) . '"); ?></label>
              <div class="col-sm-8">
              <input type="' . $columna['Field'] . '" name="' . $columna['Field'] . '" class="form-control"  id="' . $columna['Field'] . '" placeholder="' . $columna['Field'] . '" value="<?php echo "$' . $plugin . '[' . $columna['Field'] . ']"; ?>" disabled="" >
              </div>
              </div>' . "\n";
              $contenido .= '<?php # ' . $columna['Field'] . ' ?>' . "\n\n";
              }
             * 
             */
            ////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////
            ####################################################################
            ####################################################################
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
                $bdd_referencias = bdd_referencias($plugin, $columna['Field']);
                $bdd_ref_tabla_externa = (isset($bdd_referencias['REFERENCED_TABLE_NAME'])) ? $bdd_referencias['REFERENCED_TABLE_NAME'] : false;
                $bdd_col_externa = (isset($bdd_referencias['REFERENCED_COLUMN_NAME'])) ? $bdd_referencias['REFERENCED_COLUMN_NAME'] : false;

                //echo ($bdd_ref_tabla_externa) ? $bdd_ref_tabla_externa . '\n' : false;
                //echo ($bdd_col_externa) ? $bdd_col_externa . '\n' : false;
                // 
                $marca_agua = ($columna['Field']) ? $columna['Field'] : "";
                //$valor = ($columna['Default']) ? $columna['Default'] : "";

                $valor = '<?php echo $' . $plugin . '->get' . ucfirst($columna['Field']) . '(); ?>';

                $campos_tipo = campos_tipo($columna['Type']);
                $nombre = $columna['Field'];
                $id = $columna['Field'];
//
                $campo_select = campos_crear_campo("select", $nombre, $id, "form-control", $marca_agua, '$' . $plugin . '->get' . ucfirst($columna['Field']) . '()', true, $columna);
                // Campo
                $campo = campos_crear_campo($campos_tipo, $nombre, $id, 'form-control', $marca_agua, $valor, true, $columna);
                //*************************************************************
                if ($columna['Field'] != 'id') {
                    $contenido .= '    <?php # ' . $nombre . ' ?>' . "\n";
                    $contenido .= '    <div class="form-group">
        <label class="control-label col-sm-3" for="' . $id . '"><?php _t("' . ucfirst(remove_underscores($nombre)) . '"); ?></label>
        <div class="col-sm-8">' . "\n";
                    $contenido .= ( $bdd_ref_tabla_externa ) ? "               " . $campo_select : "            " . $campo;
                    $contenido .= "\n        </div>	
    </div>" . "\n";
                    $contenido .= '    <?php # /' . $nombre . ' ?>' . "\n\n";
                    //   echo "\n\n";
                }
            }
            ####################################################################
            ####################################################################
            ####################################################################



            $contenido .= '
    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            
            <button type="submit" class="btn btn-default"><?php echo icon("pencil");  ?> <?php _t("Edit"); ?></button>

        </div>      							
    </div>      							

</form>

';
            break;

        ## form_edit.php
        case "form_edit.php":

            $contenido = "<?php \n";

            $contenido .= logo();
            $contenido .= al(80);

            $contenido .= "?>\n";

            $contenido .= '<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="' . $plugin . '">
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo $' . $plugin . '->getId(); ?>">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">

    ';
            /**
              foreach (bdd_columnas_segun_tabla($plugin) as $columna) {


              if ($columna['Field'] != 'id') {
              // $contenido .= 'echo "<td>$' . $plugin . '[' . $columna['Field'] . ']</td>";' . "\n";
              $contenido .= '<?php # ' . $columna['Field'] . ' ?>' . "\n";
              $contenido .= '<div class="form-group">
              <label class="control-label col-sm-2" for="' . $columna['Field'] . '"><?php _t("' . ucfirst($columna['Field']) . '"); ?></label>
              <div class="col-sm-8">
              <input type="text" name="' . $columna['Field'] . '" class="form-control"  id="' . $columna['Field'] . '" placeholder="' . $columna['Field'] . '" value="<?php echo "$' . $plugin . '[' . $columna['Field'] . ']"; ?>" >
              </div>
              </div>' . "\n";
              $contenido .= '<?php # /' . $columna['Field'] . ' ?>' . "\n\n";
              }
              }
             * 
             */
            ####################################################################
            ####################################################################
            ####################################################################
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
                $bdd_referencias = bdd_referencias($plugin, $columna['Field']);
                $bdd_ref_tabla_externa = (isset($bdd_referencias['REFERENCED_TABLE_NAME'])) ? $bdd_referencias['REFERENCED_TABLE_NAME'] : false;
                $bdd_col_externa = (isset($bdd_referencias['REFERENCED_COLUMN_NAME'])) ? $bdd_referencias['REFERENCED_COLUMN_NAME'] : false;

                //echo ($bdd_ref_tabla_externa) ? $bdd_ref_tabla_externa . '\n' : false;
                //echo ($bdd_col_externa) ? $bdd_col_externa . '\n' : false;
                // 
                $marca_agua = ($columna['Field']) ? $columna['Field'] : "";
                $valor = ($columna['Default']) ? $columna['Default'] : "";
                $valor = '<?php echo $' . $plugin . '[\'' . $columna['Field'] . '\']; ?>';

                $valor = '<?php echo $' . $plugin . '->get' . ucfirst($columna['Field']) . '(); ?>';

                $campos_tipo = campos_tipo($columna['Type']);
                $nombre = $columna['Field'];
                $id = $columna['Field'];
//
                $campo_select = campos_crear_campo("select", $nombre, $id, "form-control", $marca_agua, '$' . $plugin . '->get' . ucfirst($columna['Field']) . '()', false, $columna);
                // Campo
                $campo = campos_crear_campo($campos_tipo, $nombre, $id, 'form-control', $marca_agua, $valor, false, $columna);
                //*************************************************************
                // ni id 
                // ni culumnas generadas automaticametne 
                //
                //
                if ($columna['Field'] != 'id' && $columna['Extra'] != 'STORED GENERATED' && $columna['Extra'] != 'VIRTUAL') {
                    $contenido .= '    <?php # ' . $nombre . ' ?>' . "\n";
                    $contenido .= '    <div class="form-group">
        <label class="control-label col-sm-3" for="' . $id . '"><?php _t("' . ucfirst($nombre) . '"); ?></label>
        <div class="col-sm-8">' . "\n";
                    $contenido .= ( $bdd_ref_tabla_externa ) ? "               " . $campo_select : "            " . $campo;
                    $contenido .= "\n        </div>	
    </div>" . "\n";
                    $contenido .= '    <?php # /' . $nombre . ' ?>' . "\n\n";
                    //echo "\n\n";
                }
            }
            ####################################################################
            ####################################################################
            ####################################################################

            $contenido .= '
    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("pencil");  ?> <?php _t("Edit"); ?></button>
        </div>      							
    </div>      							

</form>

';
            break;

        ## form_search.php
        case "form_search.php":
            $contenido = "<?php \n";

            $contenido .= logo();
            $contenido .= al(80);

            $contenido .= "?>\n";

            $contenido .= '<form action="index.php" method="get" class="navbar-form navbar-left">
    <input type="hidden" name="c" value="' . $plugin . '">
    <input type="hidden" name="a" value="search">
    
    <div class="form-group">
        <input type="text" name="txt" class="form-control" placeholder="">
    </div>
    
    <button type="submit" class="btn btn-default"><?php echo icon("search");  ?> <?php _t("Search"); ?></button>
    
</form>';

            $contenido .= '';
            break;

        ## modal_index_cols_to_show.php
        case "modal_index_cols_to_show.php":
            $contenido = "<?php \n";

            $contenido .= logo();
            $contenido .= al(80);

            $contenido .= "?>\n";

            $contenido .= '<a href="#"
   data-toggle="modal" data-target="#myModal_' . $plugin . '_index_cols_to_show"
   >
       <?php echo icon("wrench"); ?>
</a>

<div class="modal fade" id="myModal_' . $plugin . '_index_cols_to_show" tabindex="-1" role="dialog" aria-labelledby="myModal_' . $plugin . '_index_cols_to_showLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModal_' . $plugin . '_index_cols_to_showLabel">
                    <?php _t("Cols to show"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <?php 
                
            // $arg["redi"] = "5";
            // $arg["c"] = "contacts";
            // $arg["a"] = "veh_vehicles_drivers";
            // $arg["params"] = "id=$id";
            // $arg["driver_id"] = $id;

            include "form_index_cols_to_show.php"; ?>
            
            </div>
        </div>
    </div>
</div>

';

            $contenido .= '';
            break;

        ## form_index_cols_to_show.php
        case "form_index_cols_to_show.php":
            $contenido = "<?php \n";

            $contenido .= logo();
            $contenido .= al(80);

            $contenido .= "?>\n";

            $contenido .= '<form method="post" action="index.php">
    <input type="hidden" name="c" value="' . $plugin . '">
    <input type="hidden" name="a" value="ok_index_cols_to_show">
    <input type="hidden" name="redi[redi]" value="2">

    <?php
    $' . $plugin . '_db_col_list_from_table = ' . $plugin . '_db_col_list_from_table($c);

    //Agrego a las columnas las de l directroy
    $array_btn = array(
        "button_details",
        //"button_pay",
        "button_edit",
        "modal_edit",
        "button_delete",
        "modal_delete",
        "button_print",
        "button_save",
    );
    foreach ($array_btn as $key => $button) {
        array_push($' . $plugin . '_db_col_list_from_table, $button);
    }

    $i = 0;

    foreach ($' . $plugin . '_db_col_list_from_table as $key => $cdbcts) {




     // $' . $plugin . '_index_cols_to_show_array = json_decode(_options_option("' . $plugin . '_index_cols_to_show"), true);
            
        
        $config_' . $plugin . '_show_col_json = _options_option("config_' . $plugin . '_show_col_from_table");

        
        $checked_array = is_json($config_' . $plugin . '_show_col_json) ? json_decode($config_' . $plugin . '_show_col_json, true) : [];

        //




        if ($' . $plugin . '_index_cols_to_show_array) {
            
            $checked = ( in_array($cdbcts, $' . $plugin . '_index_cols_to_show_array) ) ? " checked " : "";
        } else {
            $checked = "";
        }
        echo \'
                        <div class="row">                            
                            <div class="col-xs-6 col-md-6 col-lg-6">
                                 <div class="checkbox">
                                    <label>
                                      <input type="checkbox" name="data[]" value="\' . $cdbcts . \'" \' . $checked . \' > \' . _tr(ucfirst($cdbcts)) . \'
                                    </label>
                                  </div>                              
                            </div>
                        </div>
                        
\';
    }
    ?>

    <button type="submit" class="btn btn-default">
        <?php echo icon("ok"); ?> 
        <?php _t("Submit"); ?>
    </button>

</form>';

            $contenido .= '';
            break;

        ## form_search_advanced.php.php
        case "form_search_advanced.php":
            $contenido = "<?php \n";

            $contenido .= logo();
            $contenido .= al(80);

            $contenido .= "?>\n";

            $contenido .= '<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="' . $plugin . '">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


    ';

            ####################################################################
            ####################################################################
            ####################################################################
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {

                //REFERENCED_TABLE_NAME, 
                //REFERENCED_COLUMN_NAME 
                $bdd_referencias = bdd_referencias($plugin, $columna['Field']);

                $bdd_ref_tabla_externa = (isset($bdd_referencias['REFERENCED_TABLE_NAME'])) ? $bdd_referencias['REFERENCED_TABLE_NAME'] : false;
                $bdd_col_externa = (isset($bdd_referencias['REFERENCED_COLUMN_NAME'])) ? $bdd_referencias['REFERENCED_COLUMN_NAME'] : false;

                //echo ($bdd_ref_tabla_externa) ? $bdd_ref_tabla_externa . '\n' : false;
                //echo ($bdd_col_externa) ? $bdd_col_externa . '\n' : false;

                $marca_agua = ($columna['Field']) ? $columna['Field'] : "";
                $valor = ($columna['Default']) ? $columna['Default'] : "";
                $valor = '<?php echo $' . $plugin . '[\'' . $columna['Field'] . '\']; ?>';

                $valor = '<?php echo $' . $plugin . '->get' . ucfirst($columna['Field']) . '(); ?>';

                $campos_tipo = campos_tipo($columna['Type']);
                $nombre = $columna['Field'];
                $id = $columna['Field'];
//                campos_crear_campo($tipo, $nombre, $id, $clase, $marca_agua, $valor, $desactivo, $columna)
                //--------------------------------------------------------------
                $campo_select = campos_crear_campo("select", $nombre, $id, "form-control", $marca_agua, '$' . $plugin . '->get' . ucfirst($columna['Field']) . '()', false, $columna);
                // Campo
                $campo = campos_crear_campo($campos_tipo, $nombre, $id, 'form-control', $marca_agua, false, false, $columna);

                if ($columna['Field'] != 'id') {
                    $contenido .= '    <?php # ' . $nombre . ' ?>' . "\n";
                    $contenido .= '    <div class="form-group">
        <label class="control-label col-sm-3" for="' . $id . '"><?php _t("' . ucfirst($nombre) . '"); ?></label>
        <div class="col-sm-8">' . "\n";
                    $contenido .= ( $bdd_ref_tabla_externa ) ? "               " . $campo_select : "            " . $campo;
                    $contenido .= "\n        </div>	
    </div>" . "\n";
                    $contenido .= '    <?php # /' . $nombre . ' ?>' . "\n\n";
                    //echo "\n\n";
                }
            }

            ####################################################################
            ####################################################################
            ####################################################################

            $contenido .= '

    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("pencil");  ?> <?php _t("Edit"); ?></button>
        </div>      							
    </div>      							

</form>
';
            break;

        ## 
        case "form_search_simple.php":
            $contenido = "<?php \n";

            $contenido .= logo();
            $contenido .= al(80);

            $contenido .= "?>\n";

            $contenido .= '
                
<form action="index.php" method="get" class="navbar-form navbar-left">
    <input type="hidden" name="c" value="' . $plugin . '">
    <input type="hidden" name="a" value="search">

    <div class="form-group">
        <input 
            autofocus=""
            type="text" 
            name="txt" 
            class="form-control" 
            placeholder=""
            required=""
            value="<?php echo (isset($txt)) ? $txt : ""; ?>"
            >
    </div>

    <button 
        type="submit" 
        class="btn btn-default">

        <?php echo icon("search"); ?>

        <?php _t("Search"); ?>
    </button>
</form>

';
            break;

        case "form_search_simple_multi.php":
            $contenido = "<?php \n";

            $contenido .= logo();
            $contenido .= al(80);

            $contenido .= "?>\n";

            $contenido .= '
                
<form action="index.php" method="get" class="navbar-form navbar-left">
    <input type="hidden" name="c" value="' . $plugin . '">
    <input type="hidden" name="a" value="search">

    <div class="form-group">
        <input 
            autofocus=""
            type="text" 
            name="txt" 
            class="form-control" 
            placeholder=""
            required=""
            value="<?php echo (isset($txt)) ? $txt : ""; ?>"
            >
    </div>


    <div class="form-group">

        <?php
        /**
         * Si es multi tva, debo tener las oficionas 
         */
        if (IS_MULTI_VAT) {
            ?>
            <?php # owner_id  ?>
            <select class="form-control" name="owner_id" id="owner_id">
                <option value="all"><?php _t("All offices"); ?></option>
                <?php
                foreach (offices_list_by_headoffice(u_owner_id()) as $key => $office) {                                                            
                    echo \'<option value="\' . $office[\'id\'] . \'">\' . contacts_formated($office[\'id\']) . \'</option>\';
                }
                ?>
            </select>
            <?php # /owner_id   ?>
        <?php }
        ?>
    </div>

    <button 
        type="submit" 
        class="btn btn-default">
        <?php echo icon("search"); ?>
        <?php _t("Search"); ?>
    </button>
</form>

';
            break;

        ## form_pagination_items_limit.php
        case "form_pagination_items_limit.php":
            $contenido = "<?php \n";

            $contenido .= logo();
            $contenido .= al(80);

            $contenido .= "?>\n";

            $contenido .= '

<form class="form-inline" method="post" action="index.php">

    <input type="hidden" name="c" value="user_options">
    <input type="hidden" name="a" value="ok_push">                                                         
    <input type="hidden" name="option" value="' . $plugin . '_pagination_items_limit">                                                         
        
    <input type="hidden" name="redi[redi]" value="5">                                                          
    <input type="hidden" name="redi[c]" value="' . $plugin . '">                                                          
    <input type="hidden" name="redi[a]" value="index">                                                          

    <div class="form-group">
        <label class="sr-only" for="data"><?php _t("Data"); ?></label>
        <div class="input-group">                    
            <input 
                type="text" 
                class="form-control" 
                id="data" 
                name="data" 
                placeholder="" 
                value="<?php echo user_options("' . $plugin . '_pagination_items_limit", $u_id); ?>"> 

            <div class="input-group-addon"><?php _t("items / page"); ?></div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">
        <?php _t("Update"); ?>
    </button>
</form>





';

            break;

        case "form_show_col_from_table.php":
            $contenido = "<?php \n";

            $contenido .= logo();
            $contenido .= al(80);

            $contenido .= "?>\n";

            $contenido .= '
                


<form action="index.php" method="post" id="columns-form">
    <input type="hidden" name="c" value="' . $plugin . '">
    <input type="hidden" name="a" value="ok_show_col_from_table">
    <input type="hidden" name="redi[redi]" value="1">

    <ul id="column-list">
        <?php
        // Obtener columnas utilizando la función mejorada
        $colsSelectedOrdered = ' . $plugin . '_get_user_or_default_columns();  // Usar la función renombrada
        // Mostrar las columnas en el formulario
        foreach ($colsSelectedOrdered as $index => $col) {
        
            $isChecked = isset($col["show"]) && $col["show"] ? " checked " : "";
            
            $col_name = isset($col["col_name"]) ? htmlspecialchars($col["col_name"]) : $index;
                
            $label = isset($col["label"]) ? htmlspecialchars($col["label"]) : $index;

            echo "<li draggable=\"true\" data-index=\"$index\">";

            // Contenedor para checkbox y texto alineados a la izquierda
            echo "<div class=\"left-content\">";
            echo "<input type=\"checkbox\" name=\"columns[$index][show]\" value=\"1\" $isChecked> ";
            echo "<input type=\"hidden\" name=\"columns[$index][col_name]\" value=\"" . htmlspecialchars($col_name) . "\"> ";
            echo "<input type=\"hidden\" name=\"columns[$index][label]\" value=\"" . htmlspecialchars($label) . "\"> ";
            echo "<input type=\"hidden\" name=\"columns[$index][position]\" value=\"$index\"> ";
            echo htmlspecialchars($label);
            echo "</div>";

            // Botón de eliminar alineado a la derecha
            echo "<button type=\"button\" class=\"btn btn-danger btn-sm remove-column\">" . _tr("Delete") . "</button>";

            echo "</li>";
        }
        ?>
    </ul>
    <br>
    
    
    <select id="predefined-columns" class="form-control">
        <option value="" disabled selected><?php echo _tr("Select a column to add"); ?></option>
        <?php
        // Agregar columnas desde la base de datos
        $columns = db_cols_from_table("' . $plugin . '"); // Obtener columnas de la tabla de la base de datos
        if ($columns) {
            foreach ($columns as $key => $col) {
                // Mostrar cada columna como una opción en el select
                echo \'<option value="\' . htmlspecialchars($col[\'Field\']) . \'" title="\' . _tr("This is a predefined column") . \'">\' . ucfirst($col[\'Field\']) . \'</option>\';
            }
        }
        // Agregar columnas manualmente definidas
        ?>
        <option value="total_plus_vat" title="<?php echo _tr("Total amount plus vat"); ?>">Total plus vat</option>
        <option value="to_returned" title="<?php echo _tr("Amount to be returned"); ?>">To returned</option>
        <option value="counter" title="<?php echo _tr("Counter"); ?>">Counter</option>
        <option value="document_number" title="<?php echo _tr("Document Number"); ?>">Document Number</option>
        
        <option value="button_details" title="<?php echo _tr("Button details"); ?>">Button details</option>
        <option value="button_edit" title="<?php echo _tr("Button edit"); ?>">Button edit</option>
        <option value="button_delete" title="<?php echo _tr("Button delete"); ?>">Button delete</option>
        <option value="button_print" title="<?php echo _tr("Button print"); ?>">Button print</option>
        <option value="button_save" title="<?php echo _tr("Button save"); ?>">Button save</option>
        
        <option value="modal_delete" title="<?php echo _tr("Modal delete"); ?>">Modal delete</option>
        



    </select>

    <br>

    <button type="button" id="add-column-btn" class="btn btn-secondary"><?php echo icon("plus"); ?> <?php echo _tr("Add column"); ?></button>

    <input type="hidden" id="selected-columns" name="selected_columns">

    <input class="btn btn-primary" type="submit" value="<?php _t("Save"); ?>">

</form>



';

            break;

        ## index.php
        case "index.php":

            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);
            $contenido .= "?>\n";

            $contenido .= '<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
 ';
            $contenido .= ($config_destino == "www") ?
                    '<?php include view("' . $plugin . '", "izq"); ?>' :
                    '<?php include "izq.php"; ?>';
            $contenido .= '
    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">
        ';
            $contenido .= ($config_destino == "www") ?
                    '<?php include view("' . $plugin . '", "nav"); ?>' :
                    '<?php include "nav.php"; ?>';
            $contenido .= '


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <?php // include view("' . $plugin . '", "top"); ?>
';

            $contenido .= ($config_destino == "www") ?
                    '        <?php
        if ($' . $plugin . ') {
            include view("' . $plugin . '", "table_index");
        } else {
            message("info", "No items");
        }
        ?>' :
                    '<?php include "table_index.php"; ?>';

            $contenido .= '
                
    <div class="container-fluid">
        <div class="col-sm-12 col-md-6 col-lg-6">
            <?php
                $pagination->createHtml();
            ?>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 text-right">
            <?php
            include view($c, "form_pagination_items_limit");
            ?>
        </div>
        </div>
    </div>
</div>

<?php include view("home", "footer"); ?> 
';
            break;

        ## izq.php.php
        case "izq.php":

            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);
            $contenido .= "?>\n";

            $contenido .= '
                
<?php
foreach (panels_search_controller_action_status($c, "index", 1) as $key => $pscas) {
    $panel = new Panels();
    $panel->setPanels($pscas["id"]);
    include $panel->getPanel() . ".php";
}
?>
<?php if (permissions_has_permission($u_rol, "config", "update") && modules_field_module("status", "panels")) { ?>

    <?php  include view("panels", "panel_form_ok_show") ?>

<?php } ?>



<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , \'' . $plugin . '\'); ?>
            <?php echo _t("' . ucfirst(remove_underscores($plugin)) . '"); ?>
    </a>
    <a href="index.php?c=' . $plugin . '" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "' . $plugin . '", "create")) { ?>
        <a href="index.php?c=' . $plugin . '&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

';

            //-------------------------------------------------------------------
            //-------------------------------------------------------------------
            //-------------------------------------------------------------------
            $i = 0;
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {

                //$coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? "," : "";
                $field = $columna['Field'];

                if ($field != 'id') {
                    $contenido .= '<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "' . $plugin . '"); ?>
        <?php echo _t("By ' . remove_underscores($plugin) . '"); ?>
    </a>
    <?php
    foreach (' . $plugin . '_unique_from_col("' . $field . '") as $' . $field . ') {
        if ($' . $field . '[\'' . $field . '\'] != "") {
            echo \'<a href="index.php?c=' . $plugin . '&a=search&w=by_' . $field . '&' . $field . '=\' . $' . $field . '[\'' . $field . '\'] . \'" class="list-group-item">\' . $' . $field . '[\'' . $field . '\'] . \'</a>\';
        }
    }
    ?>
</div>

';
                }

                $i++;
            }
            //-------------------------------------------------------------------
            //-------------------------------------------------------------------
            //-------------------------------------------------------------------



            break;

        ## izq_add.php
        case "izq_add.php":

            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);
            $contenido .= "?>\n";
            $contenido .= '
               
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , \'' . $plugin . '\'); ?>
            <?php echo _t("' . ucfirst(remove_underscores($plugin)) . '"); ?>
    </a>
    <a href="index.php?c=' . $plugin . '" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "' . $plugin . '", "create")) { ?>
        <a href="index.php?c=' . $plugin . '&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>';
            break;

        ## izq_delete.php
        case "izq_delete.php":

            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);
            $contenido .= "?>\n";

            $contenido .= '
                
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , \'' . $plugin . '\'); ?>
            <?php echo _t("' . ucfirst(remove_underscores($plugin)) . '"); ?>
    </a>
    <a href="index.php?c=' . $plugin . '" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "' . $plugin . '", "create")) { ?>
        <a href="index.php?c=' . $plugin . '&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>';
            break;

        ## izq_details.php
        case "izq_details.php":

            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);
            $contenido .= "?>\n";

            $contenido .= '
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , \'' . $plugin . '\'); ?>
            <?php echo _t("' . ucfirst(remove_underscores($plugin)) . '"); ?>
    </a>
    <a href="index.php?c=' . $plugin . '" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "' . $plugin . '", "create")) { ?>
        <a href="index.php?c=' . $plugin . '&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>';
            break;

        ## izq_edit.php
        case "izq_edit.php":

            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);
            $contenido .= "?>\n";

            $contenido .= '

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , \'' . $plugin . '\'); ?>
            <?php echo _t("' . ucfirst($plugin) . '"); ?>
    </a>
    <a href="index.php?c=' . $plugin . '" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "' . $plugin . '", "create")) { ?>
        <a href="index.php?c=' . $plugin . '&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>';
            break;

        ## der.php
        case "der.php":
            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);
            $contenido .= "?>\n";
            $contenido .= '
                
<?php if ($config) { ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <?php
            $magia_forms_lines = new Magia_forms_lines();

            $magia_forms_lines->setMagia_forms_lines($line_id);

            $arg = array(
                "redi" => 5,
                "c" => "' . $plugin . '",
                "a" => "index",
            );

            include view("magia_forms_lines", "form_edit");
            ?>    
        </div>
    </div>
<?php } ?>



<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , \'' . $plugin . '\'); ?>
            <?php echo _t("' . ucfirst(remove_underscores($plugin)) . '"); ?>
    </a>
    <a href="index.php?c=' . $plugin . '" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "' . $plugin . '", "create")) { ?>
        <a href="index.php?c=' . $plugin . '&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>';
            break;

        ## der_add.php
        case "der_add.php":
            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);
            $contenido .= "?>\n";
            $contenido .= '
              
<?php if ($config) { ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <?php
            $magia_forms_lines = new Magia_forms_lines();

            $magia_forms_lines->setMagia_forms_lines($line_id);

            $arg = array(
                "redi" => 5,
                "c" => "' . $plugin . '",
                "a" => "add",
            );

            include view("magia_forms_lines", "form_edit");
            ?>    
        </div>
    </div>
<?php } ?>





<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , \'' . $plugin . '\'); ?>
            <?php echo _t("' . ucfirst(remove_underscores($plugin)) . '"); ?>
    </a>
    <a href="index.php?c=' . $plugin . '" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "' . $plugin . '", "create")) { ?>
        <a href="index.php?c=' . $plugin . '&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>';
            break;

        ## der_delete.php
        case "der_delete.php":


            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);
            $contenido .= "?>\n";

            $contenido .= '
                
<?php if ($config) { ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <?php
            $magia_forms_lines = new Magia_forms_lines();

            $magia_forms_lines->setMagia_forms_lines($line_id);

            $arg = array(
                "redi" => 5,
                "c" => "' . $plugin . '",
                "a" => "delete",
                "params" => "id=\$id&config=1&line_id=$line_id",
            );

            include view("magia_forms_lines", "form_edit");
            ?>    
        </div>
    </div>
<?php } ?>


<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , \'' . $plugin . '\'); ?>
            <?php echo _t("' . ucfirst(remove_underscores($plugin)) . '"); ?>
    </a>
    <a href="index.php?c=' . $plugin . '" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "' . $plugin . '", "create")) { ?>
        <a href="index.php?c=' . $plugin . '&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>';
            break;

        ## der_details.php
        case "der_details.php":


            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);
            $contenido .= "?>\n";

            $contenido .= '
                
<?php if ($config) { ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <?php
            $magia_forms_lines = new Magia_forms_lines();

            $magia_forms_lines->setMagia_forms_lines($line_id);

            $arg = array(
                "redi" => 5,
                "c" => "' . $plugin . '",
                "a" => "details",
            );

            include view("magia_forms_lines", "form_edit");
            ?>    
        </div>
    </div>
<?php } ?>


<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , \'' . $plugin . '\'); ?>
            <?php echo _t("' . ucfirst($plugin) . '"); ?>
    </a>
    <a href="index.php?c=' . $plugin . '" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "' . $plugin . '", "create")) { ?>
        <a href="index.php?c=' . $plugin . '&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>';
            break;

        ## der_edit.php
        case "der_edit.php":


            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);
            $contenido .= "?>\n";

            $contenido .= '
                

<?php if ($config) { ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <?php
            $magia_forms_lines = new Magia_forms_lines();

            $magia_forms_lines->setMagia_forms_lines($line_id);

            $arg = array(
                "redi" => 5,
                "c" => "' . $plugin . '",
                "a" => "edit",
            );

            include view("magia_forms_lines", "form_edit");
            ?>    
        </div>
    </div>
<?php } ?>



<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , \'' . $plugin . '\'); ?>
            <?php echo _t("' . ucfirst(remove_underscores($plugin)) . '"); ?>
    </a>
    <a href="index.php?c=' . $plugin . '" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "' . $plugin . '", "create")) { ?>
        <a href="index.php?c=' . $plugin . '&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>';
            break;

        ## MODAL
        case "modal_add.php":

            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);

            $contenido .= "?>\n";

            $contenido .= '

<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#' . $plugin . '_add_<?php echo $' . $plugin . '_item["id"]; ?>">
    <?php echo icon("plus"); ?>
    <?php _t("Add new"); ?>
</button>


<div class="modal fade" id="' . $plugin . '_add_<?php echo $' . $plugin . '_item["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="' . $plugin . '_add_<?php echo $' . $plugin . '_item["id"]; ?>Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="' . $plugin . '_add_<?php echo $' . $plugin . '_item["id"]; ?>Label"> <?php _t("Add"); ?></h4>
      </div>
      <div class="modal-body">
        <?php 
        

            // $arg["redi"] = "5";
            // $arg["c"] = "contacts";
            // $arg["a"] = "veh_vehicles_drivers";
            // $arg["params"] = "id=$id";
            // $arg["driver_id"] = $id;
                



        $redi = 1;
        
        include view("' . $plugin . '","form_add"   , $arg = ["redi" => 1]); 
        
        $redi = "";     
        

        ?>
      </div>
      

      
    </div>
  </div>
</div>


';
            break;
        ## MODAL
        case "modal_delete.php":

            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);
            $contenido .= "?>\n";

            $contenido .= '
<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#' . $plugin . '_delete_<?php echo $' . $plugin . '_item[\'id\']?>">
    <?php echo icon("trash"); ?>
    <?php _t("Delete"); ?>
</button>


<div class="modal fade" id="' . $plugin . '_delete_<?php echo $' . $plugin . '_item[\'id\']?>" tabindex="-1" role="dialog" aria-labelledby="' . $plugin . '_delete_<?php echo $' . $plugin . '_item[\'id\']?>Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="' . $plugin . '_delete_<?php echo $' . $plugin . '_item[\'id\']?>Label"> <?php _t("Delete"); ?>
        <?php echo $' . $plugin . '_item[\'id\']?>    
        </h4>
      </div>
      
      <div class="modal-body">      
        <p>
            <?php _t("Are you sure you want to delete"); ?>?
        </p>      
      </div>
      
    <div class="modal-footer"> 
    
    
                <?php
                switch ($c) {
                    case "contacts":
                        $url_redi = "index.php?c=contacts&a=' . $plugin . '&id=id=$id";
                        break;

                    case "' . $plugin . '":
                        $url_redi = "index.php?c=' . $plugin . '&a=ok_delete&id=$' . $plugin . '_item[id]&redi[redi]=1&";
                        break;

                    default:
                        $url_redi = "index.php?c=' . $plugin . '&a=delete&id=$' . $plugin . '_item[id]&redi[redi]=1&";
                        break;
                }
                ?>        
                <a class="btn btn-danger" href="<?php echo $url_redi; ?>"><?php echo icon("trash"); ?> <?php echo _t("Delete"); ?></a>


     </div>
      

    </div>
  </div>
</div>';

            break;
        ## MODAL
        case "modal_edit.php":


            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);
            $contenido .= "?>\n";

            $contenido .= '
<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#' . $plugin . '_edit_<?php echo $' . $plugin . '_item[\'id\']?>">
    <?php echo icon("pencil"); ?>
    <?php _t("Edit"); ?>
</button>


<div class="modal fade" id="' . $plugin . '_edit_<?php echo $' . $plugin . '_item[\'id\']?>" tabindex="-1" role="dialog" aria-labelledby="' . $plugin . '_edit_<?php echo $' . $plugin . '_item[\'id\']?>Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="' . $plugin . '_edit_<?php echo $' . $plugin . '_item[\'id\']?>Label"> <?php _t("Edit"); ?>
        <?php echo $' . $plugin . '_item[\'id\']?>    
        </h4>
      </div>
      
      <div class="modal-body">
        <?php 
        
            // $arg["redi"] = "5";
            // $arg["c"] = "contacts";
            // $arg["a"] = "index";
            // $arg["params"] = "id=$id";
            // $arg["' . $plugin . '_id"] = $id;


        include view("' . $plugin . '" , "form_edit" ,  $arg ); ?>
      </div>
      

    </div>
  </div>
</div>';
            break;

        ## MODAL
        case "modal_search.php":


            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);
            $contenido .= "?>\n";

            $contenido .= '
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#' . $plugin . '_search_">
    <?php echo icon("search");  ?>
    <?php _t("Search"); ?>
</button>


<div class="modal fade" id="' . $plugin . '_search_" tabindex="-1" role="dialog" aria-labelledby="' . $plugin . '_search_Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="' . $plugin . '_search_Label"> <?php _t("Add"); ?></h4>
      </div>
      
      <div class="modal-body">
        <?php 
        
            // $arg["redi"] = "5";
            // $arg["c"] = "contacts";
            // $arg["a"] = "index";
            // $arg["params"] = "id=$id";
            // $arg["' . $plugin . '_id"] = $id;

        include view("' . $plugin . '","form_search"  , $arg = ["redi" => 1]); ?>
      </div>
           
    </div>
  </div>
</div>';
            break;

        ## nav.php
        case "nav.php":
            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);
            $contenido .= "?>\n";

            $contenido .= '
<nav class="navbar navbar-default">
  <div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation ' . $plugin . '</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand" href="index.php?c=' . $plugin . '">
            <?php _menu_icon("top" , \'' . $plugin . '\'); ?>
            <?php echo ( _options_option("config_menus_debug") ) ? _menus_get_file_name(__FILE__) : _t("' . ucfirst(remove_underscores($plugin)) . '"); ?>
        </a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


            <ul class="nav navbar-nav">
                <li>
                    <?php
                    if (modules_field_module("status", "docu")) {
                        echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
                    }
                    ?>
                </li>
            </ul>
            
            <?php
            if (IS_MULTI_VAT) {
                include "form_search_simple_multi.php";
            } else {
                include "form_search_simple.php";
            }
            ?>
          
        
        <?php // include view("' . $plugin . '", "form_search"   , $arg = ["redi" => 1]) ?>
            


            <ul class="nav navbar-nav">
                <?php if (permissions_has_permission($u_rol, "config", "update")) { ?>
                    <li>
                        <a 
                            data-toggle="modal" 
                            data-target="#show_col_from_table_Modal"
                            href="#"                             
                            >
                            <span class="glyphicon glyphicon-cog"></span>
                        </a>

                        <div class="modal fade" id="show_col_from_table_Modal" tabindex="-1" 
                        role="dialog" aria-labelledby="show_col_from_table_ModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" 
                                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="' . $plugin . '_addLabel">
                                            <?php _t("Columne to show"); ?>                
                                        </h4>
                                    </div>
                                    <div class="modal-body">
                                    
                                        <?php                                       
                                        include view("' . $plugin . '", "form_show_col_from_table");
                                        ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </li>                                       
                <?php } ?>

            </ul>
            





            <ul class="nav navbar-nav">                
                <?php if (permissions_has_permission($u_rol, "config", "create")) { ?>
                    <li><a href="#" data-toggle="modal" data-target="#addMenuItems"><?php echo icon("menu-hamburger"); ?></a></li>
                    <div class="modal fade" id="addMenuItems" tabindex="-1" role="dialog" aria-labelledby="addMenuItemsLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="addMenuItemsLabel">
                                        <?php _t("Add menu"); ?>
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <?php
                                    include view("_menus", "form_add_item");
                                    ?>
                                </div>
                                
                                <div class="modal-footer">
                                    <a href="index.php?c=_menus" type="button" class="btn btn-danger"><?php _t("Edit items"); ?></a>                        
                                </div>                                        
                            </div>
                        </div>
                    </div>
                <?php } ?>
                




                <?php if (
                    modules_field_module("status", "export") &&  
                    permissions_has_permission($u_rol, "export", "read")
                    
                    ) { ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <?php echo _t("Export"); ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?c=' . $plugin . '&a=export_json"><?php _t("Json"); ?></a></li>
                            <li><a href="index.php?c=' . $plugin . '&a=export_pdf"><?php _t("Pdf"); ?></a></li>
                            <li><a href="index.php?c=' . $plugin . '&a=export_csv"><?php _t("CSV"); ?></a></li>
                            <li><a href="index.php?c=' . $plugin . '&a=export_xml"><?php _t("XML"); ?></a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Other</a></li>
                        </ul>
                    </li>
                <?php } ?>    
            </ul>
            



            



            <?php
            // Obtiene todos los elementos del menú
            $menu_items = _menus_list_by_location_without_father("' . $plugin . '_nav");
            ?>

            <ul class="nav navbar-nav">
                <?php if (!empty($menu_items)): ?>
                    <?php foreach ($menu_items as $item): ?>
                        <?php if (_menus_can_show($item["controller"])): ?>
                            <li>
                                <?= _menus_dropdown_create_html("' . $plugin . '_nav", $item); ?>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>

                <?php endif; ?>
            </ul>

            <?php
            /**
            <ul class="nav navbar-nav">
                <li><a href="index.php?c=' . $plugin . '&a=search_advanced"><?php _t("Search avanced"); ?></a></li>
            
                <?php if (permissions_has_permission($u_rol, "export", "read")) { ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php echo _t("Export"); ?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?c=' . $plugin . '&a=export_json"><?php _t("Json"); ?></a></li>
                        <li><a href="index.php?c=' . $plugin . '&a=export_pdf"><?php _t("Pdf"); ?></a></li>
                        <li><a href="index.php?c=' . $plugin . '&a=export_csv"><?php _t("CSV"); ?></a></li>
                        <li><a href="index.php?c=' . $plugin . '&a=export_xml"><?php _t("XML"); ?></a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Other</a></li>
                    </ul>
                </li>
                <?php } ?>    

            </ul>
            */ 
            ?>
            

            
<div class="collapse navbar-collapse" id="' . $plugin . '_add">
    

            <?php
            _menus_create_menu_items_by_controller_location($c, __FILE__);
            ?>

                <?php if (permissions_has_permission($u_rol, "' . $plugin . '", "create")) { ?>     
                    
                    <button type="button" class="btn btn-primary navbar-btn navbar-right" data-toggle="modal" data-target="#' . $plugin . 'Modal">
                        <span class="glyphicon glyphicon-plus-sign"></span>
                        <?php _t("New ' . remove_underscores($plugin) . '"); ?>
                    </button>

                    <div class="modal fade" id="' . $plugin . 'Modal" tabindex="-1" role="dialog" aria-labelledby="' . $plugin . 'ModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                     <h4 class="modal-title" id="' . $plugin . '_addLabel">
                                        <?php _t("Add new ' . $plugin . '"); ?>                
                                    </h4>
                                </div>
                                
                                <div class="modal-body">
                                    <?php include view("' . $plugin . '", "form_add"); ?>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                <?php } ?>    
            </div>           
    </div>
  </div>
</nav>


';
            break;

        ## search.php
        case "search.php":
            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);
            $contenido .= "?>\n";

            $contenido .= '<?php include view("home", "header"); ?> 

<div class="row">
    <div class="col-lg-2">
 ';
            $contenido .= ($config_destino == "www") ?
                    '<?php include view("' . $plugin . '", "izq"); ?>' :
                    '<?php include "izq.php"; ?>';
            $contenido .= '
    </div>

    <div class="col-lg-10">
        <h1><?php _t("' . $plugin . '"); ?></h1>
        
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php include view("' . $plugin . '","form_search"   , $arg = ["redi" => 1]);?>
        
    </div>
</div>

<?php include view("home", "footer"); ?>
';
            break;

        ## search_advanced.php
        case "search_advanced.php":
            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);
            $contenido .= "?>\n";

            $contenido .= '
<?php include view("home", "header"); ?>                

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">        
         ';
            $contenido .= ($config_destino == "www") ?
                    '<?php include view("' . $plugin . '", "izq"); ?>' :
                    '<?php include "izq.php"; ?>';
            $contenido .= '
    </div>

    <div class="col-sm-12 col-md-8 col-lg-8">
        <h1>
            <?php _menu_icon("top" , \'' . $plugin . '\'); ?>
            <?php _t("Search advanced"); ?>
        </h1>
        
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
 ';
            $contenido .= ($config_destino == "www") ?
                    '<?php include view("' . $plugin . '", "form_search_advanced"   , $arg = ["redi" => 1]); ?>' :
                    '<?php include "form_search_advanced.php"; ?>';
            $contenido .= '
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">       
         ';
            $contenido .= ($config_destino == "www") ?
                    '<?php include view("' . $plugin . '", "der"); ?>' :
                    '<?php include "der.php"; ?>';
            $contenido .= '
    </div>
</div>

<?php include view("home", "footer"); ?>
';
            break;

        ## xxxxxxx.php
        case "xxxxxxxxx.php":


            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);
            $contenido .= "?>\n";

            $contenido .= '';
            break;

        ## table_index.php
        case "table_index.php":
            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);
            $contenido .= "?>\n";

            $contenido .= '


<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

<script>
    function sellectAll(source) {
        var checkboxes = document.querySelectorAll(\'input[type="checkbox"]\');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] !== source)
                checkboxes[i].checked = source.checked;
        }
    }
</script>

<table class="table table-striped table-condensed table-bordered">
  

    <thead>
        <tr class="info">
            <?php
            // Obtener columnas a mostrar
            $user_cols_array = order_by_get_user_or_default_columns("' . $plugin . '");

            //vardump($user_cols_array); 
            // Renderizar encabezados con iconos de ordenación
            order_by_render_table_headers_with_icons($user_cols_array, "' . $plugin . '", $order_data["col_name"], $order_data["order_way"]);
            ?>
        </tr>
    </thead>

    <tfoot>
        <tr class="info">
            <?php
            // Renderizar pie de tabla con las mismas columnas e iconos
            order_by_render_table_headers_with_icons($user_cols_array, "' . $plugin . '", $order_data["col_name"], $order_data["order_way"]);
            ?>
        </tr>
    </tfoot>



    <tbody>
   
';

            $contenido .= '



        <?php
        
        $month = null;

        foreach ($' . $plugin . ' as $' . $plugin . '_item) {

            $' . $plugin . '_line = new ' . ucfirst($plugin) . '();
            $' . $plugin . '_line->set' . ucfirst($plugin) . '($' . $plugin . '_item["id"]);
                

            // Verificar si tiene comentarios
            $has_comments = (comments_total_by_controller_id("' . $plugin . '", $' . $plugin . '_line->getId())) ? true : false;
            // Icono de comentarios
            $comment_icon = ($has_comments && modules_field_module("status", "comments") && permissions_has_permission($u_rol, "comments", "read")) ? icon("comment") : "";


            
            
            if (method_exists($' . $plugin . '_line, "getDate")) {
                // Llamar al método getDate() si existe
                $date = $' . $plugin . '_line->getDate();
                $month_actual = magia_dates_get_month_from_date($date);
            } else {
                $month_actual = null; // O cualquier valor predeterminado que quieras usar

            }
            


            // Mostrar separador de meses si cambia
            if (isset($month_actual) && $month_actual != $month) {
                $month = $month_actual;
                echo "<tr class=\'success\'><td colspan=\'15\'><b>" . _tr(magia_dates_month($month_actual)) . "</b></td></tr>";
            }
            
            
            echo "<tr>";

            // Mostrar los datos según las columnas seleccionadas por el usuario
            foreach ($user_cols_array as $col) {


                if ($col["show"]) {
                    $field = $col["col_name"];  // Nombre del campo a mostrar                    
                    // Dependiendo del campo, mostrar contenido personalizado   
                    
                    
                    switch ($field) {
                    ';
            foreach (bdd_columnas_segun_tabla($plugin) as $columna) {

                //REFERENCED_TABLE_NAME, 
                //REFERENCED_COLUMN_NAME 
                $bdd_referencias = bdd_referencias($plugin, $columna['Field']);

                $bdd_ref_tabla_externa = (isset($bdd_referencias['REFERENCED_TABLE_NAME'])) ? $bdd_referencias['REFERENCED_TABLE_NAME'] : false;
                $bdd_col_externa = (isset($bdd_referencias['REFERENCED_COLUMN_NAME'])) ? $bdd_referencias['REFERENCED_COLUMN_NAME'] : false;

                switch ($columna['Field']) {

                    case 'id':
                        $contenido .= '                     case \'' . $columna['Field'] . '\':
                        echo \'<td><a href="index.php?c=' . $plugin . '&a=details&id=\' . $' . $plugin . '_item[\'' . $columna['Field'] . '\'] . \'">\' . ($' . $plugin . '_item[\'id\']) . \'</a></td>\';
                        break;' . "\n";
                        break;

                    case 'invoice_id':
                        $contenido .= '                     case \'' . $columna['Field'] . '\':
                        echo \'<td><a href="index.php?c=' . $plugin . '&a=details&id=\' . $' . $plugin . '_item[\'' . $columna['Field'] . '\'] . \'">\' . invoices_numberf($' . $plugin . '_item[\'id\']) . \'</a></td>\';
                        break;' . "\n";
                        break;

                    case 'contact_id':
                    case 'client_id':
                    case 'employee_id':
                    case 'company_id':
                    case 'driver_id':
                    case 'insurer_id':
                    case 'registred_by':
                    case 'workshop_id':
                    case 'owner_id':
                    case 'office_id':
                    case 'provider_id':
                    case 'seller_id':
                        $contenido .= '                     case \'' . $columna['Field'] . '\':
                            // Obtener id de oficina, si no existe se asigna null
                            $' . $columna['Field'] . ' = $' . $plugin . '_line->get' . ucfirst($columna['Field']) . '() ?? null;

                            if ($' . $columna['Field'] . ' !== null) {
                                // Obtener el nombre formateado del contacto
                                $formatted_contact = contacts_formated($' . $columna['Field'] . ');
                                // Mostrar enlace a los detalles del contacto con el ID escapado para HTML
                                echo \'<td><a href="index.php?c=contacts&a=details&id=\' . htmlspecialchars($' . $columna['Field'] . ', ENT_QUOTES, "UTF-8") . \'">\' . $formatted_contact . \'</a></td>\';
                            } else {
                                // Mostrar mensaje por defecto si no hay información
                                echo "<td>" . _tr("No data") . "</td>";
                            }
                            break;' . "\n";
                        break;

                    // project_id
                    case 'project_id':
                        $contenido .= '                     case \'' . $columna['Field'] . '\':
                        echo \'<td><a href="index.php?c=projects&a=details&id=\' . $' . $plugin . '_item[\'' . $columna['Field'] . '\'] . \'">\' . projects_field_id("name", $' . $plugin . '_item[\'' . $columna['Field'] . '\'] ?? null) . \'</a></td>\';
                        break;' . "\n";
                        break;

                    // fiel by id
                    case 'vehicle_id':
                        $contenido .= '                     case \'' . $columna['Field'] . '\':
                        echo \'<td><a href="index.php?c=veh_vehicles&a=details&id=\' . $' . $plugin . '_item[\'' . $columna['Field'] . '\'] . \'">\' . veh_vehicles_field_id("name", $' . $plugin . '_item[\'' . $columna['Field'] . '\'] ?? null) . \'</a></td>\';
                        break;' . "\n";
                        break;
                    // ----------------------------------- MONEDA
                    case 'subtotal':
                    case 'sub_total':
                    case 'tax':
                    case 'total':
                    case 'value':
                    case 'amount':
                    case 'price':
                    case 'interest_calculated':
                    case 'total_calculated':
                    case 'interest_real':
                    case 'total_real':
                    case 'retencion':
                    case 'company_comission':
                    case 'comision_bolsa':
                    case 'total_receivable':
                    case 'returned':
                    case 'to_returned':
                    case 'advance':
                    case 'balance':

                        $contenido .= '                     case \'' . $columna['Field'] . '\':
                        echo \'<td  class="text-right">\' . moneda($' . $plugin . '_item[$field]) . \'</td>\';
                        break;' . "\n";
                        break;

                    // ------------------------------------- DATES
                    case 'date':
                    case 'start_date':
                    case 'end_date':
                    case 'expiration_date':
                    case 'registre_date':
                    case 'date_start':
                    case 'date_end':
                    case 'dete_expiration':
                    case 'date_registre':
                    case 'deadline':
                    case 'r1':
                    case 'r2':
                    case 'r3':
                    case 'fc':
                    case 'date_update':
                    case 'birthdate':
                        $contenido .= '                     case \'' . $columna['Field'] . '\':
                        echo \'<td>\' . magia_dates_formated($' . $plugin . '_item[$field]) . \'</td>\';
                        break;' . "\n";
                        break;

                    case 'country':
                    case 'nationality':
                        $contenido .= '                     case \'' . $columna['Field'] . '\':
                        echo \'<td>\' . countries_field_country_code("countryName", $' . $plugin . '_item[$field]) . \'</td>\';
                        break;' . "\n";
                        break;

                    case 'language':
                        $contenido .= '                     case \'' . $columna['Field'] . '\':
                        echo \'<td>\' . _languages_search_by_unique("name","language",  $' . $plugin . '_item[$field]) . \'</td>\';
                        break;' . "\n";
                        break;

                    // ---------------------------------- CATEGORIES_CODE

                    case 'category_code':
                        $contenido .= '                      case "category_code":
                        echo \'<td>\' . ' . $plugin . '_categories_field_code("category", $' . $plugin . '_item["category_code"]) . \'</td>\';   
                        break;' . "\n";
                        break;

                    // -------------------------------------   Yes / NO
                    case 'principal':
                    case 'available':
                    case 'in_charge':
                    case 'handicap':
                    case 'follow':
                    case 'towing_system':
                        $contenido .= '                     case \'' . $columna['Field'] . '\':

                        $is_' . $plugin . '_' . $columna['Field'] . '  = ($' . $plugin . '_item["' . $columna['Field'] . '"])? _tr("Yes") : _tr("No") ;
                        echo \'<td>\' . $is_' . $plugin . '_' . $columna['Field'] . ' . \'</td>\';                            
                        break;' . "\n";
                        break;

                    // --------------------------------------- icon 
                    case 'icon':
                        $contenido .= '                     case \'' . $columna['Field'] . '\':
                        echo \'<td>\' . icon($' . $plugin . '_item["' . $columna['Field'] . '"]) . \'</td>\'; // $yellow_pages_categories_item[$field]
                        break;' . "\n";
                        break;

                    // ---------------------------------------- addresses 
                    case 'addresses_billing':
                    case 'addresses_delivery':
                        $contenido .= '                     case \'' . $columna['Field'] . '\':
                            echo "<td>" . addresses_formated_html($' . $plugin . '[\'' . $columna['Field'] . '\'] ?? \'\' ) . "</td>";
                            break;' . "\n";
                        break;

//                    case 'counter':
//                        $contenido .= '                     case \'' . $columna['Field'] . '\':
//                            echo "<td><a href=\'index.php?c=' . $plugin . '&a=details&id=" . $' . $plugin . '_item[\'id\'] . "\'>" . $' . $plugin . '_line->getCounter_formated() . "</a></td>";
//                            break;' . "\n";
//                        break;
                    // ----------------------------------------- Status
                    case 'status':

                        if ($bdd_referencias) {
                            $contenido .= '                     case "status":
                            // Obtener el estado del gasto una vez y reutilizarlo
                            // $bdd_referencias = ' . $bdd_referencias . '
                            $status = $' . $plugin . '_item["status"];

                            // Obtener el ícono y el color del estado
                            $icon_status = icon(' . $plugin . '_status_field_code("icon", $status));
                            $color = ' . $plugin . '_status_field_code("color", $status);

                            // Mapeo directo de colores a clases de estado
                            $class_status_map = [
                                "active" => "active",
                                "success" => "success",
                                "warning" => "warning",
                                "danger" => "danger",
                                "info" => "info"
                            ];

                            // Asignar clase de estado o una cadena vacía si no hay coincidencia
                            $class_status = isset($class_status_map[$color]) ? $class_status_map[$color] : "";

                            // Mostrar la celda con el ícono, el nombre del estado y la clase de color correspondiente
                            echo \'<td class="\' . $class_status . \'">\' . $icon_status . \' \' . ' . $plugin . '_status_field_code("name", $status) . \'</td>\';

                            break;' . "\n";
                        } else {
                            $contenido .= '                     case \'' . $columna['Field'] . '\':
                            echo \'<td>\' . ($' . $plugin . '_item[$field]) . \'</td>\';
                            break;' . "\n";
                        }

                        break;
                    //-------------------------------------------------------

                    case 'url':
                    case 'web':
                        $contenido .= '                     case \'' . $columna['Field'] . '\':
                        echo \'<td><a href="\'.$' . $plugin . '_item[\'' . $columna['Field'] . '\'].\'">\' . ($' . $plugin . '_item[\'' . $columna['Field'] . '\']) . \'</a></td>\';
                        break;' . "\n";
                        break;
                    //-------------------------------------------------------
                    //-------------------------------------------------------
                    //
                    default:
                        $contenido .= '                     case \'' . $columna['Field'] . '\':
                        echo \'<td>\' . ($' . $plugin . '_item[$field]) . \'</td>\';
                        break;' . "\n";
                        break;
                }
            }

            $contenido .= '
                    //
                    
                   
                                            
                    
                    case "total_plus_vat":
                        echo \'<td  class="text-right">\' . monedaf($' . $plugin . '_item["total"] + $' . $plugin . '_item["tax"]) . \'</td>\';
                        break;
                                            
                    case "button_details":
                        echo \'<td><a class = "btn btn-sm btn-default" href = "index.php?c=' . $plugin . '&a=details&id=\' . $' . $plugin . '_item[\'id\'] . \'">\' . icon("eye-open") . \' \' . _tr(\'Details\') . \'</a></td>\';
                        break;

                    case "button_pay":
                        echo \'<td><a class = "btn btn-sm btn-default" href = "index.php?c=' . $plugin . '&a=details_payement&id=\' . $' . $plugin . '_item[\'id\'] . \'">\' . icon("shopping-cart") . \' \' . _tr(\'Pay\') . \'</a></td>\';
                        break;

                    case "button_edit":
                        echo \'<td><a class = "btn btn-sm btn-default" href = "index.php?c=' . $plugin . '&a=edit&id=\' . $' . $plugin . '_item[\'id\'] . \'">\' . icon("pencil") . \' \' . _tr(\'Edit\') . \'</a></td>\';
                        break;

                    case "modal_edit":
    //                echo "<td>";
    //                include view("' . $plugin . '", "modal_edit");
    //                echo "</td>";
                        break;

                    case "button_delete":
                        echo \'<td><a class = "btn btn-sm btn-default" href = "index.php?c=' . $plugin . '&a=delete&id=\' . $' . $plugin . '_item[\'id\'] . \'">\' . icon("trash") . \' \' . _tr(\'Delete\') . \'</a></td>\';
                        break;

                    case "modal_delete":
                        echo "<td>";
                        include view("' . $plugin . '", "modal_delete");
                        echo "</td>";
                        break;

                    case "button_print":
                        echo \'<td><a class = "btn btn-sm btn-default" href = "index.php?c=' . $plugin . '&a=export_pdf&id=\' . $' . $plugin . '_item[\'id\'] . \'">\' . icon("print") . \'</a></td>\';
                        break;

                    case "button_save":
                        echo \'<td><a class = "btn btn-sm btn-default" href = "index.php?c=' . $plugin . '&a=export_pdf&way=pdf&&id=\' . $' . $plugin . '_item[\'id\'] . \'">\' . icon("floppy-save") . \'</a></td > \';
                        break;

                    }
                }
            }   
            
            echo "</tr>";
        }
        ?>
    </tbody>
</table>





';
            break;
        ####################################################################
        case 'table_index_form_add.php':
            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);
            $contenido .= "?>\n";

            $contenido .= '';

            $contenido .= '<tr>

<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_employee_clothes">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi[redi]" value="5">
    <input type="hidden" name="redi[c]" value="' . $plugin . '">
    <input type="hidden" name="redi[a]" value="details">
    <input type="hidden" name="redi[params]" value="<?php echo "id=$id"; ?>">
    




';

            $contenido .= '    <td>
        <div class="form-group">
            <label class="control-label col-sm-3" for=""></label>
            <div class="col-sm-8">    
                <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
            </div>      							
        </div>      							
    </td>
    <td></td>


</form>

<tr>';

            break;

        case 'top.php':
            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);
            $contenido .= "?>\n";

            $contenido .= '<?php include "modal_index_cols_to_show.php"; ?>';
            break;

        default:

            $contenido = "<?php \n";
            $contenido .= logo();
            $contenido .= al(80);
            $contenido .= "?>\n";

            $contenido .= "";
            break;
    }


    return "$contenido";
}
