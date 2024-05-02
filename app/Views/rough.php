<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    public function addUser()
    {
        $user = new UserModel();
        $data = [
            'full_name' =>  $this->request->getPost('full_name'),
            'role' =>  $this->request->getPost('role'),
            'email' =>  $this->request->getPost('email'),
            'company' =>  $this->request->getPost('company'),
            'password' =>  $this->request->getPost('password')
        ];
        $user->save($data);
        return redirect('workster')->with('status', 'Inserted successfully');
    }
    public function getUsers()
    {
        $user = new UserModel();
        $data['users'] = $user->findAll(); // Fetch all users

        return view('user_table', $data); // Create a new view for displaying the user table
    }
}


<div class="modal fade" id="myModal_1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-md modal-fullscreen-md-down modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header gap">
            <div class="justify-content-start align-items-center">
                <p class="delete_user">Delete</p>
            </div>
            <div class="justify-content-end align-items-center"><i class="lar la-times-circle btn-close close_icon" data-bs-dismiss="modal" aria-label="Close"></i></div>
        </div>
        <div class="delete_name">
            <p class="pass">Are you sure you want to delete the user "Name" ?</p>
        </div>
        <div class="modal-footer">

            <button type="button" class="btn btn-primary add_btn">Yes</button>
            <button type="button" class="btn btn-secondary cancel_btn" data-bs-dismiss="modal">Cancel</button>

        </div>
    </div>
</div>
</div>




$this->validation->setRules([
    'full_name' => 'trim|required|min_length[5]|max_length[30]',
    'role' => 'trim|required',
    'email' => 'trim|required|valid_email',
    'company' => 'trim|required',
    'password' => 'trim|required|min_length[8]'
]);


if (!$this->validation->withRequest($this->request)->run()) {
    return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
}





<script>
$(document).ready(function() {
   loadData();
})
function loadData()
{
   $.ajax({
           type: 'GET',
           url: '/main/getdata',
           success: function(response) {
               // console.log(response.model);
               $.each(response.model,function(key,value){
                   // console.log(value['password']);
                   $('.userTableData').append('<tr>')

               });
                    
           }
       });
}
</script>

<script>
$(document).ready(function() {
$(document).on('click', '.ajax-data', function(e) {
   e.preventDefault(); // Prevent the default form submission behavior

   var error_name = '';
   var error_role = '';
   var error_email = '';
   var error_company = '';
   var error_pass = '';

   if ($.trim($('#fullName').val()).length == 0) {
       error_name = 'Please enter Full name!';
       $('#error_name').text(error_name);
   } else {
       error_name = '';
       $('#error_name').text(error_name);
   }

   if ($.trim($('#role').val()).length == 0) {
       error_role = 'Please select a Role!';
       $('#error_role').text(error_role);
   } else {
       error_role = '';
       $('#error_role').text(error_role);
   }

   if ($.trim($('#email').val()).length == 0) {
       error_email = 'Please enter Email!';
       $('#error_email').text(error_email);
   } else {
       error_email = '';
       $('#error_email').text(error_email);
   }

   if ($.trim($('#company1').val()).length == 0) {
       error_company = 'Please select a Company!';
       $('#error_company').text(error_company);
   } else {
       error_company = '';
       $('#error_company').text(error_company);
   }

   if ($.trim($('#password').val()).length == 0) {
       error_pass = 'Please enter Password!';
       $('#error_pass').text(error_pass);
   } else {
       error_pass = '';
       $('#error_pass').text(error_pass);
   }

   if (error_name == '' && error_role == '' && error_email == '' && error_company == '' && error_pass == '') {
       var data = {
       fullName: $('#fullName').val(),
       role: $('#role').val(),
       email: $('#email').val(),
       company: $('#company1').val(),
       password: $('#password').val()
   };


       $.ajax({
           type: 'POST',
           url: '/main/store',
           data: data,
           success: function(response) {
               $('#myModal').modal('hide');
               $('#myModal').find('input').val('');
                    
           }
       });
   } else {
       return false;
   }
});
});


</script>

