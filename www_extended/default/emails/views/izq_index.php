

<form class="form-inline">
    <div class="form-group">
        <input type="text" class="form-control" id="" placeholder="">
    </div>

    <button type="submit" class="btn btn-default">
        <span class="glyphicon glyphicon-search"></span>
    </button>
</form>


<br>


<div class="list-group">
    <a href="#" class="list-group-item disabled">
        Index
    </a>
    <?php
    $i = 45;
    foreach (emails_search_by_reciver($u_id) as $id => $mensaje) {
        include "tmp_izq_email.php";
    }
    ?>
</div>