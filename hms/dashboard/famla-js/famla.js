
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
	
// Check box
	$('#all').change(function(e) {
	  if (e.currentTarget.checked) {
		$('.rows').find('input[type="checkbox"]').prop('checked', true);
		  // $('.rows').find('input[type="checkbox"]').prop('indeterminate', true);
	  } else {
		$('.rows').find('input[type="checkbox"]').prop('checked', false);
	  }

	  
	});
	
	$('input.check').change(function(e) {
		var cnt = 0;
		var t = $('input.check');

		$('input.check').each(function(index, el){
			// alert(index);
			if(el.checked == false){
				$('#all').prop('indeterminate', true);
				cnt++;
			}
		});
		if(cnt == 0){
		  $('#all').prop('indeterminate', false);
		  $('#all').prop('checked', true);
		}
		if($('input.check').length == cnt){
		  $('#all').prop('indeterminate', false);
		  $('#all').prop('checked', false);
		}
	});
});

