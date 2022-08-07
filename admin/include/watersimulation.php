<html>

<head>
    <title>My first chart using FusionCharts Suite XT</title>
    <script type="text/javascript" src="theme/fusioncharts/js/fusioncharts.js"></script>
    <script type="text/javascript" src="theme/fusioncharts/js/fusioncharts.charts.js"></script>
    <script type="text/javascript" src="theme/fusioncharts/js/fusioncharts.theme.fint.js"></script>

    <script type="text/javascript">
        var NilaiAlert;
        var Loop = 0;
        var IDTandon;

        function Warning() {
            swal({
                title: "Tangki Air Sudah Penuh!",
                text: "Thank You!",
                type: "success"
            }).then(function() {
                window.location = "index.php?include=dashboard";
            });
        }

        function Automatics() {
            setInterval(function() {
                Loop++;
                jQuery.ajax({
                    url: "http://127.0.0.1/smartwaternative/admin/include/baca_table_db.php",
                    dataType: "json",
                    type: "GET",
                    success: function(data) {
                        console.log(data.sensor[0].nilai);
                        NilaiAlert = data.sensor[0].nilai;

                        if (Loop == 15) {
                            if ((NilaiAlert == 100)) {
                                Warning();
                                Loop = 0;
                            } else {
                                Loop = 0;
                            }
                        }

                        (fuelVolume < 10) ? (fuelVolume = 80) : "";
                        var consVolume = data.sensor[0].nilai;
                        FusionCharts("fuelMeter").feedData("&value=" + consVolume);
                        fuelVolume = consVolume;
                    }
                });
            }, 1000);
        }


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
                            "numberSuffix": " cm",
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
                            //  Automatics();
                        },
                        //Using real time update event to update the annotation
                        //showing available volume of Diesel
                        "realTimeUpdateComplete": function(evt, arg) {
                            var annotations = evt.sender.annotations,
                                dataVal = evt.sender.getData(),
                                colorVal = (dataVal >= 30) ? "#6caa03" : ((dataVal <= 2) ? "#e44b02" : "#f8bd1b");
                            //Updating value
                            annotations && annotations.update('rangeText', {
                                "text": dataVal + " ltrs"
                            });
                            //Changing background color as per value
                            annotations && annotations.update('rangeBg', {
                                "fillcolor": colorVal
                            });
                        }
                    }
                }).render();
        });
    </script>
</head>

<body>
    <br>
    <div id="chart-container-default"></div>
</body>

</html>