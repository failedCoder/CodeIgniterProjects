var App = function () {

    return {

        init: function () {

            deleteProjectAjax();
            addOrderAjax();
        }
    }
    
}();

var deleteProjectAjax = function (e) {

	$('#deleteProjectForm').on('submit', function () {

	});

};

var addOrderAjax = function () {

	$('#orderForm').on('submit', function (e) {

		e.preventDefault();

		var form = $(this);

		var data = form.serialize();	

		var projectId = $('#orderModalBtn').attr('data-project-id');

		data += '&projectId=' + projectId;	

		$.ajax({

			url: '/orders',
			type: 'POST',
			data: data,
			beforeSend: function () {
				$('.alertbox').remove();
			},
			success: function ( result ) {

				if ( result.isCreated == true ) {

					form.prepend(alertBox('success', 'Nalog uspješno stvoren!'));

					$('.alertbox').fadeOut(3000);	
						
					setTimeout( function () {
						$('#createOrderModal').modal('hide');
						form.find("input,textarea,select").val('').end();
					}, 4000 );

				} else if ( result.isCreated == false ) {

					var errors = result.errors;

					$.each(errors, function(i, error) {

					   if(error) {
					 	  form.prepend( alertBox('danger', error) );
					   }
        				
    				});

				}

				

			},
			error: function ( error ) {

				console.log( error );

			}

		});



	});

};

function alertBox(type, message) {

    var html = '';
    html += '<div class="text-center alert alert-' + type + ' fade show alertbox" role="alert">';
    html += message;
    html += '</div>';
    
    return html;

}


