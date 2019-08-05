<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?=$title?></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    </head>
    <body>
        <section class="section">
            <div class="container">
                <h1 class="title">CI Contacts v1</h1>
                <h2 class="subtitle">CodeIgniter contacts management app</h2>
                <div class="columns">
                    <div class="column is-one-quarter">
                        <aside class="menu">
                            <p class="menu-label">
                                Contacts
                            </p>
                            <ul class="menu-list">
                                <li><a class="is-active" href="<?=site_url('contacts')?>">List Contacts</a></li>
                                <li><a href="<?=site_url('contacts/create')?>">New Contact</a></li>
                            </ul>
                            <p class="menu-label">
                                Cities
                            </p>
                            <ul class="menu-list">
                                <li><a href="<?=site_url('cities')?>">List Cities</a></li>
                                <li><a href="<?=site_url('cities/create')?>">New City</a></li>
                            </ul>
                        </aside>
                    </div>