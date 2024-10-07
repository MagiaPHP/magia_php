<?php

echo '<div class="media">
    <div class="media-left">
        <a href="#">
            <img class="media-object" src="https://picsum.photos/50/' . $i++ . '" alt="...">
        </a>
    </div>
    <div class="media-body">
        <h4 class="media-heading"><a href="index.php?c=emails&a=details&id=' . $mensaje["id"] . '">' . contacts_formated($mensaje["sender_id"]) . '</a></h4>
        
            <p>' . $mensaje["subjet"] . '</p>
            <p>' . $mensaje["folder"] . '</p>
    </div>
</div>';

