<?php include("header.php"); ?>
    <div id="content">

        <div class="them_moi_menu">
            Danh sách từ mới
        </div>
        <hr>
        <div class="them_moi_form">
            <?php
            // define variables and set to empty values
            include '../connector/mysql_connect.php';

            $sql1 = "SELECT * FROM tu_moi where trang_thai = 0";

            $result = mysql_query($sql1);

            $num_rows = mysql_num_rows($result);

            if ($num_rows == 0) {
                echo "<span class='boil'>Không có từ mới</span>";
            } else {
                echo '<table border="1px" style="text-align: center">';
                echo '<tr><th style="width: 50%">Từ mới</th><th>Hành động</th> </tr>';
                while ($row = mysql_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><a href="view_word.php?tu_id=<?php echo $row['id'] ?>"> <?php echo $row['tu_moi'] ?></a>
                        </td>
                        <td><a href="accept.php?tu_id=<?php echo $row['id'] ?>">Đồng ý </a> &nbsp;&nbsp; <a
                                href="deny.php?tu_id=<?php echo $row['id'] ?>">Từ chối</a></td>
                    </tr>
                <?php
                }

                echo '</table>';
            }
            // close mysql connection
            include '../connector/mysql_close.php';
            ?>
        </div>
    </div>


<?php include("fbcomment.php"); ?>
<?php include("footer.php"); ?>