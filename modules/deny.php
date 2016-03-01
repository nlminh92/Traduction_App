<?php
// define variables and set to empty values
include '../connector/mysql_connect.php';

$tu_id = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $tu_id = $_GET["tu_id"];

    mysql_query("START TRANSACTION");
    try {
        $sql1 = "DELETE FROM giai_nghia_tu where tu_id = '$tu_id'";
        $sql2 = "DELETE FROM tu_moi where id = '$tu_id'";

        mysql_query($sql1);
        mysql_query($sql2);

        mysql_query("COMMIT");
    } catch (Exception $e) {
        mysql_query("ROLLBACK");
    }
}

// close mysql connection
include '../connector/mysql_close.php';

header('Location: mailbox.php');
?>
<script>
    window.location.href = "mailbox.php";
</script>
