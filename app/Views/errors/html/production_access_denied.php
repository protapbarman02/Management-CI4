<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url();?>public/favicon.ico" rel="icon">
    <title>Access Denied</title>
    <link href="<?= base_url();?>public/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- main content Start -->
    <div class="main-content">
        <!-- 404 Start -->
        <div class="container-fluid">
            <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
                <div class="col-md-6 text-center p-4">
                    <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                    <h1 class="display-1 fw-bold">403</h1>
                    <h1 class="mb-4">ACCESS DENIED!</h1>
                    <p class="mb-4">
                        It appears you don't have permission to view this page. 
                        This could be due to restrictions set by the website administrator or your user role. 
                    </p>
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="<?= url_to('HomeController::index');?>">Go Back To Home</a>
                </div>
            </div>
        </div>
        <!-- 404 End -->
    </div>
    <!-- main content end -->
</body>
</html>