DELIMITER //

CREATE TRIGGER `update_payroll_status_on_delete`
AFTER DELETE ON `banks_transactions`
FOR EACH ROW
BEGIN
    -- Declara una variable para almacenar la suma de los `total`
    DECLARE total_sum DECIMAL(65,6);

    -- Verifica si el documento es de tipo `hr_payroll`
    IF OLD.document = 'hr_payroll' THEN
        -- Calcula la suma de los `total` para las transacciones correspondientes restantes
        SELECT SUM(total) INTO total_sum
        FROM banks_transactions
        WHERE document = 'hr_payroll'
          AND document_id = OLD.document_id;

        -- Verifica si la suma de los totales es igual o mayor al valor `to_pay`
        IF total_sum >= (SELECT to_pay FROM hr_payroll WHERE id = OLD.document_id) THEN
            -- Actualiza el estado del payroll a 20 (pagado) si el estado actual es 1 (pendiente)
            UPDATE hr_payroll
            SET status = 20
            WHERE id = OLD.document_id
              AND status = 1; -- Solo si el estado actual es 1 (pendiente)
        ELSE
            -- Actualiza el estado del payroll a 1 (pendiente) si la suma es menor y el estado actual es 20 (pagado)
            UPDATE hr_payroll
            SET status = 1
            WHERE id = OLD.document_id
              AND status = 20; -- Solo si el estado actual es 20 (pagado)
        END IF;
    END IF;
END //

DELIMITER ;
