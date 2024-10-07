<h3><?php _t("Tags contact"); ?></h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Tags"); ?></th>
            <th><?php _t("Preview"); ?></th>
        </tr>
    </thead>

    <tbody>
        <?php
        include pdf_template("contact");

        $pdf = new PDF_CONTACT();
        $pdf->setPdfContact($id);
        $pdf->setDocModele(_options_option('doc_model'));
        $pdf->setDoc('contact');
        $pdf->setLang($lang);

        $pdf->SetTitle("Coello.be");
        $pdf->SetAuthor("Robinson Coello <info@coello.be>");
        $pdf->SetCreator("Coello.be");
        $pdf->SetKeywords("Coello.be");
        $pdf->SetSubject("contact");
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