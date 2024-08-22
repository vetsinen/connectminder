<?php
$ids = [1];
$data = [];
foreach ($ids as $id) {
    $result = $connection->query("SELECT `x`, `y` FROM `values` WHERE `id` = " . $id);
    $data[] = $result->fetch_row();
}

//This approach has potential security risks, especially SQL injection vulnerabilities, if the $id values are not sanitized or properly prepared. The query can be optimized for better performance. The current approach executes a separate query for each $id in the $ids array, which can be inefficient, especially with a large number of IDs. A more efficient approach would be to use a single query with an IN clause to retrieve all the records in one go.

$data = [];
$idsString = implode(',', array_map('intval', $ids)); // Convert array of IDs to a comma-separated string. Ensures all IDs are integers, which helps prevent SQL injection.
$result = $connection->query("SELECT `x`, `y` FROM `values` WHERE `id` IN ($idsString)");
while ($row = $result->fetch_row()) {
    $data[] = $row;
}