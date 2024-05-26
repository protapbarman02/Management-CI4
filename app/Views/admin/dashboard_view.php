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
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-beige-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Today Sale</p>
                        <h6 class="mb-0">$1234</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-beige-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Sale</p>
                        <h6 class="mb-0">$1234</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-beige-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-area fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Today Revenue</p>
                        <h6 class="mb-0">$1234</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-beige-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-pie fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Revenue</p>
                        <h6 class="mb-0">$1234</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sale & Revenue End -->


    <!-- Charts Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-beige-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Worldwide Sales</h6>
                    </div>
                    <canvas id="worldwide-sales"></canvas>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-beige-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Salse & Revenue</h6>
                    </div>
                    <canvas id="salse-revenue"></canvas>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-beige-light rounded h-100 p-4">
                    <h6 class="mb-4">Single Line Chart</h6>
                    <canvas id="line-chart"></canvas>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-beige-light rounded h-100 p-4">
                    <h6 class="mb-4">Single Bar Chart</h6>
                    <canvas id="bar-chart"></canvas>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-beige-light rounded p-4">
                    <h6 class="mb-4">Doughnut Chart</h6>
                    <canvas id="doughnut-chart"></canvas>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-beige-light rounded h-100 p-4">
                    <h6 class="mb-4">Pie Chart</h6>
                    <canvas id="pie-chart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- Charts End -->

    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-beige-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Recent Salse</h6>
                <a href="">Show All</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col"><input class="form-check-input" type="checkbox"></th>
                            <th scope="col">Date</th>
                            <th scope="col">Invoice</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input class="form-check-input" type="checkbox"></td>
                            <td>01 Jan 2045</td>
                            <td>INV-0123</td>
                            <td>Jhon Doe</td>
                            <td>$123</td>
                            <td>Paid</td>
                            <td><a class="btn btn-sm btn-primary text-light" href="">Detail</a></td>
                        </tr>
                        <tr>
                            <td><input class="form-check-input" type="checkbox"></td>
                            <td>01 Jan 2045</td>
                            <td>INV-0123</td>
                            <td>Jhon Doe</td>
                            <td>$123</td>
                            <td>Paid</td>
                            <td><a class="btn btn-sm btn-primary text-light" href="">Detail</a></td>
                        </tr>
                        <tr>
                            <td><input class="form-check-input" type="checkbox"></td>
                            <td>01 Jan 2045</td>
                            <td>INV-0123</td>
                            <td>Jhon Doe</td>
                            <td>$123</td>
                            <td>Paid</td>
                            <td><a class="btn btn-sm btn-primary text-light" href="">Detail</a></td>
                        </tr>
                        <tr>
                            <td><input class="form-check-input" type="checkbox"></td>
                            <td>01 Jan 2045</td>
                            <td>INV-0123</td>
                            <td>Jhon Doe</td>
                            <td>$123</td>
                            <td>Paid</td>
                            <td><a class="btn btn-sm btn-primary text-light" href="">Detail</a></td>
                        </tr>
                        <tr>
                            <td><input class="form-check-input" type="checkbox"></td>
                            <td>01 Jan 2045</td>
                            <td>INV-0123</td>
                            <td>Jhon Doe</td>
                            <td>$123</td>
                            <td>Paid</td>
                            <td><a class="btn btn-sm btn-primary text-light" href="">Detail</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->
    
    

    <!-- Widgets Start -->
    <div class="container-fluid pt-4 px-4 mb-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="h-100 bg-beige-light rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h5 class="mb-0">Help Desk</h5>
                        <a href="">Show All</a>
                    </div>
                    
                    <div class="d-flex align-items-center border-bottom py-3">
                        <div class="w-100 ms-3">
                            <div class="row">
                                <div class="col-lg-10 col-md-9 col-sm-12">
                                    <h6 class="mb-0">Jhon Doe</h6>
                                    <div class="">
                                        User query message goes here...
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-12 text-end px-0">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-3">
                                            Wed,12/12/12

                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-1">

                                            <a href="">reply</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center border-bottom py-3">
                        <div class="w-100 ms-3">
                            <div class="row">
                                <div class="col-lg-10 col-md-9 col-sm-12">
                                    <h6 class="mb-0">Jhon Doe</h6>
                                    <div class="">
                                        User query message goes here...
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-12 text-end px-0">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-3">
                                            Wed,12/12/12

                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-1">

                                            <a href="">reply</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center border-bottom py-3">
                        <div class="w-100 ms-3">
                            <div class="row">
                                <div class="col-lg-10 col-md-9 col-sm-12">
                                    <h6 class="mb-0">Jhon Doe</h6>
                                    <div class="">
                                        User query message goes here...
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-12 text-end px-0">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-3">
                                            Wed,12/12/12

                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-1">

                                            <a href="">reply</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Widgets End -->

    <section id="demos container-fluid">
        <div class="section-content">
            <div class="console-log">
                <div class="log-content">
                    <div id="demoEvoCalendar" class="orange-coral shadow-none"></div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- content end -->
