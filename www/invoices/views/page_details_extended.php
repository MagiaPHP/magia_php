<div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">HTML</a></li>
        <li role="presentation"><a href="#pdf" aria-controls="pdf" role="tab" data-toggle="tab">PDF</a></li>
        <li role="presentation"><a href="#json" aria-controls="json" role="tab" data-toggle="tab">JSON</a></li>
        <li role="presentation"><a href="#ubl" aria-controls="ubl" role="tab" data-toggle="tab">UBL</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
            <p>&nbsp;</p>
            <?php include "page_details.php"; ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="pdf">
            <p>&nbsp;</p>
            <?php include "page_details_pdf.php"; ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="json">
            <p>&nbsp;</p>
            <?php include "page_details_json.php"; ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="ubl">
            <p>&nbsp;</p>
            <?php include "page_details_ubl.php"; ?>
        </div>
    </div>

</div>