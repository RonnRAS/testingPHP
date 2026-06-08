<?php 
    session_start();

    include("conn.php");

    if ($_SERVER ['REQUEST_METHOD'] == "POST") 
    {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $uname = $_POST['uname'];
        $pword = $_POST['pword'];

        if (!empty($uname) && !empty($pword) && !is_numeric($uname))
        {
            $query = "INSERT INTO `mrsci_info` (firstname, lastname, uname, pword) VALUES ('$firstname', '$lastname', '$uname', '$pword')";

            mysqli_query($conn, $query);

            echo "<script type='text/javascript'> alert('Success1')</script>";
        }
        else
        {
            echo "<script type='text/javascript'> alert('INVALID GAGO')</script>";
        }
    }
?>
