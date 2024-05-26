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
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Created By</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated By</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Active</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $category):?>
                        <tr>
                            <td><?= $category['id'];?></th>
                            <td><?= $category['name'];?></td>
                            <td><?= $category['img'];?></td>
                            <td><?= $category['created_by'];?></td>
                            <td><?= $category['created_at'];?></td>
                            <td><?= $category['updated_by'];?></td>
                            <td><?= $category['updated_at'];?></td>
                            <td>
                                <?php if($category['active']):?>
                                Active
                                <?php else:?>
                                Inactive
                                <?php endif;?>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- content end -->
<?= $this->endSection('mainContent'); ?>