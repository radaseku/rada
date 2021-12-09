
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
                    <div class="card-category">Overall content type statistics in system</div>
                    <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-1"><?php echo e($video); ?></div>
                            <h6 class="fw-bold mt-3 mb-0">Video</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-2"><?php echo e($image); ?></div>
                            <h6 class="fw-bold mt-3 mb-0">Image</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-3"><?php echo e($text); ?></div>
                            <h6 class="fw-bold mt-3 mb-0">Text</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Daily Post count</div>
                    <div class="row py-3">
                        <div class="col-md-4 d-flex flex-column justify-content-around">
                            <div>
                                <h6 class="fw-bold text-uppercase text-success op-8">Video:  <small class="fw-bold text-danger"><?php echo e($videonow); ?></small></h6>
                            </div>
                            <div>
                                <h6 class="fw-bold text-uppercase text-success op-8">Image:  <small class="fw-bold text-danger"><?php echo e($imagenow); ?></small></h6>
                            </div>
                            <div>
                                <h6 class="fw-bold text-uppercase text-success op-8">Text:  <small class="fw-bold text-danger"><?php echo e($textnow); ?></small></h6>
                                
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div id="chart-container" style="height:180px">
                                <?php echo $doughchart->container(); ?>

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
                    <?php echo $weekchart->container(); ?>

                    </div>
                    <div id="myChartLegend"></div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\radaweb\resources\views/content-dashboard.blade.php ENDPATH**/ ?>