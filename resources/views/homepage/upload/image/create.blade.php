
<form id="form-scriptolution-soft-post-image" class="modal" action="{{ route('upload.image.postcreate') }}" enctype="multipart/form-data" method="post">
    {{ csrf_field() }}
    <div class="content form_photo">
        <h3>Đăng ảnh</h3>
        <div class="field">
            <label>
                <h4>File ảnh</h4>                            
                <input id="photo_file_upload" class="file text " type="file" name="fImages" onchange="loadFile(event)">
            </label>
            <p class="info">Định dạng cho phép là JPEG, GIF hoặc PNG.</p>
            <img id="output" style="width: 40%; height: auto; margin-top: 20px; margin-left: 29%;"/>
                    <script>
                        var loadFile = function(event) {
                        var output = document.getElementById('output');
                        output.src = URL.createObjectURL(event.target.files[0]);
                      };
                    </script>
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
                <input id="post_title" type="text" class="text tipped" name="txtIntro" maxlength="150" >
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
                <input type="checkbox" name="source" value="1">Tự làm ! ( 
                <span style="color:red">Click</span> chọn nếu ảnh này do bạn tự vẽ hoặc tự chụp...)
            </label>
        </div>

        <div class="field">
            <label>
                <h4>Thể loại</h4>
                <label class="category">
                @foreach ($cates as $cate)
                    <input type="radio" name="cate" value="{{ $cate->id }}">{{ $cate->name }}
                @endforeach
                </label>
            </label>
        </div>
        <div class="field checkbox">
            <label for="submit-nsfw">
            <p style="color:red;font-size: 16px;font-weight: bold;">Vui lòng nhập đầy đủ thông tin vào các trường cần thiết .. ^_^</p>
        </div>
        <div class="field">
            <label>
                <h4 style="color:#249879; font-size: 15px;">Thêm nhiều ảnh tại đây !</h4>
                <button type="button" id="addimage" style="margin-left: 0px;">Add Image</button>
            </label>
            <p class="info"> Không bắt buộc.</p>
        </div>
        <div class="field" id="insert"></div>
    </div>


    <div class="actions">
        <ul class="button">
            <li class="form-btn"><a  href="/"><button type="button" class="cancel">hủy</button></a></li>
            <li class="form-btn"><button type="submit" class='send'>Đăng bài</button></a></li>
        </ul>
    </div>
</form>

{{-- add image --}}
<script type="text/javascript">
    $('#addimage').click(function () {
       $('#insert').append("<label><h4>.</h4><input type='file' name='addimages[]' /><label>");
    });
</script>
