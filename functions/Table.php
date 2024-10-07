<?php

class Table {

    private $columns = [];    // Columnas de la tabla
    private $data = [];       // Datos de la tabla
    private $order_col = '';  // Columna por la que se ordena
    private $order_way = '';  // Dirección del orden
    private $sortable = false; // Si la tabla debe ser ordenable
    private $class = '';       // Clases CSS opcionales para la tabla

    /**
     * Constructor para inicializar la clase.
     *
     * @param array $columns - Array con los encabezados de la tabla.
     * @param array $data - Array con los datos a mostrar en la tabla.
     * @param bool $sortable - Definir si las columnas son ordenables.
     * @param string $class - Clases CSS opcionales para la tabla.
     */
    public function __construct(array $columns, array $data, $sortable = false, $class = '') {
        $this->columns = $columns;
        $this->data = $data;
        $this->sortable = $sortable;
        $this->class = $class;
    }

    /**
     * Define la columna y el orden de ordenación.
     *
     * @param string $col - Columna para ordenar.
     * @param string $way - Dirección del orden (asc/desc).
     */
    public function setOrder($col, $way) {
        $this->order_col = $col;
        $this->order_way = $way;
    }

    /**
     * Renderiza los encabezados de la tabla.
     */
    private function renderHeaders() {                
        
        echo "<thead><tr>";
        
        foreach ($this->columns as $col) {
            echo "<th>";
            
            if ($this->sortable) {
                
                $order_icon = $this->getOrderIcon($col);
                
                $next_order_way = $this->order_way === 'asc' ? 'desc' : 'asc';
                
                echo "<a href='?order_col={$col}&order_way={$next_order_way}'>";
                
                echo ucfirst($col) . " $order_icon</a>";
                
            } else {
                
                echo ucfirst($col);
            }
            echo "</th>";
        }
        echo "</tr></thead>";
    }

    /**
     * Renderiza el cuerpo de la tabla.
     */
    private function renderBody() {
        echo "<tbody>";
        foreach ($this->data as $row) {
            echo "<tr>";
            foreach ($this->columns as $col) {
                echo "<td>{$row[$col]}</td>";
            }
            echo "</tr>";
        }
        echo "</tbody>";
    }

    /**
     * Renderiza la tabla completa.
     */
    public function renderTable() {
        echo "<table class='{$this->class}'>";
        $this->renderHeaders();
        $this->renderBody();
        echo "</table>";
    }

    /**
     * Obtiene el icono de orden para las columnas ordenables.
     *
     * @param string $col - Columna actual.
     * @return string - Icono de ordenación.
     */
    private function getOrderIcon($col) {
        if ($col == $this->order_col) {
            return $this->order_way === 'asc' ? '<span class="glyphicon glyphicon-sort-by-alphabet"></span>' : '<span class="glyphicon glyphicon-sort-by-alphabet-alt"></span>';
        }
        return '';
    }
}
