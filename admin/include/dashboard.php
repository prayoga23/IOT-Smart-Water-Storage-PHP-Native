<?php
include("../koneksi/koneksi.php");
//get data jumlah //get profil
$tampil = "SELECT `level` FROM `user` where `id_user`='$id_user'"; //echo $sql;
$query = mysqli_query($koneksi, $tampil);
while ($data = mysqli_fetch_row($query)) {
    $level = $data[0];
}

//get data jumlah
//ambil data user yang berstatus user bukan admin
$get2 = mysqli_query($koneksi, "select * from user where level='User'");
$count2 = mysqli_num_rows($get2); //menghitung seluruh kolom yang statusnya user yang bukan superadmin
//hapus data tandon
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
    if ($_GET['aksi'] == 'hapus') {
        $nama_jenis_tandon = $_GET['data'];
        //hapus pilih tandon
        $sql_dh = "delete from `tandon` where `nama_jenis_tandon` = '$nama_jenis_tandon'";
        mysqli_query($koneksi, $sql_dh);
    }
}
?>


<body>

    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="form-head d-flex mb-0 mb-md-3 align-items-start">
                <div class="mr-auto d-none d-lg-block">
                    <h3 class="text-info font-w600">Welcome to Smart Water Storage</h3>
                    <p class="text-dark mb-0">You Login As <?php echo $level; ?> </p><br>
                    <?php if ($_SESSION['level'] == "Superadmin") {
                        if ($_SESSION['level'] == "Superadmin") { ?>
                            <div class="col-xl-8 col-lg-3 col-sm-3">
                                <div class="widget-stat card bg-danger">
                                    <div class="card-body  p-2">
                                        <div class="media">
                                            <span class="mr-1">
                                                <i class="flaticon-381-user-7"></i>
                                            </span>

                                            <div class="media-body text-white text-right">
                                                <p class="mb-1">Total Semua Pengguna User Yang Terdaftar</p>
                                                <h3 class="text-white"><?= $count2; ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="col-xl-6 d-inline-block">
                    <div class="card-fluid">
                        <div class="Ocean card-img-top img-fluid">
                            <svg class="Wave" viewBox="0 0 12960 1120">

                                <path d="M9720,320C8100,320,8100,0,6480,0S4860,320
                                ,3240,320,1620,0,0,0V1120H12960V0C11340,0,11340,320,9720,320Z">

                                    <animate dur="5s" repeatCount="indefinite" attributeName="d" values="
                                    M9720,320C8100,320,8100,0,6480,0S4860,320,3240,320,1620,0,0,0V1120H12960V0C11340,0,11340,320,9720,320Z;
                                    M9720,0C8100,0,8100,319,6480,319S4860,0,3240,0,1620,320,0,320v800H12960V320C11340,320,11340,0,9720,0Z;
                                    M9720,320C8100,320,8100,0,6480,0S4860,320,3240,320,1620,0,0,0V1120H12960V0C11340,0,11340,320,9720,320Z
                                    " />

                                </path>

                            </svg>
                        </div>
                        <?php if (!empty($_GET['notif'])) { ?>
                            <?php if ($_GET['notif'] == "airsudahpenuh") { ?>
                                <div class="card-footer alert alert-success solid card-img-bottom" role="alert">
                                    <strong class="card-text d-inline">Air Sudah Penuh</strong>
                                    <img class="float-right" src="images/backend/drop.png" width="30px">
                                </div>
                            <?php } else if ($_GET['notif'] == "airkurang") { ?>
                                <div class="card-footer alert alert-warning solid card-img-bottom" role="alert">
                                    <strong class="card-text d-inline">Air Masih Kurang</strong>
                                    <img class="float-right" src="images/backend/drop.png" width="30px">
                                </div>
                            <?php } ?>

                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6  col-xxl-6 col-lg-6 col-md-6">
                    <div class="card">
                        <?php if (!empty($_GET['notif'])) { ?>
                            <?php if ($_GET['notif'] == "hapusberhasil") { ?>
                                <div class="alert alert-success solid alert-right-icon alert-dismissible fade show">
                                    <span><i class="mdi mdi-check"></i></span>
                                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button> Tandon Berhasil Dihapus.
                                </div>
                            <?php } ?>
                        <?php } ?>

                        <div class="card-header border-0 pb-0">
                            <div class="dropdown custom-dropdown">
                                <select name="menutandon" id="pilihtandon" class="form-control">
                                    <option value='{"id_tandon":"0","status":"0"}' selected>SILAHKAN PILIH TANDON
                                    </option>

                                    <?php
                                    $sql_l = "SELECT * FROM `tandon`";
                                    $query_l = mysqli_query($koneksi, $sql_l);
                                    while ($data_l = mysqli_fetch_row($query_l)) {
                                        $id_tandon = $data_l[0];
                                        $nama_jenis_tandon = $data_l[1];
                                        $status = $data_l[2];
                                    ?>
                                        <option value='{"id_tandon": "<?= $id_tandon ?>","status":"<?= $status ?>"}'>
                                            <?= $nama_jenis_tandon ?></option>

                                    <?php
                                    }
                                    ?>

                                </select>
                            </div>

                            <a href="index.php?include=tambah-tandon" class="btn btn-info btn-sm"><i class="fa fa-plus"></i></a>
                            <a href="#" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </div>
                        <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
                        <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>

                        <script type="text/javascript">
                            var NilaiAlert;
                            var Loop = 0;
                            var IDTandon, NTandon;
                            var raw_data_tando = 0;
                            var data_tandon = 0;

                            function Warning() {
                                swal({
                                    title: "Tangki Air Sudah Penuh!",
                                    text: "Thank You!",
                                    type: "success",
                                    confirmButtonText: "Ok"
                                }, function() {
                                    window.location = "index.php?include=dashboard";
                                }, 1000);
                            }

                            function event() {

                            }


                            document.getElementById('pilihtandon').addEventListener('change', function() {
                                //alert("Tandon Aktif " + this.value);
                                raw_data_tandon = this.value
                                data_tandon = JSON.parse(raw_data_tandon)

                                console.log("CEK VALUE " + data_tandon.id_tandon)
                                if (data_tandon.id_tandon != 0) {
                                    if (data_tandon.status == 1) {
                                        document.getElementById('status-span').innerHTML =
                                            "<span class='badge light badge-success' style='font-size:20px;'> Tandon Sudah Aktif </span>";
                                        FusionCharts.ready(function() {
                                            var fuelVolume = 110,
                                                fuelWidget = new FusionCharts({
                                                    type: 'cylinder',
                                                    dataFormat: 'json',
                                                    id: 'fuelMeter',
                                                    renderAt: 'chart-container-default',
                                                    width: '340',
                                                    height: '350',
                                                    dataSource: {
                                                        "chart": {
                                                            "theme": "fusion",
                                                            "lowerLimit": "0",
                                                            "upperLimit": "100",
                                                            "lowerLimitDisplay": "Empty",
                                                            "upperLimitDisplay": "Full",
                                                            "numberSuffix": " %",
                                                            "showValue": "1",
                                                            "chartBottomMargin": "50",
                                                            "cyloriginx": "200",
                                                            "cyloriginy": "260",
                                                            "cylradius": "88",
                                                            "cylheight": "240",
                                                            "showValue": "0",
                                                            "cylFillColor": "#078ff5"
                                                        },
                                                        "value": "75",
                                                        "annotations": {
                                                            "origw": "400",
                                                            "origh": "190",
                                                            "autoscale": "1",
                                                            "groups": [{
                                                                "id": "range",
                                                                "items": [{
                                                                        "id": "rangeBg",
                                                                        "type": "rectangle",
                                                                        "x": "$canvasCenterX-45",
                                                                        "y": "$chartEndY-30",
                                                                        "tox": "$canvasCenterX+45",
                                                                        "toy": "$chartEndY-75",
                                                                        "fillcolor": "#6caa03"
                                                                    },
                                                                    {
                                                                        "id": "rangeText",
                                                                        "type": "Text",
                                                                        "fontSize": "20",
                                                                        "fillcolor": "#333333",
                                                                        "text": "80 %",
                                                                        "x": "$chartCenterX+45",
                                                                        "y": "$chartEndY-50"
                                                                    }
                                                                ]
                                                            }]
                                                        }

                                                    },
                                                    "events": {
                                                        "rendered": function(evtObj, argObj) {
                                                            setInterval(function() {
                                                                Loop++;
                                                                jQuery.ajax({
                                                                    url: "http://127.0.0.1/smartwaternative/admin/include/baca_table_db.php",
                                                                    dataType: "json",
                                                                    data: {
                                                                        idtd: data_tandon.id_tandon
                                                                    },
                                                                    type: "GET",
                                                                    success: function(response) {
                                                                        var trHTML = '';
                                                                        //console.log(data_tandon.id_tandon);
                                                                        $.each(response.sensor, function(index, item) {
                                                                            trHTML += '<tr>';
                                                                            trHTML += '<td>' + item.id +
                                                                                '</td>';
                                                                            trHTML += '<td>' + item.nilai +
                                                                                '</td>';
                                                                            trHTML += '<td>' + item.waktu +
                                                                                '</td>';
                                                                            trHTML += '</tr>';
                                                                        });
                                                                        $('#dataupdate').html(trHTML);

                                                                        //console.log(response.sensor[0].nilai);
                                                                        NilaiAlert = response.sensor[0].nilai;

                                                                        if (Loop == 15) {
                                                                            if (NilaiAlert == 98) {
                                                                                Warning();
                                                                                Loop = 0;
                                                                            } else {
                                                                                Loop = 0;
                                                                            }
                                                                        }

                                                                        fuelVolume < 10 ? (fuelVolume = 80) : "";
                                                                        var consVolume = response.sensor[0].nilai;
                                                                        FusionCharts("fuelMeter").feedData("&value=" + consVolume);
                                                                        fuelVolume = consVolume;
                                                                    },
                                                                });
                                                            }, 1000);

                                                        },
                                                        //Using real time update event to update the annotation
                                                        //showing available volume of Diesel
                                                        "realTimeUpdateComplete": function(evt,
                                                            arg) {
                                                            var annotations = evt.sender
                                                                .annotations,
                                                                dataVal = evt.sender.getData(),
                                                                colorVal = (dataVal >= 30) ?
                                                                "#6caa03" : ((dataVal <= 2) ?
                                                                    "#e44b02" : "#f8bd1b");
                                                            //Updating value
                                                            annotations && annotations.update(
                                                                'rangeText', {
                                                                    "text": dataVal + " %"
                                                                });
                                                            //Changing background color as per value
                                                            annotations && annotations.update(
                                                                'rangeBg', {
                                                                    "fillcolor": colorVal
                                                                });
                                                        }
                                                    }
                                                }).render();
                                        });
                                    } else {
                                        document.getElementById('status-span').innerHTML =
                                            "<span class='badge light badge-danger' style='font-size:20px;'> Tandon Belum Aktif </span>";
                                        FusionCharts.ready(function() {
                                            var fuelVolume = 110,
                                                fuelWidget = new FusionCharts({
                                                    type: 'cylinder',
                                                    dataFormat: 'json',
                                                    id: 'fuelMeter',
                                                    renderAt: 'chart-container-default',
                                                    width: '340',
                                                    height: '350',
                                                    dataSource: {
                                                        "chart": {
                                                            "theme": "fusion",
                                                            "lowerLimit": "0",
                                                            "upperLimit": "30",
                                                            "lowerLimitDisplay": "Full",
                                                            "upperLimitDisplay": "Empty",
                                                            "numberSuffix": " %",
                                                            "showValue": "1",
                                                            "chartBottomMargin": "50",
                                                            "cyloriginx": "200",
                                                            "cyloriginy": "260",
                                                            "cylradius": "88",
                                                            "cylheight": "240",
                                                            "showValue": "0",
                                                            "cylFillColor": "#078ff5"
                                                        },
                                                        "value": "1",
                                                        "annotations": {
                                                            "origw": "400",
                                                            "origh": "190",
                                                            "autoscale": "1",
                                                            "groups": [{
                                                                "id": "range",
                                                                "items": [{
                                                                        "id": "rangeBg",
                                                                        "type": "rectangle",
                                                                        "x": "$canvasCenterX-45",
                                                                        "y": "$chartEndY-30",
                                                                        "tox": "$canvasCenterX+45",
                                                                        "toy": "$chartEndY+75",
                                                                        "fillcolor": "#6caa03"
                                                                    },
                                                                    {
                                                                        "id": "rangeText",
                                                                        "type": "Text",
                                                                        "fontSize": "11",
                                                                        "fillcolor": "#333333",
                                                                        "text": "80 ltrs",
                                                                        "x": "$chartCenterX-45",
                                                                        "y": "$chartEndY+50"
                                                                    }
                                                                ]
                                                            }]
                                                        }

                                                    },
                                                    "events": {
                                                        "rendered": function(evtObj, argObj) {
                                                            setInterval(function() {
                                                                Loop++;
                                                                jQuery.ajax({
                                                                    url: "http://127.0.0.1/smartwaternative/admin/include/baca_table_db.php",
                                                                    dataType: "json",
                                                                    data: {
                                                                        idtd: data_tandon.id_tandon
                                                                    },
                                                                    type: "GET",
                                                                    success: function(response) {
                                                                        var trHTML = '';
                                                                        //data_tandon.id_tandon = 0;
                                                                        $.each(response.sensor, function(index, item) {
                                                                            trHTML += '<tr>';
                                                                            trHTML += '<td>' + item.id +
                                                                                '</td>';
                                                                            trHTML += '<td>' + item.nilai +
                                                                                '</td>';
                                                                            trHTML += '<td>' + item.waktu +
                                                                                '</td>';
                                                                            trHTML += '</tr>';
                                                                        });
                                                                        $('#dataupdate').html(trHTML);

                                                                        //console.log(response.sensor[0].nilai);
                                                                        NilaiAlert = response.sensor[0].nilai;

                                                                        if (Loop == 15) {
                                                                            if (NilaiAlert == 100) {
                                                                                Warning();
                                                                                Loop = 0;
                                                                            } else {
                                                                                Loop = 0;
                                                                            }
                                                                        }

                                                                        fuelVolume < 10 ? (fuelVolume = 80) : "";
                                                                        var consVolume = response.sensor[0].nilai;
                                                                        FusionCharts("fuelMeter").feedData("&value=" + consVolume);
                                                                        fuelVolume = consVolume;
                                                                    },
                                                                });
                                                            }, 1000);
                                                        },
                                                        //Using real time update event to update the annotation
                                                        //showing available volume of Diesel
                                                        "realTimeUpdateComplete": function(evt,
                                                            arg) {
                                                            var annotations = evt.sender
                                                                .annotations,
                                                                dataVal = evt.sender.getData(),
                                                                colorVal = (dataVal >= 30) ?
                                                                "#6caa03" : ((dataVal <= 2) ?
                                                                    "#e44b02" : "#f8bd1b");
                                                            //Updating value
                                                            annotations && annotations.update(
                                                                'rangeText', {
                                                                    "text": dataVal +
                                                                        " ltrs"
                                                                });
                                                            //Changing background color as per value
                                                            annotations && annotations.update(
                                                                'rangeBg', {
                                                                    "fillcolor": colorVal
                                                                });
                                                        }
                                                    }
                                                }).render();
                                        });
                                    }
                                } else {

                                    window.location.reload();
                                }

                            }, false);
                        </script>

                        <div class="card-body pt-3">
                            <div id="status-span"></div>
                            <br>
                            <div id="chart-container-default"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-xxl-6 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h4 class="card-title">Data Sensor IOT</h4>
                        </div>
                        <!-- Script JS -->
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

                        <div class="card-body pt-3">
                            <table class="display nowrap" style="width:100%" border="1" align="center">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nilai</th>
                                        <th scope="col">Waktu</th>
                                    </tr>
                                </thead>
                                <tbody id="dataupdate">

                                </tbody>
                            </table>
                            <br>

                            <button type="button" class="btn btn-success btn-sm" onclick="window.open('include/export_excel.php')"><img src="https://img.icons8.com/color/48/undefined/ms-excel.png" />Export
                                Excel</button>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</body>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Anda Yakin Ingin Menghapus Data Tandon Ini ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-dismiss="modal">Tidak</button>
                <a class="btn btn-danger" href="index.php?include=dashboard&aksi=hapus&data=<?php echo $nama_jenis_tandon; ?>&notif=hapusberhasil">Iya,
                    Hapus</a>
            </div>
        </div>
    </div>
</div>

</html>