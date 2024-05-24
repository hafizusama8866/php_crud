<?php
include "connect.php";
session_start();
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $sql = "DELETE FROM c_table WHERE id =$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['delete'] = true;
        header("Location:index.php");
        exit();
    } else {
        echo "can not be deleted";
    }
}
