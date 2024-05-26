<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?= $this->renderSection('title') ;?></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <link href="<?= base_url();?>public/favicon.ico" rel="icon">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        <link href="<?= base_url();?>public/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url();?>public/css/jquery.datatable.css" rel="stylesheet">
        <link href="<?= base_url();?>public/css/toastr.min.css" rel="stylesheet">
        <link href="<?= base_url();?>public/css/scrollbar.css" rel="stylesheet">
        <link href="<?= base_url();?>public/css/style.admin.css" rel="stylesheet">
        <link href="<?= base_url();?>public/css/evocalender.css" rel="stylesheet">

        <script src="<?= base_url();?>public/js/jquery-3.4.1.min.js"></script>
        <script src="<?= base_url();?>public/js/chart.min.js"></script>
        <script src="<?= base_url();?>public/js/evocalender.min.js"></script>
        <script src="https://cdn.tiny.cloud/1/2dfibljq8u2lg8xw409go9t2vggcr92kgc2zs7ki9kv038ku/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

    </head>
    <body style="position:relative;">
        <div class="container-fluid position-relative bg-white d-flex p-0 mx-0">
            <!-- Spinner Start -->
            <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
                <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <!-- Spinner End -->
            <!-- Sidebar Start -->
            <div class="sidebar bg-beige pe-4 pb-3">
                <nav class="navbar navbar-light">
                    <a href="<?= url_to('DashboardController::index') ?>" class="navbar-brand mx-4 mb-3">
                        <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>PetPawlor</h3>
                    </a>
                    <div class="d-flex align-items-center ms-4 mb-4">
                        <div class="position-relative">
                            <img class="rounded-circle" src="<?= base_url();?>public/img/<?= $current_user->img;?>" alt="" style="width: 40px; height: 40px;">
                            <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0"><?= $current_user->first_name." ".$current_user->last_name;?></h6>
                            <span><?= strtoupper($current_user->groups[0]);?></span>
                        </div>
                    </div>
                    <div class="navbar-nav w-100">
                        <a href="<?= url_to('DashboardController::index'); ?>" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                        <a href="<?= url_to('UserController::index'); ?>" class="nav-item nav-link"><i class="bi bi-people-fill"></i>Users</a>
                        <a href="<?= url_to('ProductController::index'); ?>" class="nav-item nav-link"><i class="bi bi-box-seam-fill"></i>Products</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-file-earmark-excel-fill"></i>Error Pages</a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="<?= url_to('ErrorProductionController::not_found_error'); ?>" class="dropdown-item">Page Not Found</a>
                                <a href="<?= url_to('ErrorProductionController::standard_error'); ?>" class="dropdown-item">Error</a>
                                <a href="<?= url_to('ErrorProductionController::access_denied_error'); ?>" class="dropdown-item">Access Denied</a>
                                <a href="<?= url_to('ErrorProductionController::banned'); ?>" class="dropdown-item">Banned</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- Sidebar End -->
            <!-- Main Content Start -->
            <div class="content">
                <!-- Navbar Start -->
                <nav class="navbar navbar-expand bg-beige navbar-light sticky-top px-4 py-0">
                    <a href="<?= url_to('DashboardController::index'); ?>" class="navbar-brand d-flex d-lg-none me-4">
                        <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                    </a>
                    <a href="#" class="sidebar-toggler flex-shrink-0">
                        <i class="fa fa-bars"></i>
                    </a>
                    <div class="ms-2">
                        <h5 class="text-primary m-0 p-0"><?= $this->renderSection('heading') ;?></h5>
                    </div>
                    <div class="navbar-nav align-items-center ms-auto">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <img class="rounded-circle me-lg-2" src="<?= base_url();?>public/img/<?= $current_user->img;?>" alt="" style="width: 40px; height: 40px;">
                                <span class="d-none d-lg-inline-flex"><?= $current_user->username;?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end bg-beige-light border-0 rounded-0 rounded-bottom m-0">
                                <a href="#" class="dropdown-item">My Profile</a>
                                <a href="<?= base_url('logout');?>" class="dropdown-item">Log Out</a>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- Navbar End -->
                <!-- ----------------------------------------------------------------------------- -->
                <!-- Content Start -->
                <?= $this->renderSection('mainContent') ;?>
                <!-- Content End -->
                <!-- ----------------------------------------------------------------------------- -->
                <!-- Footer Start -->
                <div class="container-fluid px-0">
                    <div class="bg-beige rounded-top p-4">
                        <div class="row">
                            <div class="col-12 col-sm-6 text-center text-sm-start">
                                &copy; <a href="index.html">PetPawlor</a> 
                            </div>
                            <div class="col-12 col-sm-6 text-center text-sm-end">
                                <p class="py-0 my-0">Designed and Developed By </p>
                                <p class="py-0 my-0"><a class="border-bottom" href="www.linkedin.com/in/protap-barman-7073b0225"><i class="bi bi-linkedin"></i> Protap Barman</a></p>
                                <p class="py-0 my-0"><a class="border-bottom" href="https://www.linkedin.com/in/bipasha-bagchi-9354162b3/" target="_blank"><i class="bi bi-linkedin"></i> Bipasha Bagchi</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer End -->
            </div>
            <!-- Back To Top Start -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
            <!-- Back To Top End -->
        </div>
        
        <script src="<?= base_url();?>public/js/script.js"></script>
        <script src="<?= base_url();?>public/js/moment.min.js"></script>
        <script src="<?= base_url();?>public/js/jquery.datatable.js"></script>
        <script src="<?= base_url();?>public/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url();?>public/js/easing.min.js"></script>
        <script src="<?= base_url();?>public/js/swal.min.js"></script>
        <script src="<?= base_url();?>public/js/toastr.min.js"></script>
    </body>
</html>