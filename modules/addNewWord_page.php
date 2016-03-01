<?php include("header.php"); ?>
<div id="content">

    <div class="them_moi_menu">
        Thêm từ mới
    </div>
    <hr>

    <div class="them_moi_form">
        <form action="addNewWord_result.php" method="post" id="form">
            <fieldset>
                <label for="tu_moi">Từ mới:</label>
                <input type="text" id="tu_moi" name="tu_moi" placeholder="từ mới" required="required"/>

                <label for="phien_am_1">Phiên âm 1:</label>
                <input type="text" id="phien_am_1" name="phien_am_1" placeholder="phiên âm" required="required"/>

                <label for="phien_am_2">Phiên âm 2:</label>
                <input type="text" id="phien_am_2" name="phien_am_2" placeholder="phiên âm"/>

                <label for="phien_am_3">Phiên âm 3:</label>
                <input type="text" id="phien_am_3" name="phien_am_3" placeholder="phiên âm"/>

                <label for="tu_dong_nghia">Từ đồng nghĩa:</label>
                <input type="text" id="tu_dong_nghia" name="tu_dong_nghia" placeholder="từ đồng nghĩa"/>

                <label for="tu_lien_quan">Từ liên quan:</label>
                <input type="text" id="tu_lien_quan" name="tu_lien_quan" placeholder="từ liên quan"/>

                <label for="tac_gia">Tác giả:</label>
                <input type="text" id="tac_gia" name="tac_gia" placeholder="tác giả"/>

                <div id="div_giai_nghia">
                    <label for="loai_tu0">Loại từ:</label>
                    <input type="text" id="loai_tu0" name="loai_tu[]" placeholder="loại từ" required="required"/>

                    <label for="nghia_vn0">Nghĩa việt nam:</label>
                    <input type="text" id="nghia_vn0" name="nghia_vn[]" placeholder="từ liên quan"/>

                    <label for="mo_ta_vn0">Chi tiết:</label>
                    <textarea id="mo_ta_vn0" name="mo_ta_vn[]" class="ckeditor"> </textarea>

                    <label for="nghia_en0">Nghĩa tiếng anh:</label>
                    <input type="text" id="nghia_en0" name="nghia_en[]" placeholder="từ liên quan"/>

                    <label for="mo_ta_en0">Chi tiết:</label>
                    <textarea id="mo_ta_en0" name="mo_ta_en[]" class="ckeditor"> </textarea>
                    <input onclick="addRow();" type="button" value="Thêm nghĩa" id="add_row"/>
                </div>



                <input type="submit" value="lưu lại" id="Lưu_lai"/>
            </fieldset>

        </form>

    </div>

</div>


<?php include("fbcomment.php"); ?>
<?php include("footer.php"); ?>

<script type="text/javascript">
    var rowNum = 0;
    function addRow() {
        rowNum++;
        var row = '<label>Loại từ:</label>'
            + '<input type="text" id="loai_tu' + rowNum + '" name="loai_tu[]" value="' + $('#loai_tu0').val() + '"/>'
            + '<label>Nghĩa việt nam:</label>'
            + '<input type="text" id="nghia_vn' + rowNum + '" name="nghia_vn[]" value="' + $('#nghia_vn0').val() + '"/>'
            + '<label>Chi tiết:</label>'
            + '<textarea id="mo_ta_vn' + rowNum + '" name="mo_ta_vn[]"> </textarea>'
            + '<label>Nghĩa tiếng anh:</label>'
            + '<input type="text" id="nghia_en' + rowNum + '" name="nghia_en[]" value="' + $('#nghia_en0').val() + '"/>'
            + '<label>Chi tiết:</label>'
            + '<textarea id="mo_ta_en' + rowNum + '" name="mo_ta_en[]"> </textarea>';

        if ($('#loai_tu0').val() == '') {
            $("#dialog-alert").dialog({
                resizable: false,
                width: 370,
                height: 130,
                modal: true,
                position: {
                    my: 'center bottom',
                    at: 'center bottom',
                    of: $('#form'),
                    within: $('#form')
                },
                buttons: {
                    "Đóng": function () {
                        $(this).dialog("close");
                    }
                }
            });
        } else {
            $('#div_giai_nghia').append(row);
            $('#loai_tu0').val(null);
            $('#nghia_vn0').val(null);
            $('#nghia_en0').val(null);
            CKEDITOR.replace('mo_ta_vn' + rowNum);
            CKEDITOR.replace('mo_ta_en' + rowNum);
            CKEDITOR.instances['mo_ta_vn' + rowNum].setData(CKEDITOR.instances.mo_ta_vn0.getData());
            CKEDITOR.instances['mo_ta_en' + rowNum].setData(CKEDITOR.instances.mo_ta_en0.getData());
            CKEDITOR.instances.mo_ta_vn0.setData();
            CKEDITOR.instances.mo_ta_en0.setData();
            $('#loai_tu0').focus();
        }
    }

</script>

<div id="dialog-alert" title="Cảnh báo" style="display: none">
    <p>
			<span class="ui-icon ui-icon-alert"
                  style="float: left; margin: 0 7px 20px 0;"></span>Vui lòng nhập đầy đủ nghĩa thứ nhất trước
    </p>
</div>