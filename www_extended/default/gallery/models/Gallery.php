<?php

class Gallery {

    //http://www.ecommerce-pro.com/tutoriel/convertisseur_octets.php 
    // private $_max_size = 110000; // Peso máximo. MAX_FILE_SIZE sobrescribe este valor  
    public $_path = "www/gallery/img/scan/"; // debe terminar con /
    //
    private $_max_size = 999999; // Peso máximo. MAX_FILE_SIZE sobrescribe este valor  (40 MB * 1024) 
    private $_formatedName = "FILE.lat";
    private $_name;
    private $_type;
    private $_tmp_name;
    private $_errors = array();
    private $_size;
    // extenciones aceptadas
    private $_ext_acepted = array(
        "text/x.gcode",
        ".stl",
        "model/stl",
        "model/x.stl-ascii",
        "model/x.stl-binary",
        "application/stl",
        "application/x.stl-ascii",
        "application/x.stl-binary",
        "application/stl-geometry",
        //  "application/json", 
        "text/plain",
        //  "application/zip",
        "application/octet-stream"
    );

    public function __set($var, $value) {
        $this->$var = $value;
    }

    public function __get($var) {
        return $this->$var;
    }

    public function _set_ext_acepted($ext_list) {
        $this->_ext_acepted = $ext_list;
    }

    public function _get_ext_acepted() {
        return $this->_ext_acepted;
    }

    public function _get_name() {
        return $this->_name;
    }

    public function _set_path($path) {
        $this->_path = $path;
    }

    public function _get_path() {
        return $this->_path;
    }

    public function __construct($file) {
        // si el nombre tiene espacio, lo remplara por '_'
        // pasa a minusculas

        $this->_name = strtolower(str_replace(' ', '_', $file['name']));
        $this->_type = ($file['type']);
        $this->_tmp_name = ($file['tmp_name']);
        $this->_size = ($file['size']);

        if ($file['error'] != 0) {
            array_push($this->_errors, $file['error']);
        }
    }

    public function sendFile() {

        if (!$this->checkFileType()) {
            array_push($this->_errors, "File extension not accepted");
            array_push($this->_errors, "File extension: $this->_type");
        }

        if (!$this->checkFileSize()) {
            array_push($this->_errors, "Size file is too big");
        }

        if (!$this->changeName()) {
            array_push($this->_errors, "Could not change name");
        }

        if (!$this->checkPath()) {
            echo mkdir($this->_path, 0775);
        }

        // si no hay erroes mando 
        if (empty($this->_errors)) {

            if (!$this->movefile()) {
                array_push($this->_errors, "Could not send file");
            }
        }

        return $this->_errors;
    }

    public function movefile() {
        $origen = $this->_tmp_name;
        $destino = $this->_path . $this->_formatedName;

        if (move_uploaded_file($origen, $destino)) {
            return $destino;
        } else {
            array_push($this->_errors, "Could not send file ");
        }

        return false;
    }

    public function changeName() {
        // si no hay nuevo nombre
        if (!$this->_name) {
            return false;
        }

        $newName = date("Y-m-d-H-i-s-") . "x-" . uniqid(); //url_amigable($this->_name);

        switch ($this->_type) {

            case "application/octet-stream":
            case ".stl":
            case"model/stl":
            case"model/x.stl-ascii":
            case"model/x.stl-binary":
            case"application/stl":
            case"application/x.stl-ascii":
            case"application/x.stl-binary":
            case"application/stl-geometry":
                $this->_formatedName = $newName . ".stl";
                return true;
                break;
            case "text/x.gcode":
                $this->_formatedName = $newName . '.txt';
                return true;
                break;

            case "application/json":
                $this->_formatedName = $newName . '.json';
                return true;
                break;

            case "application/pdf":
                $this->_formatedName = $newName . '.pdf';
                return true;
                break;

            case "text/plain":
                $this->_formatedName = $newName . '.txt';
                return true;
                break;

            case "text/csv":
                $this->_formatedName = $newName . '.csv';
                return true;
                break;

            case "application/zip":
                $this->_formatedName = $newName . '.zip';
                return true;
                break;

            case "image/jpeg":
            case "image/jpg":
                $this->_formatedName = $newName . '.jpg'; // se pone lo mismo pero 
                return true;
                break;

            case "image/png":
                $this->_formatedName = $newName . '.png';
                return true;
                break;

            case "image/webp":
                $this->_formatedName = $newName . '.webp';
                return true;
                break;

            default :
                $this->_formatedName = $newName;
                return true;
                break;
        }
    }

    public function checkFileType() {
        // Verifica que la extensión sea permitida, según el arreglo $_extentions
        return (in_array(strtolower($this->_type), $this->_ext_acepted)) ? true : false;
    }

    // verifica que el peso del fichero 
    public function checkFileSize() {
        return ($this->_size <= $this->_max_size) ? true : false;
    }

    public function checkPath() {
        if ($this->_path == '') {
            array_push($this->_errors, "Empty path");
            return false;
        }

        if (!is_dir($this->_path)) {
            array_push($this->_errors, "$this->_path it s not a directory");
            //   array_push($this->_errors , "it s not a directory");
            return false;
        }
        return true;
    }

    public function checkDownloadCorrectly() {
        return ( file_exists($this->_path . $this->_formatedName) ) ? true : false;
    }

    public function checkDigitControl($fileName) {
        // separamos por partes: 
        // id de la order
        // side
        // fecha (14 digitos despues del SIDE        
        // el ultimo antes del guion es el digito de control         
        // gion
        // Uniqueid()
        // punto
        // extencion 
        // Debo saber el valor del side
        // contar cuentos digitos hay antes del guion
        // el ultimo es el digito de control s
        // largo antes del guion
        $l = strpos($fileName, "L");
        $r = strpos($fileName, "R");
        $s = strpos($fileName, "S");

        $digitcontrol = $fileName[strpos($fileName, "-") - 1];

        return $digitcontrol;
    }

    public function get_Error() {
        return $this->_errors;
    }

    public function get_ExtentionAceptedOnly() {
        return $this->_ext_acepted;
    }

    public function get_path() {
        return $this->_path;
    }

    public function get_formatedName() {
        return $this->_formatedName;
    }

    public function get_max_size() {
        return $this->_max_size;
    }
}
