
<form action="index.php" method="post" id="columns-form">
    <input type="hidden" name="c" value="credit_notes">
    <input type="hidden" name="a" value="ok_show_col_from_table">
    <input type="hidden" name="redi[redi]" value="1">

    <ul id="column-list">
        <?php
        // Obtener columnas utilizando la función mejorada
        $colsSelectedOrdered = credit_notes_get_user_or_default_columns();  // Usar la función renombrada
        // Mostrar las columnas en el formulario
        foreach ($colsSelectedOrdered as $index => $col) {
            $isChecked = isset($col['show']) && $col['show'] ? 'checked' : '';
            $col_name = isset($col['col_name']) ? htmlspecialchars($col['col_name']) : $index;
            $label = isset($col['label']) ? htmlspecialchars($col['label']) : $index;

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
        $columns = db_cols_from_table("credit_notes"); // Obtener columnas de la tabla de la base de datos
        if ($columns) {
            foreach ($columns as $key => $col) {
                // Mostrar cada columna como una opción en el select
                echo '<option value="' . htmlspecialchars($col['Field']) . '" title="' . _tr("This is a predefined column") . '">' . ucfirst($col['Field']) . '</option>';
            }
        }
        // Agregar columnas manualmente definidas
        ?>
        <option value="tax_plus_tax" title="<?php echo _tr("Total amount plus tax"); ?>">Total plus tax</option>
        <option value="to_returned" title="<?php echo _tr("Amount to be returned"); ?>">To returned</option>
        <option value="id_formatted" title="<?php echo _tr("Id_formatted"); ?>">Id formatted</option>

    </select>

    <br>

    <button type="button" id="add-column-btn" class="btn btn-secondary"><?php echo icon("plus"); ?> <?php echo _tr("Add column"); ?></button>

    <input type="hidden" id="selected-columns" name="selected_columns">

    <input class="btn btn-primary" type="submit" value="<?php _t("Save"); ?>">

</form>




