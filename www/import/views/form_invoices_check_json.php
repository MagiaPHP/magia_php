

<form class="form-horizontal"  target="new" action="index.php" method="post">
    <input type="hidden" name="c" value="import">
    <input type="hidden" name="a" value="ok_invoices_check_json">

    <div class="form-group">
        <label for="json">Json</label>
        <textarea class="form-control" name="json" id="json" rows="20"></textarea>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">
            <?php _t("Check Json"); ?>
        </button>
    </div>
</form>

