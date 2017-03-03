
$(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });

//delay alert
$("div.alert").delay(3000).slideUp();

//delete
function xacnhanxoa(msg){
    if (window.confirm(msg)) {
        return true;
    }
    return false;
}

//image_detail
 $('#addimage').click( function() {
    $('#insert').append("<div class='form-group'><input type='file' name='fImgdetail[]' /></div>");
 })

//del_img
$('a#del_img').click(function() {
    var idHinh = $(this).parent().find("img").attr("idHinh");
    var img = $(this).parent().find("img").attr("src");
    var rid = $(this).parent().find('img').attr('id');

    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    $.ajax({
    url: 'http://vui.com/admin/product/delimg/'+ idHinh,
    type: 'GET',
    cache: false,
    data: {'idHinh':idHinh, 'urlHinh':img},
    success: function(data) 
    {
      if (data == 'success') {
        $('#'+ rid).remove();
      } else {
        alert('Errors !! Contact admin');
      }
    }
  });
});

  
