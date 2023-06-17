<div class="modal fade" id="user_<?= $rows['userid'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="../php/editUser.php"  enctype="multipart/form-data">
                <div class="modal-header">
                    <h3 class="modal-title">Edit User for:
                        <?= $rows['first_name'], " ", $rows['last_name'] ?>
                    </h3>
                </div>
                <div class="modal-body">
                   
                    <div class="row mb-3">
                        <div class="d-flex align-items-center">
                            <img src="../assets/img/uploads/<?php if (isset($rows['imgpath'])) {
                                echo $rows['imgpath'];
                            } else {
                                echo "default.png";
                            } ?>" alt="" style="width: 64px; height: 64px" id="image-preview" class="rounded-circle bg-secondary" />
                            <div class="ms-3">
                                <input type="file" name="image" id="image" accept=".png,.gif,.jpg,.jpeg" hidden>
                                <button type="button" class="btn btn-primary" id="uploadImage"><i
                                        class="fas fa-arrow-circle-up"></i> Upload Photo</button></a></h1>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">

                            <input type="hidden" name="id" value="<?php echo $rows['userid'] ?>" />
                            <div class="form-outline">
                                <input type="text" id="firstName" name="firstName" class="form-control form-control-lg"
                                    value="<?php echo $rows['first_name'] ?>" required />
                                <label class="form-label" for="firstName">First Name</label>
                            </div>

                        </div>
                        <div class="col-md-6 mb-4">

                            <div class="form-outline">
                                <input type="text" id="lastName" name="lastName" class="form-control form-control-lg"
                                    value="<?php echo $rows['last_name'] ?>" required />
                                <label class="form-label" for="lastName">Last Name</label>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4 d-flex align-items-center">

                            <div class="form-outline w-100">
                                <input type="email" id="email" name="email" class="form-control form-control-lg"
                                    required value="<?php echo $rows['email'] ?>" />
                                <label class="form-label" for="email">Your Email</label>
                            </div>

                        </div>
                        <div class="col-md-6 mb-4">

                            <h6 class="mb-2 pb-1">Gender: </h6>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="maleGender" value="Male"
                                    <?php if ($rows['gender'] == "Male") { ?> checked <?php } ?> />
                                <label class="form-check-label" for="maleGender">Male</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="femaleGender"
                                    value="Female" <?php if ($rows['gender'] == "Female") { ?> checked <?php } ?> />
                                <label class="form-check-label" for="femaleGender">Female</label>

                            </div>



                        </div>
                    </div>





                    <div class="d-flex justify-content-center">
                        <label for="selectRole">Select Role</label>
                        <select class="form-control" id="selectRole" name="role">
                            <option value=0 <?php if ($rows['role'] == 0) { ?> selected <?php } ?>>Administrator</option>
                            <option value=1 <?php if ($rows['role'] == 1) { ?> selected <?php } ?>>Regular Member</option>
                        </select>
                    </div>



                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <button class="btn btn-warning" name="edit_user"><span class="fa-solid fa-edit"></span>
                        Update</button>
                    <button class="btn btn-danger" type="button" data-mdb-dismiss="modal"><span
                            class="fa-solid fa-delete"></span> Close</button>
                </div>
        </div>
        </form>
    </div>
</div>
</div>