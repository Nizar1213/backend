<html>
  <head>
    <title>Form Tambah - Responsi CRUD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
    <h1>Form Tambah Data Siswa</h1>
    <hr>
    <div class="panel-group">
    <div class="panel panel-primary">
    <div style="color: red;"><?php echo validation_errors(); ?></div>
    <?php echo form_open("siswa/create"); ?>
    <div class="panel-body">
      <table cellpadding="8">
        <tr>
          <td>NIM</td>
          <td><input type="text" class="form-control" name="input_nim" value="<?php echo set_value('input_nim'); ?>"></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td><input type="text" class="form-control" name="input_nama" value="<?php echo set_value('input_nama'); ?>"></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td><textarea name="input_alamat" class="form-control"><?php echo set_value('input_alamat'); ?></textarea></td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td>
          <input type="radio" name="input_jeniskelamin" value="1" <?php echo set_radio('jeniskelamin', 'L'); ?>> Laki-laki
          <input type="radio" name="input_jeniskelamin" value="2" <?php echo set_radio('jeniskelamin', 'P'); ?>> Perempuan
          </td>
        </tr>
      </table>
        
      <hr>
      <input type="submit" name="submit" value="Simpan">
      <a href="<?php echo base_url() ?>index.php/dashboard"><input type="button" value="Batal"></a>
    <?php echo form_close(); ?>
  </div>
</div>
</div>
</div>
  </body>
</html>