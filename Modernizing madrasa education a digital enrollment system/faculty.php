<div class="container-fluid">
	<div class="card col-md-12">
		<div class="card-body">
			<div class="col-md-12">
				<button type="button" class="btn btn-primary btn-sm btn-block col-sm-2" id="new_faculty"><i
						class="fa fa-plus"></i> New Faculty</button>
			</div>
			<br>
			<div class="col-md-12">
				<table class="table table-bordered" id="faculty-tbl">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Name</th>
							<th class="text-center">Advisory</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>

		</div>
	</div>
	<style>
		.modal-dialog.large {
			width: 80%;
			max-width: 80%;
		}
	</style>
	<script>
		$('#new_faculty').click(function () {
			uni_modal('New faculty', 'manage_faculty.php');
		})
		window.load_tbl = function () {
			$('#faculty-tbl').dataTable().fnDestroy();
			$('#faculty-tbl tbody').html('<tr><td colspan="4" class="text-center">Please Wait...</td></tr>')
			$.ajax({
				url: 'ajax.php?action=load_faculty',
				success: function (resp) {
					if (typeof resp != undefined) {
						resp = JSON.parse(resp)
						if (Object.keys(resp).length > 0) {
							$('#faculty-tbl tbody').html('')
							var i = 1;
							Object.keys(resp).map(k => {
								var tr = $('<tr></tr>')
								tr.append('<td>' + (i++) + '</td>')
								tr.append('<td>' + resp[k].firstname + ' ' + resp[k].middlename + ' ' + resp[k].lastname + '</td>')
								tr.append('<td>' + resp[k].advisory + '</td>')
								tr.append('<td><center><button class="btn btn-info btn-sm edit_faculty" data-id = "' + resp[k].id + '"><i class="fa fa-edit"></i> Edit</button><button class="btn btn-danger btn-sm remove_faculty" data-id = "' + resp[k].id + '"><i class="fa fa-trash"></i> Delete</button><button class="btn btn-info btn-sm class-list" data-id = "' + resp[k].id + '"><i class="fa fa-edit"></i> Class List</button></center></td>')
								$('#faculty-tbl tbody').append(tr)
							})
						} else {
							$('#faculty-tbl tbody').html('<tr><td colspan="4" class="text-center">No Data...</td></tr>')
						}
					}
				},
				complete: function () {
					$('#faculty-tbl').dataTable()
					manage_faculty();
				}
			})
		}
		function manage_faculty() {
			$('.edit_faculty').click(function () {
				uni_modal("Edit Faculty", 'manage_faculty.php?id=' + $(this).attr('data-id'))
			})
			$('.remove_faculty').click(function () {
				// console.log('REMOVE')
				_conf("Are you sure to delete this data?", 'remove_faculty', [$(this).attr('data-id')])
			})
			$('.class-list').click(function () {
				//uni_modal("Class List ", 'list.php?id=' + $(this).attr('data-id'), 'large');
				var facultyId = $(this).data('id');
				var modalId = 'customModal'; // Assign a unique ID to your modal

				// Check if a modal with the specified ID already exists
				var existingModal = $('#' + modalId);

				// Create your modal HTML content
				var modalContent = `
							<div class="modal" id="${modalId}" tabindex="-1" role="dialog">
								<div class="modal-dialog large" style="width: 200%;" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Class List</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<!-- Your modal content goes here -->
											<iframe id="listIframe" src="list.php?id=${facultyId}" width="100%" height="400px" frameborder="0"></iframe>
										</div>
										<div class="modal-footer">
											<button class='btn btn-primary' onclick='printModal()'>Print</button>
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<!-- Add additional buttons or actions here if needed -->
										</div>
									</div>
								</div>
							</div>
						`;
				// If the modal already exists, update its content
				if (existingModal.length) {
					existingModal.replaceWith(modalContent);
				} else {
					// If the modal doesn't exist, append and show it
					$('body').append(modalContent);
					$('#' + modalId).modal('show');

					// Remove the modal from the DOM when it's closed
					$('#' + modalId).on('hidden.bs.modal', function () {
						$(this).remove();
					});
				}

			})
		}
		function printModal() {
			var iframeContent = $('#listIframe').contents().find('body').html();
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = iframeContent;
			window.print();
			document.body.innerHTML = originalContents;
		}

		function remove_faculty($id) {
			start_load()
			$.ajax({
				url: 'ajax.php?action=remove_faculty',
				method: 'POST',
				data: { id: $id },
				success: function (resp) {
					if (resp == 1) {
						alert_toast("Data successfully deleted.", 'success');
						$('.modal').modal('hide')
						load_tbl()
						end_load();
					}
				}
			})
		}
		$(document).ready(function () {
			load_tbl()
		})

	</script>
	<style>
		img.img-field {
			max-height: 30vh;
			max-width: 27vw;
		}
	</style>
</div>