<?php

# Controller: credit_notes
# Title: Add col office_id_counter_year_trimestre
# Description: Add col office_id_counter_year_trimestre and update counter
# date: 01-20-25

$update = "

ALTER TABLE `credit_notes` ADD COLUMN `office_id_counter_year_trimestre` INT NULL DEFAULT NULL AFTER `office_id_counter_year_month`;

-- Inicializar las variables temporales
SET @owner := NULL;
SET @year := NULL;
SET @trimestre := NULL;
SET @doc_number := 0;

-- Actualizar el valor de office_id_counter_year_trimestre
UPDATE credit_notes
JOIN (
    SELECT 
        id,
        office_id,
        YEAR(date) AS year,
        CEIL(MONTH(date) / 3) AS trimestre,
        @doc_number := IF(@owner = office_id AND @year = YEAR(date) AND @trimestre = CEIL(MONTH(date) / 3), @doc_number + 1, 1) AS counter,
        @owner := office_id,
        @year := YEAR(date),
        @trimestre := CEIL(MONTH(date) / 3)
    FROM credit_notes
    WHERE date IS NOT NULL -- Asegúrate de que date no sea nula
    ORDER BY office_id, YEAR(date), CEIL(MONTH(date) / 3), date -- Ordenar por office_id, año, trimestre y fecha
) AS subquery ON credit_notes.id = subquery.id
SET credit_notes.office_id_counter_year_trimestre = subquery.counter;





";

