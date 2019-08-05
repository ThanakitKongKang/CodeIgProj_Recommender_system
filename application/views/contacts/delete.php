<div class="column">
    <h2 class="title">Edit Contact</h2>
    
    <?php echo validation_errors('<div class="notification is-danger">', '</div>'); ?>
    
    <form action="<?= base_url('contacts/destroy/'.$pal->id) ?>" method="POST">
        <div class="field">
            <label class="label">Contact Name</label>
            <div class="control">
                <input id="contact_name" name="contact_name" class="input" type="text" value="<?= $pal->contact_name ?>" readonly="1">
            </div>
        </div>
        <div class="field">
            <label class="label">Contact Number</label>
            <div class="control">
                <input id="contact_number" name="contact_number" class="input" type="text" value="<?= $pal->contact_number ?>" readonly="1">
            </div>
        </div>
        <div class="field">
            <label class="label">Email Address</label>
            <div class="control">
                <input id="email_address" name="email_address" class="input" type="email" value="<?= $pal->email_address ?>" readonly="1">
            </div>
        </div>
                <div class="field">
            <label class="label">City</label>
            <div class="control">
                <input id="city_id" name="city_id" class="input" type="text" value="<?= $pal->name ?>" readonly="1">
            </div>
        </div>
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-danger">Delete Contact</button>
            </div>
        </div>
    </form>
</div>