<?php

# Controller: credit_notes
# Title: Add triggers tc_assign_counter_on_insert
# Description: Add triggers tc_assign_counter_on_insert
# date: 01-20-25

$update = "



CREATE TRIGGER `ndc_tc_assign_counter_on_insert` BEFORE INSERT ON `credit_notes`
 FOR EACH ROW BEGIN
    DECLARE max_number INT;

    -- Obtener el trimestre basado en la fecha
    SET @trimestre = CEIL(MONTH(NEW.date) / 3);

    -- Obtener el último número de documento para el mismo office_id, año y trimestre
    SELECT COALESCE(MAX(office_id_counter_year_trimestre), 0) INTO max_number
    FROM credit_notes
    WHERE office_id = NEW.office_id
      AND YEAR(date) = YEAR(NEW.date)
      AND CEIL(MONTH(date) / 3) = @trimestre;

    -- Asignar el nuevo número de documento incrementado en 1
    SET NEW.office_id_counter_year_trimestre = max_number + 1;
END;


";

