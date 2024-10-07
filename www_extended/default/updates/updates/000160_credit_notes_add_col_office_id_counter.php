<?php

# Controller: credit_notes
# Title: Add col office_id_counter
# Description: Add col office_id_counter and update counter
# date: 01-20-25

$update = "
    
-- Agregar la columna office_id_counter si no existe ya
ALTER TABLE `credit_notes` ADD `office_id_counter` INT NULL DEFAULT NULL AFTER `office_id`;

-- Variables temporales para realizar el conteo por office_id
SET @owner := NULL;
SET @doc_number := 0;

-- Actualizar el valor de office_id_counter basándose en office_id y en el orden cronológico por 'date'
UPDATE credit_notes
JOIN (
    SELECT 
        id,
        office_id,
        date,
        -- Asignar el contador secuencial por office_id en orden cronológico
        @doc_number := IF(@owner = office_id, @doc_number + 1, 1) AS counter,
        @owner := office_id
    FROM credit_notes
    WHERE date IS NOT NULL
    ORDER BY office_id, date, id -- Ordenar por office_id y luego por la fecha (y como seguridad por id)
) AS subquery ON credit_notes.id = subquery.id
SET credit_notes.office_id_counter = subquery.counter;


";
