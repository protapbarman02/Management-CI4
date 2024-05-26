<?= $this->extend('admin/base'); ?>
<?= $this->section('title'); ?>
    <?= $page_title;?>
<?= $this->endSection('title'); ?>
<?= $this->section('heading'); ?>
    <?= $page_heading;?>
<?= $this->endSection('heading'); ?>
<?= $this->section('mainContent'); ?>
<!-- content Start -->
<div class="main-content">
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <?php if (session('message') !== null) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session('message') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>
            <div class="col-12 text-end bg-light py-3">
                <a class="btn btn-sm btn-primary" href="<?= url_to('UserController::create');?>">Add New User</a>
            </div>
            <div class="col-12">
                <table class="table table-hover display w-100" id="adminDataTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Username</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Mobile No.</th>
                            <th scope="col">Gender</th>
                            <th scope="col">DOB</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- content end -->
<script>
    $(document).ready(function() {
        var table = $('#adminDataTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?= url_to('UserController::users');?>",
                "type": "GET"
            },
            "columns": [
                { "data": "id" },
                {
                    "data": "null",
                    "render": function (data, type, row) {
                        if (row.img !== null && row.img !== "") {
                            return `<img src="<?= base_url();?>public/img/${row.img}" class="adminTableImg">`;
                        }
                        else{
                            return `<img src="<?= base_url();?>public/img/avatar.png" class="adminTableImg">`;
                        }
                    }
                },
                { "data": "username" },
                { "data": "first_name" },
                { "data": "last_name" },
                { 
                    "data": null,
                    "render":function(data,type,row){
                        if(row.mobile !==null && row.img !== ""){
                            return `<a href="tel:${row.mobile}"><i class="bi bi-telephone-outbound-fill"></i> ${row.mobile}</a>`;
                        }
                        else{
                            return '';
                        }
                    }
                },
                { "data": "gender" },
                { "data": "dob" },
                { 
                    "data": "",
                    "render": function(data,type,row){
                        return moment(row.created_at.date).format('YYYY-MM-DD HH:mm:ss');
                    }
                    
                },
                {
                    "data": null,
                    "render": function (data, type, row) {
                        return `<div>
                                <button class="btn btn-outline-success btn-sm me-1" data-bs-placement="bottom" title="View" data-bs-custom-class="custom-tooltip" onclick="view(${row.id})"><i class="bi bi-file-text"></i></button>
                                <button class="btn btn-outline-warning btn-sm me-1" data-toggle="tooltip"  data-bs-placement="bottom" title="Edit" data-bs-custom-class="custom-tooltip" onclick="update(${row.id})"><i class="bi bi-pencil"></i></button>
                                <button id="ban_btn_${row.id}" class="btn btn-sm me-1 btn-outline-${row.status==='banned' ? 'danger' : 'success'}" data-toggle="tooltip" data-bs-placement="bottom" ${row.status==='banned' ? 'title="Banned"' : 'title="Ban"'} onclick="changeBanStatus(${row.id},'${row.status}')">
                                    ${row.status==='banned' ? '<i class="bi bi-ban-fill"></i>' : '<i class="bi bi-ban"></i>'}
                                </button>
                                <button onclick="deleteItem(${row.id})" class="btn btn-sm btn-danger" data-bs-placement="bottom" title="Delete" data-bs-custom-class="custom-tooltip">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>`;
                    }
                }
            ]
        });
        
        window.view=function(id){
            window.location.href="<?= base_url('admin/users/details/0');?>".replace('0',id);
        }
        
        window.update=function(id){
            window.location.href="<?= base_url('admin/users/update/0');?>".replace('0',id);
        }

        window.changeBanStatus=function(id,status){
            const title = status==='banned' ? "Unban User" : "Ban User";
            const icon = status ? "success" : "error";
            const confirmButtonColor = status==='banned' ? "#00ff00" : "#ff0000";
            const cancelButtonColor = status ? "#808080" : "#808080";
            
            Swal.fire({
                title: "Are you sure?",
                text: title,
                icon: icon,
                showCancelButton: true,
                confirmButtonText: status==='banned' ? "Unban" : "Ban",
                confirmButtonColor: confirmButtonColor,
                cancelButtonColor: cancelButtonColor,
                customClass: {
                    confirmButton: 'btn btn-sm rounded-0',
                    cancelButton: 'btn btn-sm rounded-0'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= url_to('UserController::ban');?>",
                        method: "PATCH",
                        data:{id:id},
                        complete: res => {
                            responseData = res.responseJSON;
                            if (responseData.data === true) {
                                toastr.success(responseData.message);
                            }
                            else {
                                toastr.error(responseData.message);
                            }
                            $("#ban_btn_" + id).replaceWith(`
                                <button id="ban_btn_${id}" class="btn btn-sm me-1 btn-outline-${responseData.data ? 'success' : 'danger'}" data-toggle="tooltip" data-bs-placement="bottom" ${responseData.data ? 'title="Ban"' : 'title="Banned"'} onclick="changeBanStatus(${id},'${responseData.data ? '':'Ban'}')">
                                    ${responseData.data ? '<i class="bi bi-ban"></i>' : '<i class="bi bi-ban-fill"></i>'}
                                </button>
                            `);
                        }
                    });
                }
            });
        }
        
        window.deleteItem=function(id){
            Swal.fire({
                title: "Are you sure?",
                text: "Delete User",
                icon: "error",
                showCancelButton: true,
                confirmButtonText: "Delete",
                confirmButtonColor: "#ff0000",
                cancelButtonColor: "#808080",
                customClass: {
                    confirmButton: 'btn btn-sm rounded-0',
                    cancelButton: 'btn btn-sm rounded-0'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= url_to('UserController::delete');?>",
                        method: "DELETE",
                        data:{id:id},
                        complete: res => {
                            responseData = res.responseJSON
                            if (responseData.status === 'success') {
                                toastr.success(responseData.message);
                                var row = $('#adminDataTable').DataTable().row("#row_" + id);
                                row.remove().draw(false);
                            }
                            else {
                                toastr.error(responseData.message);
                            }
                        }
                    });
                }
            });
        }
    });
</script>
<?= $this->endSection('mainContent'); ?>