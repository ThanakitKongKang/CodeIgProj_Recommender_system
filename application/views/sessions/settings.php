<!DOCTYPE html>
<html>
    <head>
        <title>Settings</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    </head>
    <body>
        <div class="container">
            <div class="column">
                <nav class="navbar" role="navigation" aria-label="main navigation">
                    <div id="navbarBasicExample" class="navbar-menu">
                        <div class="navbar-start">
                            <a href="<?= site_url('dashboard')?>" class="navbar-item">Dashboard</a>
                            <a href="<?= site_url('settings')?>" class="navbar-item">Settings</a>
                        </div>

                        <div class="navbar-end">
                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link"><?=$this->session->userdata('username');?></a>

                                <div class="navbar-dropdown">
                                    <a href="#" class="navbar-item">My Profile</a>
                                    <hr class="navbar-divider">
                                    <a href="<?= site_url('logout')?>" class="navbar-item">Sign out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <h3>Settings Page</h3>
            </div>
        </div>
    </body>
</html>