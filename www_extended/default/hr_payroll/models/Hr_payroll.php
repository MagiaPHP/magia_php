<?php

class Payroll extends Hr_payroll {

    use Hr;

    // Definimos constantes de clase para los estados
    const STATUS_PAID = 20;
    const STATUS_UNPAID = 1;
    // Constantes para los códigos de error de estado de pago
    const ERROR_PENDING = 0;
    const ERROR_OVERPAID = -1;
    const ERROR_PAID = 1;
    // Constantes para los mensajes de estado
    const MESSAGE_PENDING = "Pending balance";
    const MESSAGE_OVERPAID = "Overpayment";
    const MESSAGE_PAID = "Fully paid";

    public $_lines = []; // Almacena las líneas de la nómina

    /**
     * Configura la nómina con el ID proporcionado.
     * Inicializa las etiquetas para cada ítem de nómina con los valores correspondientes.
     *
     * @param int $id El ID de la nómina.
     */
    public function setPayroll($id) {
        // Llama al método del padre para inicializar la nómina
        parent::setHr_payroll($id);

        // Itera sobre cada ítem de la nómina y configura las etiquetas con los valores adecuados

        foreach (hr_payroll_items_list() as $value) {
            $tag = '%' . $value['code'] . '%'; // Define la etiqueta
            // Asigna el valor de la línea de nómina a la etiqueta
            $this->setTag($tag, hr_payroll_lines_value_by_payroll_id_code($this->getId(), $value['code']));

            $this->_tag_list[] = $tag; // Añade la etiqueta al array de etiquetas
        }

        // Actualiza el estado del pago inmediatamente después de configurar la nómina
        //$this->updatePaymentStatus();
    }

    ////////////////////////////////////////////////////////////////////////////

    /**
     * Configura las líneas de la nómina para el ID actual.
     * Añade cada línea de nómina al array $_lines.
     */
    public function setLines() {
        // Busca y añade cada línea de nómina asociada al ID de la nómina actual
        foreach (hr_payroll_lines_search_by('payroll_id', $this->getId()) as $line) {
            $this->_lines[] = $line; // Añade la línea al array de líneas
        }
    }

    ////////////////////////////////////////////////////////////////////////////

    /**
     * Devuelve las líneas de la nómina.
     *
     * @return array Las líneas de la nómina.
     */
    public function getLines() {
        return $this->_lines; // Retorna las líneas de la nómina
    }

    ////////////////////////////////////////////////////////////////////////////

    /**
     * Obtiene el valor de la etiqueta proporcionada.
     *
     * @param string $tag La etiqueta a buscar.
     * @return mixed El valor de la etiqueta.
     */
    public function template($tag) {
        return $this->getTag($tag); // Retorna el valor de la etiqueta solicitada
    }

    ////////////////////////////////////////////////////////////////////////////

    /**
     * Actualiza el estado del pago basado en el total ya pagado.
     * Cambia el estado a pagado si el total pagado es igual o superior al total a pagar.
     * 
     * Esto lo delegamos al trigger
     * 
     */
    public function updatePaymentStatus() {
        $totalPaid = $this->getTotalAlreadyPaid(); // Obtiene el total ya pagado
        // Determina el nuevo estado basado en el total pagado        
        $newStatus = ($totalPaid >= $this->getTo_pay()) ? self::STATUS_PAID : self::STATUS_UNPAID;
        $this->changeStatus($newStatus); // Cambia el estado si es necesario
    }

    ////////////////////////////////////////////////////////////////////////////

    public function getTotalAlreadyPaid() {

        $totalPaid = banks_transactions_get_total_by_document_document_id('hr_payroll', $this->getId());

        return ($totalPaid) ? $totalPaid : 0;
    }

    ////////////////////////////////////////////////////////////////////////////

    /**
     * Cambia el estado de la nómina si es diferente al estado actual.
     *
     * @param int $newStatus El nuevo estado para la nómina.
     */
    public function changeStatus($newStatus) {
        // Verifica si el nuevo estado es diferente al actual
        if ($newStatus !== $this->getStatus()) {
            // Actualiza el estado de la nómina con el nuevo estado
            hr_payroll_update_status($this->getId(), $newStatus);
        }
    }

    /**
     * Retrieves the payment status of the payroll, providing details about the balance
     * or overpayment situation. The function calculates the balance based on the total
     * amount to be paid and the total amount already paid. It returns an array containing
     * a code error, the absolute balance, and a status message.
     *
     * The status array includes:
     * - 'code_error': A code indicating the payment status.
     *   - 0: Pending balance (some amount is yet to be paid).
     *   - -1: Overpayment (more than required amount is paid).
     *   - 1: Fully paid (exact amount is paid).
     * - 'balance': The absolute value of the balance or overpayment.
     * - 'message': A translated string indicating the payment status.
     *
     * @return array An associative array with 'code_error', 'balance', and 'message'.
     */
    public function getPaymentStatus() {

        $totalToPay = $this->getTo_pay(); // Gets the total amount to be paid

        $totalPaid = $this->getTotalAlreadyPaid(); // Gets the total amount already paid
        // Calculate the remaining balance or overpayment
        $balance = $totalToPay - $totalPaid;

        $status = [
            'code_error' => '', // Default code error value
            'balance' => abs($balance), // Absolute value of the balance
            'message' => '' // Default message
        ];

        if ($balance > 0) {
            $status['message'] = _tr(self::MESSAGE_PENDING);
            $status['code_error'] = self::ERROR_PENDING;
        } elseif ($balance < 0) {
            $status['message'] = _tr(self::MESSAGE_OVERPAID);
            $status['code_error'] = self::ERROR_OVERPAID;
        } else {
            $status['message'] = _tr(self::MESSAGE_PAID);
            $status['code_error'] = self::ERROR_PAID;
        }

        return $status; // Return the status array
    }

//
//
//
//
}
