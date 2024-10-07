
<?php
$i = 1;
foreach (agenda_list() as $key => $agenda) {
    ?>
    <div class="blog-post">

        <img src="https://picsum.photos/800/15<?php echo $i; ?>" alt="alt"/>
        <h2 class="blog-post-title"><?php echo $agenda['title'] ?></h2>
        <p class="blog-post-meta">December 14, 2013 by <a href="#">Chris</a></p>
        <p class="blog-post-meta"><a href="index.php?c=public_html&a=by_place&id=1">Casa de la fiesta</a></p>

        <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <ul>
            <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
            <li>Donec id elit non mi porta gravida at eget metus.</li>
            <li>Nulla vitae elit libero, a pharetra augue.</li>
        </ul>
        <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
        <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
        <hr>
    </div><!-- /.blog-post -->
    <?php
    $i++;
}
?>
