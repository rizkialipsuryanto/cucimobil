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
    <!-- ../jasatiki/controller/site.php?fungsi=actionuploadbukti -->
            <form id="uploadForm" action="../jasatiki/controller/site.php?fungsi=actionuploadbukti" method="post" enctype='multipart/form-data'>
                <input type="hidden" name="id" value="<?php echo $g['pesanan_id']; ?>">
                <div class="form-group">
                    <label>No Bukti</label>
                    <input type="text" class="form-control" name="nobukti">
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tambah Ikon Gambar <span class="required">: </span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            
                                                <input type="file" name="file">
                                            </div>
                </div>
                
                  <!-- <button class="btn btn-primary" type="submit">Update</button> -->
                  <input type="submit" value="Upload" name="submit">
            </form>

            <?php
                if(isset($_POST["submit"]))
                {
                   $nama_gambar=$_FILES['file']['name'];
                    $uploaddir='static/';
                    $alamatfile=$uploaddir.$nama_gambar;
                    if(move_uploaded_file($_FILES['file']['tmp_name'],$alamatfile))
                    {
                        $query = mysql_query("UPDATE tr_pesanan set status = '6', no_bukti_pembayaran = '".$_POST['nobukti']."', upload_bukti = '".$alamatfile."' where pesanan_id = '".$_POST['id']."'");

                        if($query)
                          {
                            echo "<script language='javascript'>
                                  alert('Berhasil')
                                  document.location.href='../index_.php?halpelanggan=indexpesan'
                                </script>";
                          }
                         else
                          {
                            echo "<script language='javascript'>
                                  alert('Gagal')
                                  document.location.href='../index_.php?halpelanggan=indexpesan'
                                </script>";
                          }
                    }
                }

                ?>

<?php }} 
?>