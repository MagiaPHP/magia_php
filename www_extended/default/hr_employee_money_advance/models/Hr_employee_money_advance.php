<?php

class Money_advance extends Hr_employee_money_advance {

    public function __construct() {
        parent::__construct();
    }

//    /**
//     * Registra un nuevo avance de dinero en la base de datos.
//     */
//    public function registerAdvance($employee_id, $date, $value, $way, $order_by, $status) {
//        // Llamamos al método para agregar el avance en la base de datos.
//        // Suponemos que hay una función que maneja la inserción en la base de datos.
//        $result = hr_employee_money_advance_add($employee_id, $date, $value, $way, $order_by, $status);
//
//        // Si la inserción fue exitosa, actualizamos el objeto actual.
//        if ($result) {
//            $this->setHr_employee_money_advance($result);
//        }
//
//        return $result; // Retornamos el ID del nuevo avance si fue exitoso, o falso si falló.
//    }
//
//    /**
//     * Calcula el total de avances de dinero según el "way" dado para un mes y año específicos.
//     */
//    public static function getTotalByWay($way, $year, $month) {
//        // Primero, obtenemos la lista de todos los avances.
//        $advances = hr_employee_money_advance_list(); // Puedes especificar un rango si es necesario.
//
//        $total = 0.0;
//
//        foreach ($advances as $advance) {
//            if ($advance->_way === $way) {
//                $date = new DateTime($advance->_date);
//                if ($date->format('Y') == $year && $date->format('m') == $month) {
//                    $total += floatval($advance->_value);
//                }
//            }
//        }
//        return number_format($total, 2); // Formato a 2 decimales.
//    }
}
