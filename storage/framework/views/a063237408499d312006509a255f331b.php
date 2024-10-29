

<?php $__env->startSection('container'); ?>

<!-- start page title -->
<div class="row">
  <div class="col-12">
      <div class="page-title-box d-flex align-items-center justify-content-between">
          <h4 class="page-title mb-0 font-size-18">Data Pengajuan</h4>

          <div class="page-title-right">
              <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="/dashboard/pengajuan/create" class="btn btn-success">Tambah Data</a></li>
              </ol>
          </div>

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
    <div class="col">
        <div class="card mb-3">
            <h5 class="card-header p-3"> Pengajuan</h5>
            <div class="card-body">
                <table class="table table-striped table-hover" id="datatable">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">TGL</th>
                        <th scope="col">JENIS</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">AKSI</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                        ?>
                        <?php $__currentLoopData = $pengajuan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e($no++); ?></th>
                            <td><?php echo e($user->tanggal); ?></td>
                            <td><?php echo e($user->jenis); ?></td>
                            <td><?php echo e($user->status == 1 ? "Setuju" : "Belum disetujui/Ditolak"); ?></td>
                            <td>
                                <?php if($user->status == 0): ?> 
                                <form action="/dashboard/pengajuan/approve/<?php echo e($user->id); ?>" method="POST" class="d-inline">
                                    <?php echo method_field('get'); ?>
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="badge bg-primary border-0" ><i class="dripicons-checkmark"></i></button>
                                </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>
            </div>
          </div>
    </div>
    </div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\PC Of H\Downloads\absensi-laravel-main\resources\views/dashboard/pengajuan/admin.blade.php ENDPATH**/ ?>