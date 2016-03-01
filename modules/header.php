<?php
ob_start();
// Inialize session
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-;width initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
    <title>Đồ án tốt nghiệp, website tra từ</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css"/>
    <link rel="stylesheet" type="text/css" href="../css/jquery.ui.all.css" />

    <script src="../js/jquery-1.9.1.js"></script>
    <script src="../js/ckeditor/ckeditor.js"></script>
    <script src="../js/jquery.ui.core.js"></script>
    <script src="../js/jquery.ui.widget.js"></script>
    <script src="../js/jquery.ui.dialog.js"></script>
    <script src="../js/jquery.ui.button.js"></script>
    <script src="../js/jquery.ui.mouse.js"></script>
    <script src="../js/jquery.ui.position.js"></script>
    <script src="../js/jquery.ui.draggable.js"></script>
    <!--  <script>(function (d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s);
              js.id = id;
              js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1";
              fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));</script>-->
</head>

<body>
<div id="waper">
    <a href="../index.php">Trang chủ</a>
    &nbsp;&nbsp;
    <a href="addNewWord_page.php">Thêm từ</a>

    <div class="login">
        <?php if (isset($_SESSION['current_user'])) { ?>
            Hello <?php echo $_SESSION['current_user'] ?>, <a href="mailbox.php"> Hộp thư </a> &nbsp;&nbsp;
            <a href="logout.php"> Đăng xuất</a>
        <?php } else { ?>
            <form action="login.php" method="post">
                <input type="text" id="username" name="username" placeholder="tên đăng nhập"/>
                <input type="password" id="password" name="password" placeholder="mật khẩu"/>
                <input type="submit" value="Đăng nhập"/>
            </form>
        <?php } ?>
    </div>
    <div id="banner"><img src="../images/banner.jpg"></div>

