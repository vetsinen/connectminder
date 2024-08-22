<?php
require_once "task11lib.php";

$history = loadState();

$draw = $_POST['draw']; // Draw counter for DataTables
$start = $_POST['start']; // Starting point for pagination
$length = $_POST['length']; // Number of records to return

header('Content-Type: application/json');
echo json_encode(["data" => $history]);
