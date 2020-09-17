<?php

    ini_set('display_errors', 1);   //!!!!!!!!!!!!! 

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
      
    include_once '../../database/Database.php';
    include_once '../../models/Customer.php';

    $database = new Database();

    $db = $database->connect();

    $customer = new Customer($db);

    $data = json_decode(file_get_contents("php://input"));

    $customer->id = $data->id;

    if ( $customer->delete() )
    {
        echo json_encode(
            array('message' => 'Account sucessfully deleted')
        );
    }
    else
    {
        echo json_encode(
            array('message' => 'Account deletion failed')
        );
    }
