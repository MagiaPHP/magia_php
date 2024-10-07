

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


<form class="navbar-form navbar-right" method="post" action="index.php">

    <input type="hidden" name="c" value="users">
    <input type="hidden" name="a" value="identification">  


    <div class="form-group">
        <input type="text" name="login" placeholder="Email" class="form-control">
    </div>

    <div class="form-group">
        <input type="password" name="password" placeholder="Password" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Sign in</button>
</form>

