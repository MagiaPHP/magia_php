<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <img src="www/gallery/img/tienda.jpg" width="width" height="height" alt="alt"/>

        <h4>Casa de la fiesta</h4>


        <p>
            Etiam porta <em>sem malesuada magna</em> mollis euismod. 
            Cras mattis consectetur purus sit amet fermentum. 
            Aenean lacinia bibendum nulla sed consectetur.
        </p>
    </div>

    <div class="sidebar-module">
        <h4>Archives</h4>
        <ol class="list-unstyled">
            <li><a href="#">March 2014</a></li>
            <li><a href="#">February 2014</a></li>
            <li><a href="#">January 2014</a></li>
            <li><a href="#">December 2013</a></li>
            <li><a href="#">November 2013</a></li>
            <li><a href="#">October 2013</a></li>
            <li><a href="#">September 2013</a></li>
            <li><a href="#">August 2013</a></li>
            <li><a href="#">July 2013</a></li>
            <li><a href="#">June 2013</a></li>
            <li><a href="#">May 2013</a></li>
            <li><a href="#">April 2013</a></li>
        </ol>
    </div>
    <div class="sidebar-module">
        <h4>Elsewhere</h4>
        <ol class="list-unstyled">
            <li><a href="#">GitHub</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Facebook</a></li>
        </ol>
    </div>
</div><!-- /.blog-sidebar -->


<div class="col-sm-3 col-sm-offset-1 blog-sidebar">            
    <div class="sidebar-module">
        <h4><?php _t('Categories'); ?></h4>
        <ol class="list-unstyled">
            <?php
            foreach (agenda_categories_list() as $key => $category) {
                echo '<li><a href="#">' . $category['category'] . '</a></li>';
            }
            ?>
        </ol>
    </div>
</div><!-- /.blog-sidebar -->



<div class="col-sm-3 col-sm-offset-1 blog-sidebar">            
    <div class="sidebar-module">

        <hr>
        <h4><?php _t('Search'); ?></h4>

        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Buscar</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="">
            </div>                                              

            <div class="checkbox">
                <label>
                    <input type="checkbox"> Only free
                </label>
            </div>
            <button type="submit" class="btn btn-default"><?php _t("Search"); ?></button>
        </form>


    </div>
</div><!-- /.blog-sidebar -->


<div class="col-sm-3 col-sm-offset-1 blog-sidebar">            
    <div class="sidebar-module">

        <hr>
        <h4><?php _t('Search'); ?></h4>

        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Date</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
            </div>


            <div class="form-group">
                <label for="category"><?php _t("Category"); ?></label>
                <select class="form-control" name="category" id="category">
                    <option>cine</option>
                </select>
            </div>


            <div class="form-group">
                <label for="category"><?php _t("Public"); ?></label>
                <select class="form-control" name="category" id="category">
                    <option>All</option>
                </select>
            </div>


            <div class="form-group">
                <label for="place"><?php _t("Place"); ?></label>
                <select class="form-control" name="place" id="place">
                    <option>All</option>
                </select>
            </div>





            <div class="checkbox">
                <label>
                    <input type="checkbox"> Only free
                </label>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>


    </div>
</div><!-- /.blog-sidebar -->



