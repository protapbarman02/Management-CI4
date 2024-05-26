<?= $this->extend('admin/base'); ?>
<?= $this->section('mainContent'); ?>
<!-- content Start -->
<div class="main-content">
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Active</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $data['id'];?></th>
                            <td><?= $data['name'];?></td>
                            <td><?= $data['img'];?></td>
                            <td><?= $data['active'];?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- content end -->
<?= $this->endSection('mainContent'); ?>