<?php
class Kategori extends Database
{
    // Menampilkan Semua Data
    public function index()
    {
        $datakategori = mysqli_query(
            $this->koneksi,
            "SELECT * FROM kategori"
        );
        return $datakategori;
    }

    // Menambah data
    public function create($nama, $slug){
        mysqli_query(
            $this->koneksi,
            "INSERT INTO kategori VALUES(null,'$nama','$slug')"
        );
    }

    // Menampilkan data
    public function show($id)
    {
        $datakategori = mysqli_query(
        $this->koneksi,
        "SELECT * FROM kategori WHERE id = '$id'"
        );
        return $datakategori;
    }

    // Menampilkan Data
    public function edit($id)
    {
        $datakategori = mysqli_query(
            $this->koneksi,
            "SELECT * FROM kategori WHERE id = '$id'"
        );
        return $datakategori;
    }

    //Mengupdate data berdasarkan id
    public function update($id, $nama, $slug)
    {
        mysqli_query(
            $this->koneksi,
            "UPDATE kategori SET nama='$nama', slug='$slug' WHERE id='$id'"
        );
    }

    // Menghapus data berdasarkan id
    public function delete($id)
    {
        mysqli_query($this->koneksi, "DELETE FROM kategori WHERE id='$id'");
    }
}
?>