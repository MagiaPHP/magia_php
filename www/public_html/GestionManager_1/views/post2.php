<div class="blog-post">
    <img src="https://picsum.photos/800/151" alt="alt"/>
    <h2 class="blog-post-title">Another blog post</h2>


    <p class="blog-post-meta">December 23, 2013 by <a href="#">Jacob</a></p>

    <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
    <blockquote>
        <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
    </blockquote>
    <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
    <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
</div><!-- /.blog-post -->

<hr>




<div class="blog-post">

    <img src="https://picsum.photos/800/150" alt="alt"/>
    <h2 class="blog-post-title">New feature</h2>
    <p class="blog-post-meta">December 14, 2013 by <a href="#">Chris</a></p>

    <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
    <ul>
        <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
        <li>Donec id elit non mi porta gravida at eget metus.</li>
        <li>Nulla vitae elit libero, a pharetra augue.</li>
    </ul>
    <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
    <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
</div><!-- /.blog-post -->


<?php
$i = 1;
foreach (agenda_list() as $key => $agenda) {
    ?>
    <div class="blog-post">

        <img src="https://picsum.photos/800/15<?php echo $i; ?>" alt="alt"/>
        <h2 class="blog-post-title"><?php echo $agenda['title'] ?></h2>
        <p class="blog-post-meta">December 14, 2013 by <a href="#">Chris</a></p>

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