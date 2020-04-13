<?php
	include "../config/koneksi.php";
	if($_GET['fungsi']=="actioninsertregistrasi")
	{
		$cek = mysql_query("SELECT * from tm_user where no_ktp = '".$_POST['ktp']."'");
		$data = mysql_fetch_array($cek);
		if(mysql_num_rows($cek) > 0){
			echo "<script language='javascript'>
		              alert('NIK sudah terdaftar')
		              document.location.href='register.php'
		              </script>";
		}
		else{
			$query = mysql_query("INSERT INTO tm_user (no_ktp, nama, alamat, kecamatan_id, kelurahan_id, kode_pos, jenis_kelamin_id, agama_id, tempat_lahir, tanggal_lahir, no_telp, password, jenis_user) VALUES ('".$_POST['ktp']."','".$_POST['nama']."','".$_POST['alamat']."','".$_POST['kecamatan']."','".$_POST['kelurahan']."','".$_POST['kodepos']."','".$_POST['jk']."','".$_POST['agama']."','".$_POST['tlahir']."','".$_POST['tgllahir']."', '".$_POST['telp']."','".$_POST['password']."','3')");

			if($query)
		      {
		        echo "<script language='javascript'>
		              alert('Anda berhasil membuat user')
		              document.location.href='../index.php'
		              </script>";
		      }
		     else
		      {
		        echo "<script language='javascript'>
		              alert('Data Gagal Ditambah')
		              document.location.href='register.php'
		              </script>";
		      }
		}
	}

	if($_GET['fungsi']=="actionstatus")
	{ 
		//$query = mysql_query("UPDATE tr_cuci set status = '2', id_user_pencuci = '".$_POST['pencuci']."' where no_cuci = '".$_POST['cuci_id']."'");

		$queryupdate = mysql_query("UPDATE tr_cuci 
							SET 
							status = '2',
							id_user_pencuci = '".$_POST['pencuci']."'
							WHERE no_cuci='".$_POST['cuciid']."'");  
		 
		echo "<script language='javascript'>
			              alert('Pesanan Telah Berhasil di verifikasi')
			              document.location.href='../index_.php?hal=datapesanan'
			  </script>"; 
			
	}

	if($_GET['fungsi']=="actionselesaipencuci")
	{

		$date = date("Y-m-d h:i:s");
		// echo $date;
		// die();
			$query = mysql_query("UPDATE tr_cuci set status = '3', pencuci_verif_at = '".$date."' where cuci_id = '".$_POST['cuci_id']."'");

			if($query)
		      {
		        echo "<script language='javascript'>
		              alert('Berhasil')
		              document.location.href='../index_.php?halpencuci=listjemput'
		     		</script>";
		      }
		     else
		      {
		        echo "<script language='javascript'>
		              alert('Gagal')
		              document.location.href='../index_.php?halpencuci=updatedatapesanan&pesanan_id=".$_POST['pesanan_id']."'
		     		</script>";
		      }
	}

	if($_GET['fungsi']=="actioneditberat")
	{
			$query = mysql_query("UPDATE tr_pesanan_detail set berat_barang_kg = '".$_POST['berat']."' where pesanan_detail_id = '".$_POST['id']."'");

			if($query)
		      {
		        echo "<script language='javascript'>
		              alert('Berhasil')
		              document.location.href='../index_.php?hal=updatedatapesanan&pesanan_id=".$_POST['pesanan_id']."'
		     		</script>";
		      }
		     else
		      {
		        echo "<script language='javascript'>
		              alert('Gagal')
		              document.location.href='../index_.php?halkurir=updatedatapesanan&pesanan_id='".$_POST['pesanan_id']."''
		     		</script>";
		      }
	}

	if($_GET['fungsi']=="actionuploadbukti")
	{ 
			// $fileToUpload = $_POST['file'];
			$nama_gambar=$_FILES['file']['name'];
		    $uploaddir='../static/';
		    $alamatfile=$uploaddir.$nama_gambar;
		    if(move_uploaded_file($_FILES['file']['tmp_name'],$alamatfile))
		    {
			
		    	$query =mysql_query("UPDATE tm_user set  fotosatu = '".$nama_gambar."' where no_ktp = '".$_POST['id']."'");
		    	// die();
				if($query)
			      {
			        echo "<script language='javascript'>
			              alert('Foto Berhasil ditambahkan')
			              document.location.href='../index_.php?halpelanggan=profile'
			     		</script>";
			      }
			     else
			      {
			        echo "<script language='javascript'>
			              alert('Gagal')
			              document.location.href='../index_.php?halpelanggan=profile'
			     		</script>";
			      }
		}		
	}

	if($_GET['fungsi']=="actionselesaikirim")
	{
			$query = mysql_query("UPDATE tr_pesanan set status = '7', no_resi = '".$_POST['resi']."' where pesanan_id = '".$_POST['pesanan_id']."'");

			if($query)
		      {
		        echo "<script language='javascript'>
		              alert('Berhasil')
		              document.location.href='../index_.php?hal=datapesanan'
		     		</script>";
		      }
		     else
		      {
		        echo "<script language='javascript'>
		              alert('Gagal')
		              document.location.href='../index_.php?hal=updatedatapesanan&pesanan_id=".$_POST['pesanan_id']."'
		     		</script>";
		      }
	}

	if($_GET['fungsi']=="actionterimatiki")
	{
		$queryberat = mysql_query("SELECT sum(berat_barang_kg) as total from tr_pesanan_detail where no_pesanan = '".$_POST['no_pesanan']."'");
		$row   = mysql_fetch_array($queryberat);
		$total = $row['total'];

		$query = mysql_query("UPDATE tr_pesanan set status = '5', total_berat_barang_kg = '".$total."' where pesanan_id = '".$_POST['pesanan_id']."'");

			if($query)
		      {

		      	$queryongkir = mysql_query("SELECT a.total_berat_barang_kg, sum(a.total_berat_barang_kg*b.ongkir_perkg) as ongkir from tr_pesanan a left join jenis_pelayanan b on a.id_jenis_pelayanan = b.id_jenis_pelayanan where pesanan_id = '".$_POST['pesanan_id']."'");
				$row   = mysql_fetch_array($queryongkir);
				$ongkir = $row['ongkir'];

				$updateongkir = mysql_query("UPDATE tr_pesanan set ongkir = '".$ongkir."' where pesanan_id = '".$_POST['pesanan_id']."'");

		        echo "<script language='javascript'>
		              alert('Berhasil')
		              document.location.href='../index_.php?hal=datapesanan'
		     		</script>";
		      }
		     else
		      {
		        echo "<script language='javascript'>
		              alert('Gagal')
		              document.location.href='../index_.php?hal=updatedatapesanan&pesanan_id=".$_POST['pesanan_id']."'
		     		</script>";
		      }
	}

	if($_GET['fungsi']=="actioninsertpelanggan")
	{
		// echo "<script language='javascript'>
		//               alert('Anda berhasil membuat user')
		//               document.location.href='../index_.php?hal=datapelanggan'
		//      </script>";
		$cek = mysql_query("SELECT * from tm_user where no_ktp = '".$_POST['ktp']."'");
		$data = mysql_fetch_array($cek);
		if(mysql_num_rows($cek) > 0){
			echo "<script language='javascript'>
		              alert('Anda berhasil membuat user')
		              document.location.href='../index_.php?hal=createdatapelanggan'
		     </script>";
		}
		else{
			$query = mysql_query("INSERT INTO tm_user (no_ktp, nama, alamat, kecamatan_id, kelurahan_id, kode_pos, jenis_kelamin_id, agama_id, tempat_lahir, tanggal_lahir, no_telp, password, jenis_user) VALUES ('".$_POST['ktp']."','".$_POST['nama']."','".$_POST['alamat']."','".$_POST['kecamatan']."','".$_POST['kelurahan']."','".$_POST['kodepos']."','".$_POST['jk']."','".$_POST['agama']."','".$_POST['tlahir']."','".$_POST['tgllahir']."', '".$_POST['telp']."','".$_POST['password']."','3')");

			if($query)
		      {
		        echo "<script language='javascript'>
		              alert('Anda berhasil membuat user')
		              document.location.href='../index_.php?hal=datapelanggan'
		     		</script>";
		      }
		     else
		      {
		        echo "<script language='javascript'>
		              alert('Anda berhasil membuat user')
		              document.location.href='../index_.php?hal=createdatapelanggan'
		     		</script>";
		      }
		}
	}

	if($_GET['fungsi']=="actionupdatepelanggan")
	{
			$query = mysql_query("UPDATE tm_user set no_ktp = '".$_POST['ktp']."', nama = '".$_POST['nama']."', alamat = '".$_POST['alamat']."', kecamatan_id = '".$_POST['kecamatan']."', kelurahan_id = '".$_POST['kelurahan']."', kode_pos = '".$_POST['kodepos']."', jenis_kelamin_id = '".$_POST['jk']."', agama_id = '".$_POST['agama']."', tempat_lahir = '".$_POST['tlahir']."', tanggal_lahir = '".$_POST['tgllahir']."', no_telp = '".$_POST['telp']."', password = '".$_POST['password']."' where user_id = '".$_POST['user']."'");

			if($query)
		      {
		        echo "<script language='javascript'>
		              alert('Berhasil')
		              document.location.href='../index_.php?hal=datapelanggan'
		     		</script>";
		      }
		     else
		      {
		        echo "<script language='javascript'>
		              alert('Gagal')
		              document.location.href='../index_.php?hal=createdatapelanggan'
		     		</script>";
		      }
	}

	if($_GET['fungsi']=="actioninsertkurir")
	{
		$cek = mysql_query("SELECT * from tm_user where no_ktp = '".$_POST['ktp']."'");
		$data = mysql_fetch_array($cek);
		if(mysql_num_rows($cek) > 0){
			echo "<script language='javascript'>
		              alert('Anda berhasil membuat user')
		              document.location.href='../index_.php?hal=createdatapencuci'
		     </script>";
		}
		else{
			$query = mysql_query("INSERT INTO tm_user (no_ktp, nama, alamat, kecamatan_id, kelurahan_id, kode_pos, jenis_kelamin_id, agama_id, tempat_lahir, tanggal_lahir, no_telp, password, jenis_user) VALUES ('".$_POST['ktp']."','".$_POST['nama']."','".$_POST['alamat']."','".$_POST['kecamatan']."','".$_POST['kelurahan']."','".$_POST['kodepos']."','".$_POST['jk']."','".$_POST['agama']."','".$_POST['tlahir']."','".$_POST['tgllahir']."', '".$_POST['telp']."','".$_POST['password']."','2')");

			if($query)
		      {
		        echo "<script language='javascript'>
		              alert('Anda berhasil membuat user')
		              document.location.href='../index_.php?hal=datapencuci'
		     		</script>";
		      }
		     else
		      {
		        echo "<script language='javascript'>
		              alert('Anda berhasil membuat user')
		              document.location.href='../index_.php?hal=createdatapencuci'
		     		</script>";
		      }
		}
	}

	if($_GET['fungsi']=="actionupdatepencuci")
	{
			$query = mysql_query("UPDATE tm_user set no_ktp = '".$_POST['ktp']."', nama = '".$_POST['nama']."', alamat = '".$_POST['alamat']."', kecamatan_id = '".$_POST['kecamatan']."', kelurahan_id = '".$_POST['kelurahan']."', kode_pos = '".$_POST['kodepos']."', jenis_kelamin_id = '".$_POST['jk']."', agama_id = '".$_POST['agama']."', tempat_lahir = '".$_POST['tlahir']."', tanggal_lahir = '".$_POST['tgllahir']."', no_telp = '".$_POST['telp']."', password = '".$_POST['password']."' where user_id = '".$_POST['user']."'");

			if($query)
		      {
		        echo "<script language='javascript'>
		              alert('Berhasil')
		              document.location.href='../index_.php?hal=datapencuci'
		     		</script>";
		      }
		     else
		      {
		        echo "<script language='javascript'>
		              alert('Gagal')
		              document.location.href='../index_.php?hal=createdatapencuci'
		     		</script>";
		      }
	}

	if($_GET['fungsi']=="actioninsertpesanan")
	{	
		$datenow = date('Y-m-d');
		// echo $datenow;
		// die();
		// membaca kode barang terbesar
		$query = "SELECT max(no_pesanan)+1 as maxKode FROM tr_pesanan";
		$hasil = mysql_query($query);
		$data  = mysql_fetch_array($hasil);
		$maxx = $data['maxKode'];
		$user_idd = $_POST['user_id'];
		$penerimaa = $_POST['penerima'];
		// $no_pesanan = sprintf($data['maxKode'] , $_POST['user_id'] , $_POST['penerima'] , $datenow);
		$no_pesanan = "TR/".$user_idd."/".$penerimaa."/".$datenow;
		// echo $no_pesanan;
		// die();
			if(isset($_POST["barang"]))
                    {

                    	$nama_gambar=$_FILES['file']['name'];
					    $uploaddir='../static/foto_barang/';
					    $alamatfile=$uploaddir.$nama_gambar;
					    if(move_uploaded_file($_FILES['file']['tmp_name'],$alamatfile))
					    {
	                    	$query = "INSERT INTO tr_pesanan (no_pesanan, id_pelanggan, nama_penerima, no_telp_penerima, id_lokasi, id_jenis_pelayanan, alamat_penerima, rt, rw, kelurahan, kecamatan,kabupaten , id_provinsi, kode_pos, status, update_foto_barang) VALUES ('".$no_pesanan."','".$_POST['user_id']."','".$_POST['penerima']."','".$_POST['telp']."','".$_POST['lokasi']."','".$_POST['jenislayananpesan']."','".$_POST['alamat_penerima']."','".$_POST['rt']."','".$_POST['rw']."','".$_POST['kelurahan']."', '".$_POST['kecamatan']."','".$_POST['kabupaten']."','".$_POST['provinsipesan']."','".$_POST['kodepos']."','1', '".$nama_gambar."')";
							$hasilquery = mysql_query($query);
	                        $hoby=$_POST["barang"];
	                        reset($hoby);
	                        while (list($key, $value) = each($hoby)) 
	                            {
	                                $rincian_hoby   =$_POST["barang"][$key];
	                                // $jenis_hoby     =$_POST["berat"][$key];

	                                $sql_hoby   ="INSERT INTO tr_pesanan_detail(no_pesanan,nama_barang)
	                                              VALUES('$no_pesanan','$rincian_hoby')";  
	                                $hasil_hoby =mysql_query($sql_hoby);    
	                            }

	                        echo "<script language='javascript'>
					              alert('Berhasil')
					              document.location.href='../index_.php?halpelanggan=indexpesan'
					     		</script>";
				     	}
                    }

		     else
		      {
		        echo "<script language='javascript'>
		              alert('Anda berhasil membuat user')
		              document.location.href='../index_.php?halpelanggan=createpesan'
		     		</script>";
		      }
	}

	if($_GET['fungsi']=="actioninsertpesananberat")
	{	
		// echo $_POST['barang'];
		// echo $_POST['berat'];
				if(isset($_POST["barang"]))
                    {
                        $hoby=$_POST["barang"];
                        reset($hoby);
                        while (list($key, $value) = each($hoby)) 
                            {
                                $rincian_hoby   =$_POST["barang"][$key];
                                $jenis_hoby     =$_POST["berat"][$key];

                                // echo $rincian_hoby;
                                // echo $jenis_hoby;
                                // die();
                                $sql_hoby   ="INSERT INTO tr_pesanan_detail(nama_barang,berat_barang_kg)
                                              VALUES('$rincian_hoby','$jenis_hoby')";  
                                $hasil_hoby =mysql_query($sql_hoby);    
                            }
                     }       
	}

	//=======================insert new banget gaess ==============================================================================

	if($_GET['fungsi']=="actioninsertdetailpesanan")
	{	
		$datenow = date('d/m/Y');   
		$nik 	 = $_POST['nik'];   
		$nmmobil = $_POST['nmmobil']; 

		$query = mysql_query("INSERT INTO tr_cuci_detail(mobil_id,pelanggan_id,tgl_pesan) 
                      VALUES ('".$nmmobil."','".$nik."','".$datenow."')");  

		echo "<meta http-equiv='refresh' content='0; url=../index_.php?halpelanggan=createpesan'>"; 
		 
	}

	if($_GET['fungsi']=="actioninsertakhirpesanan")
	{	  
		$nik 	 = $_POST['nik'];    
		$kode     = $_POST['txt_kode'];
		$tanggal     = $_POST['tanggal'];
		$jam     = $_POST['jam'];
		$fasilitas     = $_POST['fasilitas'];
		$cek     = $_POST['cek'];

		if(isset($_POST['cek'])):
			for ($i = 0; $i <= count($_POST['cek']); $i++):  
				if(isset($_POST['cek'][$i])): 
					$query =mysql_query("INSERT INTO tr_cuci_detail(no_cuci,pelanggan_id,mobil_id,tgl_pesan) 
                      VALUES ('".$kode."','".$nik."','".$_POST['cek'][$i]."','".$tanggal."')"); 
				endif; 
			endfor; 

		$query = mysql_query("INSERT INTO tr_cuci(no_cuci,pelanggan_id,status,tgl_pesan,id_jam,id_harga) 
                      VALUES ('".$kode."','".$nik."','1','".$tanggal."',".$jam.",'".$fasilitas."')"); 
		endif;    
		echo "<meta http-equiv='refresh' content='0; url=../index_.php?halpelanggan=validpesan'>"; 
		 
	}


	if($_GET['fungsi']=="actioninserthapusdetailpesanan")
	{	
		
		$no=$_GET['no'];   
		$query = mysql_query( "DELETE FROM tr_cuci_detail WHERE   cuci_detail_id='$no' ");  

		echo "<script>alert('Data berhasil dihapus !');</script>"; 
		echo "<meta http-equiv='refresh' content='0; url=../index_.php?halpelanggan=createpesan'>"; 
		 
	}
 
	if($_GET['fungsi']=="actionvalidpencuci")
	{	 
		$datenow = date('d/m/Y');  
		$cuciid 	 = $_POST['cuciid']; 
		$jmlmobil 	 = $_POST['jmlmobil'];  
		$biaya 	 	= $_POST['biaya'];    
		$totalbiaa = $jmlmobil * $biaya;

		$queryupdate = mysql_query("UPDATE tr_cuci
							SET status ='3' ,
								jumlah = ".$jmlmobil.",
								total_bayar =  '".$totalbiaa."',
								pencuci_verif_at =  '".$datenow."'

							WHERE no_cuci='".$cuciid."'");  
		// die();
		echo "<script>alert('Data berhasil diverifikasi !');</script>"; 
		echo "<meta http-equiv='refresh' content='0; url=../index_.php?halpencuci=listjemput'>"; 
		 
	}
	//=================================================kode 13/12/2019-=====================================================================
	if($_GET['fungsi']=="actioninsersetwaktu")
	{  
			$query = mysql_query("INSERT INTO tm_setwaktu (waktu, kuota) VALUES ('".$_POST['range']."','".$_POST['kuota']."')"); 
			if($query)
		      {
		        echo "<script language='javascript'>
		              alert('Data Tersimpan')
		              document.location.href='../index_.php?hal=setwaktu'
		     		</script>";
		      }
		     else
		      {
		        echo "<script language='javascript'>
		              alert('Data Gagal di Simpan')
		              document.location.href='../index_.php?hal=createsetwaktu'
		     		</script>";
		      } 
	}

	if($_GET['fungsi']=="actionupdatesetwaktu")
	{  
			$query = mysql_query("UPDATE tm_setwaktu set waktu = '".$_POST['range']."', kuota = '".$_POST['kuota']."' where id = '".$_POST['id']."'"); 
			if($query)
		      {
		        echo "<script language='javascript'>
		              alert('Data Tersimpan')
		              document.location.href='../index_.php?hal=setwaktu'
		     		</script>";
		      }
		     else
		      {
		        echo "<script language='javascript'>
		              alert('Data Gagal di Simpan')
		              document.location.href='../index_.php?hal=createsetwaktu'
		     		</script>";
		      } 
	}

	//insert harga cuci gaess
	if($_GET['fungsi']=="actioninserhargacuci")
	{  
			$query = mysql_query("INSERT INTO tm_hargacuci (jenis, harga) VALUES ('".$_POST['jenis']."','".$_POST['harga']."')"); 
			if($query)
		      {
		        echo "<script language='javascript'>
		              alert('Data Tersimpan')
		              document.location.href='../index_.php?hal=hargacuci'
		     		</script>";
		      }
		     else
		      {
		        echo "<script language='javascript'>
		              alert('Data Gagal di Simpan')
		              document.location.href='../index_.php?hal=createhargacuci'
		     		</script>";
		      } 
	}

	//update harga cuci gaess
	if($_GET['fungsi']=="actionupdatehargacuci")
	{  
			$query = mysql_query("UPDATE tm_hargacuci set jenis = '".$_POST['jenis']."',harga = '".$_POST['harga']."' where id = '".$_POST['id']."'"); 
			if($query)
		      {
		        echo "<script language='javascript'>
		              alert('Data Tersimpan') 
		              document.location.href='../index_.php?hal=hargacuci'
		     		</script>";
		      }
		     else
		      {
		        echo "<script language='javascript'>
		              alert('Data Gagal di Simpan')
		              document.location.href='../index_.php?hal=updatehargacuci'
		     		</script>";
		      } 
	}

	if($_GET['fungsi']=="actioninsertchat")
	{
		
		$query = mysql_query("INSERT INTO t_chat (chat, cuci_id) VALUES ('".$_POST['keterangan']."','".$_POST['cuci_id']."')");

			if($query)
		      {
		        echo "<script language='javascript'>
		              alert('Anda berhasil membuat keterangan')
		              document.location.href='../index_.php?hal=datapesanan'
		     		</script>";
		      }
		     else
		      {
		        echo "<script language='javascript'>
		              alert('Gagal')
		              document.location.href='../index_.php?hal=datapesanan'
		     		</script>";
		      }
	}


	if($_GET['fungsi']=="actioninsertkendaraan")
	{	    
			$query = mysql_query("INSERT INTO tm_userdetailmobil (nik, mobil) VALUES ('".$_POST['nik']."','".$_POST['mobil']."')"); 
			if($query)
		      {
		        echo "<script language='javascript'>
		              alert('Data Tersimpan')
		              document.location.href='../index_.php?halpelanggan=profile'
		     		</script>";
		      }
		     else
		      {
		        echo "<script language='javascript'>
		              alert('Data Gagal di Simpan')
		              document.location.href='../index_.php?halpelanggan=profile'
		     		</script>";
		      } 
		 
	}

	
 	if($_GET['fungsi']=="actioninsertpencuci")
	{
		$id = $_GET['id'];
		$iduser = $_GET['iduser'];

			$query = mysql_query("UPDATE tr_cuci set 
										id_user_pencuci = '".$iduser."',
										status = '2'

										WHERE no_cuci='".$id."' ");
// die();
			if($query)
		      {
		        echo "<script language='javascript'>
		              alert('Pencuci Berhasil di Simpan')
		              document.location.href='../index_.php?hal=datakurir'
		     		</script>";
		      }
		     else
		      {
		        echo "<script language='javascript'>
		              alert('Gagal')
		              document.location.href='../index_.php?hal=createdatakurir'
		     		</script>";
		      }
	}
	//=======================insert new banget gaess ==============================================================================

	if($_GET['fungsi']=="actionLogin"){
		$query = mysql_query("SELECT * from tm_user where no_ktp = '".$_POST['username']."' and password = '".$_POST['password']."'");
		$data = mysql_fetch_array($query);

		//jika login sukses
		if(mysql_num_rows($query) >= 1){
			//menyimpan session
			session_start(); // memulai fungsi session
			$_SESSION['SES_ID'] = $data['user_id'];
			$_SESSION['SES_USER'] = $data['no_ktp'];
			$_SESSION['SES_PASSWORD'] = $data['password'];
			$_SESSION['SES_NAMA'] = $data['nama'];
			$_SESSION['SES_JENISUSER'] = $data['jenis_user'];

			header("location:../index_.php"); // jika berhasil login, maka masuk ke file home.php
		}
		else {
			echo "
			<script>
				alert('Login Gagal');
				document.location.href='../index.php'
			</script>";
			exit; 
		}
		echo "berhasil";
	}
	if($_GET['fungsi']=="actionLogout"){
		session_start(); // memulai session
		 session_destroy(); // menghapus session
		 header("location:../index.php"); // mengambalikan ke form_login.php
	}
 ?>