// password show 
var a = 0;
var b = 0;

function show() {
    if (a == 0) {
        document.getElementById('password').type = 'text'; // Show password
        document.getElementById('togglePassword').classList.remove('la-eye');
        document.getElementById('togglePassword').classList.add('la-eye-slash');
        a = 1;
    } else {
        document.getElementById('password').type = 'password'; // Hide password
        document.getElementById('togglePassword').classList.remove('la-eye-slash');
        document.getElementById('togglePassword').classList.add('la-eye');
        a = 0;
    }
}


function show1() {
    if (b == 0) {
        document.getElementById('passwordedit').type = 'text'; // Show password
        document.getElementById('togglePassword1').classList.remove('la-eye');
        document.getElementById('togglePassword1').classList.add('la-eye-slash');
        b = 1;
    } else {
        document.getElementById('passwordedit').type = 'password'; // Hide password
        document.getElementById('togglePassword1').classList.remove('la-eye-slash');
        document.getElementById('togglePassword1').classList.add('la-eye');
        b = 0;
    }
}



// update data

document.addEventListener("DOMContentLoaded", function () {
    loadData();
    var currentId;

    $(document).on('click', '.edit_data', function () {
        currentId = $(this).closest('tr').find('.id').text();
        $.ajax({
            method: "post",
            url: "/main/edit",
            data: {
                'id': currentId
            },
            success: function (response) {
                $.each(response, function (key, value) {
                    $('#fullName').val(value['full_name']);
                    $('#role').val(value['role']);
                    $('#email').val(value['email']);
                    $('#company').val(value['company']);
                    $('#password').val(value['password']);
                    $('#myModal').modal('show');
                });
            }
        });
    });

    $(document).on('click', '.ajax-data', function (event) {
        event.preventDefault(); // Prevent default form submission behavior

        var id = currentId;
        var fullName = $("#fullName").val().trim();
        var role = $("#role").val().trim();
        var email = $("#email").val().trim();
        var company = $("#company1").val().trim();
        var password = $("#password").val().trim();

        var data = {
            id: id,
            full_name: fullName,
            role: role,
            email: email,
            company: company,
            password: password
        };
        // alert(JSON.stringify(data));

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "/main/update", true);
        xhr.setRequestHeader("Content-Type", "application/json");



        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    $('#myModal').modal('hide');
                    document.getElementById("myModal").reset();
                    loadData();
                    alert('User updated successfully');
                } else {
                    console.error('Error:', xhr.status);
                }
            }
        };
        xhr.send(JSON.stringify(data));

    });


    // delete user
    $(document).on('click', '.delete_data', function () {
        var id = $(this).closest('tr').find('.id').text();
        var name = $(this).closest('tr').find('.username').text();
        $('#delete_id').val(id);
        $('#user_name_to_delete').text(name);
        $('#modaldelete').modal('show');
    });

    $(document).on('click', '.delete_btn', function () {
        var id = $('#delete_id').val();
        $.ajax({
            method: "post",
            url: "/main/delete",
            data: {
                'id': id
            },
            success: function (response) {
                $('#modaldelete').modal('hide');
                loadData();
            }
        })
    });

    document.addEventListener('click', function (event) {
        if (event.target.classList.contains('delete_btn')) {
            var id = document.getElementById('delete_id').value;
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "/main/delete", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        $('#modaldelete').modal('hide');
                        loadData();
                    } else {
                        console.error('Error:', xhr.responseText);
                    }
                }
            };
            xhr.send(id);
        }
    });
});

// display updated table
function loadData() {
    document.querySelector('.userTableData').innerHTML = "";
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/main/getdata", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            var tableBody = document.querySelector('.userTableData');
            response.model.forEach(function (value) {
                var newRow = document.createElement('tr');
                newRow.innerHTML = '<td><i class="lar la-user-circle fa-2x first_row_icon"></i></td>' +
                    '<td class="id hidden">' + value['id'] + '</td>' +
                    '<td class="username">' + value['full_name'] + '</td>' +
                    '<td class="othercolumn">' + value['company'] + '</td>' +
                    '<td class="othercolumn">' + value['email'] + '</td>' +
                    '<td class="othercolumn">' + value['role'] + '</td>' +
                    '<td>' +
                    '<a href="#" class="edit_data" ><i class="las la-pencil-alt icon "data-bs-dismiss="modal" ></i></a>' +
                    '<a href="#" class="delete_data"><i class="lar la-trash-alt  icon delete_icon"></i></a>' +
                    '</td>';
                tableBody.appendChild(newRow);
            });
        }
    };
    xhr.send();
}

// validation to form
document.addEventListener("DOMContentLoaded", function () {
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('ajax-data')) {
            e.preventDefault();
            var form = document.getElementById('userForm');
            var formData = new FormData(form);
            var error_name = '';
            var error_role = '';
            var error_email = '';
            var error_company = '';
            var error_password = '';

            if (!form.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
                form.classList.add('was-validated');
                return;
            }

            // Name validation
            var fullNameInput = document.getElementById('fullName');
            if (fullNameInput.value.trim().length < 3) {
                error_name = 'Enter valid name!';
                document.getElementById('error_name').textContent = error_name;
                return;
            } else {
                error_name = '';
                document.getElementById('error_name').textContent = error_name;
            }

            // Email validation
            var emailInput = document.getElementById('email');
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(emailInput.value)) {
                error_email = 'Please enter a valid email address!';
                document.getElementById('error_email').textContent = error_email;
                return;
            } else {
                error_email = '';
                document.getElementById('error_email').textContent = error_email;
            }

            // Password validation
            var passwordInput = document.getElementById('password');
            if (passwordInput.value.trim().length < 8) {
                error_password = 'Password must be at least 8 characters long!';
                document.getElementById('error_pass').textContent = error_password;
                return;
            } else {
                error_password = '';
                document.getElementById('error_pass').textContent = error_password;
            }

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "/main/store", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        console.log(xhr.responseText);
                        $('#myModal').modal('hide');
                        $('#myModal').find('input').val('');
                        form.reset(); // Reset the form
                        loadData();
                    } else {
                        console.error('Error:', xhr.responseText);
                    }
                }
            };
            xhr.send(formData);
        }
    });
});

$('#myModal').on('hidden.bs.modal', function (e) {
    $('.modal-backdrop').remove();
});

document.addEventListener('DOMContentLoaded', function () {
    var adduser = document.getElementsByClassName('add_user');

    edit_data.onclick = function () {

    }
    function changeStatus() {
        document.getElementsByClassName('add_user') = "Update User";
    }

});






document.addEventListener('DOMContentLoaded', function () {
    var sidebarToggle = document.getElementById('sidebarToggle');
    var sidebarMenu = document.getElementById('sidebarMenu');

    sidebarToggle.addEventListener('click', function () {
        sidebarMenu.classList.toggle('active');
    });
});


