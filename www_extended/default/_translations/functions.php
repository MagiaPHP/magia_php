<?php

function _translations_search_by_language($txt, $language) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM _translations 
    
WHERE 
(
    id like :txt  
    OR content like :txt
    OR translation like :txt
)
AND
language = :language
                           
");
    $req->execute(array(
        "txt" => "%$txt%",
        "language" => $language
    ));
    $data = $req->fetchall();
    return $data;
}

function _translations_search_by_content_language($content, $language) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM `_translations` WHERE content = :content AND language = :language");
    $req->execute(array(
        "content" => $content,
        "language" => $language
    ));
    $data = $req->fetch();
    return $data;
}

function _translations_push($content, $language, $translation) {

    // busca si existe la traduccion
    if (_translations_search_by_content_language($content, $language)) {
        // si existe la edita
        _translations_update($content, $language, $translation);
    } else {
        // sino la crea
        _translations_add($content, $language, $translation);
    }
}

function _translations_search_full($txt, $language) {
    global $db;
    $data = null;

    //$req = $db->prepare("SELECT * FROM _translations WHERE (content like :txt OR translation like :txt) AND language = :language");
    $req = $db->prepare("
        
        SELECT c.frase, c.contexto,  t.id, t.content, t.language, t.translation 
        FROM _content as c
        LEFT JOIN _translations as t 
        ON c.frase = t.content
        WHERE c.frase like :txt
        AND t.language = :language


            ");

    $req->execute(array(
        "txt" => "%$txt%",
        "language" => "$language",
    ));
    $data = $req->fetchall();
    return $data;
}

function _translations_update($content, $language, $translation) {

    global $db;
    $req = $db->prepare(" UPDATE _translations SET "
            . "translation=:translation  "
            . " WHERE content =:content AND language=:language ");
    $req->execute(array(
        "content" => $content,
        "language" => $language,
        "translation" => $translation
    ));
}

function _translations_search_full_by_lang($language, $start = 0, $limit = 99999999) {
    global $db;

    //SELECT * FROM `_translations` WHERE `language` LIKE 'en_GB' 
    $sql = "SELECT * FROM `_translations` WHERE language = :language ORDER BY content 
        Limit :limit OFFSET :start          
";

    $query = $db->prepare($sql);
    $query->bindValue(':language', $language, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function _translations_search_porcentajes_by_lang() {
    global $db;
    $data = null;
    $req = $db->prepare(
            "SELECT * 
            FROM _content 
            WHERE  frase like '\%%'
            
        
        ");
    $req->execute(array(
//        "txt" => "%$txt%",
//        "language" => $language
    ));
    $data = $req->fetchall();
    return $data;
}
