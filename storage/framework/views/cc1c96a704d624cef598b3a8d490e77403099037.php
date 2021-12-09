
<?php $__env->startSection('content'); ?>
<div id="app">
    <div class="panel-header bg-success">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Dashboard </h2>
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
                            <a href="" class="text-white">Admins</a>
                        </li>
                    </ul>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <button type="button" class="btn btn-white btn-round" data-toggle="modal" data-target="#add">
                        <i class="fa fa-plus"></i> Add Admin
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
                        <div class="card-title">Administrators</div>
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
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th class="text-right" style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID#</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th class="text-right" style="width: 10%">Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $__currentLoopData = $superadmins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $superadmin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($superadmin->id); ?></td>
                                        <td><?php echo e($superadmin->username); ?></td>
                                        <td><?php echo e($superadmin->email); ?></td>
                                        <td><?php echo e($superadmin->phone); ?></td>
                                        <td><?php echo e($superadmin->adminRole->name); ?></td>
                                        <td>
                                            <?php if($superadmin->status == 1): ?>
                                            <span class="badge badge-success">Active</span>
                                            <?php elseif($superadmin->status == 0): ?>
                                            <span class="badge badge-danger">Inactive</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="form-button-action" role="group">
                                                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit-<?php echo e($superadmin->id); ?>">Edit</button>
                                                
                                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-<?php echo e($superadmin->id); ?>">Delete</button>
                                            </div>
                                        </td>
                                        <!-- modal edit -->
                                        <div class="modal fade" id="edit-<?php echo e($superadmin->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">
                                                            Edit Super Admin [<?php echo e($superadmin->username); ?>]
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?php echo e(route('super-admins.update')); ?>" method="post" class="form-group row">
                                                            <?php echo csrf_field(); ?>
                                                            <div class="col-md-6">
                                                                <label>Username:</label>
                                                                <input class="form-control" name="id" value="<?php echo e($superadmin->id); ?>" type="hidden">
                                                                <input class="form-control" name="username" value="<?php echo e($superadmin->username); ?>" type="text">
                                                            </div>
                                                            <div class="col-md-6">
                                                            <label>Email:</label>
                                                                <input class="form-control" name="email" value="<?php echo e($superadmin->email); ?>" type="email">
                                                            </div>
                                                            <div class="col-md-6">
                                                            <label>Phone:</label>
                                                                <input class="form-control" name="phone" value="<?php echo e($superadmin->phone); ?>" type="text">
                                                            </div>
                                                            <div class="col-md-6">
                                                            <label>Role:</label>
                                                                <input class="form-control" name="role"  value="<?php echo e($superadmin->adminRole->name); ?>" type="text">
                                                            </div>
                                                            <div class="col-md-6">
                                                            <label>Password:</label>
                                                                <input class="form-control" name="password" type="password">
                                                            </div>
                                                            <div class="col-md-6">
                                                            <label>Confirm Password:</label>
                                                                <input class="form-control" name="password_confirmation" type="password">
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
                                        <div class="modal fade" id="delete-<?php echo e($superadmin->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">
                                                            Delete administrator "<?php echo e($superadmin->name); ?>"
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h5>Are you sure you want to delete this administrator?</h5>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-sm btn-danger"><a href="<?php echo e(route('super-admins.destroy', $superadmin->id )); ?>" style="color:white;">Yes, delete</a></button>
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
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">
                                            Add Admin
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo e(route('super-admins.store')); ?>" method="post" class="form-group row">
                                            <?php echo csrf_field(); ?>
                                            <div class="col-md-6">
                                                <label>Username:</label>
                                                <input class="form-control" name="username" type="text">
                                            </div>
                                            <div class="col-md-6">
                                            <label>Email:</label>
                                                <input class="form-control" name="email" type="email">
                                            </div>
                                            <div class="col-md-6">
                                            <label>Phone:</label>
                                                <input class="form-control" name="phone" type="text">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Role:</label>
                                                <select class="form-control" id="role" name="role" required focus>
                                                    <option value="" disabled selected>Please select a role</option>        
                                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label>University:</label>
                                                <select class="form-control" id="university" name="university" required focus>
                                                    <option value="" disabled selected>Please select a university</option>        
                                                    <?php $__currentLoopData = $universities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $university): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($university->id); ?>"><?php echo e($university->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                            <label>Password:</label>
                                                <input class="form-control" name="password" type="password">
                                            </div>
                                            <div class="col-md-6">
                                            <label>Confirm Password:</label>
                                                <input class="form-control" name="password_confirmation" type="password">
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
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.super', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\radaweb\resources\views/super-admins/index.blade.php ENDPATH**/ ?>