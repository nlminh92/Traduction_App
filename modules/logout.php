<?php

session_start();
unset($_SESSION['current_user']);
session_destroy();

header('Location: ../index.php');
?>
<script>
    window.location.href="../index.php";
</script>