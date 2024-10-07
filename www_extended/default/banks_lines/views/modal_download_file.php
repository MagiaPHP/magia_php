<div class="modal fade" id="modal_download_file" tabindex="-1" role="dialog" aria-labelledby="modal_download_fileLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_download_fileLabel">
                    <?php _t("Download file"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <?php
                if (banks_lines_check_list()) { // si hay lineas en esta tabla 
                    message('info', 'You still have bank lines waiting to be reviewed and corrected, you should do that first before continuing.');

                    echo '<a href="index.php?c=banks_lines_check">' . _tr("Click here to do that") . '</a>';
                } else {



                    if (files_get_total_files_in_folder('tmp') >= 3) {
                        message('info', 'You have reached the maximum number of possible files, delete some to continue uploading more files');

                        echo '<p><a href="index.php?c=banks_lines&a=import">' . _tr("Delete here") . '</a></p>';
                    } else {
                        include "form_download_file.php";
                    }
                    //
                    //
                    //
                }
                ?>


            </div>




        </div>
    </div>
</div>

