<?php
$barang = [
    ['id' => 1,'nama' =>'buku','kategori'=> 'alat tulis','harga'=>2000],
    ['id' => 2, 'nama' => 'pulpen','kategori'=> 'alat tulis','harga'=>5000],
];

if (isset($_POST['tambah'])){
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $id = count($barang) + 1;

    $barang[] = ['id' => $id, 'nama' => $nama, 'kategori' => $kategori, 'harga' => $harga];
}
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    foreach ($barang as $key => $value) {
        if ($value['id'] == $id) {
            unset($barang[$key]);
        }
    }
}


if (isset($_POST['edit'])) {
    $idEdit = $_POST['id'];
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];

    foreach ($barang as &$item) {
        if ($item['id'] == $idEdit) {
            $item['nama'] = $nama;
            $item['kategori'] = $kategori;
            $item['harga'] = $harga;
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Barang</title>
</head>
<body>
    <h2>Tambah Barang</h2>
    <form action="" method="POST">
        <label for="nama">Nama Barang:</label><br>
        <input type="text" name="nama" required><br>
        <label for="kategori">Kategori Barang:</label><br>
        <input type="text" name="kategori" required><br>
        <label for="harga">Harga Barang:</label><br>
        <input type="number" name="harga" required><br><br>
        <button type="submit" name="tambah">Tambah</button>
    
    
    </form>

    
    <h2>Daftar Barang</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($barang as $item): ?>
                <tr>
                    <td><?php echo $item['id']; ?></td>
                    <td><?php echo $item['nama']; ?></td>
                    <td><?php echo $item['kategori']; ?></td>
                    <td><?php echo $item['harga']; ?></td>
                    <td>
                        <a href="?edit=<?php echo $item['id']; ?>">Edit</a> |
                        <a href="?hapus=<?php echo $item['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php if (isset($_GET['edit'])): ?>
        <?php
        $idEdit = $_GET['edit'];
        foreach ($barang as $item) {
            if ($item['id'] == $idEdit) {
                $editBarang = $item;
                break;
            }
        }
        ?>
        <h2>Edit Barang</h2>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $editBarang['id']; ?>">
            <label for="nama">Nama Barang:</label><br>
            <input type="text" name="nama" value="<?php echo $editBarang['nama']; ?>" required><br>
            <label for="kategori">Kategori Barang:</label><br>
            <input type="text" name="kategori" value="<?php echo $editBarang['kategori']; ?>" required><br>
            <label for="harga">Harga Barang:</label><br>
            <input type="number" name="harga" value="<?php echo $editBarang['harga']; ?>" required><br><br>
            <input type="submit" name="edit" value="Simpan Perubahan">
        </form>
    <?php endif; ?>
</body>
</html>