<div class="container">

    <div class="alert alert-warning " role="alert">
        ไม่สามารถทำรายการได้ กรุณา<a href="<?= base_url() ?>login" class="alert-link">เข้าสู่ระบบ</a>
    </div>
    <div class="text-center">ไปหน้าเข้าสู่ระบบใน <span id="countdown"> 5 </span> วินาที</div>
</div>

<script>
    var timeleft = 4;
    var downloadTimer = setInterval(function() {
        document.getElementById("countdown").innerHTML = timeleft;
        timeleft -= 1;
        if (timeleft < 0) {
            clearInterval(downloadTimer);
            window.location = "<?= base_url('login') ?>";
        }
    }, 1000);
</script>