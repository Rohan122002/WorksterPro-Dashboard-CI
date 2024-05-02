<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workster</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?= $this->include('bootstrap.php') ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/line-awesome/dist/line-awesome/css/line-awesome.min.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Montserrat:ital,wght@0,400;0,700;1,200&family=Rubik&display=swap" rel="stylesheet">

    <link href="\css\main.css" rel="stylesheet">
    <link href="\css\user.css" rel="stylesheet">
    <link href="\css\delete.css" rel="stylesheet">

    <style>

    </style>

</head>

<body>
    <section class="main_section">
        <div class="main row mr">
            <div class="col-lg-2 pd d-flex">
                <nav id="sidebarMenu" class="d-lg-block sidebar bg-white">
                    <div class="col-lg-12 col-md-12 col-12 position-sticky justify-content-center flex-grow-1">
                        <div class="worksterpro_div col-lg-12 col-md-12 col-12">
                            <div class="toggle_div"> <a href="#" class="togglebtn" id="sidebarToggle"><i class="las la-bars icon"></i></a></div>
                            <div class="workster_div"> <a href="#" class="link">
                                    <p class="worksterpro">WORKSTER<span class="pro">PRO</span></p>
                                </a></div>
                        </div>
                        <div class="col-lg-12 col-md-12 list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action " aria-current="true">
                                <i class="lar la-list-alt me-3 icon"></i><span class="items">PROJECTS</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                                <i class="lar la-calendar-alt me-3 icon"></i><span class="items">CALENDAR</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                                <i class="las la-suitcase me-3 icon"></i><span class="items">COMPANY</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                                <i class="bi bi-people me-3 icon"></i><span class="items">PEOPLES</span>
                            </a>
                        </div>
                    </div>
                </nav>

            </div>


            <div class="col-lg-10  pd">
                <div class="col-lg-12  mr people_div d-flex  container">
                    <div class="col-2 col-md-2 ">
                        <a href="#" class="link">
                            <p class="peoples">Peoples</p>
                        </a>
                    </div>
                    <div class="col-7 col-md-8"></div>
                    <div class="col-3 col-md-2 d-flex row_icons ">
                        <div class="bell_icon pt-3"><a href="#"><i class="lar la-bell fa-2x first_row_icon "></i></a></div>
                        <div class="profile_icon"><a href="#"><i class="lar la-user-circle fa-3x first_row_icon  main_icon"></i></a></div>
                    </div>


                </div>
                <div class="col-lg-12 row mr user_div container">
                    <div class="col-2 row pd mr">
                        <div class="dropdown pd">
                            <div class="d-flex sort_div align-items-center">
                                <i class="bi bi-funnel me-2 first_row_icon"></i>
                                <label for="company" class="form-label sort">Sort:</label>
                                <select class="form-select" id="company">
                                    <option value="company1">A-Z</option>
                                    <option value="company2">Z-A</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-8 pd no"></div>
                    <div class="col-2 user pd d-flex justify-content-end align-items-center " id="show">
                        <a href="" class="link " data-bs-toggle="modal" data-bs-target="#myModal" id="newUserLink"><i class="las la-plus-circle "></i>
                            <span class="new_user"> NEW USER</span></a>
                    </div>
                </div>
                <div class="container mr col-lg-12 ">
                    <table class="table table-hover col-12">
                        <tbody id="userTableBody" class="userTableData">




                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
        </div>

    </section>
    <!-- insert -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content col-lg-12 ">
                <div class="modal-header card d-flex">
                    <div class="col-11  d-flex justify-content-start align-items-center"><i class="lar la-user user_icon"></i>
                        <p class="add_user">ADD USER</p>
                    </div>
                    <div class="col-1  "><i class="lar la-times-circle btn-close close_icon" data-bs-dismiss="modal" aria-label="Close"></i></div>
                </div>
                <div class="col-12 genral_div d-flex">
                    <div class="col-3 general_div "> <a href="#" class="link">
                            <div class="general_div hover">
                                <p class="general">GENERAL</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-9  other"></div>
                </div>
                <form id="userForm" class="needs-validation" novalidate>
                    <div class="modal-body main_card">
                        <div class="row main">
                            <div class="col-6 d-flex flex-column ">
                                <label for="fullName" class="form_label_1">Full Name</label>
                                <input type="text" class="form-control form_control_1" id="fullName" placeholder="Enter full name" name="full_name" required>
                                <span class="invalid-feedback ms-3" id="error_name"></span>
                            </div>
                            <div class="col-6  d-flex flex-column ">
                                <label for="role" class="form_label_1">Role</label>
                                <select class="form-control form_select_1" id="role" name="role" required>
                                    <option value="Admin">Admin</option>
                                    <option value="Manager">Manager</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6  d-flex flex-column">
                                <label for="email" class="form_label_1">Email</label>
                                <input type="email" class="form-control form_control_1" id="email" placeholder="Enter email" name="email" autocomplete="username" required>
                                <span class="invalid-feedback ms-3" id="error_email"></span>
                            </div>
                            <div class="col-6  d-flex flex-column main">
                                <label for="company" class="form_label_1">Company</label>
                                <select class="form-control form_select_1" id="company1" name="company" required>
                                    <option value="Webster Solutions">Webster Solutions</option>
                                    <option value="Xeniapp.Inc">Xeniapp.Inc</option>
                                </select>
                            </div>
                        </div>
                        <p class="pass_1">Password</p>
                        <div class="row mt-3  pass_show ">
                            <div class="col-6  d-flex flex-column">
                                <label for="password" class="form_label_1">Set Password</label>
                                <input type="password" class="form-control form_control_1 password_input " id="password" name="password" placeholder="Enter password" required minlength="8" autocomplete="new-password">
                                <span class="password_icon"><i class="lar la-eye eye_icon" id="togglePassword" onclick="show()"></i></span>
                                <span class="invalid-feedback ms-3" id="error_pass"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary add_btn_1 ajax-data" type="submit">Add</button>
                        <button type="button" class="btn btn-secondary cancel_btn_1" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!-- delete -->

    <div class="modal fade" id="modaldelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-fullscreen-md-down modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header gap">
                    <div class="justify-content-start align-items-center">
                        <p class="delete_user">Delete</p>
                    </div>
                    <div class="justify-content-end align-items-center"><i class="lar la-times-circle btn-close close_icon" data-bs-dismiss="modal" aria-label="Close"></i></div>
                </div>
                <div class="delete_name">
                    <input type="hidden" id="delete_id">
                    <p class="pass">Are you sure you want to delete the user " <span id="user_name_to_delete"></span> " ?</p>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary delete_btn">Yes</button>
                    <button type="button" class="btn btn-secondary cancel_btn" data-bs-dismiss="modal">Cancel</button>

                </div>
            </div>
        </div>
    </div>
    <!-- delete end -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>



    <script src="\js\user.js"></script>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>


</body>

</html>