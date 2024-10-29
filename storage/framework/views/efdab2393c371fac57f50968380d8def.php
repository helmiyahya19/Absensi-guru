<?php $__env->startSection('container'); ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Absensi</h1>
    </div>

    <?php if(session()->has('success')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-6">
            <div class="card">
                <h5 class="card-header"><i class="fa-solid fa-circle-info"></i> Detail Absensi</h5>
                <div class="card-body">
                  <p class="card-text">
                        <b>Nama :</b> <?php echo e($absensi->name); ?> <br>
                        <b>Divisi :</b> <?php echo e($absensi->division->name); ?><br>
                        <b>Tanggal :</b> <?php echo e($absensi->date); ?><br>
                        <b>Jam Masuk :</b> <?php echo e($absensi->in); ?><br>
                        <b>Jam Keluar :</b> <?php echo e($absensi->out); ?><br>
                        <b>Status :</b> <?php echo e($absensi->status); ?><br>
                        <b>Bukti :</b> <button class="badge bg-dark border-0 text-decoration-none" data-image-src="<?php echo e(asset('storage/' . $absensi->image)); ?>">Lihat Bukti</button><br>
                        <b>Alasan :</b> <?php echo e($absensi->reason); ?>

                  </p>
                </div>
              </div>
              <div class="pt-3">
                  <a href="/dashboard" class="btn btn-dark">Kembali</a>
              </div>
        </div>

        <div class="col-6">
            <div class="card">
                <h5 class="card-header"><i class="fa-solid fa-image"></i> Detail Bukti Sakit</h5>
                <div class="card-body">
                    <img id="proofImage" src="" alt="Bukti" style="display: none;">
                </div>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
        var badge = document.querySelector('.badge');
        var proofImage = document.getElementById('proofImage');

        if(badge && proofImage) {
            badge.addEventListener('click', function(event) {
            event.preventDefault();
            var imgSrc = this.getAttribute('data-image-src');

            if (imgSrc) {
                if (proofImage.style.display === 'none') {
                proofImage.src = imgSrc;
                proofImage.style.display = 'block';
                } else {
                proofImage.style.display = 'none';
                }
            } else {
                console.log('URL gambar tidak valid');
            }
            });
        } else {
            console.log('Elemen badge atau proofImage tidak ditemukan');
        }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\PC Of H\Downloads\absensi-laravel-main\resources\views/dashboard/absensi/show.blade.php ENDPATH**/ ?>