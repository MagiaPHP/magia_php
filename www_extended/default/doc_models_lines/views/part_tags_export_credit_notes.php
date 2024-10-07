<h3><?php _t("Tags export_credit notes"); ?></h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Tags"); ?></th>
            <th><?php _t("Preview"); ?></th>
        </tr>
    </thead>

    <tbody>
        <?php
        include pdf_template("export_credit_notes");

        $pdf = new PDF_EXPORT_CREDIT_NOTES();
        $pdf->setCredit_notes($credit_notes);
        $pdf->setDocModele(_options_option('doc_model'));
        $pdf->setDoc('export_credit_notes');
        $pdf->setLang($lang);

        $pdf->SetTitle("Coello.be");
        $pdf->SetAuthor("Robinson Coello <info@coello.be>");
        $pdf->SetCreator("Coello.be");
        $pdf->SetKeywords("Coello.be");
        $pdf->SetSubject("Budget");
        $pdf->AliasNbPages();

        $pdf->AddPage();

        $pdf->body();
        foreach ($pdf->getTagList() as $key => $tag) {
            echo '<tr>';
            echo '<td><b>' . $key . '</b></td>';
            echo '<td>' . $tag . '</td>';
            echo '</tr>';
        }
        ?>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>