<h3><?php _t("Translations"); ?></h3>


<?php foreach (_languages_list_by_status(1) as $key => $lang) { ?>
    <form method="post" action='index.php'>
        <input type="hidden" name="c" value="_translations">
        <input type="hidden" name="a" value="ok_push">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="content" value="<?php echo $_content['frase'] ?>">
        <input type="hidden" name="language" value="<?php echo $lang['language']; ?>">
        <input type="hidden" name="redi" value="3">
        <div class="form-group">
            <label for="translation"><?php echo $lang['name']; ?></label>
            <textarea 
                class="form-control" 
                name="translation"
                rows="3"
                ><?php echo _translations_by_content_language($_content['frase'], $lang['language']) ?></textarea>
        </div>
        <button type="submit" class="btn btn-default">
            <?php _t("Save"); ?> : <?php echo $lang['language']; ?>
        </button>
    </form>
    <br>
<?php } ?>


