<form id="form-scriptolution-soft-post-image" class="modal" action="" enctype="multipart/form-data" method="post">
    <div class="content form_photo">
        <h3>Đăng ảnh</h3>
        <div class="field">
            <label>
                <h4>File ảnh</h4>                            
                <input id="photo_file_upload" class="file text " type="file" name="image" style="display:block;">
            </label>
            <p class="info">Định dạng cho phép là JPEG, GIF hoặc PNG.</p>
        </div>
        <div class="field">
            <label>
                <h4>Tiêu đề</h4>
                <input id="post_title" type="text" class="text tipped" name="title" maxlength="150" value="">
            </label>
        </div>

        <div class="field">
            <label>
                <h4>Mô tả <span style="color:gray; font-size: 12">(không bắt buộc)</span></h4>
                <input id="post_title" type="text" class="text tipped" name="title" maxlength="150" >
            </label>
        </div>
        
        <div class="field">
            <label>
                <h4>Nguồn</h4>
                <input type="text" class="text tipped" name="source" value="" maxlength="300">
            </label>
            <p class="info"> Tôn trọng quyền tác giả.</p>
        </div>

        <div class="field">
            <label>
                <h4>Hoặc</h4>
                <input type="checkbox" name="author" value="1">Tự làm ! ( 
                <span style="color:red">Click</span> chọn nếu ảnh này do bạn tự vẽ hoặc tự chụp...)
            </label>
        </div>

        <div class="field">
            <label>
                <h4>Thể loại</h4>
                <label class="category">
                    <input type="radio" name="cate" value="">Mới
                    <input type="radio" name="cate" value="">Hot
                </label>
            </label>
        </div>
        <div class="field checkbox">
            <label for="submit-nsfw">
            <p style="color:red;font-size: 16px;font-weight: bold;">Vui lòng nhập đầy đủ thông tin vào các trường cần thiết .. ^_^</p>
        </div>
    </div>
    <div class="actions">
        <ul class="button">
            <li class="form-btn"><a  href="/"><button type="button" class="cancel">hủy</button></a></li>
            <li class="form-btn"><button type="button" class='send'>Đăng bài</button></a></li>
        </ul>
    </div>
</form>
