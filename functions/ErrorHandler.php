<?php

class ErrorHandler
{
    private $logFile;

    public function __construct($logFile = 'error_log.txt')
    {
        $this->logFile = $logFile;
    }

    public function logError(Exception $e, $params = [])
    {
        $error = ' <b>[Error]</b> <br>';
        $error .= '<b>[file]</b> [' . $e->getFile() . '] <br>';
        $error .= '<b>[line]</b> [' . $e->getLine() . '] <br>';
        $error .= '<b>[message]</b> [' . $e->getMessage() . '] <br>';

        // Agregar parámetros adicionales si existen
        foreach ($params as $key => $value) {
            $error .= '<b>[params][' . $key . ']</b> [' . (is_array($value) ? json_encode($value) : $value) . '] <br>';
        }

        // Registrar el error en el archivo de log
        file_put_contents($this->logFile, strip_tags($error) . "\n", FILE_APPEND);

        // Opcional: Lanzar una nueva excepción si necesitas que se gestione en otro lugar
        throw new Exception($error);
    }
}
