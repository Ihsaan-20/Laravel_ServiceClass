$(document).ready(function() {
   
    $.ajax({
        type: "GET",
        url: "{{ route('getUsers') }}",
        success: function (data) {
            console.log(data);
            if (data.users.length > 0) {
                for (var i = 0; i < data.users.length; i++) {
                    $('#data').append(`<tr>
                                            <td>${i + 1}</td>
                                            <td>${data.users[i].id}</td>
                                            <td>${data.users[i].name}</td>
                                            <td>${data.users[i].email}</td>
                                        </tr>`);
                }
            } else {
                $('#data').append(`<tr><td colspan="4">No data found!</td></tr>`);
            }
            
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
    

    var userId = $(this).data('id');
    $('.edit_btn').click(function(event) {
        event.preventDefault();
        var userId = $(this).data('id');
        $('#editUserModal').modal('show');

        AjaxFun('user/edit/' + userId, null, 'GET', function(response) {

            $('#id').val(response.user.id);
            $('#name').val(response.user.name);
            $('#email').val(response.user.email);

            if (response.user.profile) {
                var assetUrl = "http://127.0.0.1:8000/storage/profiles/";
                $('#old_profile').attr('src', assetUrl + response.user.profile);
                $('#old_img').show();
            } else {
                $('#old_img').hide();
            }
        });
    });

    $('#EditUserForm').on('submit', function(event) {
        event.preventDefault();
        var formData = new FormData(this);
        var url = '/user/update';
        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
                if(response.status === 200) {
                    $('#profile').val('');
                    $('#editUserModal').modal('hide');
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    $('.delete_btn').click(function(event) {
        event.preventDefault();
        var userId = $(this).data('id');
        // console.log('Delete User ID:', userId);
    });
});


function AjaxFun(url, formData, type, successCallback) {
    $.ajax({
        type: type,
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            successCallback(response);
        },
        error: function(xhr, status, error) {
            console.error("Error:", error);
        }
    });
}


