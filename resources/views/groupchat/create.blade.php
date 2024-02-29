@extends('layouts.app')
@section('main')
    <div class="col-lg-8 mx-auto">
        <div class="mt-3 mb-3">
            <button id="createGroupBtn" class="btn btn-primary">Create Group</button>
        </div>
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col"><input type="checkbox" id="select_all" value="" ></th>
                        <th scope="col">Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td><input type="checkbox" class="selected_user" value="{{$user->id}}" ></td>
                        <td>{{$user->name}}</td>
                    </tr>      
                    @endforeach                  
                </tbody>
            </table>
        </div>
        
    </div>
@endsection


@section('customJs')
<script>
    $(document).ready(function() {
        // Select All checkbox functionality
        $('#select_all').on('change', function() {
            $('.selected_user').prop('checked', $(this).prop('checked'));
        });

        // Create Group button click event
        $('#createGroupBtn').on('click', function() {
            var selectedUsers = [];

            // Loop through all checkboxes to find the selected ones
            $('.selected_user:checked').each(function() {
                selectedUsers.push($(this).val()); // Push selected user IDs into an array
            });

            // Check if at least one user is selected
            if (selectedUsers.length === 0) {
                alert('Error: At least one user must be selected to create a group.');
                return; // Exit the function if no user is selected
            }

            // Ask for the group name using a prompt
            var groupName = prompt("Enter group name:");

            if (groupName !== null) { // If the user enters a group name
                // Send the selectedUsers array and groupName to the server using AJAX
                $.ajax({
                    url: '/create-group',
                    type: 'POST',
                    data: { users: selectedUsers, groupName: groupName },
                    success: function(response) {
                        // Handle the success response here
                        console.log(response);
                    },
                    error: function(error) {
                        // Handle any errors that occur during the AJAX request
                        console.error('Error:', error);
                    }
                });
            } else {
                // Handle when the user cancels the prompt (didn't enter a group name)
                console.log('Group creation cancelled');
            }
        });
    });
</script>
@endsection


