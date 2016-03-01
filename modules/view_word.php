<?php include("header.php"); ?>
    <div id="content" xmlns="http://www.w3.org/1999/html">
        <div class="search_result">
            <?php
            // define variables and set to empty values
            include '../connector/mysql_connect.php';

            $tu_id = "";

            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $tu_id = $_GET["tu_id"];

                $sql1 = "SELECT * FROM tu_moi tm inner join giai_nghia_tu gt on gt.tu_id = tm.id where tm.id = '$tu_id'";

                $result = mysql_query($sql1);
                $i = 1;
                while ($row = mysql_fetch_array($result)) {
                    if ($i == 1) {
                        $k = 0;
                        ?>
                        <p class='title'><?php echo $row['tu_moi'] ?></p>
                        <div class='enword'>Thông tin chung</div>
                        <?php

                        if ($row['phien_am_1']) {
                            $k++; ?>
                            <span class='boil'>Phiên âm <?php echo $k ?>
                            : </span><?php echo $row['phien_am_1'] ?>
                            <br/>
                        <?php } ?>
                        <?php if ($row['phien_am_2']) {
                            $k++; ?>
                            <span class='boil'>Phiên âm <?php echo $k ?>
                            : </span><?php echo $row['phien_am_2'] ?>
                            <br/>
                        <?php } ?>
                        <?php if ($row['phien_am_3']) {
                            $k++; ?>
                            <span class='boil'>Phiên âm <?php echo $k ?>
                            : </span><?php echo $row['phien_am_3'] ?>
                            <br/>
                        <?php
                        }
                        ?>
                        <span class='boil'>Từ đồng nghĩa: </span><?php echo $row['tu_dong_nghia'] ?><br/>
                        <span class='boil'>Từ liên quan: </span><?php echo $row['tu_lien_quan'] ?><br/>
                        <span class='boil'>Tác giả: </span><?php echo $row['tac_gia'] ?><br/>
                        <div class='enword_detail'>Nghĩa của từ</div>
                    <?php
                    } ?>
                    <span class='boil'>Loại từ: </span><?php echo $row['loai_tu'] ?><br/>
                    <span class='boil'>Nghĩa việt nam thứ <?php echo $i ?>: </span><?php echo $row['nghia_vn'] ?><br/>
                    <span class='boil'>Chi tiết: </span><?php echo $row['mo_ta_vn'] ?><br/>
                    <span class='boil'>Nghĩa tiếng anh thứ <?php echo $i ?>: </span><?php echo $row['nghia_en'] ?><br/>
                    <span class='boil'>Chi tiết: </span><?php echo $row['mo_ta_en'] ?><br/>
                    <?php
                    $i++;
                }
            }
            // close mysql connection
            include '../connector/mysql_close.php';
            ?>

            <button type="button" value="Đồng ý"
                    onclick="javascript:window.location.href='accept.php?tu_id=<?php echo $tu_id ?>'">Đồng ý
            </button>
            <button type="button" value="Từ chối"
                    onclick="javascript:window.location.href='deny.php?tu_id=<?php echo $tu_id ?>'">Từ chối
            </button>
            <button type="button" value="Quay lại" onclick="javascript:window.location.href='mailbox.php'">Quay lại
            </button>
        </div>
    </div>

<?php include("fbcomment.php"); ?>
<?php include("footer.php"); ?>

