<?php

class JSON {

    //public $_id;
    public $_factux = array(
        "version" => "1",
        "url" => "factux.be"
    );
    public $_document;
    public $_reciver;
    public $_sender;

    function __construct($json) {


        $data = is_json($json) ? json_decode($json, true) : [];

        $this->_id = magia_uniqid();

        $this->_document = new Invoices($data['_id']);

        $this->_reciver = New Contacts($data['_sender']['_id']);

        $this->_sender = New Contacts($data['_client']['_id']);
    }

    function getFactux() {
        return $this->_factux;
    }

    function getDoc() {
        return $this->_document;
    }

    function getReciver() {
        return $this->_reciver;
    }

    function getSender() {
        return $this->_sender;
    }
}

function json_decode_safe($jsonString, $return_array = true) {
    // Verificar si la cadena no es null y es una cadena no vacía
    if (is_string($jsonString) && !empty($jsonString)) {
        // Decodificar el JSON
        $decodedData = json_decode($jsonString, $return_array);

        // Comprobar si ocurrió un error en la decodificación
        if (json_last_error() === JSON_ERROR_NONE) {
            return $decodedData;
        } else {
            // Manejar el error si la decodificación falla
            error_log("Error decodificando JSON: " . json_last_error_msg());
            return null;  // O devuelve un valor predeterminado, como un array vacío
        }
    }

    // Si el valor es null o no es una cadena válida, devolver un valor predeterminado
    return $return_array ? [] : null;  // Si $assoc es true, devolver un array, de lo contrario null
}
