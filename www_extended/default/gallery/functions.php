<?php

function gallery_delete_by_name($name) {
    global $db;
    $req = $db->prepare("DELETE FROM gallery WHERE name=:name ");
    $req->execute(array(
        "name" => $name
    ));
}

//
function gallery_search_by_controller_doc_id($controller, $doc_id, $start = 0, $limit = 999999) {
    global $db;
    $data = null;
    $sql = "SELECT * FROM `gallery` WHERE `controller` = :controller AND `doc_id` = :doc_id  
    ORDER BY `order_by` DESC, `id` DESC
    Limit  :limit OFFSET :start ";
    $query = $db->prepare($sql);
    $query->bindValue(':controller', $controller, PDO::PARAM_STR);
    $query->bindValue(':doc_id', $doc_id, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function gallery_image_exists($filename) {

    if (!$filename) {
        return false;
    }

    if (file_exists($filename) && !is_dir($filename)) {
        return true;
    }

    return false;
}

function gallery_image_show($image, $width = false, $height = false, $class = false, $alt = false) {

    if (gallery_image_exists($image)) {

        $w = ($width) ? " width=$width " : "";
        $h = ($height) ? " height=$height " : "";
        $c = ($class) ? " class=$class " : "";
        $a = ($alt) ? " alt=$alt " : "alt=Noimage";

        // vardump($class); 

        return "<img src='$image' $c $w $h $a />";
    } else {
        return false;
    }
}

function gallery_image_show_no_image($width = false, $height = false, $class = false, $alt = false) {

    $image = "www/gallery/img/noimage.jpg";

    if (gallery_image_exists($image)) {

        return gallery_image_show($image, $width, $height, $class, $alt);
    } else {

        return false;
    }
}

function gallery_image_delete($filename) {

    // si no se envia nombre de fichero
    if (!$filename) {
        return false;
    }

    // si existe y no es directorio
    if (gallery_image_exists($filename)) {
        // borramos
        unlink($filename);
        return true;
    } else {
        // sino returnamos error 1
        return false;
    }
}

function gallery_total_files_by_controller_id($controller, $doc_id) {
    global $db;
    $req = $db->prepare("
            SELECT COUNT(*)   
            FROM `gallery` 
            WHERE controller=:controller
            AND doc_id=:doc_id
        ");
    $req->execute(array(
        "controller" => $controller,
        "doc_id" => $doc_id
    ));
    $data = $req->fetch();
    return $data[0] ?? false;
}
