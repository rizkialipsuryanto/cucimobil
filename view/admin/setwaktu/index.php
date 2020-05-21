<?php 
    $data = mysql_query("SELECT * FROM tm_setwaktu");
 ?>
  <div class="container-fluid">
  <div class="card-footer">
      <a href='?hal=createsetwaktu'><u><i class='glyphicon glyphicon-trash icon-white'></i>Tambah Data</u></a>
  </div>
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Waktu </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5px">#</th>
                  <th>Waktu</th>
                  <th>Kuota</th> 
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php 
                while($g=mysql_fetch_array($data)){
                        @$no++;
                ?> 
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $g['waktu']?></td>
                      <td><?php echo $g['kuota']; ?></td>  
                      <td class="center">
                        <a href='?hal=updatesetwaktu&id=<?php echo $g['id'] ?>'><i class='glyphicon glyphicon-trash icon-white'></i>Edit</a>
                      </td>
                    </tr>
                    <?php
                    }  
                    ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>