<script>
    $(document).ready(function() {
        $("#demoEvoCalendar").evoCalendar();
    
        // Worldwide Sales Chart
        new Chart($("#worldwide-sales"), {
            type: "bar",
            data: {
                labels: ["2016", "2017", "2018", "2019", "2020", "2021", "2022"],
                datasets: [{
                        label: "USA",
                        data: [15, 30, 55, 65, 60, 80, 95],
                        backgroundColor: 'rgba(54, 162, 235, 0.4)',
                    },
                    {
                        label: "UK",
                        data: [8, 35, 40, 60, 70, 55, 75],
                        backgroundColor: 'rgba(255, 159, 64, 0.4)'
                    },
                    {
                        label: "AU",
                        data: [12, 25, 45, 55, 65, 70, 60],
                        backgroundColor: 'rgba(75, 255, 192, 0.4)'
                    }
                ]
                },
            options: {
                responsive: true
            }
        });

        // Salse & Revenue Chart
        new Chart($("#salse-revenue"), {
            type: "line",
            data: {
                labels: ["2016", "2017", "2018", "2019", "2020", "2021", "2022"],
                datasets: [{
                        label: "Salse",
                        data: [15, 30, 55, 45, 70, 65, 85],
                        backgroundColor: "rgba(0, 156, 255, .5)",
                        fill: true
                    },
                    {
                        label: "Revenue",
                        data: [99, 135, 170, 130, 190, 180, 270],
                        backgroundColor: "rgba(0, 156, 255, .3)",
                        fill: true
                    }
                ]
                },
            options: {
                responsive: true
            }
        });

        // Single Line Chart
        new Chart($("#line-chart"), {
            type: "line",
            data: {
                labels: [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150],
                datasets: [{
                    label: "Salse",
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    data: [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15]
                }]
            },
            options: {
                responsive: true
            }
        });

        // Single Bar Chart
        new Chart($("#bar-chart"), {
            type: "bar",
            data: {
                labels: ["Italy", "France", "Spain", "USA", "Argentina"],
                datasets: [{
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.4)',
                        'rgba(255, 159, 64, 0.4)',
                        'rgba(255, 205, 86, 0.4)',
                        'rgba(75, 192, 192, 0.4)',
                        'rgba(54, 162, 235, 0.4)',
                    ],
                    data: [55, 49, 44, 24, 15]
                }]
            },
            options: {
                responsive: true
            }
        });

        // Pie Chart
        new Chart($("#pie-chart"), {
            type: "pie",
            data: {
                labels: ["Italy", "France", "Spain", "USA", "Argentina"],
                datasets: [{
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.4)',
                        'rgba(255, 159, 64, 0.4)',
                        'rgba(255, 205, 86, 0.4)',
                        'rgba(75, 192, 192, 0.4)',
                        'rgba(54, 162, 235, 0.4)',
                    ],
                    data: [55, 49, 44, 24, 15]
                }]
            },
            options: {
                responsive: true
            }
        });

        // Doughnut Chart
        new Chart($("#doughnut-chart"), {
            type: "doughnut",
            data: {
                labels: ["Italy", "France", "Spain", "USA", "Argentina"],
                datasets: [{
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.4)',
                        'rgba(255, 159, 64, 0.4)',
                        'rgba(255, 205, 86, 0.4)',
                        'rgba(75, 192, 192, 0.4)',
                        'rgba(54, 162, 235, 0.4)',
                    ],
                    data: [55, 49, 44, 24, 15]
                }]
            },
            options: {
                responsive: true
            }
        });
    })
</script>

<?= $this->endSection('mainContent'); ?>