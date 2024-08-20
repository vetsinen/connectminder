<?php
var_dump($_POST);
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = [];

    if (isset($_POST['username'])) {
        $username = trim($_POST['username']);
        if (strlen($username) < 3) {
            $errors['username'] = "Username must be at least 3 characters long.";
        }
    } else {
        $errors['username'] = "Username is required.";
    }

    // Validate Number
    if (isset($_POST['number'])) {
        $number = trim($_POST['number']);
        if (!is_numeric($number) || intval($number) <= 0) {
            $errors['number'] = "Please enter a valid positive number.";
        }
    } else {
        $errors['number'] = "Number is required.";
    }

    if (empty($errors)) {
        // If no errors, process the data (e.g., save to database)
        // Here we'll just simulate a success response
        $response = array(
            "status" => "success",
            "message" => "Data submitted successfully!"
        );
    } else {
        // If there are errors, return them
        $response = array(
            "status" => "error",
            "errors" => $errors
        );
    }

    error_log (json_encode($response));
    // Send the response as JSON if using AJAX
    header('Content-Type: application/json');
    echo json_encode($response);

    // If not using AJAX, you can redirect to another page with the response
    // or render the errors on the same page
}

