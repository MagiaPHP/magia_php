
<div class="media">

    <div class="media-left media-middle">
        <a href="#">
            <img class="media-object" src="user.webp" width="50" alt="...">
        </a>
    </div>

    <div class="media-body">
        <h4 class="media-heading">
            <?php echo contacts_formated($value['sender_id']) ?> - <?php echo $value["date"]; ?>
        </h4>
        <p>
            <?php echo $value["comment"]; ?>

        </p>
    </div>
</div>
