<div class="container-fluid">
    <div class="card col-md-12">
        <div class="card-body">
            <div class="col-md-12">
                <!-- <button type="button" class="btn btn-primary btn-sm btn-block col-sm-2" id="calculate"><i
                        class="fa fa-plus"></i>
                    Calculate Student Grade</button> -->
                <!-- <button type="button" class="btn btn-primary btn-sm btn-block col-sm-2" id="new_student"><i
                        class="fa fa-plus"></i> Enroll New Student</button> -->

            </div>

            <br>
            <div class="col-md-12">
                <table class="table table-bordered" id="student-tbl">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Level Section</th>
                            <th class="text-center">Adviser</th>
                            <th class="text-center">Student Type</th>
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
            max-width: inherit;
        }
    </style>
    <script>
        $('#calculate').click(function () {
            // uni_modal('Calculate Grade', 'calculate.php');
            var modalId = 'customModal'; // Assign a unique ID to your modal

            // Check if a modal with the specified ID already exists
            var existingModal = $('#' + modalId);

            // Create your modal HTML content
            var modalContent = `
                            <div class="modal" id="${modalId}" tabindex="-1" role="dialog">
                                <div class="modal-dialog" style="width: 200%;" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Calculate Grade</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Your modal content goes here -->
                                            <iframe id="listIframe" src="calculate.php" width="100%" height="400px" frameborder="0"></iframe>
                                        </div>
                                        <div class="modal-footer">
                                            
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

        $('#new_student').click(function () {
            uni_modal('Enroll', 'manage_enrollment.php', 'large');
        })
        window.load_tbl = function () {
            $('#student-tbl').dataTable().fnDestroy();
            $('#student-tbl tbody').html('<tr><td colspan="6" class="text-center">Please Wait...</td></tr>')
            $.ajax({
                url: 'ajax.php?action=load_student_off',
                success: function (resp) {
                    if (typeof resp != undefined) {
                        resp = JSON.parse(resp)
                        if (Object.keys(resp).length > 0) {
                            $('#student-tbl tbody').html('')
                            var i = 1;
                            Object.keys(resp).map(k => {
                                var tr = $('<tr></tr>')
                                tr.append('<td>' + (i++) + '</td>')
                                tr.append('<td>' + resp[k].name + '</td>')
                                tr.append('<td>' + (resp[k].ls) + '</td>')
                                tr.append('<td>' + (resp[k].fname) + '</td>')
                                tr.append('<td>' + (resp[k].user_type) + '</td>')
                                tr.append('<td><center><button class="btn btn-danger btn-sm remove_student" data-id = "' + resp[k].id + '"><i class="fa fa-trash"></i> Delete</button></center></td>')
                                $('#student-tbl tbody').append(tr)
                            })
                        } else {
                            $('#student-tbl tbody').html('<tr><td colspan="6" class="text-center">No Data...</td></tr>')
                        }
                    }
                },
                complete: function () {
                    $('#student-tbl').dataTable()
                    manage_student();
                }
            })
        }
        function manage_student() {
            $('.edit_student').click(function () {
                uni_modal("Edit Enrollment", 'manage_enrollment.php?id=' + $(this).attr('data-id'), 'large')
            })
            $('.remove_student').click(function () {
                // console.log('REMOVE')
                _conf("Are you sure to delete this data?", 'remove_student', [$(this).attr('data-id')])
            })
        }
        function remove_student($id) {
            start_load()
            $.ajax({
                url: 'ajax.php?action=remove_enroll',
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