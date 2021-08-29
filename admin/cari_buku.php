
<?php
include '../config/koneksi.php';
$data = $_GET['kodebuku'];
$kode = "'" . str_replace(" ", "','", $data) . "'";
$sql = "SELECT * FROM buku WHERE id_buku in ($kode)";
$data = mysql_query($sql);
?>

<div class="card">
    <div class="card-header">
        <h5 class="text-center">Buku yang dipinjam : </h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Kode Buku</th>
                <th>Judul Buku</th>
                <th>Kategori</th>
            </tr>

            <?php if (mysql_num_rows($data) > 0): ?>
                <?php while($row = mysql_fetch_assoc($data)): ?>
                    <tr>
                        <td><?php echo $row['id_buku']; ?></td>
                        <td><?php echo $row['judul_buku']; ?></td>
                        <td><?php echo $row['kategori']; ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php endif; ?>
        </table>
    </div>
</div>

