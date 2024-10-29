<?php $__env->startSection('container'); ?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            
  
        </div>
    </div>
  </div>
  <!-- end page title -->
<?php if(session()->has('success')): ?>
<div class="alert alert-success" role="alert">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<div class="row">
    <div class="col-6">
        <div class="card">
            <h5 class="card-header p-3"><i class="dripicons-align-left"></i> Data Diri</h5>
            <div class="card-body">
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($loop->first): ?>
                  <h1 class="fs-4 mb-0"><?php echo e($user->name); ?></h1>
                    <p class="fs-5 my-0">
                        <?php if($user->division): ?>
                            <?php echo e($user->division->name); ?>

                        <?php else: ?>
                            <p class="text-danger"><i class="fa-solid fa-triangle-exclamation"></i> DIVISI TIDAK ADA! SILAHKAN HUBUNGI ADMIN!</p>
                        <?php endif; ?>
                    | <?php echo e($user->email); ?><br>
                    <?php echo e($user->phonenumber); ?><br>
                    <?php echo e($user->address); ?>

                    </p>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
          <a href="/dashboard/profile/<?php echo e($user->id); ?>/edit" class="btn btn-primary mt-3">Edit Profil</a>
    </div>

    
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\absen-dosen\absen-dosen\resources\views/dashboard/profile/index.blade.php ENDPATH**/ ?>