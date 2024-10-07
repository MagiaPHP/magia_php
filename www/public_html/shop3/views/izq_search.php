
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Envio</div>
    <!-- List group -->
    <ul class="list-group">
        <li class="list-group-item">Cras justo odio</li>
        <li class="list-group-item">Dapibus ac facilisis in</li>
        <li class="list-group-item">Morbi leo risus</li>
        <li class="list-group-item">Porta ac consectetur ac</li>
        <li class="list-group-item">Vestibulum at eros</li>
    </ul>
</div>

<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Descriptipn</div>



    <!-- List group -->
    <ul class="list-group">
        <li class="list-group-item">Cras justo odio</li>
        <li class="list-group-item">Dapibus ac facilisis in</li>
        <li class="list-group-item">Morbi leo risus</li>
        <li class="list-group-item">Porta ac consectetur ac</li>
        <li class="list-group-item">Vestibulum at eros</li>
    </ul>
</div>

<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Precio</div>



    <!-- List group -->
    <ul class="list-group">
        <li class="list-group-item">Cras justo odio</li>
        <li class="list-group-item">Dapibus ac facilisis in</li>
        <li class="list-group-item">Morbi leo risus</li>
        <li class="list-group-item">Porta ac consectetur ac</li>
        <li class="list-group-item">Vestibulum at eros</li>
    </ul>
</div>



<ul class="list-group">
    <?php
    foreach (products_categories_list() as $key => $products_categories_list) {
        echo '<li class="list-group-item"><a href="index.php?c=public_html&a=search&w=by_category&id=' . $products_categories_list["id"] . '">' . $products_categories_list["name"] . '</a></li>';
    }
    ?>
    <li class="list-group-item">Cras </li>
    <li class="list-group-item">Dapibus in</li>
    <li class="list-group-item">Morbi</li>
    <li class="list-group-item">Porta ac</li>
    <li class="list-group-item">Vestibulum</li>
</ul>