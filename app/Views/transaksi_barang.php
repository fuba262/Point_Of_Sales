<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tabel Daftar Barang Masuk</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Barang Masuk</h6>
            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#tambahModal">+ Tambah</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id Produk</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Qty</th>
                            <th>Harga Beli</th>
                            <th>Tanggal Masuk (Created_at)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($transaksi)) : ?>
                            <?php foreach ($transaksi as $index => $trans) : ?>
                                <tr>
                                    <td><?= $trans['ID_Produk'] ?></td>
                                    <td><?= $trans['Nama_Produk'] ?></td>
                                    <td><?= $trans['ID_Kategori'] ?></td>
                                    <td><?= $trans['Stock'] ?></td>
                                    <td><?= $trans['Harga_Beli'] ?></td>
                                    <td><?= $trans['Created_at'] ?></td>
                                    <td>
                                        <button class="btn btn-warning btn-sm edit-btn" data-index="<?= $index ?>">Edit</button>
                                        <button class="btn btn-danger btn-sm delete-btn" data-index="<?= $index ?>">Delete</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="7">Tidak ada data transaksi.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Barang Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formTransaksi" action="/transaksi/save" method="post">
                    <input type="hidden" id="idTransaksi" name="idTransaksi">
                    <div class="form-group">
                        <label for="idProduk">Id Produk:</label>
                        <input type="text" class="form-control" id="idProduk" name="idProduk" placeholder="Masukkan Id Produk">
                    </div>
                    <div class="form-group">
                        <label for="namaProduk">Nama Produk:</label>
                        <input type="text" class="form-control" id="namaProduk" name="namaProduk" placeholder="(Auto Complete dari ID Produk)" readonly>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori:</label>
                        <input type="text" class="form-control" id="kategori" name="kategori" placeholder="(Auto Complete dari ID Produk)" readonly>
                    </div>
                    <div class="form-group">
                        <label for="qty">Jumlah Beli:</label>
                        <input type="number" class="form-control" id="qty" name="qty" placeholder="Masukkan Jumlah Beli">
                    </div>
                    <div class="form-group">
                        <label for="hargaBeli">Harga Beli (Rupiah):</label>
                        <input type="text" class="form-control" id="hargaBeli" name="hargaBeli" placeholder="Masukkan Harga Beli">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
   
   document.addEventListener('DOMContentLoaded', function () {
    var transaksiData = <?= json_encode($transaksi) ?>;

    document.querySelectorAll('.edit-btn').forEach(function (button, index) {
        button.addEventListener('click', function () {
            var trans = transaksiData[index];
            document.getElementById('idTransaksi').value = trans.ID_Produk;
            document.getElementById('idProduk').value = trans.ID_Produk;
            document.getElementById('namaProduk').value = trans.Nama_Produk;
            document.getElementById('kategori').value = trans.ID_Kategori;
            document.getElementById('qty').value = trans.Stock;
            document.getElementById('hargaBeli').value = trans.Harga_Beli;

            document.getElementById('formTransaksi').action = '/transaksi/update';
            document.getElementById('tambahModalLabel').textContent = 'Edit Barang Masuk';
            $('#tambahModal').modal('show');
        });
    });

    document.querySelectorAll('.delete-btn').forEach(function (button, index) {
        button.addEventListener('click', function () {
            var toastId = toastr.warning(
                'Apakah Anda yakin ingin menghapus data ini? <br/><br/><button type="button" id="confirmYes" class="btn btn-primary">Yes</button> <button type="button" id="confirmNo" class="btn btn-secondary">No</button>',
                'Konfirmasi Penghapusan',
                {
                    closeButton: true,
                    progressBar: true,
                    timeOut: 0,
                    extendedTimeOut: 0,
                    tapToDismiss: false,
                    positionClass: 'toast-top-center',
                    allowHtml: true,
                    onShown: function () {
                        document.getElementById('confirmYes').addEventListener('click', function () {
                            var form = document.createElement('form');
                            form.method = 'POST';
                            form.action = '/transaksi/delete';

                            var input = document.createElement('input');
                            input.type = 'hidden';
                            input.name = 'idTransaksi';
                            input.value = transaksiData[index].ID_Produk;

                            form.appendChild(input);
                            document.body.appendChild(form);
                            form.submit();
                        });

                        document.getElementById('confirmNo').addEventListener('click', function () {
                            toastr.clear(toastId);
                        });
                    }
                }
            );
        });
    });

    document.getElementById('idProduk').addEventListener('change', function () {
        const idProduk = this.value;

        const produkData = {
            1: {
                nama: 'Produk A',
                kategori: 'Kategori A'
            },
                2: {
                nama: 'Produk B',
                kategori: 'Kategori B'
            }
        };

        if (produkData[idProduk]) {
            document.getElementById('namaProduk').value = produkData[idProduk].nama;
            document.getElementById('kategori').value = produkData[idProduk].kategori;
        } else {
            document.getElementById('namaProduk').value = '';
            document.getElementById('kategori').value = '';
        }
    });

    <?php if(session()->getFlashdata('success')): ?>
        toastr.success('<?= session()->getFlashdata('success') ?>');
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
        toastr.error('<?= session()->getFlashdata('error') ?>');
    <?php endif; ?>
});


</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<?= $this->endSection(); ?>
