<?php
function fibo($n)
{
    if ($n <= 0) {
        return 0;
    } elseif ($n == 1) {
        return 1;
    }

    $fib = [0, 1];

    for ($i = 2; $i <= $n; $i++) {
        $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
    }

    return $fib[$n];
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = [];
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        // IP from shared internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // IP passed from a proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    $serializedData = "";
    $serializedData = file_get_contents('data.txt');


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
        $number = intval($number);
        error_log(fibo($number));
        $response = array(
            "status" => "success",
            "ip" => $ip,
            "fibo" => fibo($number),
            "message" => "Data submitted successfully!"
        );
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

}

