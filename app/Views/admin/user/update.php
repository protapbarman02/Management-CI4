<?= $this->extend('admin/base'); ?>
<?= $this->section('title'); ?>
<?= $page_title; ?>
<?= $this->endSection('title'); ?>
<?= $this->section('heading'); ?>
<?= $page_heading; ?>
<?= $this->endSection('heading'); ?>
<?= $this->section('mainContent'); ?>
<!-- content Start -->
<div class="main-content">
    <div class="container-fluid pt-4 px-4">
        <form class="row g-4 mb-3" action="<?= url_to('UserController::update',$id);?>" method="post" enctype="multipart/form-data">
            <?php if(isset($message)):?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $message; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif;?>
            <div class="col-12 d-flex">
                <div class="btn-group" role="group">
                    <div class="">
                        <div class="mb-1">
                            <input type="radio" class="btn-check" name="group" value="superadmin" id="btnradio4" value="superadmin" <?= $data->groups[0] == 'superadmin' ? 'checked' : '' ?>>
                            <label class="btn btn-outline-primary" style="width:100px;" for="btnradio4">Superadmin</label>
                        </div>
                        <div class="mb-1">
                            <input type="radio" class="btn-check" name="group" value="admin" id="btnradio3" value="admin" <?= $data->groups[0] == 'admin' ? 'checked' : '' ?>>
                            <label class="btn btn-outline-primary" style="width:100px;" for="btnradio3">Admin</label>
                        </div>
                        <div class="mb-1">
                            <input type="radio" class="btn-check" name="group" value="staff" id="btnradio2" value="staff" <?= $data->groups[0] == 'staff' ? 'checked' : '' ?>>
                            <label class="btn btn-outline-primary" style="width:100px;" for="btnradio2">Staff</label>
                        </div>
                        <div>
                            <input type="radio" class="btn-check" name="group" value="customer" id="btnradio1" value="customer" <?= $data->groups[0] == 'customer' ? 'checked' : '' ?>>
                            <label class="btn btn-outline-primary" style="width:100px;" for="btnradio1">Customer</label>
                        </div>
                    </div>
                </div>
                <div class="ms-2">
                    <label for="img" class="position-relative">
                        <div class="btn btn-sm position-absolute border-none" style="top:0; right:0; background-color: white; border:none;">
                            <i class="bi bi-pencil-square"></i>
                        </div>
                        <img
                            src="<?= base_url();?>public/img/<?php if($data->img!==null && $data->img!==''){echo $data->img;}else{echo 'avatar.png';}?>" alt="Photo" style="width: 160px; height:160px; object-fit: contain" id="userImgTag"
                         />
                    </label>
                    <input type="file" name="img" id="img" class="d-none" accept="image/*" />
                </div>
            </div>
            <div class="col-md-6">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $data->first_name; ?>">
            </div>
            <div class="col-md-6">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $data->last_name; ?>">
            </div>
            
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $data->email; ?>">
            </div>
            <div class="col-md-6">
                <label for="mobile" class="form-label">Mobile No.</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">+91</span>
                    <input type="text" class="form-control" id="mobile" name="mobile" aria-label="Mobile" aria-describedby="basic-addon1" value="<?= $data->mobile; ?>">
                </div>
            </div>
            <div class="col-md-12">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= $data->username; ?>">
            </div>
            
            <div class="col-12">
                <label for="address" class="form-label">Address</label>
                <div class="form-floating">
                  <textarea class="form-control" id="address" name="address" rows="4"><?= $data->address; ?></textarea>
                  <label for="address">Address Line, Landmark, Village/Block, City, District, State, PIN</label>
                </div>
            </div>
            
            <div class="col-md-6">
                <label for="gender" class="form-label">Gender</label>
                <select id="gender" class="form-select" name="gender">
                    <option value="Male" <?= $data->gender == 'Male' ? 'selected' : '' ?>>Male</option>
                    <option value="Female" <?= $data->gender == 'Female' ? 'selected' : '' ?>>Female</option>
                    <option value="Others" <?= $data->gender == 'Others' ? 'selected' : '' ?>>Others</option>
                </select>
            </div>
            
            <div class="col-md-6">
                <label for="dob" class="form-label">Date Of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" value="<?= $data->dob; ?>">
            </div>
            
            <div class="col-12 text-end">
                <a class="btn btn-sm btn-outline-primary" href="<?= url_to('UserController::index');?>">Back</a>
                <button type="submit" class="btn btn-sm btn-primary">Update</button>
            </div>
            
            <?php if (isset($validation)): ?>
            <div class="col-12 bg-danger pt-3 text-light">
                <?= validation_list_errors(); ?>
            </div>
            <?php endif; ?>
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        const outputImage = document.getElementById('userImgTag');
        const imageInput = document.getElementById('img');
        
        imageInput.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    outputImage.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    })
</script>
<!-- content end -->
<?= $this->endSection('mainContent'); ?>