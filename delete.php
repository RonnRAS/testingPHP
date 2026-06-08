<?php
// delete.php

$servername = "localhost";
$username = "root";
$password = "";
$database = "mrsci_admin";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection Failed: " . $connection->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the record
    $sql = "DELETE FROM mrsci_info WHERE id = $id";
    if ($connection->query($sql) === TRUE) {
        echo "Record deleted successfully!";
        header('Location: database.php'); // Redirect back to the main page after deletion
    } else {
        echo "Error deleting record: " . $connection->error;
    }
} else {
    echo "No ID specified.";
}
?>
