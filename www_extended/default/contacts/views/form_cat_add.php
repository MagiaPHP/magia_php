<form class="form-horizontal" action="index.php" method="post">

    <input type="hidden" name="c" id="c"  value="articles">			    	
    <input type="hidden" name="a" id="a"  value="cat_add">		

    <input type="hidden" name="article_id" id="article_id"  value="<?php echo $detail_article["id"] ?>">			    	


    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Category"); ?></label>
        <div class="col-sm-10">                                                
            <select class="form-control" name="category_id">
                <?php
                foreach (categories_list() as $key => $value) {
                    //$selected = ($value['id'] == $detail_article['category_id'] ) ? " selected " : "80";
                    //echo "<option  value=\"$value[id]\" $selected >$value[category]</option>\n";

                    if (!array_search($value[id], articles_categories($detail_article['id']))) {
                        echo "<option  value=\"$value[id]\" $selected >$value[category]</option>\n";
                    }
                }
                ?>
            </select>
        </div>
    </div>




    <div class="form-group">	
        <div class="col-sm-offset-2 col-sm-10" >
            <input class="btn btn-primary active col-sm-2" type ="submit" value ="<?php _t("Add"); ?>">
        </div>	
    </div>

</form>	


