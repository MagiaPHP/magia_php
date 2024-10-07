DELIMITER //
CREATE TRIGGER `hr_employee_worked_days_after_insert` AFTER INSERT ON `hr_employee_worked_days`
 FOR EACH ROW BEGIN
  DECLARE existing_days_count INT;
  DECLARE company_part_value DECIMAL(65,6) DEFAULT 0;
  DECLARE benefit_price DECIMAL(65,6) DEFAULT 0;

  -- Contar los días trabajados únicos para el empleado, mes y año donde total_hours no es NULL
  SELECT COUNT(DISTINCT `date`)
  INTO existing_days_count
  FROM `hr_employee_worked_days`
  WHERE `employee_id` = NEW.`employee_id`
    AND YEAR(`date`) = YEAR(NEW.`date`)
    AND MONTH(`date`) = MONTH(NEW.`date`)
    AND `total_hours` IS NOT NULL;

  -- Obtener el valor de company_part_value y price desde hr_employee_benefits
  SELECT 
    IFNULL(`company_part`, 0) AS company_part_value, 
    IFNULL(`price`, 0) AS price
  INTO company_part_value, benefit_price
  FROM `hr_employee_benefits`
  WHERE `employee_id` = NEW.`employee_id`
    AND `benefit_code` = 'meal_vouchers'
  LIMIT 1;

  -- Insertar o actualizar la cantidad en hr_employee_benefits_by_month
  INSERT INTO `hr_employee_benefits_by_month` (
    `employee_id`,
    `year`,
    `month`,
    `benefit_code`,
    `quantity`,
    `price`,
    `company_part`,
    `order_by`,
    `status`
  ) VALUES (
    NEW.`employee_id`,
    YEAR(NEW.`date`),
    MONTH(NEW.`date`),
    'meal_vouchers', -- Asumiendo que el código del beneficio es 'meal_vouchers'
    existing_days_count,
    benefit_price,  -- Precio recuperado de `hr_employee_benefits`
    company_part_value,   -- Porcentaje de la empresa
    1, -- order_by
    1  -- status
  )
  ON DUPLICATE KEY UPDATE
    `quantity` = VALUES(`quantity`),
    `price` = VALUES(`price`),
    `company_part` = VALUES(`company_part`);
    
END

//

DELIMITER ;





