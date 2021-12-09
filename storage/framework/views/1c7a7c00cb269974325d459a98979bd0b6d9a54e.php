
<?php $__env->startSection('content'); ?>
<div id="app">
<div class="panel-header bg-success">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">News </h2>
                <ul class="breadcrumbs text-white">
                    <li class="nav-home">
                        <a href="<?php echo e(route('content-creator.dashboard')); ?>" class="text-white">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="" class="text-white">News</a>
                    </li>
                </ul>
            </div>
            <div class="ml-md-auto py-2 py-md-0">
                <button type="button" class="btn btn-white btn-round" data-toggle="modal" data-target="#add">
                    <i class="fa fa-plus"></i> Add News
                </button>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">News</div>
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <strong>Error! </strong>There were some errors with inputs.
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        </div>

                    <?php endif; ?>
                    <!-- table -->
                    <div class="table-responsive">
                        <table id="table" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID#</th>
                                    
                                    <th>Title</th>
                                    <th>News</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th class="text-right" style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID#</th>
                                    
                                    <th>Title</th>
                                    <th>News</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th class="text-right" style="width: 10%">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($new->id); ?></td>
                                    
                                    <td><?php echo e($new->title); ?></td>
                                    <td><?php echo e($new->content); ?></td>
                                    <td><?php echo e($new->image); ?></td>
                                    <td><?php if($new->status == 0): ?>
                                            <span class="badge badge-success">Active</span>
                                        <?php elseif($new->status ==  1): ?>
                                            <span class="badge badge-danger">Stale</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="form-button-action" role="group">
                                            <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit-<?php echo e($new->id); ?>">Edit</button>
                                            <button name="delete" class="btn btn-sm btn-danger" @click='deleteItem("deletenews",<?php echo e($new->id); ?>)' type="submit">Delete</button>
                                        </div>
                                    </td>
                                    <div class="modal fade" id="edit-<?php echo e($new->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">
                                                        Edit News
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <edit-news :data="<?php echo e(json_encode($new)); ?>"></edit-news>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /end modal add news -->
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /end table -->
                    <!-- modal add news -->
                    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">
                                        Add News
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <add-news></add-news>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /end modal add news -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\radaweb\resources\views/news/index.blade.php ENDPATH**/ ?>