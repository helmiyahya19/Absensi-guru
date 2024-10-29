<?php $__env->startSection('container'); ?>

    <!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Absensi</h4>
  
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
            <h5 class="card-header p-3"><i class="fa-solid fa-check-to-slot"></i> Absensi Keluar</h5>
            <div class="card-body">
                <form action="/dashboard/absensi/<?php echo e($absensi->id); ?>" method="POST">
                    <?php echo method_field('put'); ?>
                    <?php echo csrf_field(); ?>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="mb-3">
                      <label for="name" class="form-label">Nama</label>
                      <input type="text" class="form-control" id="name" name="name" value="<?php echo e($user->name); ?>" readonly>
                      </div>
                      <div class="mb-3">
                        <label for="divisions_id" class="form-label">Divisi</label>
                          <input type="hidden" class="form-control" id="divisions_id" name="divisions_id" value="<?php echo e($user->divisions_id); ?>" readonly>
                          <input type="text" class="form-control" value="<?php echo e($user->division->name ?? 'DIVISI TIDAK DITEMUKAN! SILAHKAN HUBUNGI ADMIN!'); ?>" readonly>
                        </div>
                      <div class="mb-3">
                          <label for="status" class="form-label">Status</label>
                          <select class="form-select" name="status">
                              <option value="Hadir">Hadir</option>
                              <option value="Sakit">Sakit</option>
                              <option value="Cuti">Cuti</option>
                            </select>
                      </div>
                      <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date" value="<?php echo e(date('Y-m-d')); ?>" readonly>
                                </div>
                          </div>
                          <div class="col-6">
                            <div class="mb-3">
                                <label for="in" class="form-label">Jam</label>
                                <input type="time" class="form-control" id="out" name="out" value="<?php echo e(date('H:i')); ?>" readonly>
                                </div>
                          </div>
                          <div class="col-6">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="in" name="in" readonly>
                                </div>
                          </div>
                      </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <button type="submit" class="btn btn-primary">Kirim</button>
                  </form>
            </div>
          </div>
    </div>

    <div class="col-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center p-3">
                <h5><i class="fa-solid fa-clock"></i> Waktu</h5>
                <h6><?php echo e(date('d-m-Y')); ?> <h6 id="time"></h6></h6>
            </div>
            <div class="card-body">
                <h5>IN : <?php echo e($absensi_in); ?></h5>
                <h5>OUT : <?php echo e($absensi_out); ?></h5>
            </div>
          </div>

          <div class="mt-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center p-3">
                    <h5><i class="fa-solid fa-circle-info"></i> Informasi</h5>
                </div>
                <div class="card-body">
                    <p>
                        Jika kamu menggambil absensi selain <b>Hadir</b> maka cukup isi absensi satu kali saja. <br>

                        Jika ada kesulitan atau error silahkan hubungi <b>Admin.</b>

                        <div>
                            <b>Kontak :</b><br>
                            <p class="text-dark text-decoration-none">
                            <i class="fa-solid fa-envelope"></i> contact@kirinpeformance.com<br>
                            <i class="fa-solid fa-phone my-2"></i> +1 (213) 123-123<br>
                            <i class="fa-solid fa-location-dot"></i> SCOTTSDALE, AZ 85253 USA
                            </p>
                        </div>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updateTime() {
      const now = new Date();
      document.getElementById("time").textContent = now.toLocaleTimeString('ss');
    }

    setInterval(updateTime, 1000); // Update time every 1 second
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-7.3\htdocs\absen-dosen\resources\views/dashboard/absensi/edit.blade.php ENDPATH**/ ?>