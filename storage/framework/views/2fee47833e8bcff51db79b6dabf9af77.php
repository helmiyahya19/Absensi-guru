

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


<div class="row mb-3">
    <div class="col-6">
    <div class="card">
        <h5 class="card-header p-3">Tambah Pengajuan</h5>
        <div class="card-body mx-2">
            <form action="/dashboard/pengajuan" method="POST">
                <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label for="jenis" class="form-label">Jenis</label>
                            <select name="jenis" class="form-control" id="" required>
                                <option value=""></option>
                                <option value="Izin">Izin</option>
                                <option value="Lupa Absen">Lupa Absen</option>
                                <option value="Telat Absen">Telat Absen</option>
                            </select>
                        </div>
                    <button class="btn btn-primary py-2 mt-3" type="submit">Tambah</button>
                </div>
            </form>
            </div>
        </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\absen-dosen\absen-dosen\resources\views/dashboard/pengajuan/create.blade.php ENDPATH**/ ?>