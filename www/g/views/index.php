<?php include view("home", "header"); ?>  
<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("g", "izq"); ?>
    </div>
    <div class="col-sm-12 col-md-10 col-lg-10">
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



        <?php if (isset($txt) && $txt) { ?>
        
            <?php
            switch ($txt) {
                case '-a':
                case '-h':
                case '--ayuda':
                case '--help':
                    include "help.php";
                    break;

                case '-c':
                case '--controllers':
                    include "help.php";
                    include "help_controllers.php";
                    break;

                case '-l':
                case '--logs':
                    include "help.php";
                    include "help_logs.php";
                    break;

                case '-s':
                case '--sections':
                    include "help.php";
                    include "help_sections.php";
                    break;

                default:
                    break;
            }
            ?>


            <h3>
                <?php _t('Search'); ?>: <?php echo $txt; ?> 
            </h3>


            <?php
            // CONTACTS
            // CONTACTS
//            foreach (contacts_search($txt) as $key => $contact) {
//
//                $tva = ($contact['tva']) ? _tr('su numero de tva es') . " " . $contact['tva'] : _tr("No tiene tva");
//                $language = ($contact['language']) ? _tr('idioma prefereido') . " " . _languages_field_language('name', $contact['language']) : _tr("No tiene definido un idioma");
//
//                echo "<h4><a href='index.php?c=contacts&a=details&id=$contact[id]'>$contact[title] $contact[lastname] $contact[name]</a></h4>";
//
//                echo '</p>';
////                echo ($contact['title']) ? $contact['title'] . " " : " ";
////                
////                echo ($contact['name']) ? $contact['name'] . " " : " ";
////                
////                echo ($contact['lastname']) ? $contact['lastname'] . " " : " ";
//                // Tva
//                echo ($contact['tva']) ? _tr('His vat number is') . " : " . $contact['tva'] : " ";
//                echo ' ';
//
//                echo ($contact['discounts']) ? _tr("has discounts") . " " . $contact['discounts'] . "%" : '';
//                echo ' ';
//
//                echo ($contact['language']) ? _tr("configured language") . " " . _languages_field_language('name', $contact['language']) . " " : '';
//                echo ' ';
//
//                echo "</p>";
//                echo '<br>';
//            }
            ////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////
            $i = 1;
            $allowed_controllers = [];

            // Crear una lista de controladores permitidos y con módulos activos
//            $config_g_controllers_list_allowed_json = _options_option('config_g_controllers_list_allowed');
//
//            $controllers_list = ( $config_g_controllers_list_allowed_json ) ? $config_g_controllers_list_allowed_json : controllers_list();

            foreach (controllers_list() as $key => $controller) {

                $controller_name = $controller['controller'];

                // Verificar si el usuario tiene permiso para el controlador
                if ($controller_name != '' && permissions_has_permission($u_rol, $controller_name, 'read')) {

                    // Verificar si el módulo correspondiente al controlador está activo
                    if (modules_field_module('status', $controller_name)) {
                        $allowed_controllers[] = $controller_name;
                        //echo $i++ . " $controller_name<br>";
                    }
                }
            }

            // Ejecución de búsquedas y presentación de resultados según los controladores permitidos
            foreach ($allowed_controllers as $controller) {

                switch ($controller) {
                    case '_aa':
                    case '_aa_action_params':
                    case '_aa_actions':
                    case '_aa_conditions':
                    case '_aa_controller_actions':
                    case '_aa_rules':
                    case '_content':
                    case '_diccionario':
                    case '_event_diametre':
                    case '_formes_marques':
                    case '_formes_materials':
                    case '_languages':
                    case '_marques_ecouteurs':
                    case '_materials_couleurs':
                    case '_materials_finitions':
                    case '_materials_shores':
                    case '_menus':
                    case '_modeles_mesure_snr':
                    case '_modeles_mesures':
                    case '_models_mesure_snr':
                    case '_options':
                    case '_options_options':
                    case '_perte_auditive_constitution':
                    case '_perte_auditive_event':
                    case '_perte_auditive_longuer':
                    case '_tmf_material':
                    case '_tmf_material_option':
                    case '_tmf_materials_colours':
                    case '_tmf_materials_options':
                    case '_translations':
                    case '_type_event':
                    case '_type_longuer_conduit':
                    case '_type_perte_auditive':
                    case '_typeModeleForme_materials_couleurs':
                    case '_typeModeleForme_options':
                    case '_types_constitution':
                    case '_types_formes':
                    case '_types_marques':
                    case '_types_marques_ecouteur':
                    case '_types_materials':
                    case '_types_modeles_formes':
                    case '_types_models':
                    case '_types_models_formes':
                    case '_types_options':
                    case '_types_perte_auditive':
                    case '_typesModelesFormes_materials':
                    case '_typesModelesFormes_materials_couleurs':
                    case 'about':
                    case 'accesoires':
                    case 'accounting':
                        break;

                    case 'addresses':
                        foreach (addresses_search($txt) as $key => $address) {
                            echo '<h4>Addresses: <a href="index.php?c=contacts&a=addresses&id=' . $address['contact_id'] . '">' . contacts_formated($address['contact_id']) . '</a></h4>';
                            echo "<p>$address[name]: $address[number], $address[address] $address[postcode] $address[barrio] $address[city] $address[province] $address[region] $address[country]</p>";
                            echo '<br>';
                        }
                        break;

                    case 'addresses_transport':
                    case 'admin':
                    case 'agenda':
                    case 'agenda_categories':
                    case 'agenda_comments':
                    case 'agenda_organizers':
                    case 'agenda_places_dates':
                    case 'agenda_price':
                    case 'agenda_public':
                    case 'agenda_status': break;
                    case 'agenda_translations': break;
                    case 'api': break;
                    case 'app': break;
                    case 'articles': break;
                    case 'articles_categories':
                    case 'articles_photos':
                    case 'audio':
                    case 'audio_orders_see_price':
                    case 'autos':
                    case 'autos_colores':
                    case 'backups':
                    case 'bacs':
                    case 'bacupdate':
                    case 'balance':
                    case 'banks':
                    case 'banks_lines':
                    case 'banks_lines_check':
                    case 'banks_lines_status':
                    case 'banks_lines_tmp':
                    case 'banks_templates':
                    case 'banks_transactions':
                    case 'base':
                    case 'basket':
                    case 'blog':
                    case 'blog_categories':
                    case 'blog_comments':
                    case 'blogs':
                    case 'budget_invoices': break;

                    case 'budget_lines':

                        foreach (budget_lines_search($txt) as $key => $bls) {

                            echo '<h4>' . _tr("Budgets") . ' (' . _tr('lines') . '): <a href="index.php?c=budgets&a=details&id=' . $bls['budget_id'] . '">' . _tr("Budget") . '  ' . ($bls['budget_id']) . ' </a></h4>';
                            echo "<p>" . _tr('Description') . ":  $bls[description]</p>";
                            echo '<br>';
                        }

                        break;

                    case 'budget_status':
                    case 'budgets':
                    case 'budgets_categories':
                    case 'budgets_invoices':
                    case 'budgets_lines':
                    case 'cagegories':
                    case 'calendar':
                    case 'calendar_categories':
                    case 'calendar_contacts':
                    case 'calendar_dates':
                    case 'calendar_status':
                    case 'campos':
                    case 'categories':
                    case 'chat':
                    case 'clientRefUpdate':
                    case 'clients':
                    case 'clients_produits':
                    case 'colores':
                    case 'colors':
                    case 'comments':
                    case 'companies':
                    case 'config':
                    case 'constitution':
                    case 'constitutions':
                        break;

                    case 'contacts':
                        foreach (contacts_search($txt) as $key => $contact) {
                            $tva = ($contact['tva']) ? _tr('su numero de tva es') . " " . $contact['tva'] : _tr("No tiene tva");
                            $language = ($contact['language']) ? _tr('idioma prefereido') . " " . _languages_field_language('name', $contact['language']) : _tr("No tiene definido un idioma");
                            echo "<h4>Contacts: <a href='index.php?c=contacts&a=details&id=$contact[id]'>$contact[title] $contact[lastname] $contact[name]</a></h4>";
                            echo "<p>" . _tr('Contact id') . ": $contact[id], ";
//                echo ($contact['title']) ? $contact['title'] . " " : " ";                
//                echo ($contact['name']) ? $contact['name'] . " " : " ";                
//                echo ($contact['lastname']) ? $contact['lastname'] . " " : " ";
                            // Tva
                            echo ($contact['tva']) ? _tr('Vat number') . ": " . $contact['tva'] . ', ' : " ";
                            echo ' ';
                            echo ($contact['discounts']) ? _tr("has discounts") . " " . $contact['discounts'] . "%" : '';
                            echo ' ';
                            echo ($contact['language']) ? _tr("configured language") . ": " . _languages_field_language('name', $contact['language']) . " " : '';

                            echo "</p>";
                            echo '<br>';
                        }
                        break;

                    case 'contacts_photos':
                    case 'contacts_positions':
                    case 'contacts_titles':
                    case 'controllers':
                    case 'coops':
                    case 'couleurs':
                    case 'countries':
                    case 'country_provinces':
                    case 'country_tax':
                    case 'cpanel':
                    case 'cpe':
                    case 'credit_note_lines':
                    case 'credit_notes':
                    case 'credit_notes_counter':
                    case 'credit_notes_status':
                    case 'creditos':
                    case 'currencies':
                    case 'demo':
                    case 'depositos':
                    case 'depositos_beneficios':
                    case 'depositos_condiciones':
                    case 'depths':
                    case 'diametre':
                    case 'diccionario': break;

                    case 'directory':

                        foreach (directory_search($txt) as $key => $directory) {
                            echo '<h4>' . _tr("Directory") . ': <a href="index.php?c=contacts&a=directory&id=' . $directory['contact_id'] . '">' . contacts_formated($directory['contact_id']) . '</a></h4>';
                            echo "<p>" . _tr($directory['name']) . ":  $directory[data]</p>";
                            echo '<br>';
                        }

                        break;

                    case 'directory_names':

                    case 'discounts_mode':
                    case 'doc_docs':
                    case 'doc_elements':
                    case 'doc_models':
                    case 'doc_models_lines':
                    case 'doc_sections':
                    case 'doc_tags':
                    case 'docs_comments':
                    case 'docs_exchange':
                    case 'docs_models':
                    case 'docu':
                    case 'docu_blocs':
                    case 'driver_licenses':
                    case 'drives':
                    case 'earprints':
                    case 'ecouteurs':
                    case 'ee':
                    case 'ee_categories':
                    case 'ee_lines':
                    case 'ee_references':
                    case 'emails':
                    case 'emails_folders':
                    case 'emails_status':
                    case 'emails_tmp':
                    case 'employees':
                    case 'employess':
                    case 'events':
                    case 'expense_categories':
                    case 'expense_lines':
                    case 'expense_references':
                    case 'expense_status':
                    case 'expenses':
                    case 'expenses_categories':
                    case 'expenses_frecuenccy':
                    case 'expenses_frecuencies':
                    case 'expenses_frecuency':
                    case 'expenses_lines':
                    case 'expenses_references':
                    case 'expenses_status':
                    case 'export':
                    case 'extractos':
                    case 'finitions':
                    case 'formes':
                    case 'g':
                    case 'gallery':
                    case 'gestion':
                    case 'glosario':
                    case 'holidays':
                    case 'holidays_categories':
                    case 'home':
                    case 'hr':
                    case 'hr_benefit_periodicity':
                    case 'hr_benefits':
                    case 'hr_categories':
                    case 'hr_category_benefits':
                    case 'hr_civil_status':
                    case 'hr_clothes':
                    case 'hr_documents':
                    case 'hr_employee_benefices':
                    case 'hr_employee_benefit_periodicity':
                    case 'hr_employee_benefits':
                    case 'hr_employee_benefits_by_month':
                    case 'hr_employee_categories':
                    case 'hr_employee_category':
                    case 'hr_employee_civil_status':
                    case 'hr_employee_clothes':
                    case 'hr_employee_documents':
                    case 'hr_employee_family_dependents':
                    case 'hr_employee_fines':
                    case 'hr_employee_meal_vouchers':
                    case 'hr_employee_money_advance':
                    case 'hr_employee_nationality':
                    case 'hr_employee_payroll_items':
                    case 'hr_employee_salary':
                    case 'hr_employee_sizes_clothes':
                    case 'hr_employee_work_status':
                    case 'hr_employee_worked_days':
                    case 'hr_employee_worked_days_formule':
                    case 'hr_fines_categories':
                    case 'hr_payroll':
                    case 'hr_payroll_by_month':
                    case 'hr_payroll_items':
                    case 'hr_payroll_lines':
                    case 'hr_payroll_status':
                    case 'hr_work_status':
                    case 'hr_worked_days_status':
                    case 'icons':
                    case 'img':
                    case 'import':
                    case 'insurers':
                    case 'inv_companies':
                    case 'inv_periods':
                    case 'inv_products':
                    case 'inv_transsactions':
                    case 'inv_types':
                    case 'investment_lines':
                    case 'investments':
                    case 'invoice_lines':
                    case 'invoice_status':
                    case 'invoices':
                    case 'invoices_counter': break;

                    case 'invoices_lines':

                        foreach (invoice_lines_search($txt) as $key => $ils) {
//                            vardump($ils);

                            echo '<h4>' . _tr("Invoices") . ' (' . _tr('lines') . '): <a href="index.php?c=invoices&a=details&id=' . $ils['invoice_id'] . '">' . _tr("Invoice") . '  ' . ($ils['invoice_id']) . ' </a></h4>';
                            echo "<p>" . _tr('Description') . ":  $ils[description]</p>";
                            echo '<br>';
                        }

                        break;

                    case 'invoices_separators': break;
                    case 'jiholabo':
                    case 'logs':
                    case 'longueurs':
                    case 'machines3d':
                    case 'magia':
                    case 'magia_forms':
                    case 'magia_forms_lines':
                    case 'magia_forms_types':
                    case 'magia_table_lines':
                    case 'magia_tables':
                    case 'marques':
                    case 'materials':
                    case 'menus':
                    case 'messages':
                    case 'mesure_snr':
                    case 'modeles':
                    case 'models':
                    case 'modules':
                    case 'my_info':
                    case 'no_access':
                    case 'offices':
                    case 'options':
                    case 'options_options':
                    case 'orders':
                    case 'orders_budgets':
                    case 'orders_files':
                    case 'orders_photos':
                    case 'orders_products':
                    case 'orders_references':
                    case 'orders_status':
                    case 'orders_transport':
                    case 'orders_transport_status':
                    case 'own_platform':
                    case 'owner':
                    case 'owners':
                    case 'owners_budgets':
                    case 'owners_files':
                    case 'owners_invoices':
                    case 'owners_photos':
                    case 'owners_products':
                    case 'owners_references':
                    case 'owners_status':
                    case 'owners_transport':
                    case 'owners_transport_status':
                    case 'owners_vehicle':
                    case 'partners':
                    case 'partners_contacts':
                    case 'partners_contacts_titles':
                    case 'partners_titles':
                    case 'payables':
                    case 'payables_lines':
                    case 'payables_status':
                    case 'payments':
                    case 'payments_banks':
                    case 'payments_lines':
                    case 'payments_modes':
                    case 'payments_status':
                    case 'perte_auditive':
                    case 'pipelines':
                    case 'platform':
                    case 'posts':
                    case 'preferences':
                    case 'prices':
                    case 'prices_status':
                    case 'pricess':
                    case 'print':
                    case 'product_comments':
                    case 'product_comments_photos':
                    case 'products':
                    case 'products_discounts':
                    case 'products_photos':
                    case 'products_services':
                    case 'products_services_types':
                    case 'products_status':
                    case 'products_transport':
                    case 'products_transport_services':
                    case 'products_transport_status':
                    case 'profile':
                    case 'profiles':
                        break;

                    case 'projects':

                        foreach (projects_search($txt) as $key => $project) {
                            echo '<h4>' . _tr('Projects') . ': <a href="index.php?c=projects&a=details&id=' . $project['id'] . '">' . $project['name'] . '</a></h4>';
                            echo '<p>' . _tr('Id') . ': ' . $project['id'] . ', ' . $project['description'] . ', ' . _tr('Adresse') . ': ' . $project['address'] . ', ' . _tr('Date start') . ': ' . $project['date_start'] . ', ' . _tr('Date end') . ': ' . $project['date_end'] . '</p>';
                            echo '<br>';
                        }

                        break;

                    case 'provinces':
                    case 'ptests':
                    case 'rates':
                    case 'rates_comments':
                    case 'rates_discounts':
                    case 'rates_photos':
                    case 'rates_products':
                    case 'recargos':
                    case 'register':
                    case 'relationships':
                    case 'relationships_types':
                    case 'remakes':
                    case 'report':
                    case 'reporting':
                    case 'reporting_elements':
                    case 'reporting_lines':
                    case 'reports':
                    case 'reports_categories':
                    case 'reports_comments':
                    case 'reports_elements':
                    case 'reports_lines':
                    case 'reports_types':
                    case 'reservations':
                    case 'reservations_photos':
                    case 'reservations_status':
                    case 'reservations_transport':
                    case 'reserves':
                    case 'resources':
                    case 'role':
                    case 'roles':
                    case 'rules':
                    case 'sales':
                    case 'sales_categories':
                    case 'sales_invoices':
                    case 'sales_orders':
                    case 'sales_photos':
                    case 'sales_status':
                    case 'samples':
                    case 'samples_status':
                    case 'search':
                    case 'section':
                    case 'sections':
                    case 'sections_photos':
                    case 'segmentation':
                    case 'sendinblue':
                    case 'services':
                    case 'services_categories':
                    case 'services_mode':
                    case 'services_status':
                    case 'settings':
                    case 'shares':
                    case 'shares_types':
                    case 'shores':
                    case 'sign':
                    case 'signos':
                    case 'sizes':
                    case 'social':
                    case 'sp':
                    case 'statements':
                    case 'statements_categories':
                    case 'statements_files':
                    case 'statements_lines':
                    case 'statements_references':
                    case 'statements_status':
                    case 'status':
                    case 'stocks':
                    case 'store':
                    case 'store_extras':
                    case 'store_extra_groups':
                    case 'store_extras_groups':
                    case 'store_menu_groups':
                    case 'store_menus':
                    case 'store_options':
                    case 'store_orders':
                    case 'store_photos':
                    case 'store_status':
                    case 'suba':
                    case 'subas':
                    case 'subcategories':
                    case 'subscriptions':
                    case 'supliers':
                    case 'suppliers':
                    case 't':
                    case 'tables':
                    case 'tables_photos':
                    case 'tags':
                    case 'tax':
                    case 'tax_adjustments':
                    case 'tax_lines':
                    case 'taxes':
                    case 'templates':
                    case 'tests':
                    case 'themes':
                    case 'themes_custom':
                    case 'themes_custom_temp':
                    case 'tickets':
                    case 'tickets_comments':
                    case 'tickets_contacts':
                    case 'tickets_priority':
                    case 'tickets_status':
                    case 'tickets_transport':
                    case 'time':
                    case 'timecontrol':
                    case 'timecontrol_projects':
                    case 'timecontrol_status':
                    case 'timecontrol_tasks':
                    case 'titles':
                    case 'tmf':
                    case 'tools':
                    case 'traceability':
                    case 'translations':
                    case 'transports':
                    case 'types':
                    case 'types_constitutions':
                    case 'types_couleurs':
                    case 'types_events':
                    case 'types_finitions':
                    case 'types_formes':
                    case 'types_longueurs':
                    case 'types_material':
                    case 'types_models':
                    case 'types_models_ears':
                    case 'types_options':
                    case 'types_status':
                    case 'types_tmf':
                    case 'types_tmfs':
                    case 'typologies':
                    case 'units':
                    case 'users':
                    case 'users_types':
                    case 'variantes':
                    case 'vehicle':
                    case 'vehicle_companies':
                    case 'vehicle_insurers':
                    case 'vehicle_owners':
                    case 'vehicle_platforms':
                    case 'vehicle_providers':
                    case 'vehicle_supliers':
                    case 'vehicle_suppliers':
                    case 'vehicles':
                    case 'vehicles_categories':
                    case 'vehicles_platforms':
                    case 'vehicles_providers':
                    case 'vouchers':
                    case 'vouchers_status':
                    case 'warehouses':
                    case 'web':
                    case 'web_contacts':
                    case 'web_sections':
                    case 'wh':
                    case 'workflow':
                    case 'xarope':
                    case 'xarope_categories':
                    case 'xarope_comments':
                    case 'xarope_photos':
                    case 'xarope_price':
                    case 'xarope_products':
                    case 'xarope_type':
                    case 'zebra':
                    case 'zebra_employees':
                    case 'zebra_positions':
                    case 'zebra_schedules':
                    case 'zebra_work_order':
                        // Aquí va el código específico para cada controlador.
                        // Puedes agregar lógica adicional si se requiere.
                        //  echo "<p>Procesando controlador: '$controller'.</p>";
                        break;

                    default:
                        // Manejo de controladores no previstos
                        // echo "<p>No hay una búsqueda específica configurada para el controlador '$controller'.</p>";
                        break;
                }
            }

            ////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////
//            $i = 1;
//            $allowed_controllers = [];
//
//// Crear una lista de controladores permitidos para el usuario
//            foreach (controllers_list() as $key => $controller) {
//                if (($controller['controller'] != '') && permissions_has_permission($u_rol, $controller['controller'], 'read')) {
//                    $allowed_controllers[] = $controller['controller'];
//                  //  echo $i++ . " $controller[controller]<br>";
//                }
//            }
//
//// Buscar y mostrar direcciones solo si el controlador correspondiente está permitido
//            if (in_array('addresses', $allowed_controllers) && modules_field_module('status', 'addresses')) {
//                foreach (addresses_search($txt) as $key => $address) {
//                    echo '<h4>Addresses <a href="index.php?c=contacts&a=addresses&id=' . $address['contact_id'] . '">' . contacts_formated($address['contact_id']) . '</h4>';
//                    echo "<p>$address[number], $address[address] $address[postcode] $address[barrio] $address[city] $address[province] $address[region] $address[country]</p>";
//                    echo '<br>';
//                }
//            }
//
//// Buscar y mostrar proyectos solo si el controlador correspondiente está permitido
//            if (in_array('projects', $allowed_controllers) && modules_field_module('status', 'projects')) {
//                foreach (projects_search($txt) as $key => $project) {
//                    echo '<h4><a href="index.php?c=projects&a=details&id=' . $project['id'] . '"> name: ' . $project['name'] . '</a></h4>';
//                    echo '<p>Project id: ' . $project['id'] . ', ' . $project['description'] . ', adresse: ' . $project['address'] . ', Date start: ' . $project['date_start'] . ', Date End: ' . $project['date_end'] . '</p>';
//                } echo '<br>';
//            }
            //echo "<br>********************<br>";
//            foreach (invoice_lines_search($txt) as $key => $ils) {
//                echo '<p>Invoices lines: <a href="index.php?c = invoices&a = details&id = ' . $ils['invoice_id'] . '">Invoice: ' . $ils['invoice_id'] . '</a><br> code: ' . $ils['code'] . ', description: ' . $ils['description'] . ', price: ' . $ils['price'] . ', tva: ' . $ils['tax'] . '    </p>';
//            }
//
//
//            foreach (invoices_search($txt) as $key => $ils) {
//                echo '<p>Invoices: <a href="index.php?c = invoices&a = details&id = ' . $ils['id'] . '">Invoice: ' . $ils['id'] . '</a></p>';
//            }
//
//
//            foreach (budgets_search($txt) as $key => $ils) {
//                echo '<p>Budgets: <a href="index.php?c = budgets&a = details&id = ' . $ils['id'] . '">Budgets: ' . $ils['id'] . '</a></p>';
//            }
//
//
//            foreach (budget_lines_search($txt) as $key => $ils) {
//                echo '<p>Budget lines: <a href="index.php?c = budgets&a = details&id = ' . $ils['invoice_id'] . '">Invoice: ' . $ils['invoice_id'] . '</a><br> code: ' . $ils['code'] . ', description: ' . $ils['description'] . ', price: ' . $ils['price'] . ', tva: ' . $ils['tax'] . '    </p>';
//            }
//        $i = 1;
//        foreach (permissions_search_by_rol($u_rol) as $key => $controller) {
//            if ($controller['controller']) {
//                echo '<p>' . $i++ . ') ' . $controller['controller'] . '</p>';
//            }
//        }
            ?>


            <?php
            // fin de isset($txt) && $txt
        }
        ?>















        <div class="container-fluid">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <?php
//  $pagination->createHtml();
                ?>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6 text-right">
                <?php
//          $redi = 1;
//include view("g", "form_pagination_items_limit", $redi = 1);
                ?>
            </div>
        </div>




    </div>
</div>

<?php include view("home", "footer"); ?> 

<?php // include "footer.php";       ?>
