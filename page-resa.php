<?php
/*
Template Name: Reservation
*/

/* Vérification de la signature */
$seed = "mk#partn4irs,jets!resa";

if (!isset($_GET['sig'])) {
    die('sig ko 1');
}

$encoded_sig = $_GET['sig'];

$sig = base64_decode($encoded_sig);
parse_str($sig, $params);


if (!isset($params['id']) && $params['hash'] === md5($seed.$params['email'])) {
    // mode "liste"
    
    $client_email = $params['email'];
    
    $propositions = $mk->query_propositions_by_client_email($client_email, false);   
    
    include_once('page-resa-list.php');

} elseif (isset($params['id']) && $params['hash'] === md5($seed.$params['email'].$params['id'])) {
    // mode "proposition"
    
    include_once('page-resa-one.php');
    
} 
