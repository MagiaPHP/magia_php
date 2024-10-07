

<form class="form-inline">
    <input type="hidden" name="c" value="import">
    <input type="hidden" name="a" value="contacts_check">
    <input type="hidden" name="check" value="1">

    <div class="form-group">
        <label for="file">
            <?php _t("Contacts file"); ?>
        </label>
        <input type="file" id="exampleInputFile">
        <p class="help-block">
            <?php _t("You can get contacts example file"); ?>
        </p>
    </div>

    <div class="checkbox">
        <label>
            <input type="checkbox"> <?php _t("Just test my file"); ?>
        </label>
    </div>

    <button type="submit" class="btn btn-default">
        <?php _t("Send"); ?>
    </button>
</form>