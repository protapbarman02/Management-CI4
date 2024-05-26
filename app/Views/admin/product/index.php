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
                <a class="btn btn-sm btn-primary" href="<?= url_to('ProductController::create');?>">Add New Product</a>
            </div>
            <div class="col-12">
                <table class="table table-hover display w-100" id="adminDataTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
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
                "url": "<?= url_to('ProductController::products');?>",
                "type": "GET"
            },
            "columns": [
                { "data": "id" },
                {
                    "data": "null",
                    "render": function (data, type, row) {
                        return row.img && row.img !== "" 
                    ? `<img src="<?= base_url();?>public/img/${row.img}" class="adminTableImg" onerror="this.onerror=null;this.src='<?= base_url();?>public/img/product.jpg';">`
                    : `<img src="<?= base_url();?>public/img/product.jpg" class="adminTableImg">`;
                    }
                },
                { "data": "name" },
                { "data": "category_name" },
                { "data": "created_at" },
                {
                    "data": null,
                    "render": function (data, type, row) {
                        return `<div>
                                <button class="btn btn-outline-success btn-sm me-1" data-bs-placement="bottom" title="View" data-bs-custom-class="custom-tooltip" onclick="view(${row.id})"><i class="bi bi-file-text"></i></button>
                                <button class="btn btn-outline-warning btn-sm me-1" data-toggle="tooltip"  data-bs-placement="bottom" title="Edit" data-bs-custom-class="custom-tooltip" onclick="update(${row.id})"><i class="bi bi-pencil"></i></button>
                                <button id="active_btn_${row.id}" class="btn btn-sm me-1 btn-outline-${row.active==1? 'success' : 'danger'}" data-toggle="tooltip" data-bs-placement="bottom" ${row.active==1? 'title="Active"' : 'title="Inactive"'} onclick="changeActiveStatus(${row.id},${row.active})">
                                    ${row.active==1? '<i class="bi bi-ban"></i>' : '<i class="bi bi-ban-fill"></i>'}
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
            window.location.href="<?= base_url('admin/products/details/0');?>".replace('0',id);
        }
        
        window.update=function(id){
            window.location.href="<?= base_url('admin/products/update/0');?>".replace('0',id);
        }

        window.changeActiveStatus=function(id,active){
            console.log(active);
            const title = active ? "Deactivate" : "Activate";
            const icon = active ? "error" : "success";
            const confirmButtonColor = active? "#ff0000" : "#00ff00";
            const cancelButtonColor = "#808080";
            
            Swal.fire({
                title: "Are you sure?",
                text: title,
                icon: icon,
                showCancelButton: true,
                confirmButtonText: active? "Deactivate" : "Activate",
                confirmButtonColor: confirmButtonColor,
                cancelButtonColor: cancelButtonColor,
                customClass: {
                    confirmButton: 'btn btn-sm rounded-0',
                    cancelButton: 'btn btn-sm rounded-0'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= url_to('ProductController::active');?>",
                        method: "PATCH",
                        data:{
                            id:id,
                            active:active
                        },
                        complete: res => {
                            responseData = res.responseJSON;
                            console.log(responseData);
                            if (responseData.status === 'success') {
                                toastr.success(responseData.message);
                                $("#active_btn_" + id).replaceWith(`
                                <button id="active_btn_${id}" class="btn btn-sm me-1 btn-outline-${responseData.data===1 ? 'success' : 'danger'}" data-toggle="tooltip" data-bs-placement="bottom" ${responseData.data===1 ? 'title="Active"' : 'title="Inactive"'} onclick="changeBanStatus(${id},${responseData.data})">
                                    ${responseData.data===1 ? '<i class="bi bi-ban"></i>' : '<i class="bi bi-ban-fill"></i>'}
                                </button>
                            `);
                            }
                            else {
                                toastr.error(responseData.message);
                            }
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
                        url: "<?= url_to('ProductController::delete');?>",
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