<?php
class Artikel extends Database
{
    // menampilkan semua data
    public function index()
    {
        $data_artikel = mysqli_query(
            $this->koneksi,
            "SELECT artikel.id, artikel.judul, artikel.foto, artikel.tgl, artikel.slug, kategori.nama as
            nama_kategori, users.nama FROM ((artikel JOIN kategori ON kategori.id = artikel.id_kategori)
            JOIN users ON users.id = artikel.id_user)"
        );
        return $data_artikel;
    }
    public function get_kategori()
    {
        $kategori = mysqli_query($this->koneksi, "SELECT * FROM kategori");
        // var_dump($kategori);
        return $kategori;
    }

    // Menambah data
    public function create($judul, $slug, $konten, $foto, $tgl, $id_user, $id_kategori)
    {
        mysqli_query(
            $this->koneksi,
            "INSERT INTO artikel VALUES(null, '$judul', '$slug', '$konten', '$foto', '$tgl', 
            '$id_user', '$id_kategori')"
        );
    }

    //Menampilkan data berdasarkan id
    public function show($id)
    {
        $data_artikel = mysqli_query(
            $this->koneksi,
            "SELECT artikel.id, artikel.judul, artikel.foto, artikel.konten, artikel.tgl, artikel.slug, kategori.nama as
            nama_kategori, users.nama as nama_penulis FROM ((artikel JOIN kategori ON kategori.id = artikel.id_kategori)
            JOIN users ON users.id = artikel.id_user) where artikel.id = '$id'" 
        );
        return $data_artikel;
    }

     //Menampilkan data berdasarkan id
    public function edit($id)
    {
        $data_artikel = mysqli_query(
            $this->koneksi,
            "SELECT * FROM artikel WHERE id = '$id'"
        );
        return $data_artikel;
    }

    // Mengupdate data berdasarkan id
    public function update($id, $judul, $slug, $konten, $foto, $tgl, $id_user, $id_kategori)
    {
        mysqli_query(
            $this->koneksi,
            "UPDATE artikel SET judul='$judul', slug='$slug', konten='$konten', foto='$foto', tgl='$tgl',
            id_user='$id_user', id_kategori='$id_kategori' WHERE id='$id'"
        );
    }

    // Menghapus data berdasarkan id
    public function delete($id)
    {
        mysqli_query($this->koneksi, "DELETE FROM artikel WHERE id='$id'");
    }
}
?>