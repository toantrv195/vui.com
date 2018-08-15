
<form id="form-scriptolution-soft-post-image" class="modal" action="{{ route('upload.video.postcreate') }}" method="post">
{{ csrf_field() }}
    <div class="content form_photo">
        <h3>Video</h3>
        <div class="field">
            <label>
                <h4>Link video</h4>                            
                <input id="post_title" type="text" class="text tipped" name="link" maxlength="150" value="">
            </label>
            <p class="info">Link youtube hoặc link Facebook</p>
        </div>
        <div class="field">
            <label>
                <h4>Tiêu đề</h4>
                <input id="post_title" type="text" class="text tipped" name="title" maxlength="150" value="">
            </label>
        </div>

        <div class="field">
            <label>
                <h4>Nguồn</h4>
                <label class="category">
                    <input type="radio" name="source" value="3">Youtube
                    <input type="radio" name="source" value="2">Facebook
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
            <li class="form-btn"><button type="submit" class='send'>Đăng bài</button></a></li>
        </ul>
    </div>
</form>