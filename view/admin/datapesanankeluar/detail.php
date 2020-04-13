<?php 
    include "../../../config/koneksi.php";
 
        if($_POST['pesanan_detail_id']) {
            $id = $_POST['pesanan_detail_id'];
            // mengambil data berdasarkan id
            // dan menampilkan data ke dalam form modal bootstrap
            $sql = "SELECT a.*, b.* FROM tr_pesanan_detail a left join tr_pesanan b on a.no_pesanan = b.no_pesanan WHERE pesanan_detail_id = $id";
            $result = mysql_query($sql);
            while($g=mysql_fetch_array($result)){
                              @$no++; ?>
    <!-- MEMBUAT FORM -->
            <form action="../jasatiki/controller/site.php?fungsi=actioneditberat" method="post">
                <input type="hidden" name="id" value="<?php echo $g['pesanan_detail_id']; ?>">
                <input type="hidden" name="pesanan_id" value="<?php echo $g['pesanan_id']; ?>">
                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" value="<?php echo $g['nama_barang']; ?>" Readonly>
                </div>
                <div class="form-group">
                    <label>Berat</label>
                    <input type="text" class="form-control" name="berat" value="<?php echo $g['berat_barang_kg']; ?>">
                </div>
                  <button class="btn btn-primary" type="submit">Update</button>
            </form>

<?php }} 
?>