<div class="container">
    <h2>Debugs</h2>

    <table width="100%" border>
        <theader>
            <th>Item</th>
            <th>Valor</th>
        </theader>
        <tbody>
            <tr>
                <td>$c</td>
                <td><pre><?php echo var_dump($c) ?></pre></td>
                <td><?php echo ($c == "articles" ) ? "ok" : "Error"; ?></td>
            </tr>


            <tr>
                <td>$a</td>
                <td><pre><?php echo var_dump($a) ?></pre></td>
                <td><?php echo ($a == "add" ) ? "ok" : "Error"; ?></td>
            </tr>

            <tr>
                <td>$name</td>
                <td><pre><?php echo var_dump($name) ?></pre></td>
                <td>
                    <?php echo ($name == "" ) ? "Nombre vacio" : ""; ?>
                    <?php echo (is_numeric($name) ) ? "Solo numeros" : ""; ?>

                </td>
            </tr>

            <tr>
                <td>$name</td>
                <td><pre><?php echo var_dump($quantity) ?></pre></td>
                <td>
                    <?php echo ($quantity == "" ) ? "quantity esta vacio" : ""; ?>


                </td>
            </tr>

            <tr>
                <td>$name</td>
                <td><pre><?php echo var_dump($price) ?></pre></td>
                <td>
                    <?php echo ($price == "" ) ? "price vacio" : ""; ?>


                </td>
            </tr>

            <tr>
                <td>$name</td>
                <td><pre><?php echo var_dump($description) ?></pre></td>
                <td>
                    <?php echo ($description == "" ) ? "description vacio" : ""; ?>                            
                </td>
            </tr>


            <tr>
                <td>$_GET</td>
                <td><pre><?php echo var_dump($_GET) ?></pre></td>
                <td><?php echo (isset($_GET)) ? "En este formulario un GET no aplica, ir a www/articles/views/add.php y cambiar por POST el formulario" : "Correcto" ?></td>
            </tr>


            <tr>
                <td>$_POST</td>
                <td><pre><?php echo var_dump($_POST) ?></pre></td>
                <td><?php echo (isset($_POST) && $_POST != null) ? "Algo" : "Vacio"; ?></td>
            </tr>


        </tbody>
    </table>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>