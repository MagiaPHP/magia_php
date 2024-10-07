<?php

# Controller: expenses
# Title: Add col office_id_counter_year
# Description: Agrego columna para el contador oficina y año
# date: 2024-09-23

$update = "
    ALTER TABLE `expenses` ADD `office_id_counter_year` INT(11) NULL DEFAULT NULL AFTER `office_id`;

    -- Inicializar las variables temporales para el conteo por office_id, año 
    SET @owner := NULL;
    SET @year := NULL;
    SET @doc_number := 0;

    -- Actualizar el valor de office_id_counter_year basado en office_id y year 
    UPDATE expenses
    JOIN (
        SELECT 
            id,
            office_id,
            YEAR(date) AS year,
            -- Asignar el contador secuencial por office_id y año
            @doc_number := IF(@owner = office_id AND @year = YEAR(date), @doc_number + 1, 1) AS counter,
            @owner := office_id,
            @year := YEAR(date)
        FROM expenses
        WHERE date IS NOT NULL -- Asegúrate de que date no sea nula
        ORDER BY office_id, YEAR(date), date -- Ordenar por office_id, año y fecha
    ) AS subquery ON expenses.id = subquery.id

    SET expenses.office_id_counter_year = subquery.counter;
";
