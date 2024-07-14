<?php
$sql_prem = $koneksi->query("SELECT * FROM tb_pdd WHERE jekel='PR'");
?>

<div class="card">
  <div class="card-header">
    <h3 class="card-title">
      <i class="fa fa-users"></i> Data Pengguna Perempuan
    </h3>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>NIK</th>
          <th>Nama</th>
          <th>Tempat Lahir</th>
          <th>Tanggal Lahir</th>
          <th>Desa</th>
          <th>RT/RW</th>
          <th>Agama</th>
          <th>Status Perkawinan</th>
          <th>Pekerjaan</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        while ($data = $sql_prem->fetch_assoc()) {
        ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $data['nik']; ?></td>
          <td><?php echo $data['nama']; ?></td>
          <td><?php echo $data['tempat_lh']; ?></td>
          <td><?php echo $data['tgl_lh']; ?></td>
          <td><?php echo $data['desa']; ?></td>
          <td><?php echo $data['rt'].'/'.$data['rw']; ?></td>
          <td><?php echo $data['agama']; ?></td>
          <td><?php echo $data['kawin']; ?></td>
          <td><?php echo $data['pekerjaan']; ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
