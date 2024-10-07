<?php

# Controller: expenses
# Title: Add col office_id_counter_year_month
# Description: Add col office_id_counter_year_month and update counter
# date: 01-20-25

$update = "
    
-- Agregar la columna office_id_counter_year_month si no existe
ALTER TABLE `expenses`  ADD COLUMN `office_id_counter_year_month` INT NULL DEFAULT NULL AFTER `office_id`;


-- Inicializar las variables temporales para el conteo por office_id, año y mes
SET @owner := NULL;
SET @year := NULL;
SET @month := NULL;
SET @doc_number := 0;

-- Actualizar el valor de office_id_counter_year_month basado en office_id, year y month
UPDATE expenses
JOIN (
    SELECT 
        id,
        office_id,
        YEAR(date) AS year,
        MONTH(date) AS month,
        -- Asignar el contador secuencial por office_id, año y mes
        @doc_number := IF(@owner = office_id AND @year = YEAR(date) AND @month = MONTH(date), @doc_number + 1, 1) AS counter,
        @owner := office_id,
        @year := YEAR(date),
        @month := MONTH(date)
    FROM expenses
    WHERE date IS NOT NULL -- Asegúrate de que date no sea nula
    ORDER BY office_id, YEAR(date), MONTH(date), date -- Ordenar por office_id, año, mes y fecha
) AS subquery ON expenses.id = subquery.id
SET expenses.office_id_counter_year_month = IF(expenses.office_id_counter_year_month IS NULL, subquery.counter, expenses.office_id_counter_year_month + 1);


";

