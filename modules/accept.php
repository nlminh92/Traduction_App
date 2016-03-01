<?php
// define variables and set to empty values
include '../connector/mysql_connect.php';

$tu_id = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $tu_id = $_GET["tu_id"];

    $sql1 = "UPDATE tu_moi set trang_thai = 1 where id = '$tu_id'";

    mysql_query($sql1);
}

// close mysql connection
include '../connector/mysql_close.php';

header('Location: mailbox.php');
?>
<script>
    window.location.href="mailbox.php";
</script>
