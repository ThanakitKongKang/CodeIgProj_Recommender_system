<head>
    <title><?= $title ?></title>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/login.css">
</head>

<body>
    <p><?= $this->session->userdata('msg'); ?></p>
   
        <form method="post" action="<?= site_url('authenticate') ?>">
            <input type="text" placeholder="ชื่อผู้ใช้" name="username" id="username" value="<?php echo set_value('username'); ?>">
            <input type="password" placeholder="รหัสผ่าน" name="password" id="password" value="<?php echo set_value('password'); ?>">
            <?php echo validation_errors('<span style="color:red">','</span><br>'); ?>
            <button type="submit" id="login-button">เข้าสู่ระบบ</button>
            <div id="message" class="text-center"></div>
        </form>

</body>