<?php 
    include "../../../config/koneksi.php";
 
        if($_POST['pesanan_id']) {
            $id = $_POST['pesanan_id'];
            // mengambil data berdasarkan id
            // dan menampilkan data ke dalam form modal bootstrap
            $sql = "SELECT * FROM tr_pesanan WHERE pesanan_id = $id";
            $result = mysql_query($sql);
            while($g=mysql_fetch_array($result)){
                              @$no++; ?>
    <!-- MEMBUAT FORM -->
            <form action="../jasatiki/controller/site.php?fungsi=actionuploadbukti" method="post">
                <input type="hidden" name="id" value="<?php echo $g['pesanan_id']; ?>">
                <div class="form-group">
                    <label>No Bukti</label>
                    <input type="text" class="form-control" name="nobukti">
                </div>
                <div class="form-group">
                    <label>Upload File</label>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                </div>
                
                  <button class="btn btn-primary" type="submit">Update</button>
            </form>

<?php }} 
?>