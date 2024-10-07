<?php

# Controller: credit_notes
# Title: Add triggers tc_update_counter_on_date_update
# Description: Add trigger tc_update_counter_on_date_update
# date: 01-20-25

$update = "

CREATE TRIGGER `ndc_tc_update_counter_on_date_update` BEFORE UPDATE ON `credit_notes`
 FOR EACH ROW BEGIN
    DECLARE max_number INT;

    -- Solo recalcular si se ha actualizado la fecha
    IF NEW.date <> OLD.date THEN
        -- Obtener el trimestre basado en la nueva fecha
        SET @new_trimestre = CEIL(MONTH(NEW.date) / 3);
        SET @new_year = YEAR(NEW.date);

        -- Obtener el último número de documento para el mismo office_id, año y trimestre
        SELECT COALESCE(MAX(office_id_counter_year_trimestre), 0) INTO max_number
        FROM credit_notes
        WHERE office_id = NEW.office_id
          AND YEAR(date) = @new_year
          AND CEIL(MONTH(date) / 3) = @new_trimestre;

        -- Asignar el nuevo número de documento incrementado en 1
        SET NEW.office_id_counter_year_trimestre = max_number + 1;
    END IF;
END;




";

