<div class="column">
    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pals as $pal): ?>
                <tr>
                    <td><?= $pal->id ?></td>
                    <td><?= $pal->name ?></td>
                    <td style="text-align: center">
                        <a href="<?= site_url('cities/edit/' . $pal->id) ?>"><i class="fas fa-edit"></i></a>
                        | <a href="<?= site_url('cities/delete/' . $pal->id) ?>"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>