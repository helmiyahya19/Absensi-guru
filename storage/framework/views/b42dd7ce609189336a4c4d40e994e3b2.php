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
            <h5 class="card-header p-3"> Edit Data Karyawan</h5>
            <div class="card-body mx-2">
                <form action="/dashboard/employees/<?php echo e($user->id); ?>" method="POST">
                    <?php echo method_field('put'); ?>
                    <?php echo csrf_field(); ?>
                        <div class="row">
                        <div class=" col-6 mb-3">
                          <label for="name" class="form-label">Nama</label>
                          <input type="text" class="form-control" id="name" name="name" required value="<?php echo e(old('name', $user->name)); ?>">
                        </div>
                        <div class=" col-6 mb-3">
                          <label for="address" class="form-label">Alamat</label>
                          <input type="text" class="form-control" id="address" name="address" value="<?php echo e(old('address', $user->address)); ?>">
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="divisions_id" class="form-label">Divisi</label>
                                <select class="form-control" id="divisions_id" name="divisions_id" required>
                                    <?php $__currentLoopData = $divisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $division): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(old('divisions_id', $user->divisions_id) == $division->id): ?>
                                    <option value="<?php echo e($division->id); ?>" selected><?php echo e($division->name); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo e($division->id); ?>"><?php echo e($division->name); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                </div>
                        <div class="col-6 mb-3">
                          <label for="phonenumber" class="form-label">Nomor Telepon</label>
                          <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="<?php echo e(old('phonenumber', $user->phonenumber)); ?>"required>
                        </div>
                        </div>
                        <div class="row">
                        <div class="mb-3 col-6">
                          <label for="email" class="form-label">Email</label>
                          <input type="text" class="form-control" id="email" name="email" value="<?php echo e(old('email', $user->email)); ?>" required>
                        </div>
                        <div class="mb-3 col-6">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                    </div>
                    <a href="/dashboard/employees" class="btn btn-outline-dark my-3">Kembali</a>
                    <button class="btn btn-primary" type="submit">Perbarui Data</button>
                </form>
                </div>
                </div>
          </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\New folder\absen-Guru\resources\views/dashboard/employee/edit.blade.php ENDPATH**/ ?>