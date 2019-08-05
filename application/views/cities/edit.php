<div class="column">
    <h2 class="title">Edit City</h2>

    <?php echo validation_errors('<div class="notification is-danger">', '</div>'); ?>

    <form action="<?= base_url('cities/update/'.$city->id) ?>" method="POST">
        <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input id="name" name="name" class="input" type="text" value="<?=$city->name?>" placeholder="Type the contact name">
            </div>
        </div>
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-success">Update City</button>
            </div>
        </div>
    </form>
</div>