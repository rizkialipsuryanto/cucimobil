<?php 
include "../../../config/koneksi.php";  
    $data = mysql_query("SELECT * FROM view_user WHERE no_ktp = '".$_POST['pesanan_id']."' ");
    $gdiriket=mysql_fetch_array($data);  

?> 
            <form id="uploadForm" action="../cucimobil/controller/site.php?fungsi=actionuploadbukti" method="post" enctype='multipart/form-data'>
                <input type="hidden" name="id" value="<?=@$gdiriket['no_ktp']; ?>"> 
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12"> Gambar <span class="required">: </span>
                      </label> 
                      <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" name="file" id="file">
                      </div>
                </div> 
                  <input type="submit" value="Upload" class="btn btn-primary btn-block btn-flat" name="submit">
            </form> 