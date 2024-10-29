<?php $__env->startSection('container'); ?>
<!-- start page title -->
<div class="row">
  <div class="col-12">
      <div class="page-title-box d-flex align-items-center justify-content-between">
          <h4 class="page-title mb-0 font-size-18">Laporan - <?php echo e(date('F Y')); ?></h4>

          <div class="page-title-right">
              <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item">
                    <button class="btn btn-success" onclick="printReport()"><i class="fa-solid fa-file-arrow-down"></i> Cetak Laporan</button>
                  </li>
              </ol>
          </div>

      </div>
  </div>
</div> <br>
<!-- end page title -->

<div class="card">
  <div class="card-header"></div>
  <div class="card-body">


<?php if(auth()->user()->is_admin == '1'): ?>
<table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">NAMA</th>
        <th scope="col">DIVISI</th>
        <th scope="col">TANGGAL</th>
        <th scope="col">MASUK</th>
        <th scope="col">KELUAR</th>
        <th scope="col">STATUS</th>
      </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $absensis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $absensi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($absensi->id); ?></td>
            <td><?php echo e($absensi->name); ?></td>
            <td>
              <?php if($absensi->division): ?>
              <?php echo e($absensi->division->name); ?>

              <?php else: ?>
              <p class="text-danger"><i class="fa-solid fa-triangle-exclamation"></i> DIVISI TIDAK DITEMUKAN!</p>
              <?php endif; ?>
            </td>
            <td><?php echo e($absensi->date); ?></td>
            <td><?php echo e($absensi->in); ?></td>
            <td><?php echo e($absensi->out); ?></td>
            <td><?php echo e($absensi->status); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
  <?php else: ?>
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">NAMA</th>
        <th scope="col">DIVISI</th>
        <th scope="col">TANGGAL</th>
        <th scope="col">MASUK</th>
        <th scope="col">KELUAR</th>
        <th scope="col">STATUS</th>
      </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $absensi_by_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $absensi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($absensi->id); ?></td>
            <td><?php echo e($absensi->name); ?></td>
            <td>
                <?php if($absensi->division): ?>
                <?php echo e($absensi->division->name); ?>

                <?php else: ?>
                <p class="text-danger"><i class="fa-solid fa-triangle-exclamation"></i> DIVISI TIDAK DITEMUKAN!</p>
                <?php endif; ?>
            </td>
            <td><?php echo e($absensi->date); ?></td>
            <td><?php echo e($absensi->in); ?></td>
            <td><?php echo e($absensi->out); ?></td>
            <td><?php echo e($absensi->status); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
<?php endif; ?>

  </div>
</div>

    <script>
function printReport() {
    var date = new Date();
    var monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    var currentMonth = monthNames[date.getMonth()];

    var companyName = '<div style="float: left; font-size: 20px; font-weight: bold;">Kirin ★ Performance</div>';
    var separator = '<hr style="border: 2px solid black; clear: both;" />';
    var title = '<div style="font-size: 20px; font-weight: bold; text-align: right;">Laporan ' + currentMonth + '</div>';

    var printContents = companyName + title + separator + document.querySelector('.table').outerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\New folder\absen-Guru\resources\views/dashboard/reports/index.blade.php ENDPATH**/ ?>