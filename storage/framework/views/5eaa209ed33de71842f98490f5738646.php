<?php $__env->startSection('container'); ?>

<!-- start page title -->
<div class="row">
  <div class="col-12">
      <div class="page-title-box d-flex align-items-center justify-content-between">
          

          <div class="page-title-right">
              <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="/register" class="btn btn-success">Tambah Data</a></li>
              </ol>
          </div>

      </div>
  </div>
</div> <br>
<!-- end page title -->

<?php if(session()->has('success')): ?>
<div class="alert alert-success" role="alert">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<div class="row">
    <div class="col">
        <div class="card mb-3">
            <h5 class="card-header p-3"> Karyawan</h5>
            <div class="card-body">
                <table class="table table-striped table-hover" id="datatable">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">DIVISI</th>
                        <th scope="col">ALAMAT</th>
                        <th scope="col">NOMOR TELEPON</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">AKSI</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e($user->id); ?></th>
                            <td><?php echo e($user->name); ?></td>

                            <td>
                                <?php if($user->division): ?>
                                  <?php echo e($user->division->name); ?>

                                <?php else: ?>
                                  <p class="text-danger"><i class="fa-solid fa-triangle-exclamation"></i> Division does not exist</p>
                                <?php endif; ?>
                            </td>

                            <td><?php echo e($user->address); ?></td>
                            <td><?php echo e($user->phonenumber); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            <td><a href="/dashboard/employees/<?php echo e($user->id); ?>/edit" class="badge bg-primary border-0 text-light">Edit</a>
                                <form action="/dashboard/employees/<?php echo e($user->id); ?>" method="POST" class="d-inline">
                                    <?php echo method_field('delete'); ?>
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="badge bg-danger border-0 text-light" data-bs-toggle="modal" data-bs-target="#deleteData">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>
            </div>
          </div>
    </div>
    </div>

  <!-- Modal -->
  


<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\New folder\absen-Guru\resources\views/dashboard/employee/index.blade.php ENDPATH**/ ?>