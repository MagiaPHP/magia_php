<?php

include pdf_template("doc");

$pdf = new PDF_DOC();

//$pdf->setPdfInvoice($id);
$pdf->setDocModele(_options_option('doc_model'));
$pdf->setDoc('doc');

$pdf->SetTitle("Coello.be");
$pdf->SetAuthor("Robinson Coello <info@coello.be>");
$pdf->SetCreator("Coello.be");
$pdf->SetKeywords('invoice->exportJson()');
$pdf->SetSubject("Invoice");
$pdf->AliasNbPages();
$pdf->AddPage();
// 
$pdf->body();

switch ($way) {
    case "pdf":

        ############################################################################
        ############################################################################
        ############################################################################
        $level = 1; // 5 niveles: 1 bajo, 2 medio, 3 alto, 4 atencion, 5 critico
        $date = null;
        //$u_id
        //$u_rol , 
        //$c , 
        //$a , 
        $w = null;
        $description = "Export PDF invoice $id";
        $doc_id = $id;
        $crud = "read";
        $error = ($error) ? json_encode($error) : null;
        $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
        $val_post = ( isset($_POST) ) ? json_encode($_POST) : null;
        $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
        $ip4 = get_user_ip();
        $ip6 = get_user_ip6();
        $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php

        logs_add(
                $level, $date, $u_id, $u_rol, $c, $a, $w,
                $description, $doc_id, $crud, $error,
                $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
        );
        ############################################################################
        ############################################################################
        ############################################################################




        $pdf->Output("Invoice_$id" . ".pdf", "D");
        break;

    case "web":

        ############################################################################
        ############################################################################
        ############################################################################
        $level = 1; // 5 niveles: 1 bajo, 2 medio, 3 alto, 4 atencion, 5 critico
        $date = null;
        //$u_id
        //$u_rol , 
        //$c , 
        //$a , 
        $w = null;
        $description = "See pdf invoice ( $id ) in web";
        $doc_id = $id;
        $crud = "read";
        $error = ($error) ? json_encode($error) : null;
        $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
        $val_post = ( isset($_POST) ) ? json_encode($_POST) : null;
        $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
        $ip4 = get_user_ip();
        $ip6 = get_user_ip6();
        $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php

        logs_add(
                $level, $date, $u_id, $u_rol, $c, $a, $w,
                $description, $doc_id, $crud, $error,
                $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
        );
        ############################################################################
        ############################################################################
        ############################################################################
        $pdf->Output("Invoice_$id" . ".pdf", "I");
        break;

    case "email":

        ##----------------------------------------------------------------------
        ##----------------------------------------------------------------------
        ##----------------------------------------------------------------------
        ##----------------------------------------------------------------------
        ##----------------------------------------------------------------------
        $email_Subject = "$config_company_name Invoice";
        //$reciver_email = ""; 
        // $reciver_name $reciver_lastname
        $email_Body = $message;
        $email_AltBody = '$email_AltBody';
        ##----------------------------------------------------------------------
        ##----------------------------------------------------------------------
        ##----------------------------------------------------------------------
        ##----------------------------------------------------------------------
        ##----------------------------------------------------------------------
        // 
        ############################################################################
        ############################################################################
        ############################################################################
        $level = 1; // 5 niveles: 1 bajo, 2 medio, 3 alto, 4 atencion, 5 critico
        $date = null;
        //$u_id
        //$u_rol , 
        //$c , 
        //$a , 
        $w = null;
        $description = "Send invoice ( $id ) by email";
        $doc_id = $id;
        $crud = "read";
        $error = ($error) ? json_encode($error) : null;
        $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
        $val_post = ( isset($_POST) ) ? json_encode($_POST) : null;
        $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
        $ip4 = get_user_ip();
        $ip6 = get_user_ip6();
        $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php

        logs_add(
                $level, $date, $u_id, $u_rol, $c, $a, $w,
                $description, $doc_id, $crud, $error,
                $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
        );
        ############################################################################
        ############################################################################
        ############################################################################



        $doc = $pdf->Output("S");

        include controller("emails", "send_email_file");

        break;

    default:


        ############################################################################
        ############################################################################
        ############################################################################
        $level = 1; // 5 niveles: 1 bajo, 2 medio, 3 alto, 4 atencion, 5 critico
        $date = null;
        //$u_id
        //$u_rol , 
        //$c , 
        //$a , 
        $w = null;
        $description = "See pdf invoice ( $id ) in web (default) ";
        $doc_id = $id;
        $crud = "read";
        $error = ($error) ? json_encode($error) : null;
        $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
        $val_post = ( isset($_POST) ) ? json_encode($_POST) : null;
        $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
        $ip4 = get_user_ip();
        $ip6 = get_user_ip6();
        $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php

        logs_add(
                $level, $date, $u_id, $u_rol, $c, $a, $w,
                $description, $doc_id, $crud, $error,
                $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
        );
        ############################################################################
        ############################################################################
        ############################################################################      




        $pdf->Output("Invoice_$id" . ".pdf", "I");

        break;
}


