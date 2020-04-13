<script src="assets/vue/vue.js"></script>
<script src="assets/vue/vue.min.js"></script>
<div class="container-fluid">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Pesanan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create </li> -->
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- <a href="?hal=createpelangganpesan"><button type="submit" class="btn btn-primary">Create</button></a> -->
      
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Form</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <form>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Penerima</label>
                  <input type="text" class="form-control" placeholder="Penerima" name="penerima" required>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" class="form-control" placeholder="Alamat" name="alamat" required>
                </div>
                <div class="form-group">
                  <label>No Telp</label>
                  <input type="text" class="form-control" placeholder="No Telepon" name="telp" required>
                </div>
                <div class="form-group">
                  <label>Lokasi</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Jawa</option>
                    <option>Luar Jawa</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Jenis Layanan</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Jawa</option>
                    <option>Luar Jawa</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Alamat Penerima</label>
                  <input type="text" class="form-control" placeholder="Alamat Penerima" name="alamat_penerima" required>
                </div>
                <div class="form-group">
                  <label>Provinsi</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Jawa</option>
                    <option>Luar Jawa</option>
                  </select>
                </div>
                
                
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Kabupaten</label>
                  <input type="text" class="form-control" placeholder="Kabupaten" name="kabupaten" required>
                </div>
                <div class="form-group">
                  <label>Kecamatan</label>
                  <input type="text" class="form-control" placeholder="Kecamatan" name="kecamatan" required>
                </div>
                <div class="form-group">
                  <label>Kelurahan</label>
                  <input type="text" class="form-control" placeholder="Kelurahan" name="kelurahan" required>
                </div>
                  <div class="form-group">
                    <label>RT</label>
                    <input type="text" class="form-control" placeholder="RT" name="rt" required>
                  </div>
                  <div class="form-group">
                    <label>RW</label>
                    <input type="text" class="form-control" placeholder="RW" name="rw" required>
                  </div>
                <div class="form-group">
                    <label>Kode POS</label>
                    <input type="text" class="form-control" placeholder="kodepos" name="kodepos" required>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <div class="row">

        <div class="col-md-12">
          <div class="card">
            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Pesan</h3>
            </div>
            <!-- /.card-header -->
            <div id="app">
              <table width="100%" class="table table-bordered">
                <tbody>
                    <tr>
                        <td width="80%">
                           Nama Barang
                        </td>
                        <td width="30%">
                           Berat Barang Per Kg
                        </td>  
                    </tr>
                    <tr>
                        <td>
                          <input name="nama" class="form-control" v-model="tbl.nama" placeholder="Masukkan Nama Barang" /> 
                        </td>
                        <td>
                          <input name="berat" class="form-control" v-model="tbl.berat" placeholder="Masukkan Berat /Kg" /> 
                        </td>
                        <td>
                            <a @click="tambahalamat(tbl)" class="btn btn-primary">
                                <i class="fa fa-plus">
                                </i>
                            </a>
                        </td>
                    </tr>
                </tbody>
              </table>
              <table  class="table table-bordered">
                <tbody>
                    <tr track-by="$index" v-for="row in rows">
                        <!-- <td width="10%">
                            {{ $index +1 }}
                        </td> -->
                        
                        <td width="70%">
                            <input name="nama[]" readonly="" hidden="true" v-model="row.nama"/> 
                            <label>
                                {{ row.nama }}
                            </label>
                        </td>

                        <td width="20%">
                            <input name="berat[]" readonly="" hidden="true" v-model="row.berat"/> 
                            <label>
                                {{ row.berat }}
                            </label>
                        </td>
                        
                        <td>
                            <a @click="removeRow($index)" class="btn bg-red">
                                <i class="fa fa-times">
                                </i>
                            </a>
                        </td>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
            <!-- /.row -->
            <button type="submit" class="btn btn-primary">Create</button>
          </div>

          </form>
          <!-- /.card-body -->
          <div class="card-footer">
            Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
            the plugin.
          </div>
        </div>
      </div>
  </section>
</div>

<script> 
  var vm = new Vue({
    el: '#app',
    data: {
      rows: [   
    
      ],
      
      nama: '',
      berat: 0
    }, 
   
    methods: {
      addRow: function (index) {
        try {
          this.rows.splice(index + 1, 0, {});
        } catch(e)
        {
          console.log(e);
        }
      },
      removeRow: function (index) {
        this.rows.splice(index, 1);
      },
      tambahalamat: function(tbl) {
        this.rows.push({ 
        'nama': tbl.nama, 
        'berat': tbl.berat
        }); 

        this.tbl.nama = '';
        this.tbl.berat = ''; 
      } 
    }
  }); 

</script>