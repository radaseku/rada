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
                <h2 class="text-white pb-2 fw-bold">Mentors </h2>
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
                        <a href="" class="text-white">Mentors</a>
                    </li>
                </ul>
            </div>
            <div class="ml-md-auto py-2 py-md-0">
                <button type="button" class="btn btn-white btn-round" data-toggle="modal" data-target="#add">
                    <i class="fa fa-plus"></i> Add Mentor
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
                    <div class="card-title">Mentors</div>
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
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th class="text-right" style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID#</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th class="text-right" style="width: 10%">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $__currentLoopData = $mentors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mentor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php if($mentor->id()): ?> <a href="<?php echo e(route('mymentees.index',$mentor->id())); ?>"> <?php echo e($mentor->id()); ?></a>  <?php endif; ?></td>
                                    <td><?php if($mentor->data()['name']): ?>  <?php echo e($mentor->data()['name']); ?>  <?php endif; ?></td>
                                    <td><?php if($mentor->data()['status']): ?> <?php echo e($mentor->data()['status']); ?> <?php endif; ?></td>
                                    <td><img src="<?php echo e($mentor->data()['image']); ?>" width="60" height="50"/></td>
                                    <td>
                                        <div class="form-button-action" role="group">
                                            <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit-<?php echo e($mentor->id()); ?>">Edit</button>
                                            <form action="<?php echo e(route('mentors.destroy')); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="id" value="<?php echo e($mentor->id()); ?>">
                                                <input type="hidden" name="name" value="<?php echo e($mentor->data()['name']); ?>">
                                                <input type="hidden" name="email" value="<?php echo e($mentor->data()['email']); ?>">
                                                <input type="hidden" name="phone" value="<?php echo e($mentor->data()['phone']); ?>">
                                                <input type="hidden" name="image" value="<?php echo e($mentor->data()['image']); ?>">
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                    <div class="modal fade" id="edit-<?php echo e($mentor->id()); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">
                                                        Edit Mentor
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <?php
                                                $mentor=['id'=>$mentor->id(),'name'=>$mentor->data()['name'],'email'=>$mentor->data()['email'],'phone'=>$mentor->data()['phone'],'type'=>$mentor->data()['type'],'image'=>$mentor->data()['image'],
                                                     'available'=>$mentor->data()['available'],'expertise'=>$mentor->data()['expertise'] ?? '','visible'=>$mentor->data()['visible'] ?? ''];
                                                ?>
                                                    <edit-mentor :data="<?php echo e(json_encode($mentor)); ?>"></edit-mentor>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /end modal add content -->
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /end table -->
                    <!-- modal add content -->
                    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">
                                        Add Mentor
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <add-mentor :uid="<?php echo e(json_encode(Auth::user()->adminUniversity->id)); ?>"></add-mentor>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /end modal add content -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make($layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\radaweb\resources\views/mentors/index.blade.php ENDPATH**/ ?>