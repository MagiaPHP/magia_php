DELIMITER //
CREATE TRIGGER `hr_employee_worked_days_after_delete` AFTER DELETE ON `hr_employee_worked_days`
 FOR EACH ROW BEGIN
  DECLARE existing_days_count INT;

  -- Contar los días trabajados únicos para el empleado, mes y año donde total_hours no es NULL
  SELECT COUNT(DISTINCT `date`)
  INTO existing_days_count
  FROM `hr_employee_worked_days`
  WHERE `employee_id` = OLD.`employee_id`
    AND YEAR(`date`) = YEAR(OLD.`date`)
    AND MONTH(`date`) = MONTH(OLD.`date`)
    AND `total_hours` IS NOT NULL;

  -- Actualizar o eliminar la cantidad en hr_employee_benefits_by_month
  IF existing_days_count > 0 THEN
    UPDATE `hr_employee_benefits_by_month`
    SET `quantity` = existing_days_count
    WHERE `employee_id` = OLD.`employee_id`
      AND `year` = YEAR(OLD.`date`)
      AND `month` = MONTH(OLD.`date`)
      AND `benefit_code` = 'meal_vouchers';
  ELSE
    DELETE FROM `hr_employee_benefits_by_month`
    WHERE `employee_id` = OLD.`employee_id`
      AND `year` = YEAR(OLD.`date`)
      AND `month` = MONTH(OLD.`date`)
      AND `benefit_code` = 'meal_vouchers';
  END IF;
END

//

DELIMITER ;