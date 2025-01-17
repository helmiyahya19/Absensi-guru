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
            <h5 class="card-header p-3"> Absensi Masuk</h5>
            <div class="card-body">
                <form action="/dashboard/absensi" method="POST" enctype="multipart/form-data">
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

                      <div class="mb-3 d-none" id="bukti_sakit">
                        <label for="bukti_sakit" class="form-label">Unggah Bukti</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <input type="file" class="form-control" name="image" id="image" onchange="previewImage()" aria-describedby="buktiSakit">
                        <div id="buktiSakit" class="form-text">Silahkan unggah bukti sakit! Pastikan tidak lebih dari <b>1MB.</b></div>
                      </div>

                      <div class="mb-3 d-none" id="alasan-cuti">
                        <label for="alasan_cuti" class="form-label">Alasan Cuti</label>
                        <textarea name="reason" class="form-control" rows="2"></textarea>
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
                                <input type="time" class="form-control" id="in" name="in" value="<?php echo e(date('H:i')); ?>" readonly>
                                </div>
                          </div>
                          <div class="col-6">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="out" name="out" value="None" readonly>
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
                <h5><i class="dripicons-align-left"></i> Waktu</h5>
                <h6><?php echo e(date('d-m-Y')); ?> <h6 id="time"></h6></h6>
            </div>
            <div class="card-body">
                <?php if($absensis?->date === date('Y-m-d')): ?>
                <h5>MASUK : <?php echo e($absensi_in); ?></h5>
                <h5>KELUAR : <?php echo e($absensi_out); ?></h5>
                <?php else: ?>
                <h5>MASUK : -</h5>
                <h5>KELUAR : -</h5>
                <?php endif; ?>
            </div>
          </div>

          <div class="mt-3">
            
        </div>
    </div>

    <script>
    const select = document.querySelector("select[name='status']");

    select.addEventListener("change", function() {
        const value = select.value;

        if (value === "Sakit") {
            document.querySelector("#bukti_sakit").classList.remove("d-none");
            document.querySelector("#alasan-cuti").classList.add("d-none");
        } else if (value === "Hadir") {
            document.querySelector("#bukti_sakit").classList.add("d-none");
            document.querySelector("#alasan-cuti").classList.add("d-none");
        } else if (value === "Cuti") {
            document.querySelector("#bukti_sakit").classList.add("d-none");
            document.querySelector("#alasan-cuti").classList.remove("d-none");
        }
    });

    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

    function updateTime() {
      const now = new Date();
      document.getElementById("time").textContent = now.toLocaleTimeString('ss');
    }

    setInterval(updateTime, 1000); // Update time every 1 second
  </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-7.3\htdocs\absen-dosen\resources\views/dashboard/absensi/index.blade.php ENDPATH**/ ?>