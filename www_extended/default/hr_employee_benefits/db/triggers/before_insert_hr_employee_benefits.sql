CREATE TRIGGER `before_insert_hr_employee_benefits` BEFORE INSERT ON `hr_employee_benefits`
 FOR EACH ROW BEGIN
    SET NEW.employee_part = 100 - NEW.company_part;
END

CREATE TRIGGER `before_insert_hr_employee_benefits_by_month` BEFORE INSERT ON `hr_employee_benefits_by_month`
 FOR EACH ROW BEGIN
    DECLARE company_part_value DECIMAL(65, 6);
    DECLARE employee_part_value DECIMAL(65, 6);

    -- Copia los valores desde hr_employee_benefits a hr_employee_benefits_by_month
    SET NEW.company_part = (SELECT company_part FROM hr_employee_benefits WHERE employee_id = NEW.employee_id AND benefit_code = NEW.benefit_code);
    SET NEW.price = (SELECT price FROM hr_employee_benefits WHERE employee_id = NEW.employee_id AND benefit_code = NEW.benefit_code);
    SET NEW.employee_part = 100 - NEW.company_part;
            
    -- Calcula los valores de company_part_value y employee_part_value
    SET company_part_value = (NEW.quantity * NEW.price) * (NEW.company_part / 100 ) ;
    SET employee_part_value = (NEW.quantity * NEW.price) * (NEW.employee_part / 100 ) ;

    SET NEW.company_part_value = company_part_value;
    SET NEW.employee_part_value = employee_part_value;

END