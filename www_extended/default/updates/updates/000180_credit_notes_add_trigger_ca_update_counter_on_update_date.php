<?php

# Controller: credit_notes
# Title: Add triggers ndc_ca_update_counter_on_update_date
# Description: Add triggers ndc_ca_update_counter_on_update_date
# date: 01-20-25

$update = "



CREATE TRIGGER `ndc_ca_update_counter_on_update_date` 
BEFORE UPDATE ON `credit_notes`
FOR EACH ROW 
BEGIN
    DECLARE max_number INT;

    -- Solo recalcular si se ha actualizado la fecha
    IF NEW.date <> OLD.date THEN
        -- Obtener el año basado en la nueva fecha
        SET @year = YEAR(NEW.date);

        -- Obtener el último número de documento para el mismo office_id y año
        SELECT COALESCE(MAX(office_id_counter_year), 0) INTO max_number
        FROM credit_notes
        WHERE office_id = NEW.office_id
          AND YEAR(date) = @year;

        -- Asignar el nuevo número de documento incrementado en 1
        SET NEW.office_id_counter_year = max_number + 1;
    END IF;
END;





";

