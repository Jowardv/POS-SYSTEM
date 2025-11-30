<?php

session_start();
require 'dbcon.php';

// Sanitize input
function validate($input) {
    global $conn;
    return trim(mysqli_real_escape_string($conn, $input));
}

// Redirect with session message
function redirect($url, $message) {
    $_SESSION['status'] = $message;
    header("Location: $url");
    exit;
}

// Show alert message
function alertMessage() {
    if (isset($_SESSION['status'])) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <h6>'.$_SESSION['status'].'</h6>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>';
        unset($_SESSION['status']);
    }
}

// Insert any record
function insert($tableName, $data) {
    global $conn;

    $table = validate($tableName);
    $columns = implode(", ", array_keys($data));
    $values  = "'" . implode("','", array_values($data)) . "'";

    $query = "INSERT INTO $table ($columns) VALUES ($values)";
    return mysqli_query($conn, $query);
}

// Update
function update($tableName, $id, $data) {
    global $conn;

    $table = validate($tableName);
    $id = validate($id);

    $updateString = "";
    foreach ($data as $column => $value) {
        $updateString .= "$column='$value', ";
    }
    $updateString = rtrim($updateString, ", ");

    $query = "UPDATE $table SET $updateString WHERE id='$id'";
    return mysqli_query($conn, $query);
}

// Get all records (fixed, always show everything)
function getAll($tableName) {
    global $conn;
    $table = validate($tableName);

    $query = "SELECT * FROM $table ORDER BY id DESC";
    return mysqli_query($conn, $query);
}

// Get by ID
function getByID($tableName, $id) {
    global $conn;

    $table = validate($tableName);
    $id = validate($id);

    $query = "SELECT * FROM $table WHERE id='$id' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        return ['status' => 500, 'message' => 'Query error'];
    }
    if (mysqli_num_rows($result) == 1) {
        return ['status' => 200, 'data' => mysqli_fetch_assoc($result)];
    }

    return ['status' => 404, 'message' => 'Record not found'];
}

// Delete
function deleteRecord($tableName, $id) {
    global $conn;

    $table = validate($tableName);
    $id = validate($id);

    $query = "DELETE FROM $table WHERE id='$id' LIMIT 1";
    return mysqli_query($conn, $query);
}

?>
