<?php

    ini_set('display_errors', 1);   //!!!!!!!!!!!!! 

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
      
    include_once '../../database/Database.php';
    include_once '../../models/Address.php';

    $database = new Database();

    $db = $database->connect();

    $address = new Address($db);

    $data = json_decode(file_get_contents("php://input"));

    $address->customer_id = $data->customer_id;
    $address->contact_name = $data->contact_name;
    $address->business_name = $data->business_name;
    $address->address_line1 = $data->address_line1;
    $address->address_line2 = $data->address_line2;
    $address->city = $data->city;
    $address->county = $data->county;
    $address->country = $data->country;
    $address->postcode = $data->postcode;
    $address->address_type = $data->address_type;

    if ( $address->post() )
    {
        echo json_encode(
            array('message' => 'Address sucessfully created')
        );
    }
    else
    {
        echo json_encode(
            array('message' => 'Address creation failed')
        );
    }
