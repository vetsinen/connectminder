<?php
require_once "task11lib.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = [];
    $history = loadState(); error_log(json_encode($history));

    // validate username
    if (isset($_POST['username'])) {
        $username = trim($_POST['username']);
        if (strlen($username) < 3) {
            $errors['username'] = "Username must be at least 3 characters long.";
        }
    } else {
        $errors['username'] = "Username is required.";
    }

    // validate number
    if (isset($_POST['number'])) {
        $number = trim($_POST['number']);
        if (!is_numeric($number) || intval($number) <= 0) {
            $errors['number'] = "Please enter a valid positive number.";
        }
    } else {
        $errors['number'] = "Number is required.";
    }

    if (empty($errors)) {
        $number = intval($number);
        $fibonacci = fibo($number);

        $historyItem = array(
            "username" => $username,
            "number" => $number,
            "fibo" => $fibonacci
        );
        error_log(json_encode($historyItem));
        array_unshift($history, $historyItem); //adding element to the beginning of the array
        saveState($history);

        $response = array_merge($historyItem, [
            "status" => "success",
            "ip" => ipwrapper(),
            "fibo" => $fibonacci,
            "message" => "Data submitted successfully!"
        ]);
    } else {
        // If there are errors, return them
        $response = array(
            "status" => "error",
            "errors" => $errors
        );
    }

    //error_log (json_encode($response));
    header('Content-Type: application/json');
    echo json_encode($response);
} //end POST processing

