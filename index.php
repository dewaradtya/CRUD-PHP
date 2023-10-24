<?php
// Buat koneksi database dengan memanggil file config/koneksi kalian
include_once("konfigurasi.php");
// Memanggil/read semua data dari table users
$result = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY id DESC");
?>
<html>

<head>
    <title>Homepage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Homepage</h1>
        <table class="w-full border border-gray-300">
            <tr>
                <th class="border bg-blue-500 text-white px-4 py-2">Id</th>
                <th class="border bg-blue-500 text-white px-4 py-2">Judul</th>
                <th class="border bg-blue-500 text-white px-4 py-2">Penulis</th>
                <th class="border bg-blue-500 text-white px-4 py-2">Penerbit</th>
                <th class="border bg-blue-500 text-white px-4 py-2">Nomor Inventaris</th>
                <th class="border bg-blue-500 text-white px-4 py-2">Aksi</th>
            </tr>
            <?php
            while ($user_data = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td class='border px-4 py-2'>" . $user_data['id'] . "</td>";
                echo "<td class='border px-4 py-2'>" . $user_data['judul_buku'] . "</td>";
                echo "<td class='border px-4 py-2'>" . $user_data['penulis'] . "</td>";
                echo "<td class='border px-4 py-2'>" . $user_data['penerbit'] . "</td>";
                echo "<td class='border px-4 py-2'>" . $user_data['nomor_inventaris'] . "</td>";
                echo "<td class='border px-4 py-2 text-center'><a href='update.php?id=$user_data[id]' class='text-black border bg-yellow-400 hover:bg-yellow-500 cursor-pointer px-2 py-2 mb-1'>Edit</a>  <a href='delete.php?id=$user_data[id]' class='text-black border bg-red-500 hover:bg-red-700 cursor-pointer px-2 py-2 mb-1'>Delete</a></td></tr>";
                }
            ?>
        </table>
        <a class="font-bold block mx-auto w-32 mt-6 bg-blue-500 text-white text-center py-2 rounded hover:bg-blue-700" href="add.php">Add New User</a>
    </div>
</body>

</html>