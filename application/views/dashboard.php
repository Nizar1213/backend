<!DOCTYPE html>
<html>
<head>
    <title> Dashboard - Login CodeIgniter & Bootstrap</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SISTEM INFORMASI UNIVERSITAS AHMAD DAHLAN</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <div class="navbar-form navbar-right">
                <a href="<?php echo base_url() ?>index.php/dashboard/logout" type="submit" class="btn btn-warning"><i class="fa fa-sign-out"></i> Logout</a>
            </div>
      </div>
    </nav>
<div class="container" style="margin-top: 80px">
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-dashboard"></i> Data Mahasiswa</h3>
              </div>
                  <div class="panel-heading">
                    <a href="<?php echo base_url() ?>index.php/siswa/create" type="submit" class="btn btn-success"><i class="fa fa-sign-out"></i> Tambah Data</a>
                  </div>
                <div class="panel-body">
                <table border="1" cellpadding="7" class="table table-bordered">
                  <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th colspan="2">Aksi</th>
                  </tr>
                  
                  <?php
                  if( ! empty($siswa)){
                    foreach($siswa as $data){
                      echo "<tr>
                      <td>".$data->nim."</td>
                      <td>".$data->nama."</td>
                      <td>".$data->alamat."</td>
                      <td>".$data->jeniskelamin."</td>
                      <td><a href='".base_url("index.php/siswa/update/".$data->nim)."'>Ubah</a></td>
                      <td><a href='".base_url("index.php/siswa/delete/".$data->id)."'>Hapus</a></td>
                      </tr>";
                    }
                  }else{
                    echo "<tr><td align='center' colspan='7'>Data Tidak Ada</td></tr>";
                  }
                  ?>
                </table>
                  </div>
                  <div class="navbar-form navbar-collapse">
                    <a href="<?php echo base_url() ?>index.php/api/siswa" type="submit" class="btn btn-info"><i class="fa fa-database"></i> Data Json</a>
                  </div>
                </div>
              </div>
    </div>
</div>
<script>
        $(document).ready(function() {
            // Untuk sunting
            $('#modal2').on('show.bs.modal', function (event) {
                var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                var modal          = $(this)

                // Isi nilai pada field
                modal.find('#id').attr("value",div.data('id'));
                modal.find('#nim').attr("value",div.data('nim'));
                modal.find('#nama').attr("value",div.data('nama'));
            });
        });
    </script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>