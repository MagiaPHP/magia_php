<?php

function subdomains_plan_features_search_by_plan_feature($plan, $feature) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM `subdomains_plan_features` WHERE   `plan` = :plan AND `feature` = :feature ");
    $req->execute(array(
        "plan" => $plan,
        "feature" => $feature
    ));
    $data = $req->fetch();

    return (isset($data[0])) ? $data[0] : false;
}
