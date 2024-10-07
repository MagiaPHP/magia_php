<form method="post" action="index.php">
    <input type="hidden" name="c" value="emails">
    <input type="hidden" name="a" value="ok_push_signature">
    <input type="hidden" name="redi" value="2">


    <div class="form-group">
        <label for="signature" class="">
            <?php _t("Signature"); ?>
        </label>




        <script src="includes/tinymce/js/tinymce/tinymce.min.js" type="text/javascript"></script>

        <script>
            tinymce.init({
                selector: 'textarea#signature'
            });
        </script>



        <textarea 
            class="form-control" 
            rows="8" 
            id="signature"
            name="signature"><?php echo user_options_search_by_user_option($u_id, 'emails_signature')['data']; ?></textarea>


    </div>





    <button type="submit" class="btn btn-default">
        <?php _t("Save"); ?>
    </button>
</form>


