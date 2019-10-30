$(document).ready(function() {

    //simple way to load only when needed (index page with table)
    var tableExists = $(".table-sortable").length > 0 ? true : false;

    if (tableExists) {
        $(".table-sortable tbody").sortable({}).disableSelection();
        $(".table-sortable thead").disableSelection();
        $('input.status').change(function() {

            var id = $(this).data("id");
            var currentStatus = $(this).is(":checked");
            var newStatus = currentStatus == true ? 1 : 0;
            var csrf = $('#token').val();

            //TODO use hidden class instead to show and hide div
            function showAlert(response) {
                if ($('.alert').length == 0) {
                    html = "<div class='alert alert-success'>" + response + "</div>";
                    $(html).insertAfter('.col-sm-12');
                } else {
                    $('.alert').html(response);
                }
            }
            if (typeof(id) != 'undefined' && typeof(newStatus) != 'undefined') {
                $.ajax({
                    url: '/admin/content/updateStatus',
                    data: { 'id': id, 'status': newStatus, "_token": csrf },
                    type: 'POST',
                    success: function(response) {
                        showAlert('Post with id ' + id + ' updated succesfully');
                    },
                    error: function(response) {
                        showAlert('Post with id ' + id + ' failed to update');
                    }
                });
            } else {
                return false;
            }
        });
    }
});