 <?php
session_start();

// tuliskan teks apa saja, termasuk tabel atau image
// untuk di konversi ke PDF
$html = "
<!--mpdf
<htmlpagefooter name='myfooter'>
<div style='border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; '>
<br>Copyrigth TEAM PROJECT INPUT DINAS</br>
</div>
</htmlpagefooter>
<sethtmlpagefooter name='myfooter' value='on' />

mpdf--><table width='100%'><tr><td width='30%'></td><td>
<h2 align='center'>TESTIMONI</h2></td><td width='30%'> ";
$html .="<hr><br>

<h3>TESTIMONI</h3><br>";
$sql="SELECT *FROM cuti WHERE no_cuti='$no_cuti' ";
$data=mysql_query($sql);
while ($tampil=mysql_fetch_array($data))
{
	$nama_user=$tampil['nama_user'];
	$email_user=$tampil['email_user'];
	$alamat_user=$tampil['alamat_user'];
	$jenis_kelamin=$tampil['jenis_kelamin'];
	$tanggal_lahir=$tampil['tanggal_lahir'];

$html .= '
<table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">

  <tbody>
    <tr>
      <td colspan="1" rowspan="6" style="vertical-align: top; width: 241px;">Gambar dinas<br>
      </td>
      <td style="vertical-align: top; width: 646px; text-align: center; font-weight: bold;">PEMERINTAH
KABUPATEN BANJARNEGARA<br>
      </td>
      <td colspan="1" rowspan="6" style="vertical-align: top; width: 157px;">Gambar Logo Sekolah<br>
      </td>
    </tr>
    <tr style="font-weight: bold;" align="center">
      <td style="vertical-align: top; width: 646px;">DINAS PENDIDIKAN,
PEMUDA DAN OLAHRAGA<br>
      </td>
    </tr>
    <tr align="center">
      <td style="vertical-align: top; width: 646px;"><span style="font-weight: bold;">$nama_user</span><br>
      </td>
    </tr>
    <tr align="center">
      <td style="vertical-align: top; width: 646px;">$jalan_sekolah,
$no_sekolah, fax_sekolah, $kecamatan<br>
      </td>
    </tr>
    <tr align="center">
      <td style="vertical-align: top; width: 646px;"><span style="font-weight: bold;">BANJARNEGARA $kode_pos</span><br>
      </td>
    </tr>
    <tr align="center">
      <td style="vertical-align: top; width: 646px;">$email_sekolah
&nbsp; $website_sekolah<br>
      </td>
    </tr>
    <tr align="center">
      <td colspan="3" rowspan="1" style="vertical-align: top;">garis
ireng<br>
      </td>
    </tr>
  </tbody>
</table>

<br>

<br>

<table style="text-align: left; width: 100%; height: 147px;" border="0" cellpadding="2" cellspacing="2">

  <tbody>
    <tr align="right">
      <td colspan="1" rowspan="1" style="vertical-align: top; width: 250px;"><br>
      </td>
      <td style="vertical-align: top; text-align: left;">$kecamatan,
$tgl_hari_ini</td>
    </tr>
    <tr align="right">
      <td colspan="1" rowspan="1" style="vertical-align: top; width: 250px;"><span style="font-weight: bold;"></span><br>
      </td>
      <td style="vertical-align: top; text-align: left;"><span style="font-weight: bold;">Kepada :</span></td>
    </tr>
    <tr>
      <td style="vertical-align: top; text-align: right; width: 787px;"><span style="font-weight: bold;">Yth.</span><br>
      </td>
      <td style="vertical-align: top; width: 250px; text-align: left;">Bapak
Kepala Sekolah/Pejabat/Guru<br>
      </td>
    </tr>
    <tr align="right">
      <td colspan="1" rowspan="1" style="vertical-align: top; width: 250px;"><span style="font-weight: bold;"></span><br>
      </td>
      <td style="vertical-align: top; text-align: left;"><span style="font-weight: bold;">Melalui</span></td>
    </tr>
    <tr>
      <td style="vertical-align: top;"></td>
      <td style="vertical-align: top; text-align: left;">Kepala Dinas
Pendidikan,</td>
    </tr>
    <tr>
      <td style="vertical-align: top;"></td>
      <td style="vertical-align: top; text-align: left;">Pemuda dan
Olah Raga</td>
    </tr>
    <tr>
      <td style="vertical-align: top;"></td>
      <td style="vertical-align: top; text-align: left;">Kabupaten
Banjanegara</td>
    </tr>
  </tbody>
</table>

<br>

<br>

<table style="text-align: left; width: 100%; height: 192px;" border="0" cellpadding="2" cellspacing="2">

  <tbody>
    <tr>
      <td style="vertical-align: top;">Yang bertanda tangan dibawah ini</td>
      <td style="vertical-align: top;">:</td>
      <td style="vertical-align: top;"></td>
    </tr>
    <tr>
      <td style="vertical-align: top;">Nama</td>
      <td style="vertical-align: top;">:</td>
      <td style="vertical-align: top;">$nama_guru</td>
    </tr>
    <tr>
      <td style="vertical-align: top;">NIP</td>
      <td style="vertical-align: top;">:</td>
      <td style="vertical-align: top;">$nip</td>
    </tr>
    <tr>
      <td style="vertical-align: top;">Pangkat, Golongan/Ruang</td>
      <td style="vertical-align: top;">:</td>
      <td style="vertical-align: top;">$pangkat</td>
    </tr>
    <tr>
      <td style="vertical-align: top;">Jabatan</td>
      <td style="vertical-align: top;">:</td>
      <td style="vertical-align: top;">$jabatan</td>
    </tr>
    <tr>
      <td style="vertical-align: top;">Satuan Organisasi</td>
      <td style="vertical-align: top;">:</td>
      <td style="vertical-align: top;">$satuan</td>
    </tr>
    <tr>
      <td rowspan="1" colspan="3" style="vertical-align: top;">Dengan
ini mengajukan pemintaan $jenis_cuti tahun $tahun_ini selama $lama_cuti
hari, tehitung mulai tanggal $tgl_mulai sampai dengan $tgl_akhir</td>
    </tr>
    <tr>
      <td colspan="3" rowspan="1" style="vertical-align: top;">Pada
tanggal $tgl_masuk, saya akan menjalankan tugas dinas/sekolah
sebagaimana mestinya.</td>
    </tr>
    <tr>
      <td colspan="3" rowspan="1" style="vertical-align: top;">Selama
menjalankan cuti alamat saya adalah di $alamat_guru.</td>
    </tr>
    <tr>
      <td colspan="3" style="vertical-align: top;">Demikian permintaan
ini saya buat untuk dapat dipertimbangkan sebagaimana mestinya.</td>
    </tr>
  </tbody>
</table>

<br>

<br>

<table style="text-align: left; width: 100%; height: 31px;" border="0" cellpadding="2" cellspacing="2">

  <tbody>
    <tr>
      <td style="vertical-align: top; width: 787px;"></td>
      <td style="vertical-align: top; width: 242px;">Hormat saya,</td>
    </tr>
  </tbody>
</table>

<br>

<br>

<table style="text-align: left; width: 100%; height: 60px;" border="0" cellpadding="2" cellspacing="2">

  <tbody>
    <tr>
      <td style="vertical-align: top; width: 786px;"></td>
      <td style="vertical-align: top; width: 242px;">$nama_guru</td>
    </tr>
    <tr>
      <td style="vertical-align: top; width: 786px;"></td>
      <td style="vertical-align: top; width: 242px;">NIP $nip</td>
    </tr>
  </tbody>
</table>
';
}

// mulai menggunakan mPDF
include('mpdf.php');
/*lihat method constructor pada file mpdf.php  
 /  disana terdapat penjelasan lebih detail tentang parameternya, 
   atau lihatlah dokumentasinya */

// A4 maksudnya ukuran kertas
$mpdf = new mPDF('utf-8', 'A4', 0, '', 10, 10, 5, 1, 1, 1, '');
$mpdf->WriteHTML($html);
$mpdf->Output();
?>