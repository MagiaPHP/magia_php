<?php

# Controller: credit_notes
# Title: Add trigger oc_assign_counter_on_insert
# Description: Add trigger oc_assign_counter_on_insert
# date: 01-20-25

$update = "



CREATE TRIGGER `ndc_oc_assign_counter_on_insert` BEFORE INSERT ON `credit_notes`
 FOR EACH ROW BEGIN
    DECLARE max_number INT;

    -- Obtener el último número de documento para el mismo office_id
    SELECT COALESCE(MAX(office_id_counter), 0) INTO max_number
    FROM credit_notes
    WHERE office_id = NEW.office_id;

    -- Asignar el nuevo número de documento incrementado en 1
    SET NEW.office_id_counter = max_number + 1;
END;


";

