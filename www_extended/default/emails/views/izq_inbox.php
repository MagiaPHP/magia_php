
<div class="list-group">
    <a href="#" class="list-group-item disabled">
        Sent
    </a>
    <?php
    $i = 45;
    foreach (emails_search_by_sender($u_id) as $id => $mensaje) {
        echo '  <a href="#" class="list-group-item">Robinson<br>un poco del tex</a>';
    }
    ?>

    <?php
    $i = 45;
    foreach (emails_search_by_folder_reciver('inbox', $u_id) as $id => $mensaje) {
        include "izq_items.php";
    }
    ?>

</div>




