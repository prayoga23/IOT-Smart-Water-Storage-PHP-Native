
<?php

session_unset();
echo '<script>
    setTimeout(function() {
        swal({
            title: "Anda Berhasil Keluar!",
            text: "See You Next Time!",
            type: "success"
        }, function() {
            window.location = "index.php";
        });
    }, 1000);
</script>';
