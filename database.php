<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body style="margin: 50px;">

    <h2>Users Table</h2>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>UserName</th>
                <th>Password</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "mrsci_admin";

                // Create connection
                $connection = new mysqli($servername, $username, $password, $database);

                // Check connection
                if ($connection->connect_error) {
                    die("Connection Failed: " . $connection->connect_error);
                }

                // Fetch all records from the database
                $sql = "SELECT * FROM mrsci_info";
                $result = $connection->query($sql);

                // Check if query is successful
                if (!$result) {
                    die("Invalid Query: " . $connection->error);
                }

                // Display records
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["firstname"] . "</td>
                        <td>" . $row["lastname"] . "</td>
                        <td>" . $row["uname"] . "</td>
                        <td>" . $row["pword"] . "</td>
                        <td>
                            <a class='btn btn-primary' href='update.php?id=" . $row["id"] . "'>Update</a>
                            <a class='btn btn-danger' href='delete.php?id=" . $row["id"] . "'>Delete</a>
                        </td>
                    </tr>";
                }

                // Close connection
                $connection->close();
            ?>
        </tbody>
    </table>

</body>
</html>
