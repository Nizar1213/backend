<html>
  <head>
    <title>Form Ubah - CRUD Codeigniter</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
    <h1>Form Ubah Data Mahasiswa</h1>
    <hr>
    <div class="panel-group">
    <div class="panel panel-primary">
    <!-- Menampilkan Error jika validasi tidak valid -->
    <div style="color: red;"><?php echo validation_errors(); ?></div>
    <?php echo form_open("siswa/update/".$siswa->nim); ?>
    <div class="panel-body">
      <table cellpadding="8">
        <tr>
          <td>NIM</td>
          <td><input type="text" name="input_nim" class="form-control" value="<?php echo set_value('input_nim', $siswa->nim); ?>" readonly></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td><input type="text" name="input_nama" class="form-control" value="<?php echo set_value('input_nama', $siswa->nama); ?>"></td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td>
          <input type="radio" name="input_jeniskelamin" value="1" <?php echo set_radio('jeniskelamin', 'L', ($siswa->jeniskelamin == "Laki-laki")? true : false); ?>> Laki-laki
          <input type="radio" name="input_jeniskelamin" value="2" <?php echo set_radio('jeniskelamin', 'P', ($siswa->jeniskelamin == "Perempuan")? true : false); ?>> Perempuan
          </td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td><textarea name="input_alamat" class="form-control"><?php echo set_value('input_alamat', $siswa->alamat); ?></textarea></td>
        </tr>
      </table>
        
      <hr>
      <input type="submit" name="submit" value="Ubah">
      <a href="<?php echo base_url() ?>index.php/dashboard"><input type="button" value="Batal"></a>
    <?php echo form_close(); ?>
  </div>
</div>
</div>
</div>
  </body>
</html>

