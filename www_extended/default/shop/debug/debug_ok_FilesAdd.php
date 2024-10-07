<?php
$vars = array();
array_push($vars, array('$u_rol', 'labo', $u_rol));
array_push($vars, array('$c', 'shop', $c));
array_push($vars, array('$order_id', '1', $order_id));
array_push($vars, array('$_FILES[image][type]', 'uno de los tipos aceptados', $_FILES["image"]['type']));
array_push($vars, array('$subir->get_exts()', 'la extencion enviada', $subir->get_exts()));

echo vardump($_FILES);
echo vardump($subir->get_exts());
?>
<br><br><br>
<table class="table table-bordered" width="50%">
    <tr>
        <td>n</td>
        <td>var</td>
        <td>Esperado</td>
        <td>Recibido</td>
    </tr>
    <?php
    foreach ($vars as $key => $value) {
        $atencion = ($value[1] !== $value[2]) ? "Atencion" : "ok";
        echo "<tr>
            <td>$key</td>"
        . "<td>$value[0]</td> "
        . "<td>$value[1]</td> "
        . "<td>$value[2]</td> "
        . "<td>$atencion</td>
        </tr>";
    }
    ?>
</table>
