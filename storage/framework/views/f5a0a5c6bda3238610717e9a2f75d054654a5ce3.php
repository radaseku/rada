<?php
 if(Auth::user()->adminRole->name == 'justice')
  {
	$layout = 'layouts.justice';
  }
  else if(Auth::user()->adminRole->name == 'admin')
  {
	$layout = 'layouts.admin';
  }
?>

<?php $__env->startSection('content'); ?>
<div id="app">
    <div class="panel-header bg-success">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Dashboard </h2>
                    <ul class="breadcrumbs text-white">
                        <li class="nav-home">
                            <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-white">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="" class="text-white">Mentor Request</a>
                        </li>
                    </ul>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <!-- <button type="button" class="btn btn-white btn-round" data-toggle="modal" data-target="#add">
                        <i class="fa fa-plus"></i> Add User
                    </button> -->
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title">Request Details</div>
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
                        <ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist">
                            <li class="nav-item submenu">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="false">New</a>
                            </li>
                            <li class="nav-item submenu">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Assigned</a>
                            </li>
                        </ul>
                        <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                            <!-- table -->
                            <div class="table-responsive">
                                <table id="table" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>School</th>
                                            <th>YearOfStudy</th>
                                            <th>Expectations</th>
                                            <th>Type</th>
                                            <th class="text-right" style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>School</th>
                                            <th>YearOfStudy</th>
                                            <th>Expectations</th>
                                            <th>Type</th>
                                            <th class="text-right" style="width: 10%">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($request->requestUser->name); ?></td>
                                            <td><?php echo e($request->requestUser->gender); ?></td>
                                            <td><b>Reg:</b> <?php echo e($request->student_regNo); ?><br>  
                                                <b>Sch:</b> <?php echo e($request->school); ?></td>
                                            <td><?php echo e($request->year_of_study); ?></td>
                                            <td><?php echo e($request->expectations); ?></td>
                                            <td><?php echo e($request->type); ?></td>
                                            <td>
                                                <div class="form-button-action" role="group">
                                                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#view-<?php echo e($request->id); ?>">View</button>
                                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit-<?php echo e($request->id); ?>">Edit</button>
                                                    <button class="btn btn-sm btn-danger" @click="deleteItem('deleterequest',<?php echo e($request->id); ?>)">Delete</button>
                                                </div>
                                            </td>
                                            <!-- modal view -->
                                            <div class="modal fade" id="view-<?php echo e($request->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">
                                                                View User [<?php echo e($request->requestUser->name); ?>]
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body row">
                                                                <div class="col-md-6">
                                                                    <label>Name:</label>
                                                                    <input class="form-control" name="name" value="<?php echo e($request->requestUser->name); ?>" readonly type="text">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>DoB:</label>
                                                                    <input class="form-control" name="dob" value="<?php echo e($request->requestUser->dob); ?>" readonly type="text">
                                                                </div>
                                                                <div class="col-md-6">
                                                                <label>Email:</label>
                                                                    <input class="form-control" name="email" value="<?php echo e($request->requestUser->email); ?>" readonly type="email">
                                                                </div>
                                                                <div class="col-md-6">
                                                                <label>Phone:</label>
                                                                    <input class="form-control" name="phone" value="<?php echo e($request->requestUser->phone); ?>" readonly type="text">
                                                                </div>
                                                                <div class="col-md-6">
                                                                <label>Gender:</label>
                                                                    <input class="form-control" name="role"  value="<?php echo e($request->requestUser->gender); ?>" readonly type="text">
                                                                </div>
                                                                <div class="col-md-6">
                                                                <label>School:</label>
                                                                    <input class="form-control" name="role"  value="<?php echo e($request->school); ?>" readonly type="text">
                                                                </div>
                                                                <div class="col-md-12">
                                                                <label>Type:</label>
                                                                    <input class="form-control" name="role"  value="<?php echo e($request->type); ?>" type="text" readonly>
                                                                </div>
                                                                
                                                                <div class="col-md-12">
                                                                <label>Goals:</label>
                                                                    <textarea class="form-control" name="role"  value="<?php echo e($request->requestUser->goals); ?>"><?php echo e($request->goals); ?></textarea>
                                                                </div>
                                                                <div class="col-md-12">
                                                                <label>Expectations:</label>
                                                                    <textarea class="form-control" name="role"  value="<?php echo e($request->expectations); ?>"><?php echo e($request->expectations); ?></textarea>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /end modal view -->
                                            <!-- modal edit -->
                                            <div class="modal fade" id="edit-<?php echo e($request->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">
                                                                Edit Request [<?php echo e($request->requestUser->name); ?>]
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <edit-requests :data="<?php echo e(json_encode($request)); ?>"></edit-requests>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /end modal edit -->
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /end table -->
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <!--table -->
                                <div class="table-responsive">
                                    <table id="table" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>School</th>
                                                <th>YearOfStudy</th>
                                                <th>Expectations</th>
                                                <th>Type</th>
                                                <th class="text-right" style="width: 10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>School</th>
                                                <th>YearOfStudy</th>
                                                <th>Expectations</th>
                                                <th>Type</th>
                                                <th class="text-right" style="width: 10%">Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php $__currentLoopData = $assigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($request->requestUser->name); ?></td>
                                                <td><?php echo e($request->requestUser->gender); ?></td>
                                                <td><b>Reg:</b> <?php echo e($request->student_regNo); ?><br>  
                                                    <b>Sch:</b> <?php echo e($request->school); ?></td>
                                                <td><?php echo e($request->year_of_study); ?></td>
                                                <td><?php echo e($request->expectations); ?></td>
                                                <td><?php echo e($request->type); ?></td>
                                                <td>
                                                    <div class="form-button-action" role="group">
                                                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#view-<?php echo e($request->id); ?>">View</button>
                                                        <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit-<?php echo e($request->id); ?>">Edit</button>
                                                        <button class="btn btn-sm btn-danger" @click="deleteItem('deleterequest',<?php echo e($request->id); ?>)">Delete</button>
                                                    </div>
                                                </td>
                                                <!-- modal view -->
                                                <div class="modal fade" id="view-<?php echo e($request->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">
                                                                    View User [<?php echo e($request->requestUser->name); ?>]
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body row">
                                                                    <div class="col-md-6">
                                                                        <label>Name:</label>
                                                                        <input class="form-control" name="name" value="<?php echo e($request->requestUser->name); ?>" readonly type="text">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>DoB:</label>
                                                                        <input class="form-control" name="dob" value="<?php echo e($request->requestUser->dob); ?>" readonly type="text">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                    <label>Email:</label>
                                                                        <input class="form-control" name="email" value="<?php echo e($request->requestUser->email); ?>" readonly type="email">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                    <label>Phone:</label>
                                                                        <input class="form-control" name="phone" value="<?php echo e($request->requestUser->phone); ?>" readonly type="text">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                    <label>Gender:</label>
                                                                        <input class="form-control" name="role"  value="<?php echo e($request->requestUser->gender); ?>" readonly type="text">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                    <label>School:</label>
                                                                        <input class="form-control" name="role"  value="<?php echo e($request->school); ?>" readonly type="text">
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                    <label>Type:</label>
                                                                        <input class="form-control" name="role"  value="<?php echo e($request->type); ?>" type="text" readonly>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-12">
                                                                    <label>Goals:</label>
                                                                        <textarea class="form-control" name="role"  value="<?php echo e($request->requestUser->goals); ?>"><?php echo e($request->goals); ?></textarea>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                    <label>Expectations:</label>
                                                                        <textarea class="form-control" name="role"  value="<?php echo e($request->expectations); ?>"><?php echo e($request->expectations); ?></textarea>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /end modal view -->
                                                <!-- modal edit -->
                                                <div class="modal fade" id="edit-<?php echo e($request->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">
                                                                    Edit Request [<?php echo e($request->requestUser->name); ?>]
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <edit-requests :data="<?php echo e(json_encode($request)); ?>"></edit-requests>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /end modal edit -->
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /end table -->
                                </div>
                            </div>
                        <!-- modal add super -->
                        <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">
                                            Add User
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    
                                    <add-users :uid="<?php echo e(json_encode(Auth::user()->adminUniversity->id)); ?>"></add-users>
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
<?php echo $__env->make($layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\radaweb\resources\views/mentor-request/index.blade.php ENDPATH**/ ?>