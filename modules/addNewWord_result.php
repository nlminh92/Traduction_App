<?php include("header.php"); ?>
<div id="content">

    <div class="them_moi_menu">
        Thêm từ mới
    </div>
    <hr>
    <div class="search_result">
        <?php
        // define variables and set to empty values
        include '../connector/mysql_connect.php';

        $tu_moi = $phien_am_1 = $phien_am_2 = $phien_am_3 = $tu_dong_nghia = $tu_lien_quan = $tac_gia = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tu_moi = $_POST['tu_moi'];
            $phien_am_1 = $_POST['phien_am_1'];
            $phien_am_2 = $_POST['phien_am_2'];
            $phien_am_3 = $_POST['phien_am_3'];
            $tu_dong_nghia = $_POST['tu_dong_nghia'];
            $tu_lien_quan = $_POST['tu_lien_quan'];
            $tac_gia = $_POST['tac_gia'];
            $loai_tu = $_POST['loai_tu'];
            $nghia_vn = $_POST['nghia_vn'];
            $mo_ta_vn = $_POST['mo_ta_vn'];
            $nghia_en = $_POST['nghia_en'];
            $mo_ta_en = $_POST['mo_ta_en'];

            mysql_query("START TRANSACTION");

            try {
                $sql1 = "INSERT INTO tu_moi(tu_moi,phien_am_1,phien_am_2,phien_am_3,tu_dong_nghia,tu_lien_quan,tac_gia) values ('" . $tu_moi . "','" . $phien_am_1 . "','"
                    . $phien_am_2 . "','" . $phien_am_3 . "','" . $tu_dong_nghia . "','" . $tu_lien_quan . "','" . $tac_gia . "')";

                mysql_query($sql1);
                $tu_id = mysql_insert_id();

                if ($tu_id ==0){
                    throw new Exception('xảy ra lỗi.');
                }
                foreach ($loai_tu as $key => $value) {
                    $sql2 = "INSERT INTO giai_nghia_tu(tu_id,loai_tu,nghia_vn,mo_ta_vn,nghia_en,mo_ta_en) values ('$tu_id','$value','$nghia_vn[$key]','$mo_ta_vn[$key]','$nghia_en[$key]','$mo_ta_en[$key]')";
                    mysql_query($sql2);
                }
                mysql_query("COMMIT");

                echo "<span class='boil'>Thêm từ thành công. Vui lòng chờ admin xác nhận trước khi được sử dụng. Bạn có thể <a href='javascript:addNewWord()'>thêm từ khác</a></span>";
            } catch (Exception $e) {
                echo "<span class='boil'>Thêm từ mới thất bại. Bạn có thể <a href='javascript:addNewWord()'>thêm từ khác</a></span>";
                mysql_query("ROLLBACK");
            }
        }

        // close mysql connection
        include '../connector/mysql_close.php';
        ?>
    </div>
</div>

<?php include("fbcomment.php"); ?>
<?php include("footer.php"); ?>

<script type="text/javascript">
    function addNewWord() {
        window.location.href = "addNewWord_page.php";
    }
</script>