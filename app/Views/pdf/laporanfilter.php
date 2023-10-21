<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body {
      align-items: center;
    }
  </style>
</head>

<body>
  <img src="assets/images/kopsurat.png" alt="">
  <div style="text-align: center; font-size: 12;">
    <b>KARTU INVENTARIS RUANGAN</b>
  </div>
  <?php
  $firstData = null; // Inisialisasi variabel untuk menyimpan data pertama

  foreach ($databarang as $data) {
    $firstData = $data; // Simpan data pertama
    break; // Hentikan loop setelah mengambil data pertama
  }
  ?>

  LOKASI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?= $firstData['nama_lokasi'] ?></b><br><br>
  <table style="text-align: center;">
    <tr style="background-color: #B6FFFA;">
      <th width="3%" style="text-align: center; vertical-align: middle; height:20px; border: 1px solid #000;">No</th>
      <th width="30%" style="text-align: center; vertical-align: middle; height:20px; border: 1px solid #000;">Jenis Barang</th>
      <th width="10%" style="text-align: center; vertical-align: middle; height:20px; border: 1px solid #000;">Merk / Type</th>
      <th width="5%" style="text-align: center; vertical-align: middle; height:20px; border: 1px solid #000;">Bahan</th>
      <th width="5%" style="text-align: center; vertical-align: middle; height:20px; border: 1px solid #000;">Tahun</th>
      <th width="10%" style="text-align: center; vertical-align: middle; height:20px; border: 1px solid #000;">Kode Barang</th>
      <th width="6%" style="text-align: center; vertical-align: middle; height:20px; border: 1px solid #000;">Jumlah Registrasi</th>
      <th width="15%" style="text-align: center; vertical-align: middle; height:20px; border: 1px solid #000;">Harga</th>
      <th width="10%" style="text-align: center; vertical-align: middle; height:20px; border: 1px solid #000;">Kondisi</th>
    </tr>


    <tbody>
      <?php $no = 1  ?>
      <?php foreach ($databarang as $data) { ?>
        <tr>
          <td style="border: 1px solid #000;"><?= $no++ ?></td>
          <td style="border: 1px solid #000; text-align:left;"><?= $data['jenis_brg'] ?></td>
          <td style="border: 1px solid #000;"><?= $data['merk'] ?></td>
          <td style="border: 1px solid #000;"><?= $data['tahun'] ?></td>
          <td style="border: 1px solid #000;"><?= $data['bahan'] ?></td>
          <td style="border: 1px solid #000;"><?= $data['kode_brg'] ?></td>
          <td style="border: 1px solid #000;"><?= $data['noreg'] ?></td>
          <td style="border: 1px solid #000;">Rp. <?= number_format($data['harga'], 0, ',', '.') ?>,-</td>
          <td style="border: 1px solid #000;"><?= $data['kondisi'] ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <br><br>
  <table style="text-align: center;">
    <tr>
      <td colspan="3"></td>
      <td>Oksibil,
        <?php
        $tanggalObj = new DateTime($tanggal);
        $tanggalBaru = $tanggalObj->format('d F Y');
        echo $tanggalBaru;
        ?>
      </td>
    </tr>
    <tr>
      <td colspan="3"></td>
      <td></td>
    </tr>
    <tr>
      <td>SEKRETARIS DAERAH</td>
      <td></td>
      <td>PENGURUS BARANG</td>
      <td>BAGIAN UMUM</td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td><u><b><?= $sekretaris; ?></b></u></td>
      <td></td>
      <td><u><b><?= $penguna; ?></b></u></td>
      <td><u><b><?= $bagianumum; ?></b></u></td>
    </tr>
    <tr>
      <td>NIP. <?= $sekretarisnip; ?></td>
      <td></td>
      <td>NIP. <?= $pengunanip; ?></td>
      <td>NIP. <?= $bagianumumnip; ?></td>
    </tr>
  </table>
</body>

</html>