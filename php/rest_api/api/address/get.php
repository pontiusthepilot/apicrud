<?php

    ini_set('display_errors', 1);   //!!!!!!!!!!!!!

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    
    include_once '../../database/Database.php';
    include_once '../../models/Address.php';

    $database = new Database();

    $db = $database->connect();

    $address = new Address($db);

    if ( !array_key_exists('id', $_GET) ) {
        echo json_encode(
            array('message' => 'No customer address id')
        );
    }

    $address->id = $_GET['id'];

    $result = $address->get();

    if ( $result->rowCount() == 0 ) {
        echo json_encode(
            array('message' => 'Address ' . $_GET['id'] . ' not found')
        );
    } else {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        echo json_encode($row);
    }
