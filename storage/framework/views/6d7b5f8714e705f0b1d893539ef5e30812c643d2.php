
<?php $__env->startSection('content'); ?>
<div class="panel-header bg-success">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Categories </h2>
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
                        <a href="" class="text-white">Categories</a>
                    </li>
                </ul>
            </div>
            <div class="ml-md-auto py-2 py-md-0">
                <button type="button" class="btn btn-white btn-round" data-toggle="modal" data-target="#add">
                    <i class="fa fa-plus"></i> Add Category
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
                    <div class="card-title">Categories</div>
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
                                    <th>Category</th>
                                    <th class="text-right" style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID#</th>
                                    <th>Category</th>
                                    <th class="text-right" style="width: 10%">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($category->id); ?></td>
                                    <td><?php echo e($category->name); ?></td>
                                    <td>
                                        <div class="form-button-action" role="group">
                                            <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit-<?php echo e($category->id); ?>">Edit</button>
                                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-<?php echo e($category->id); ?>">Delete</button>
                                        </div>
                                    </td>
                                    <!-- modal edit -->
                                    <div class="modal fade" id="edit-<?php echo e($category->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">
                                                        Edit Category [<?php echo e($category->name); ?>]
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?php echo e(route('categories.update')); ?>" method="post" class="form-group row">
                                                        <?php echo csrf_field(); ?>
                                                        <div class="col-md-12">
                                                            <label>Campus:</label>
                                                            <input class="form-control" name="id" value="<?php echo e($category->id); ?>" type="hidden">
                                                            <input class="form-control" name="name" value="<?php echo e($category->name); ?>" type="text">
                                                        </div>
                                                        
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success pull-right">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /end modal edit -->
                                    <!-- modal delete -->
                                    <div class="modal fade" id="delete-<?php echo e($category->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    Delete category "<?php echo e($category->name); ?>"
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Are you sure you want to delete this country?</h5>
                                                <div class="modal-footer">
                                                    <button class="btn btn-sm btn-danger"><a href="<?php echo e(route('categories.destroy', $category->id )); ?>" style="color:white;">Yes, delete</a></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /end modal delete -->                                   
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /end table -->
                    <!-- modal add super -->
                    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">
                                        Add Category
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <form action="<?php echo e(route('categories.store')); ?>" method="post" class="form-group row">
                                    <?php echo csrf_field(); ?>
                                    <div class="col-md-12">
                                        <label>Category:</label>
                                        <input class="form-control" name="name" type="text">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success pull-right">Save</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /end modal add super -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.super', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\radaweb\resources\views/categories/index.blade.php ENDPATH**/ ?>