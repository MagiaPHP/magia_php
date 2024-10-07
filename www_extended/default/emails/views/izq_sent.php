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
        Sent
    </a>
    <?php
    $i = 45;
    foreach (emails_search_by_sender($u_id) as $id => $mensaje) {
//        echo '<a href="index.php?c=emails&a=sent&id=' . $mensaje['id'] . '" class="list-group-item">';
//        echo contacts_formated($mensaje['reciver_id']);
//        echo '<br>';
//        echo $mensaje['subjet'];
//        echo '</a>';
        include "tmp_izq_email.php";
    }
    ?>


</div>