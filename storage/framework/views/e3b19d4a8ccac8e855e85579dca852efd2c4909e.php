<?php
 if(Auth::user()->adminRole->name == 'justice')
  {
	$layout = 'layouts.justice';
  }
  else if(Auth::user()->adminRole->name == 'admin')
  {
	$layout = 'layouts.admin';
  }
  else if(Auth::user()->adminRole->name == 'carreer')
  {
	$layout = 'layouts.carreer';
  }
  else if(Auth::user()->adminRole->name == 'superadmin')
  {
	$layout = 'layouts.super';
  }
  else if(Auth::user()->adminRole->name == 'contentcreator')
  {
	$layout = 'layouts.content';
  }
?>

<?php $__env->startSection('content'); ?>
<div id="app">
<div class="panel-header bg-success">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">My profile </h2>
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
                        <a href="" class="text-white">My profile</a>
                    </li>
                </ul>
            </div>
            <div class="ml-md-auto py-2 py-md-0">
                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-white btn-round btn-border">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">My profile</div>
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
                    
                    <profile :data="<?php echo e(json_encode(Auth::user())); ?>"></profile>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make($layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\radaweb\resources\views/profile/index.blade.php ENDPATH**/ ?>