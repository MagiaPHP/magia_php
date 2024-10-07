<?php

# Controller: expenses
# Title: Add triggers ndc_ca_before_insert_credit_note
# Description: Add triggers ndc_ca_before_insert_credit_note
# date: 01-20-25

$update = "


CREATE TRIGGER `exp_ca_before_insert_credit_note` 
BEFORE INSERT ON `expenses`
FOR EACH ROW 
BEGIN
    DECLARE max_number INT;

    -- Obtener el año basado en la nueva fecha
    SET @year = YEAR(NEW.date);

    -- Obtener el último número de documento para el mismo office_id y año
    SELECT COALESCE(MAX(office_id_counter_year), 0) INTO max_number
    FROM expenses
    WHERE office_id = NEW.office_id
      AND YEAR(date) = @year;

    -- Asignar el nuevo número de documento incrementado en 1
    SET NEW.office_id_counter_year = max_number + 1;
END; 






";

