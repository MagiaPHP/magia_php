<?php

$html = '

<div class="text-left">
<a href="#" data-toggle="modal" data-target="#projectsDetailsAddContact">
   ' . icon('plus') . '
</a>


<div class="modal fade" id="projectsDetailsAddContact" tabindex="-1" role="dialog" aria-labelledby="projectsDetailsAddContactLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="projectsDetailsAddContactLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
</div>
';

echo $html;
