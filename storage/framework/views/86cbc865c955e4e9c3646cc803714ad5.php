<?php $__env->startSection('container'); ?>


<!-- start page title -->
<div class="row">
  <div class="col-12">
      <div class="page-title-box d-flex align-items-center justify-content-between">
          <h4 class="page-title mb-0 font-size-18">Tambah Data Karyawan</h4>


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
        <h5 class="card-header p-3"> Tambah Karyawan</h5>
        <div class="card-body mx-2">
            <form action="/dashboard/employees" method="POST">
                <?php echo csrf_field(); ?>
                    <div class="row">
                    <div class="mb-3">
                      <label for="name" class="form-label">Nama</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="John Martin" autofocus required>
                    </div>
                    </div>
                    <div class="row">
                    <div class="mb-3">
                      <label for="address" class="form-label">Alamat</label>
                      <input type="text" class="form-control" id="address" name="address" placeholder="123 Road Race" required>
                    </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="divisions_id" class="form-label">Divisi</label>
                            <select class="form-select" id="divisions_id" name="divisions_id" required>
                                <?php $__currentLoopData = $divisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $division): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($division->id); ?>"><?php echo e($division->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            </div>
                    <div class="mb-3">
                      <label for="phonenumber" class="form-label">Nomor Telepon</label>
                      <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="+62123123123" required>
                    </div>
                    </div>
                    <div class="row">
                    <div class="mb-3 col-6">
                      <label for="email" class="form-label">Email</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="johnmartin@mail.com" required>
                    </div>
                    <div class="mb-3 col-6">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                </div>
                <button class="btn btn-primary py-2 mt-3" type="submit">Tambah</button>
            </form>
            </div>
            </div>
      </div>

      
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\PC Of H\Downloads\absensi-laravel-main\resources\views/dashboard/employee/create.blade.php ENDPATH**/ ?>