<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Models\KategoriModel;

class Transaksi extends BaseController
{
    public function barang()
    {
        $model = new TransaksiModel();
        $data['transaksi'] = $model->getTransaksiBarang();
        return view('transaksi_barang', $data);
    }

    public function save()
    {
        $model = new TransaksiModel();

        $data = [
            'ID_Produk' => $this->request->getPost('idProduk'),
            'Nama_Produk' => $this->request->getPost('namaProduk'),
            'Kategori' => $this->request->getPost('kategori'),
            'Stock' => $this->request->getPost('qty'),
            'Harga_Beli' => $this->request->getPost('hargaBeli'),
            'Created_at' => date('Y-m-d H:i:s')
        ];

        $model->save($data);

        return redirect()->to('/transaksi/barang');
    }

    public function update()
    {
        $model = new TransaksiModel();
        $kategoriModel = new KategoriModel();

        $id = $this->request->getPost('idTransaksi');
        $idKategori = $this->request->getPost('kategori');

        // Log data yang diterima
        log_message('debug', 'Data yang diterima: ' . print_r($this->request->getPost(), true));

        // Periksa apakah ID_Kategori ada di tabel kategori
        if (!$kategoriModel->find($idKategori)) {
            return redirect()->back()->with('error', 'Kategori tidak valid.');
        }

        $data = [
            'ID_Produk' => $this->request->getPost('idProduk'),
            'Nama_Produk' => $this->request->getPost('namaProduk'),
            'ID_Kategori' => $idKategori,
            'Stock' => $this->request->getPost('qty'),
            'Harga_Beli' => $this->request->getPost('hargaBeli'),
            'Updated_at' => date('Y-m-d H:i:s')
        ];

        if ($model->update($id, $data)) {
            return redirect()->to('/transaksi/barang')->with('success', 'Data berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui data.');
        }
    }


    public function delete()
    {
        $model = new TransaksiModel();
        $id = $this->request->getPost('idTransaksi');

        if ($model->delete($id)) {
            return redirect()->to('/transaksi/barang')->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus data.');
        }
    }
}
