<h3>Cada: <?php echo $expense->getEvery(); ?></h3>

<p><b>Date Start</b>: <?php echo $expense->getDate_start(); ?></p>
<p><b>Date End</b>: <?php echo $expense->getDate_end(); ?></p>

<?php
include "part_frecuency_every_" . $expense->getEvery() . ".php";
?>