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

function ipwrapper()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        // IP from shared internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // IP passed from a proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function loadState()
{
    $serializedData = "";
    $serializedData = file_get_contents('data.txt');
    if ($serializedData === false)
        return [];
    else
        return json_decode($serializedData, true);
}

function saveState($state)
{
    file_put_contents('data.txt', json_encode($state));
}