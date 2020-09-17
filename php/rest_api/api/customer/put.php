<?php

    ini_set('display_errors', 1);   //!!!!!!!!!!!!! 

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
      
    include_once '../../database/Database.php';
    include_once '../../models/Customer.php';

    $database = new Database();

    $db = $database->connect();

    $customer = new Customer($db);

    $data = json_decode(file_get_contents("php://input"));

    $customer->id = $data->id;
    $customer->forenames = $data->forenames;
    $customer->surname = $data->surname;
    $customer->title = $data->title;
    $customer->date_of_birth = $data->date_of_birth;
    $customer->mobile_number = $data->mobile_number;
    $customer->phone_number = $data->phone_number;
    $customer->email_address = $data->email_address;
    $customer->password = $data->password;

    if ( $customer->put() )
    {
        echo json_encode(
            array('message' => 'Account sucessfully updated')
        );
    }
    else
    {
        echo json_encode(
            array('message' => 'Account update failed')
        );
    }
