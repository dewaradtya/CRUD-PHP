<?php
// Sisipkan konfigurasi database
include 'konfigurasi.php';

// Inisialisasi variabel untuk pesan kesalahan
$error = "";

// Tangani permintaan pembaruan data buku
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $judul_buku = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $nomor_inventaris = $_POST['nomor_inventaris'];

    // Query SQL untuk memperbarui data buku
    $sql = "UPDATE buku SET `judul_buku` = '$judul_buku', `penulis` = '$penulis', `penerbit` = '$penerbit', `nomor_inventaris` = '$nomor_inventaris' WHERE `id` = '$id'";

    if ($koneksi->query($sql) === TRUE) {
        header("Location: index.php"); // Redirect kembali ke halaman daftar buku setelah pembaruan berhasil
        exit();
    } else {
        $error = "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

// Ambil data buku berdasarkan ID
$id = $_GET['id'];
$sql = "SELECT * FROM buku WHERE `id` = $id";
$result = $koneksi->query($sql);
$row = $result->fetch_assoc();

// Tutup koneksi database
$koneksi->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="container mx-auto p-6">
    <h1 class="text-blue-500 mb-4 text-2xl font-bold">Edit Buku</h1>

    <!-- Formulir untuk mengedit data buku -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="w-1/2 bg-white p-4 rounded-lg shadow-md">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="mb-4">
            <label for="judul_buku" class="block text-sm font-medium text-gray-600">Judul:</label>
            <input type="text" name="judul_buku" id="judul_buku" value="<?php echo $row['judul_buku']; ?>" class="form-input border border-gray-300 p-2 w-full rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="penulis" class="block text-sm font-medium text-gray-600">Penulis:</label>
            <input type="text" name="penulis" id="penulis" value="<?php echo $row['penulis']; ?>" class="form-input border border-gray-300 p-2 w-full rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="penerbit" class="block text-sm font-medium text-gray-600">Penerbit:</label>
            <input type="text" name="penerbit" id="penerbit" value="<?php echo $row['penerbit']; ?>" class="form-input border border-gray-300 p-2 w-full rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="nomor_inventaris" class="block text-sm font-medium text-gray-600">Nomor Inventaris:</label>
            <input type="text" name="nomor_inventaris" id="nomor_inventaris" value="<?php echo $row['nomor_inventaris']; ?>" class="form-input border border-gray-300 p-2 w-full rounded-md" required>
        </div>


        <div class="text-red-500"><?php echo $error; ?></div>

        <button type="submit" class="btn btn-blue block w-20 mt-6 bg-blue-500 text-white font-bold text-center py-2 rounded hover:bg-blue-600">Save</button>
    </form>

    <a href="index.php" class="block w-32 mt-6 bg-red-500 text-white font-bold text-center py-2 rounded hover:bg-red-700">Batal</a>
</body>
</html>