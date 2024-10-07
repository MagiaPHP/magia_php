<?php
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    $config_company_domain_name = "http://" . $_SERVER['SERVER_NAME'] . "/factuz";
} else {
    $config_company_domain_name = "https://" . $_SERVER['SERVER_NAME'];
}

$lang = $u_language;

//$cell_selected = ($doc_models_lines->getId() !== null ) ?? false;
$cell_selected = $id;

switch ($doc) {
    case 'default':
        $url_preview = "$config_company_domain_name/index.php?c=doc_models&a=pdf_default&lang=$lang&cell_selected=$cell_selected";
        $part_tags = 'part_tags_doc';
//        echo __LINE__;
        break;

    case 'expenses':
        $url_preview = "$config_company_domain_name/index.php?c=expenses&a=export_pdf&id=145&lang=$lang&cell_selected=$cell_selected";
        $part_tags = 'part_tags_expenses';
        break;

    case 'budgets':

        $last_budget = budgets_max_id();
        $url_preview = "$config_company_domain_name/index.php?c=budgets&a=export_pdf&id=$last_budget&lang=$lang&cell_selected=$cell_selected";
        $part_tags = 'part_tags_budgets';
        break;

    case 'credit_notes':
        $last_credit_note = credit_notes_max_id();
        $url_preview = "$config_company_domain_name/index.php?c=credit_notes&a=export_pdf&id=$last_credit_note&lang=$lang&";
        $part_tags = 'part_tags_credit_notes';
        break;

    case 'balance':
        $url_preview = "$config_company_domain_name/index.php?c=balance&a=export_pdf&id=30&lang=$lang&cell_selected=$cell_selected";
        $part_tags = 'part_tags_balance';

        break;

    case 'reminders1':
        $url_preview = "$config_company_domain_name/index.php?c=invoices&a=export_pdf_r1&way=web&id=" . invoices_max_id() . "&lang=$lang&cell_selected=$cell_selected";
        $part_tags = 'part_tags_reminders1';

        break;

    case 'reminders2':
        $url_preview = "$config_company_domain_name/index.php?c=invoices&a=export_pdf_r2&way=web&id=" . invoices_max_id() . "&lang=$lang&cell_selected=$cell_selected";
        $part_tags = 'part_tags_reminders2';

        break;

    case 'reminders3':
        $url_preview = "$config_company_domain_name/index.php?c=invoices&a=export_pdf_r3&way=web&id=" . invoices_max_id() . "&lang=$lang&cell_selected=$cell_selected";
        $part_tags = 'part_tags_reminders3';

        break;

    case 'doc':
        $url_preview = "$config_company_domain_name/index.php?c=$doc&a=export_pdf&id=$id_demo&lang=$lang&cell_selected=$cell_selected";
        $part_tags = 'part_tags_doc';

        break;

    case 'contacts': // Exporta todos los contactos
        $url_preview = "$config_company_domain_name/index.php?c=contacts&a=export_all_pdf&only=all&lang=$lang&cell_selected=$cell_selected";
        $part_tags = 'part_tags_contacts';
        break;

    case 'contact': // Exporta todos los contactos
        $url_preview = "$config_company_domain_name/index.php?c=contacts&a=ficha_cliente&id=60040&lang=$lang&cell_selected=$cell_selected";
        $part_tags = 'part_tags_contact';
        break;

    // ERRORO EXPENSES
    // ERRORO
    case 'export_contacts': // Exporta los contacts
        $url_preview = "$config_company_domain_name/index.php?c=contacts&a=export_all_pdf&only=all&lang=$lang&cell_selected=$cell_selected";
        $part_tags = 'part_tags_export_contacts';
        break;

    case 'export_providers': // Exporta los providers
        $url_preview = "$config_company_domain_name/index.php?c=contacts&a=export_providers&only=all&lang=$lang&cell_selected=$cell_selected";
        $part_tags = 'part_tags_export_providers';
        break;

    case 'export_invoices': // Exporta las invoices
        $url_preview = "$config_company_domain_name/index.php?c=invoices&a=export_all_pdf&year=2023&m=t4&format=pdf&lang=$lang&cell_selected=$cell_selected";
        $part_tags = 'part_tags_export_invoices';
        break;

    case 'export_credit_notes': // Exporta las credit_notes
        $url_preview = "$config_company_domain_name/index.php?c=credit_notes&a=export_all_pdf&year=2023&m=t4&format=pdf&lang=$lang&cell_selected=$cell_selected";
        $part_tags = 'part_tags_export_credit_notes';
        break;

    case 'export_balance': // Exporta la balance
        $url_preview = "$config_company_domain_name/index.php?c=balance&a=export_all_pdf&year=2023&m=t4&format=pdf&lang=$lang&cell_selected=$cell_selected";
        $part_tags = 'part_tags_export_export_balance';
        break;

    case 'payroll': // 
        $id_max = hr_payroll_max_id();
        $url_preview = "$config_company_domain_name/index.php?c=hr_payroll&a=export_pdf&id=$id_max&lang=$lang&cell_selected=$cell_selected";
        $part_tags = 'part_tags_export_export_balance';
        break;

    case 'worked_days': // 
        $id_max = hr_payroll_max_id();
        $url_preview = "$config_company_domain_name/index.php?c=hr_employee_worked_days&a=export_pdf&id=60001&lang=$lang&cell_selected=$cell_selected";
        $part_tags = 'part_tags_export_export_balance';
        break;

    case 'invoices':
    default:
        $id_max = invoices_max_id();
        // http://localhost/factuz/index.php?c=invoices&a=export_pdf&id=148
        $url_preview = "$config_company_domain_name/index.php?c=invoices&a=export_pdf&id=$id_max&lang=$lang&cell_selected=$cell_selected";
        $part_tags = 'part_tags_invoices';
        break;
}


//vardump(array(
//    "c" => $c,
//    "a" => 'export_pdf',
//    "id" => $id_demo,
//    "url" => $url_preview
//));
?>



<iframe  
    src="<?php echo $url_preview; ?>" 
    title="PDF"
    width="100%"
    height="1500"
    >
</iframe> 


<?php
/**
 * 

  <div>

  <ul class="nav nav-tabs" role="tablist">
  <li role="presentation" class="active"><a href="#preview" aria-controls="preview" role="tab" data-toggle="tab"><?php _t("Preview"); ?></a></li>
  <li role="presentation"><a href="#tags" aria-controls="tags" role="tab" data-toggle="tab"><?php _t("Tag"); ?></a></li>
  </ul>

  <div class="tab-content">
  <div role="tabpanel" class="tab-pane active" id="preview">

  <iframe
  src="<?php echo $url_preview; ?>"
  title="PDF"
  width="100%"
  height="1500"
  >
  </iframe>


  </div>
  <div role="tabpanel" class="tab-pane" id="tags">

  <?php // include view('doc_models', $part_tags) ?>

  <?php
  // no activar ya que se bloquea los modal
  // no siempre funciona
  include "$part_tags.php"; ?>

  </div>
  </div>

  </div>



 */
?>

<?php
// no activar ya que se bloquea los modal
// no siempre funciona
//include "$part_tags.php";
?>
