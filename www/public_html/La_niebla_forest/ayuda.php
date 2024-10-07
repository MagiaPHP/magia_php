<?php

/**



  $cat = array('users'
  ,  'offices'
  ,  'addresses'
  ,  'directory'
  ,  'system'
  ,  'patients'
  ,  'contacts'
  ,  'employees'
  ,  'logs'
  ,  'myinfo'
  ,  'offices_others'
  ,  'invoices');


 */
echo "
INSERT INTO `blog_categories` (`id`, `father_id`, `name`, `label`, `description`, `order_by`, `status`) VALUES
";

;

$categories = array('users'
    , 'offices'
    , 'addresses'
    , 'directory'
    , 'system'
    , 'patients'
    , 'contacts'
    , 'employees'
    , 'logs'
    , 'myinfo'
    , 'offices_others'
    , 'invoices');

foreach ($categories as $cat) {
    echo "(NULL, NULL, '$cat', '$cat', '$cat', '1', '1')," . '<br>';
}

die();

//INSERT INTO `blog_categories` (`id`, `father_id`, `name`, `label`, `description`, `order_by`, `status`) VALUES
//                              (NULL, '29', 'Delete order', 'Delete order', 'Delete order', '1', '1');