<?php foreach ($people as $user) : ?>
    <tr>
        <td><i class="lar la-user-circle fa-2x first_row_icon"></i></td>
        <td class="username"><?php echo $user['full_name']; ?></td>
        <td class="othercolumn"><?php echo $user['company']; ?></td>
        <td class="othercolumn"><?php echo $user['email']; ?></td>
        <td class="othercolumn"><?php echo $user['role']; ?></td>
        <td>
            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"><i class="las la-pencil-alt icon"></i></a>
            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal_1"><i class="lar la-trash-alt  icon"></i></a>
        </td>
    </tr>
<?php endforeach; ?>













var data = {
    'fullNameedit': document.getElementById('fullNameedit').value,
    'roleedit': document.getElementById('fullNameedit').value,
    'emailedit': document.getElementById('emailedit').value,
    'passwordedit': document.getElementById('passwordedit').value,
    'company1edit': document.getElementById('company1edit').value,

};
document.addEventListener('click', function(event) {
    if (event.target.classList.contains('updatedata')) {
        event.preventDefault();

        var data = {
            'fullNameedit': document.getElementById('fullNameedit').value,
            'roleedit': document.getElementById('fullNameedit').value,
            'emailedit': document.getElementById('emailedit').value,
            'passwordedit': document.getElementById('passwordedit').value,
            'company1edit': document.getElementById('company1edit').value,

        };

        var ready = new XMLHttpRequest();
        ready.open("POST", "/main/update", true);
        ready.onreadystatechange = function() {
            if (ready.readyState === 4) {
                if (ready.status === 200) {

                    $('#myModaledit').modal('hide');
                    $('#mymodaledit').find('input').val('');

                    console.log(ready.responseText);
                    document.getElementById('myModaledit').classList.remove('show');
                    document.getElementById('myModaledit').style.display = 'none';

                    document.getElementById('myModaledit').innerHTML = '';
                    document.querySelector('.userTableData').innerHTML = "";
                    console.log("Ajax called");
                    loadData();
                } else {
                    console.error('Error:', ready.responseText);

                }
            }
        };
        ready.send(data);

    }
});


<div class="modal fade" id="myModaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content col-lg-12">
                <div class="modal-header card d-flex">
                    <div class="col-11  d-flex justify-content-start align-items-center"><i class="lar la-user user_icon"></i>
                        <p class="add_user">ADD USER</p>
                    </div>
                    <div class="col-1  "><i class="lar la-times-circle btn-close close_icon" data-bs-dismiss="modal" aria-label="Close"></i></div>
                </div>
                <div class="col-12 genral_div d-flex">
                    <div class="col-3 general_div hover"> <a href="#" class="link">
                            <p class="general">GENERAL</p>
                        </a>
                    </div>
                    <div class="col-9  other"></div>
                </div>


                <form>


                    <div class="modal-body main_card">

                        <div class="row main">
                            <div class="col-6 d-flex flex-column ">
                                <label for="fullName" class="form_label_1">Full Name</label>
                                <input type="text" class="form_control_1" id="fullNameedit" placeholder="Enter full name" name="full_name">
                                <span id="error_name" class="text-danger ms-3"></span>
                            </div>
                            <div class="col-6  d-flex flex-column">
                                <label for="role" class="form_label_1">Role</label>

                                <select class="form_select_1" id="roleedit" name="role">
                                    <option value="Admin">Admin</option>
                                    <option value="Manager">Manager</option>
                                </select>
                                <span id="error_role" class="text-danger ms-3"></span>


                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6  d-flex flex-column">
                                <label for="email" class="form_label_1">Email</label>
                                <input type="email" class="form_control_1" id="emailedit" placeholder="Enter email" name="email">
                                <span id="error_email" class="text-danger ms-3"></span>
                            </div>

                            <div class="col-6  d-flex flex-column">
                                <label for="company" class="form_label_1">Company</label>
                                <select class="form_select_1" id="company1edit" name="company">
                                    <option value="Webster Solutions">Webster Solutions</option>
                                    <option value="Xeniapp.Inc">Xeniapp.Inc</option>
                                </select>
                                <span id="error_company" class="text-danger ms-3"></span>
                            </div>
                        </div>
                        <p class="pass_1">Password</p>
                        <div class="row mt-3  pass_show ">
                            <div class="col-6  d-flex flex-column">
                                <label for="password" class="form_label_1">Set Password</label>
                                <input type="password" class="form_control_1 password_input " id="passwordedit" name="password" placeholder="Enter password" required>
                                <span class="password_icon"><i class="lar la-eye eye_icon" id="togglePassword" onclick="show1()"></i></span>
                                <span id="error_pass" class="text-danger ms-3"></span>

                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">

                        <button class="btn btn-primary add_btn_1 updatedata" type="submit">Update</button>
                        <button type="button" class="btn btn-secondary cancel_btn_1" data-bs-dismiss="modal">Cancel</button>

                    </div>
                </form>
            </div>
        </div>
    </div>








