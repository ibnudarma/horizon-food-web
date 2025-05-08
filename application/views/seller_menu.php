<!-- [ breadcrumb ] start -->
<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col">
        <div class="page-header-title">
        <button class="btn btn-primary">Tambah Menu</button>
        </div>
      </div>
      <div class="col-auto">
        <ul class="breadcrumb">
          <!-- <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li> -->
          <li class="breadcrumb-item"><a href="javascript: void(0)">app</a></li>
          <li class="breadcrumb-item" aria-current="page">menu</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- [ breadcrumb ] end -->

<style>
    .img-thumb {
      width: 80px;
      height: auto;
      border-radius: 5px;
    }
  </style>

<div class="row mt-3">
<div class="col-sm-12">
    <div class="card">
      <div class="card-body table-responsive">
      <table id="tabelMakanan" class="table table-bordered">
      <thead class="table-light">
        <tr>
          <th class="text-center">Gambar</th>
          <th>Nama</th>
          <th>Deskripsi</th>
          <th>Harga</th>
          <th class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <td class="text-center"><img src="<?= base_url('uploads/seller_logo/logo_1746692653.jpg') ?>" class="img-thumb" alt="Nasi Goreng"></td>
          <td>Nasi Goreng</td>
          <td>Nasi goreng ayam + telur</td>
          <td>Rp15.000</td>
          <td class="text-center">
            <button class="btn btn-sm btn-primary">detail</button>
          </td>
        </tr>
      </tbody>
    </table>
      </div>
    </div>
  </div>
</div>

    <script>
    $(document).ready(function () {
      $('#tabelMakanan').DataTable();
    });
  </script>