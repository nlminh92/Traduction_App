<?php  include("header.php"); ?>
    <div id="content">

        <div id="menu">
            <form method="post" action="search_result.php">
                <input class="text" type="text" name="keyword" value="" id="keyword"
                       placeholder="Nhập từ khóa cần tra cứu...">
                <select name="dict_type" id="dict_type">
                    <option value="en-vn">Anh - Việt</option>
                    <option value="vn-en">Việt - Anh</option>
                    <option value="en-en">Anh - Anh</option>
                </select>
                <input class="button" type="submit" value=" Tra từ ">
            </form>
        </div>

    </div>


<?php include("fbcomment.php"); ?>
<?php include("footer.php"); ?>