// /////////////////////////////////////////////////////////////////


    <?php

namespace App\Controllers; 
use App\Models\Admin;


class Webster extends BaseController
{
    public function index()
    {
        $admin = new Admin();
        $data['admins'] = $admin-> findAll();
       return view("Webster/index" , $data);
    }
    public function create()
    {
        $data = [];
        $request = $this->request->getJSON(); 
    
        
        $Full_name = $request->Full_name;
        $Role = $request->Role;
        $Email = $request->Email;
        $Company = $request->Company;
    
        
        $data = [
            'Full_name' => $Full_name,
            'Role' => $Role,
            'Email' => $Email,
            'Company' => $Company
        ];
    
        $admin = new Admin();
        $insert = $admin->insert($data);
        
        return $this->response->setJSON($insert); 
    }
    public function fetch(){
        $admins = new Admin();
        $data['admins'] = $admins->findAll();

        return $this->response->setJSON($data); 
    }
    public function edit(){
        $admins = new Admin();
        $admin_id = $this->request->getPost('admin_id');
        $data['admin'] = $admins->find($admin_id);
        return $this->response->setJSON($data);
    }
    public function update(){
        $admins = new Admin();
        $admin_id = $this->request->getPost('id');
        $data = [
            'Full_name' => $this->request->getPost('Full_name'),
            'Role' => $this->request->getPost('Role'),
            'Email' => $this->request->getPost('Email'),
            'Company' => $this->request->getPost('Company'),
            'Set_password' => $this->request->getPost('Set_password')
        ]; 
        $admins->update($admin_id, $data);
        $message = ['status'=>"Updated Successfully"];
        return $this->response->setJSON($message);
    }
    
    
}





public function update(){
    $request = $this->request->getJSON();

    $admin_id = $request->id; 
    if (!$admin_id) {
        $message = ['error' => "Admin ID is required for update"];
        return $this->response->setJSON($message);
    }

    $admins = new Admin();
    $existing_admin = $admins->find($admin_id);
    if (!$existing_admin) {
        $message = ['error' => "Admin record not found"];
        return $this->response->setJSON($message);
    }
    // Construct the data to be updated
    $data = [
        'Full_name' => $request->Full_name ?? $existing_admin['Full_name'],
        'Role' => $request->Role ?? $existing_admin['Role'],
        'Email' => $request->Email ?? $existing_admin['Email'],
        'Company' => $request->Company ?? $existing_admin['Company'],
        'Set_password' => $request->Set_password ?? $existing_admin['Set_password']
    ];
    // Perform the update operation
    $result = $admins->update($admin_id, $data);
    if ($result) {
        $message = ['status' => "Updated Successfully"];
    } else {
        $message = ['error' => "Failed to update record"];
    }
    return $this->response->setJSON($message);
}



function loadData1() {
    event.preventDefault();

    var data = {
        'id': document.getElementById("admin_id41").value,
        'Full_name': document.getElementById("inputName41").value,
        'Role': document.getElementById("inputRole41").value,
        'Email': document.getElementById("inputEmail41").value,
        'Company': document.getElementById("inputCompany41").value,
        'Set_password': document.getElementById("inputPassword41").value,
    };

    // Send AJAX request
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/webster/update', true);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                // Handle success
                console.log(xhr.responseText);
                // document.getElementById("updateModal").classList.remove("show");
                // document.getElementById("updateModal").style.display = "none";
                $('#updateModal').modal('hide');
                document.querySelector('.adminData').innerHTML = "";
                loadAdmin();
                console.log('User updated successfully');
            } else {
                // Handle error
                console.error('Error:', xhr.status);
                console.log('Error updating user');
            }
        }
    };
    xhr.send(JSON.stringify(data));
}



