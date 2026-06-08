<?php
// update.php

$servername = "localhost";
$username = "root";
$password = "";
$database = "mrsci_admin";

$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection Failed: " . $connection->connect_error);
}

// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];  // Cast to integer for safety

    // Fetch the current data from the database
    $sql = "SELECT * FROM mrsci_info WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);  // Bind the ID parameter to the query
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("Record not found.");
    }

    // If the form is submitted, update the record
    if (isset($_POST['update'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $uname = $_POST['uname'];
        $pword = $_POST['pword'];

        // Prepare the update statement
        $update_sql = "UPDATE mrsci_info SET firstname = ?, lastname = ?, uname = ?, pword = ? WHERE id = ?";
        $update_stmt = $connection->prepare($update_sql);
        $update_stmt->bind_param("ssssi", $firstname, $lastname, $uname, $pword, $id);  // Bind parameters to the statement
        
        // Execute the update query
        if ($update_stmt->execute()) {
            echo "Record updated successfully!";
            header('Location: database.php'); // Redirect after updating
        } else {
            echo "Error updating record: " . $update_stmt->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Record</title>
</head>
<body>
    <h2>Update Record</h2>
    <form method="POST" action="">
        <label for="firstname">First Name:</label><br>
        <input type="text" id="firstname" name="firstname" value="<?php echo htmlspecialchars($row['firstname']); ?>" required><br><br>

        <label for="lastname">Last Name:</label><br>
        <input type="text" id="lastname" name="lastname" value="<?php echo htmlspecialchars($row['lastname']); ?>" required><br><br>

        <label for="uname">Username:</label><br>
        <input type="text" id="uname" name="uname" value="<?php echo htmlspecialchars($row['uname']); ?>" required><br><br>

        <label for="pword">Password:</label><br>
        <input type="password" id="pword" name="pword" value="<?php echo htmlspecialchars($row['pword']); ?>" required><br><br>

        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>
