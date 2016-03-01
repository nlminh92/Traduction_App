<?php
// define variables and set to empty values
include '../connector/mysql_connect.php';

$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql1 = "SELECT * FROM tai_khoan where username = '" . $username . "' and password = '" . $password . "'";

    $result = mysql_query($sql1);
    while ($row = mysql_fetch_array($result)) {
        session_start();
        $_SESSION['current_user'] = $username;
    }
}


// close mysql connection
include '../connector/mysql_close.php';

header('Location: ../index.php');
?>
<script>
    window.location.href="../index.php";
</script>
