
// make sure that the document is ready before the script is run
$(document).ready(function() {
	
	$('.btn-del').on('click', function(e){
		e.preventDefault();
		const href = $(this).attr('href');	
		// alert(href);
		swal({
		  title: "Are you sure?",
		  text: "Once deleted, you will not be able to recover the data",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
			document.location.href = href;
		  } else {
			swal("The data was not deleted, it is safe!", {
				icon: "error",
			});  
		  }
		});
	});
// for auto search
	$("#myInput").on("keyup", function () {
		var value = $(this).val().toLowerCase();
		$("#myTable tr").filter(function () {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	});


});

