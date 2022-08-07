<!-- Main content -->
<div class="content-body">
  <div class="container-fluid">
    <div class="row page-titles mx-0">
      <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
          <h4>Tambah User</h4>
        </div>
      </div>
      <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
          <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah User</a></li>
        </ol>
      </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="row">
      <div class="col-xl-12 col-xxl-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Tambah User</h4>
            <a href="index.php?include=user" class="btn btn-danger">Kembali</a>
          </div> <?php if ((!empty($_GET['notif'])) && (!empty($_GET['jenis']))) { ?>
            <?php if ($_GET['notif'] == 'tambahkosong') { ?>
              <div class="alert alert-danger" role="alert">Maaf data <?php echo $_GET['jenis']; ?> wajib di isi</div>
          <?php }
                  } ?>
          <div class="card-body">

            <form class="form-horizontal" method="post" action="index.php?include=konfirmasi-tambah-user" enctype="multipart/form-data">
              <div class="form-group row">
                <label for="foto" class="col-sm-3 col-form-label">Foto </label>
                <div class="col-sm-7">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="foto" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="nama" id="nama" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="email" id="email" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="username" class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="username" id="username" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="password" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="password" id="password" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="level" class="col-sm-3 col-form-label">Level</label>
                <div class="col-sm-7">
                  <select class="form-control" id="level" name=level>
                    <option value="Superadmin">Superadmin</option>
                    <option value="User">User</option>
                  </select>
                </div>
              </div>
              <button type="submit" class="btn btn-info float-right" name="tambahuser"><i class="flaticon-381-plus"></i> Tambah</button>
          </div>
        </div>

      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <div class="col-sm-12">

        </div>
      </div>
      <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->

    </section>