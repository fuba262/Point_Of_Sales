<?= $this->extend('templates/index');?>

<?= $this->section('content');?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Barang Masuk</title>
    <!-- Tambahkan referensi ke CSS dari template -->
    


                <div class="container-fluid">

                  
                    <h1 class="h3 mb-4 text-gray-800">Laporan Barang Masuk</h1>
                    <div class="row">
                        <!-- Filter Laporan -->
                        <div class="col-lg-5">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Filter Laporan</h6>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="kategori">Kategori Produk:</label>
                                            <select class="form-control" id="kategori">
                                                <option>Semua Kategori</option>
                                                <option>Makanan</option>
                                                <option>Minuman</option>
                                                <!-- Tambahkan kategori lainnya jika perlu -->
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggalMulai">Tanggal Mulai:</label>
                                            <input type="date" class="form-control" id="tanggalMulai">
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggalAkhir">Tanggal Akhir:</label>
                                            <input type="date" class="form-control" id="tanggalAkhir">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Tampilkan Laporan</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Hasil Cetak Laporan -->
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Hasil Cetak Laporan</h6>
                                </div>
                                <div class="card-body">
                                    <h5>LAPORAN BARANG MASUK (PEMBELIAN BARANG)</h5>
                                    <p>Kategori: Semua Kategori</p>
                                    <p>Tanggal Mulai: 01 Jan 2024</p>
                                    <p>Tanggal Akhir: 31 Jan 2024</p>

                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal Masuk (Created_at)</th>
                                                    <th>Id Produk</th>
                                                    <th>Kategori</th>
                                                    <th>Nama Produk</th>
                                                    <th>Jumlah Beli</th>
                                                    <th>Harga Beli</th>
                                                    <th>Total Harga Pembelian</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>2024-07-09 07:22:15.000</td>
                                                    <td>01</td>
                                                    <td>Minuman</td>
                                                    <td>Tehbotol Sosro</td>
                                                    <td>100</td>
                                                    <td>Rp 5000</td>
                                                    <td>Rp 500000</td>
                                                </tr>
                                                <tr>
                                                    <td>2024-07-09 07:22:15.000</td>
                                                    <td>02</td>
                                                    <td>Makanan</td>
                                                    <td>PopMie rasa ayam bawang</td>
                                                    <td>100</td>
                                                    <td>Rp 3000</td>
                                                    <td>Rp 300000</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
       


    <?= $this->endSection();?>

