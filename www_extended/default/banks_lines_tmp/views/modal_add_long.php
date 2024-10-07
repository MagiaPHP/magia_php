<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_add_short">
    <?php echo icon("plus"); ?>
</button>

<!-- Modal -->
<div class="modal fade" id="modal_add_short" tabindex="-1" role="dialog" aria-labelledby="modal_add_shortLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_add_shortLabel">
                    Modal
                </h4>
            </div>
            <div class="modal-body">

                <?php include view('banks_lines_tmp', 'form_add_long') ?>

            </div>


        </div>
    </div>
</div>