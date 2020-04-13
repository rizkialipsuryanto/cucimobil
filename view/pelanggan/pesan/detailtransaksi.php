<?php 
include "../../../config/koneksi.php";  
    $data = mysql_query("SELECT a.no_cuci,b.mobil
                                FROM tr_cuci_detail a
                                JOIN tm_userdetailmobil b ON a.mobil_id = b.id
                                WHERE a.no_cuci = '".$_POST['pesanan_id']."' "); 
?>  

                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th style="width: 10px">No.</th>
                            <th>ID Transaksi</th> 
                            <th>Mobil</th>  
                          </tr>
                        </thead>
                        <tbody>
                        <?php   
                          while($g=mysql_fetch_array($data)){
                                  @$no++;
                          ?>
                              <tr>
                                <td><?=@$no; ?></td>
                                <td><?=@$g['no_cuci'];?></td> 
                                <td><?=@$g['mobil'];?></td> 
                                <td> </td> 
                              </tr>
                              <?php }  ?> 
                        </tbody>
                      </table>