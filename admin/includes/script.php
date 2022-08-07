<script src="theme/vendor/global/global.min.js"></script>

<script src="theme/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="theme/js/custom.min.js"></script>
<script src="theme/js/deznav-init.js"></script>

<!-- Apex Chart -->
<script src="theme/vendor/apexchart/apexchart.js"></script>

<!-- Dashboard 1 -->
<script src="theme/vendor/nouislider/nouislider.min.js"></script>
<script src="theme/vendor/wnumb/wNumb.j"></script>
<script src="theme/vendor/nouislider/nouislider.min.js"></script>
<script src="theme/js/dashboard/dashboard-1.js"></script>
<script src="theme/js/Bootstrap/bootstrap.js"></script>

<script src="theme/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="theme/js/plugins-init/sweetalert.init.js"></script>
<script>
    function LengthConverter(valNum) {
        document.getElementById("outputLiters").innerHTML = valNum / 1000;
    }
    $(document).ready(function() {
        $.ajax({
            type: "GET",
            url: "include/tandon.php",
            data: {
                "id": <?php echo $id_tandon; ?>
            },
            success: function(data) {
                console.log(data)
            }
        });
    });
</script>