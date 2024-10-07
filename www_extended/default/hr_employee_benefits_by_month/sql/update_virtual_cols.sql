ALTER TABLE `hr_employee_benefits_by_month`
  ADD COLUMN `employee_part` INT GENERATED ALWAYS AS (100 - `company_part`) VIRTUAL,
  ADD COLUMN `company_part_value` DECIMAL(65,6) GENERATED ALWAYS AS (`quantity` * `price` * (`company_part` / 100)) VIRTUAL,
  ADD COLUMN `employee_part_value` DECIMAL(65,6) GENERATED ALWAYS AS (`quantity` * `price` * (`employee_part` / 100)) VIRTUAL;
