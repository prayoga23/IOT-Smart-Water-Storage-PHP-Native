<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>

  <div class="card">
    <div class="card-header text-white text-center font-weight-bold bg-primary">
      Tell Me Your Experience This App
    </div>
    <div class="card-body ">
      <form name="index" id="index" method="post" action="index.php?include=konfirmasi-post">
        <div class="form-group">
          <label for="exampleInputEmail1">Nama</label>
          <input type="text" id="nama" name="nama" class="form-control" required="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Pekerjaan</label>
          <input type="text" id="asal" name="pekerjaan" class="form-control" required="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Description</label>
          <textarea name="description" class="form-control" required=""></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="tambahpost"><i class="flaticon-381-save"></i>Submit</button>
      </form>
    </div>
  </div>
</body>

</html>