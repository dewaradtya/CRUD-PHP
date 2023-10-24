<html>
<head>
<title>Add Users</title>
<script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <a href="index.php" class="text-blue-500 text-2xl font-bold mb-6">Go to Home</a>
        <br><br>
        <form action="add.php" method="post" name="form1" class="w-1/2 bg-white p-4 rounded-lg shadow-md">
            <div class="mb-4">
                <label for="judul_buku" class="block text-sm font-medium text-gray-600">Judul</label>
                <input type="text" name="judul_buku" id="judul_buku" class="border border-gray-300 p-2 w-full rounded-md">
            </div>
            <div class="mb-4">
                <label for="penulis" class="block text-sm font-medium text-gray-600">Penulis</label>
                <input type="text" name="penulis" id="penulis" class="border border-gray-300 p-2 w-full rounded-md">
            </div>
            <div class="mb-4">
                <label for="penerbit" class="block text-sm font-medium text-gray-600">Penerbit</label>
                <input type="text" name="penerbit" id="penerbit" class="border border-gray-300 p-2 w-full rounded-md">
            </div>
            <div class="mb-4">
                <label for="nomor_inventaris" class="block text-sm font-medium text-gray-600">Nomor Inventaris</label>
                <input type="text" name="nomor_inventaris" id="nomor_inventaris" class="border border-gray-300 p-2 w-full rounded-md">
            </div>
            <div class="mt-4">
                <button type="submit" name="Submit" class="bg-blue-500 w-20 text-white font-bold p-2 rounded-md hover:bg-blue-700 cursor-pointer">Add</button>
            </div>
        </form>
    <?php
    // Check jika form disubmit. masukkan data form ke table users
    if(isset($_POST['Submit'])) {
    $judul_buku = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $nomor_inventaris = $_POST['nomor_inventaris'];
    // memanggil koneksi database kemmbali
    include_once("konfigurasi.php");
    // masukkan data ke table
    $result = mysqli_query($koneksi,"INSERT INTO buku (judul_buku,penulis,penerbit,nomor_inventaris)VALUES('$judul_buku','$penulis','$penerbit','$nomor_inventaris')");
    // Show message when user added
    echo"User added successfully. <a href='index.php'>View Users</a>";
    }
    ?>
</body>
</html>