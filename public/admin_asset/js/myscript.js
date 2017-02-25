
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

//image

  
