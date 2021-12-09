
<?php $__env->startSection('content'); ?>
<div class="panel-header bg-success">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Dashboard <i class="fa fa-home"></i></h2>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-6">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Overall statistics</div>
                    <div class="card-category">Overall User Statistics</div>
                    <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-1"><?php echo e($contentcreators); ?></div>
                            <h6 class="fw-bold mt-3 mb-0">Content Creators</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-2"><?php echo e($counsellorscount); ?></div>
                            <h6 class="fw-bold mt-3 mb-0">Counsellors</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-3"><?php echo e($mentorscount); ?></div>
                            <h6 class="fw-bold mt-3 mb-0">Mentors</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-3"><?php echo e($carreer); ?></div>
                            <h6 class="fw-bold mt-3 mb-0">Carreer</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-3"><?php echo e($justice); ?></div>
                            <h6 class="fw-bold mt-3 mb-0">Justice</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Total Users: <b><?php echo e($users); ?></b></div>
                    <div class="row py-3">
                        <div class="col-md-12">
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-1"><?php echo e($maleusers); ?></div>
                            <h6 class="fw-bold mt-3 mb-0">Male</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-2"><?php echo e($femaleusers); ?></div>
                            <h6 class="fw-bold mt-3 mb-0">Female</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-3"><?php echo e($ov25users); ?></div>
                            <h6 class="fw-bold mt-3 mb-0">Above 25yrs</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-3"><?php echo e($un25users); ?></div>
                            <h6 class="fw-bold mt-3 mb-0">Below 25yrs</h6>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">User Statistics</div>
                        <div class="card-tools">
                            <a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2">
                                <span class="btn-label">
                                    <i class="fa fa-pencil"></i>
                                </span>
                                Export
                            </a>
                            <a href="#" class="btn btn-info btn-border btn-round btn-sm">
                                <span class="btn-label">
                                    <i class="fa fa-print"></i>
                                </span>
                                Print
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container" style="min-height: 375px">
                        <?php echo $userschart->container(); ?>

                    </div>
                    <div id="myChartLegend"></div>
                </div>
            </div>
            
        </div>
        <div class="col-md-4">

            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Daily Registered Users</div>
                    </div>
                </div>
                <div class="card-body">
                    <h3>Users: </h3> <?php echo e($usersnow); ?>

                    <h3>Mentors: </h3> <?php echo e($mentorsnow); ?>

                    <h3>Counsellors: </h3> <?php echo e($counsellorsnow); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\radaweb\resources\views/admin-dashboard.blade.php ENDPATH**/ ?>