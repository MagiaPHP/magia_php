<form>

    <?php
    //foreach (type_article_array() as $key => $value) {
    foreach (categories_list() as $key => $value) {

        echo ' <div class="checkbox">
                <label>
                    <input type="checkbox"> ' . $value['category'] . '
                </label>
            </div>';
    }
    ?>   

    <button type="submit" class="btn btn-default">
        <?php _t("Submit"); ?>
    </button>
</form>