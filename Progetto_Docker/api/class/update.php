<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../../config/connectDB.php';
include_once '../../object/class.php';

$database = new Db();
$db = $database->getConnection();

// initialize object
$classe = new classe($db);

// get posted data
$data = json_decode(file_get_contents("php://input", true));

// set ID property of classe to be updated
$classe->id = $data->id;
// set classe property value
$classe->anno = $data->anno;
$classe->classe = $data->classe;
$classe->indirizzo = $data->indirizzo;

// update the classe
if ($classe->update()) {
    echo '{';
    echo '"message": "classe was updated."';
    echo '}';
}

// if unable to update the classe, tell the user
else {
    echo '{';
    echo '"message": "Unable to update classe."';
    echo '}';
}