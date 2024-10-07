<?php

# Controller: expenses
# Title: Add triggers mc_assign_counter_on_insert
# Description: Add triggers mc_assign_counter_on_insert
# date: 01-20-25

$update = "


CREATE TRIGGER exp_mc_assign_counter_on_insert 
BEFORE INSERT ON expenses
FOR EACH ROW 
BEGIN
    DECLARE max_number INT;

    -- Obtener el año y mes basado en la fecha
    SET @month = MONTH(NEW.date);
    SET @year = YEAR(NEW.date);

    -- Obtener el último número de documento para el mismo office_id, año y mes
    SELECT COALESCE(MAX(office_id_counter_year_month), 0) INTO max_number
    FROM expenses
    WHERE office_id = NEW.office_id
      AND YEAR(date) = @year
      AND MONTH(date) = @month;

    -- Asignar el nuevo número de documento incrementado en 1
    SET NEW.office_id_counter_year_month = max_number + 1;
END;


";

