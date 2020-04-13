<?php 
    include "../../../config/koneksi.php";
 
        if($_POST['pesanan_detail_id']) {
            $id = $_POST['pesanan_detail_id'];
            // mengambil data berdasarkan id
            // dan menampilkan data ke dalam form modal bootstrap
            $sql = "SELECT * FROM tr_pesanan_detail WHERE pesanan_detail_id = $id";
            $result = mysql_query($sql);
            while($g=mysql_fetch_array($result)){
                              @$no++; ?>
    <!-- MEMBUAT FORM -->
            <form action="update.php" method="post">
                <input type="hidden" name="id" value="<?php echo $g['pesanan_detail_id']; ?>">
                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" value="<?php echo $g['nama_barang']; ?>">
                </div>
                
                  <button class="btn btn-primary" type="submit">Update</button>
            </form>

<?php }} 
?>