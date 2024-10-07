<?php 
#   __  __             _         _____  _    _ _____  
#  |  \/  |           (_)       |  __ \| |  | |  __ \ 
#  | \  / | __ _  __ _ _  __ _  | |__) | |__| | |__) |
#  | |\/| |/ _` |/ _` | |/ _` | |  ___/|  __  |  ___/ 
#  | |  | | (_| | (_| | | (_| | | |    | |  | | |     
#  |_|  |_|\__,_|\__, |_|\__,_| |_|    |_|  |_|_|     
#                 __/ |                         
#                |___/             
# 
# 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-18 07:09:41 
#################################################################################
?>

                


<form action="index.php" method="post" id="columns-form">
    <input type="hidden" name="c" value="cv">
    <input type="hidden" name="a" value="ok_show_col_from_table">
    <input type="hidden" name="redi[redi]" value="1">

    <ul id="column-list">
        <?php
        // Obtener columnas utilizando la función mejorada
        $colsSelectedOrdered = cv_get_user_or_default_columns();  // Usar la función renombrada
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
        $columns = db_cols_from_table("cv"); // Obtener columnas de la tabla de la base de datos
        if ($columns) {
            foreach ($columns as $key => $col) {
                // Mostrar cada columna como una opción en el select
                echo '<option value="' . htmlspecialchars($col['Field']) . '" title="' . _tr("This is a predefined column") . '">' . ucfirst($col['Field']) . '</option>';
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



