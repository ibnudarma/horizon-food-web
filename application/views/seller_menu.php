<!-- [ breadcrumb ] start -->
<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col">
        <div class="page-header-title">
        <a href="<?= base_url('seller/menu_add') ?>" class="btn btn-primary">Tambah Menu</a>
        </div>
      </div>
      <div class="col-auto">
        <ul class="breadcrumb">
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
          <th>Nama Menu</th>
          <th>Kategori</th>
          <th>Harga</th>
          <th class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($menu as $item): ?>
        <tr>
        <td class="text-center"><img src="<?= base_url('uploads/menu/') . (!empty($item->gambar) ? $item->gambar : 'default.jpg') ?>" class="img-thumb" alt="Gambar Menu"></td>
          <td><?= $item->nama_menu ?></td>
          <td><?= $item->category ?></td>
          <td><?= $item->harga ?></td>
          <td class="text-center">
            <a href="<?= base_url('seller/menu_detail/') ?><?= $item->id_menu ?>" class="btn btn-sm btn-primary">detail</a>
          </td>
        </tr>
        <?php endforeach ?>
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