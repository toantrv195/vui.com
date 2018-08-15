
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
    url: '/admin/product/delimg/'+ idHinh,
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

//check all   
$('#checkall').click(function() {
    if ($(this).is(':checked',true)) 
    {
        $(".sub_check").prop('checked', true);
    } 
    else 
    {
        $(".sub_check").prop('checked', false);
    }
});

$('.delete_all').click(function(e) {
    var allVals = [];

    $('.sub_check:checked').each(function() {
        allVals.push($(this).attr('data-id'));
    });
    
    if (allVals.length <= 0) {
        alert('Please select row.');
    }
    else {
        var check = confirm("Are you sure you want to delete this row?");
        
        if (check == true) {
            var ids = allVals;
            console.log(ids);
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
             });

            $.ajax({
                url: '/admin/product/delselect',
                type: 'POST',
                cache:false,
                data: {'ids':ids},
                success: function(data){
                    if (data == 'ok') 
                    {
                        $.each(allVals, function( index, value ) {
                            $('table tr').filter("[data-row-id='" + value + "']").css('background', '#ccc');
                            $('table tr').filter("[data-row-id='" + value + "']").fadeOut('slow');
                        });
                    }
                }
            });
        }

    }
});

