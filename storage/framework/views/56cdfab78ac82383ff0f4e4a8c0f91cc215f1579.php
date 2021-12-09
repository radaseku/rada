<?php
 if(Auth::user()->adminRole->name == 'carreer')
  {
	$layout = 'layouts.carreer';
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
                    <h2 class="text-white pb-2 fw-bold">Events </h2>
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
                            <a href="" class="text-white">Events/SMS</a>
                        </li>
                    </ul>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <button type="button" class="btn btn-white btn-round" data-toggle="modal" data-target="#add">
                        <i class="fa fa-plus"></i> Add Event
                    </button>
                    <button type="button" class="btn btn-white btn-round" data-toggle="modal" data-target="#import">
                        <i class="fa fa-plus"></i> Import SMS
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
                        <div class="card-title">Events</div>
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
                                        <th>Event</th>
                                        <th>Recipient</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th class="text-right" style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID#</th>
                                        <th>Event</th>
                                        <th>Recipient</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th class="text-right" style="width: 10%">Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($event->id); ?></td>
                                        <td><?php echo e($event->event); ?></td>
                                        <td><?php echo e($event->recipient); ?></td>
                                        <td><?php echo e($event->date); ?></td>
                                        <td>
                                            <?php if($event->status == 1 || $event->status == '1'): ?>
                                            <span class="badge badge-success"> Sent</span>
                                            <?php elseif($event->status == 3 || $event->status == '3'): ?>
                                            <span class="badge badge-warning">Processing</span>
                                            <?php else: ?>
                                            <span class="badge badge-danger">Not Sent</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="form-button-action" role="group">
                                                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit-<?php echo e($event->id); ?>">Edit</button>
                                                <button class="btn btn-sm btn-danger">Delete</button>
                                            </div>
                                        </td>
                                        <!-- modal edit -->
                                        <div class="modal fade" id="edit-<?php echo e($event->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">
                                                            Edit Event [<?php echo e($event->event); ?>]
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?php echo e(route('events.update')); ?>" method="post" class="form-group row">
                                                            <?php echo csrf_field(); ?>
                                                            <div class="col-md-12">
                                                                <label>Event:</label>
                                                                <input class="form-control" name="id" value="<?php echo e($event->id); ?>" type="hidden">
                                                                <input class="form-control" name="name" value="<?php echo e($event->event); ?>" type="text">
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
                                            Add Event
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                   
                                    <add-event></add-event>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /end modal add super -->
                        <!-- modal add import -->
                        <div class="modal fade" id="import" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">
                                            Import SMS 
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                   <form action="<?php echo e(route('sms.import')); ?>" method="post" enctype="multipart/form-data" class="form-group row">
                                        <?php echo csrf_field(); ?>
                                        <div class="col-md-12">
                                            <span class="form-control"><label>Download </label><a href='sample.xlsx'>  sample file</a></span>
                                        </div>
                                        <div class="col-md-12">
                                            <label>Excel:</label>
                                            <input class="form-control" name="file" type="file">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success pull-right">Upload</button>
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
<?php echo $__env->make($layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\radaweb\resources\views/events/index.blade.php ENDPATH**/ ?>