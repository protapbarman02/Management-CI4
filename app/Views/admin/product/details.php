<?= $this->extend('admin/base'); ?>
<?= $this->section('mainContent'); ?>
<!-- content Start -->
<div class="main-content">
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <p>Product Id : <?= $data['id'];?></p>
                <p>Product Image : 
                    <?php if($data['img'] && $data['img'] !== ""):?>
                    <img src="<?= base_url();?>public/img/"<?= $data['img'];?>" class="adminTableImg" onerror="showDefaultImage(this)"/>
                    <?php else:?>
                    <img src="<?= base_url();?>public/img/product.jpg" class="adminTableImg"/>
                    <?php endif;?>
                </p>
                <p>Product Name : <?= $data['name'];?></p>
                <p>Product Category : <?= $data['category_id'];?></p>
                <p>Product Description : <?= $data['description'];?></p>
                <p>Created At : <?= $data['created_at'];?></p>
                <p>Updated At : <?= $data['updated_at'];?></p>
                <p>Activity Status : 
                    <?php if($data['active']):?>
                    Active
                    <?php else:?>
                    Inactive
                    <?php endif;?>
                </p>
            </div>
            <div class="col-12 text-end">
                <a class="btn btn-sm btn-outline-primary" href="<?= url_to('ProductController::index');?>">Back</a>
                <a class="btn btn-sm btn-primary" href="<?= url_to('ProductController::update',$data['id']);?>">Update</a>
            </div>
        </div>
    </div>
</div>
<script>
    function showDefaultImage(img) {
        img.src = '<?= base_url(); ?>public/img/product.jpg';
    }
</script>
<!-- content end -->
<?= $this->endSection('mainContent'); ?>