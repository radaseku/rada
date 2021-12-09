
<?php $__env->startSection('content'); ?>
<div id="app">
    <div class="panel-header bg-success">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Counsellors </h2>
                    <ul class="breadcrumbs text-white">
                        <li class="nav-home">
                            <a href="<?php echo e(route('super-admin.dashboard')); ?>" class="text-white">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="" class="text-white">Counsellors</a>
                        </li>
                    </ul>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <button type="button" class="btn btn-white btn-round" data-toggle="modal" data-target="#add">
                        <i class="fa fa-plus"></i> Add Counsellor
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
                        <div class="card-title">Counsellors</div>
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
                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                                <button type="button" aria-hidden="true" class="close">
                                <i class="now-ui-icons ui-1_simple-remove"></i>
                                </button>
                                <span class="alert-msg"><b> Success - </b> <?php echo e(session('success')); ?></span>
                            </div>
                        <?php endif; ?>

                        <?php if(session('failure')): ?>
                            <div class="alert alert-danger">
                                <button type="button" aria-hidden="true" class="close">
                                <i class="now-ui-icons ui-1_simple-remove"></i>
                                </button>
                                <span class="alert-msg"><b> Failed - </b> <?php echo e(session('failure')); ?></span>
                            </div>
                        <?php endif; ?>
                        <!-- table -->
                        <div class="table-responsive">
                            <table id="table" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID#</th>
                                        <th>Name</th>
                                        <th>Expertise</th>
                                        <th>Image</th>
                                        <th>Rating</th>
                                        <th>Status</th>
                                        <th class="text-right" style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID#</th>
                                        <th>Name</th>
                                        <th>Expertise</th>
                                        <th>Image</th>
                                        <th>Rating</th>
                                        <th>Status</th>
                                        <th class="text-right" style="width: 10%">Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <?php $__currentLoopData = $counsellors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $counsellor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($counsellor->data()['status'] != 'offline'): ?>
                                    <tr>
                                        <td><?php echo e($counsellor->id()); ?></td>
                                        <td><?php echo e($counsellor->data()['name']); ?></td>
                                        <td><?php echo e($counsellor->data()['expertise']); ?></td>
                                        <td><img src="<?php echo e($counsellor->data()['image']); ?>" width="60" height="50"/></td>
                                        <td><?php echo e($counsellor->data()['rating']); ?></td>
                                        <td><?php echo e($counsellor->data()['status']); ?></td>
                                        <td>
                                            <div class="form-button-action" role="group">
                                                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit-<?php echo e($counsellor->id()); ?>">Edit</button>
                                                <form action="<?php echo e(route('counsellors.destroy')); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="id" value="<?php echo e($counsellor->id()); ?>">
                                                <input type="hidden" name="name" value="<?php echo e($counsellor->data()['name']); ?>">
                                                <input type="hidden" name="rating" value="<?php echo e($counsellor->data()['rating']); ?>">
                                                <input type="hidden" name="expertise" value="<?php echo e($counsellor->data()['expertise']); ?>">
                                                <input type="hidden" name="image" value="<?php echo e($counsellor->data()['image']); ?>">
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                        <!-- modal edit -->
                                        <div class="modal fade" id="edit-<?php echo e($counsellor->id()); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">
                                                            Edit Counsellor [<?php echo e($counsellor->data()['name']); ?>]
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        
                                                        <?php
                                                            $counsellor=['id'=>$counsellor->id(),'name'=>$counsellor->data()['name'],'expertise'=>$counsellor->data()['expertise'],'rating'=>$counsellor->data()['rating'],'status'=>$counsellor->data()['status'],'visible'=>$counsellor->data()['visible'] ?? '','available'=>$counsellor->data()['available']  ?? '','image'=>$counsellor->data()['image']];
                                                        ?>
                                                        <edit-counsellor :data="<?php echo e(json_encode($counsellor)); ?>"></edit-counsellor>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /end modal edit --> 
                                    </tr>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /end table -->
                        <!-- modal add counsellor -->
                        <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">
                                            Add Counsellor
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    
                                    <add-counsellor :uid="<?php echo e(json_encode(Auth::user()->adminUniversity->id)); ?>"></add-counsellor>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /end modal add counsellor -->
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\radaweb\resources\views/counsellors/index.blade.php ENDPATH**/ ?>