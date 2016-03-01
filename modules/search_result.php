<?php include("header.php"); ?>
    <div id="content">
        <div id="menu">
            <form method="post" action="search_result.php">
                <input class="text" type="text" name="keyword" value="<?php echo $_POST["keyword"] ?>" id="keyword"
                       placeholder="Nhập từ khóa cần tra cứu...">
                <select name="dict_type" id="dict_type">
                    <option value="en-vn"
                        <?php if ($_POST["dict_type"] == 'en-vn') { ?>
                            selected <?php } ?>>Anh - Việt
                    </option>
                    <option value="vn-en" <?php if ($_POST["dict_type"] == 'vn-en') { ?> selected <?php } ?>>Việt - Anh</option>
                    <option value="en-en" <?php if ($_POST["dict_type"] == 'en-en') { ?> selected <?php } ?>>Anh - Anh</option>
                </select>
                <input class="button" type="submit" value=" Tra từ ">
            </form>
        </div>

        <div class="search_result">
            <?php
            // define variables and set to empty values
            include '../connector/mysql_connect.php';

            $keyword = $dict_type = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $dict_type = $_POST["dict_type"];
                $keyword = $_POST["keyword"];

                $sql1 = "SELECT * FROM tu_moi tm inner join giai_nghia_tu gt on gt.tu_id = tm.id where tm.trang_thai=1 and tu_moi = '" . $keyword . "'";
                $sql2 = "SELECT * FROM giai_nghia_tu gt inner join tu_moi tm on gt.tu_id = tm.id where tm.trang_thai=1 and gt.nghia_vn like '" . $keyword . "' ";

                if ($keyword == '') {
                    echo "<span class='boil'>Vui lòng nhập từ tìm kiếm</span>";
                } else {
                    $result = "";
                    if ($dict_type == 'en-vn' || $dict_type == 'en-en') {
                        $result = mysql_query($sql1);
                    } else if ($dict_type == 'vn-en') {
                        $result = mysql_query($sql2);
                    }

                    $num_rows = mysql_num_rows($result);
                    if ($num_rows == 0) {
                        echo "<span class='boil'>Từ khóa tìm kiếm không có, bạn có thể <a href='javascript:addNewWord()'>thêm từ </a></span>";
                    }
                    $i = 1;
                    while ($row = mysql_fetch_array($result)) {
                        if ($i == 1) {
                            $k = 0;
                            ?>
                            <p class='title'><?php echo $keyword ?></p>
                            <div class='enword'>Thông tin chung</div>
                            <?php
                            if ($dict_type == 'en-vn' || $dict_type == 'en-en') {
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
                            <?php
                            } else {
                                $k++;
                                ?>
                                <span class='boil'>Phiên âm <?php echo $k ?>
                                : </span><?php echo $keyword ?>
                                <br/>
                                <span class='boil'>Từ đồng nghĩa: </span><?php echo $row['nghia_vn'] ?><br/>
                                <span class='boil'>Từ liên quan: </span><?php echo $row['nghia_vn'] ?><br/>
                            <?php } ?>
                           <!-- <span class='boil'>Tác giả: </span><?php /*echo $row['tac_gia'] */?><br/>-->
                            <div class='enword_detail'>Nghĩa của từ</div>
                        <?php
                        }
                        if ($dict_type == 'en-vn') {
                            ?>
                            <span class='boil'>Loại từ: </span><?php echo $row['loai_tu'] ?><br/>
                            <span class='boil'>Nghĩa thứ <?php echo $i ?>: </span><?php echo $row['nghia_vn'] ?><br/>
                            <span class='boil'>Chi tiết: </span><?php echo $row['mo_ta_vn'] ?><br/>
                        <?php
                        } else if ($dict_type == 'vn-en' || $dict_type == 'en-en') {
                            ?>
                            <span class='boil'>Loại từ: </span><?php echo $row['loai_tu'] ?><br/>
                            <span class='boil'>Nghĩa thứ <?php echo $i ?>: </span><?php echo $row['nghia_en'] ?><br/>
                            <span class='boil'>Chi tiết: </span><?php echo $row['mo_ta_en'] ?><br/>
                        <?php
                        }
                        $i++;
                    }
                }
            }


            // close mysql connection
            include '../connector/mysql_close.php';
            ?>
        </div>
    </div>
    <script type="text/javascript">
        function addNewWord() {
            window.location.href = "addNewWord_page.php";
        }
    </script>


<?php include("fbcomment.php"); ?>
<?php include("footer.php"); ?>