<table class="table table-condensed" border>
    <thead>
        <tr>
            <th>Art</th>
            <th>Cantidad</th>
            <th>Total</th>
            <th>acciones</th>
        </tr>

        <?php
        foreach (products_list() as $key => $compras) {
            echo '<tr>
            <td>' . $compras["name"] . '</td>
            <td>1</td>
            <td>' . $compras["price"] . '</td>
            <td>Borrar</td>
        </tr>';
        }
        ?>
        <tr>
            <th>Art</th>
            <th>Cantidad</th>
            <th>Total</th>
            <th>acciones</th>
        </tr>


    </thead>
</table>


<hr>

<a href="#" class="btn btn-primary">Boton Pagar</a>