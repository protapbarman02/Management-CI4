<?= $this->extend('admin/base'); ?>
<?= $this->section('title'); ?>
<?= $page_title; ?>
<?= $this->endSection('title'); ?>
<?= $this->section('heading'); ?>
<?= $page_heading; ?>
<?= $this->endSection('heading'); ?>
<?= $this->section('mainContent'); ?>

<script>
  tinymce.init({
    selector: '#description',
    plugins: 'anchor autolink charmap codesample emoticons link lists searchreplace table visualblocks wordcount checklist casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
  });
</script>

<!-- content Start -->
<div class="main-content">
    <div class="container-fluid pt-4 px-4">
        <form class="row g-4 mb-3" action="<?= url_to('ProductController::create');?>" method="post" enctype="multipart/form-data">
            <?php if(isset($message)):?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $message; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif;?>
            <div class="col-12 text-center d-flex">
                <div class="ms-2">
                    <label for="img" class="position-relative">
                        <div class="btn btn-sm position-absolute border-none" style="top:0; right:0; background-color: white; border:none;">
                            <i class="bi bi-pencil-square"></i>
                        </div>
                        <img
                            src="<?= base_url();?>public/img/product.jpg" alt="Photo" style="width: 160px; height:160px; object-fit: contain" id="userImgTag"
                         />
                    </label>
                    <input type="file" name="img" id="img" class="d-none" accept="image/*" />
                </div>
            </div>
        
            <div class="col-md-6">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name') ?>">
            </div>
            
            <div class="col-md-6">
                <label for="category_id" class="form-label">Category ID</label>
                <input type="number" class="form-control" id="category_id" name="category_id" value="<?= set_value('category_id') ?>">
            </div>
            <div class="col-12">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description"><?= set_value('description') ?></textarea>
            </div>
            
            
            <div class="col-12 text-end">
                <a class="btn btn-sm btn-outline-primary" href="<?= url_to('ProductController::index');?>">Back</a>
                <button type="submit" class="btn btn-sm btn-primary">Add</button>
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