<div class="column">
    <h2 class="title">Create Contact</h2>

    <?php echo validation_errors('<div class="notification is-danger">', '</div>'); ?>

    <form action="<?= base_url('contacts/store') ?>" method="POST">
        <div class="field">
            <label class="label">Contact Name</label>
            <div class="control">
                <input id="contact_name" name="contact_name" class="input" type="text" value="<?php echo set_value('contact_name'); ?>" placeholder="Type the contact name">
            </div>
        </div>
        <div class="field">
            <label class="label">Contact Number</label>
            <div class="control">
                <input id="contact_number" name="contact_number" class="input" type="text" value="<?php echo set_value('contact_number'); ?>" placeholder="Type the contact number">
            </div>
        </div>
        <div class="field">
            <label class="label">Email Address</label>
            <div class="control">
                <input id="email_address" name="email_address" class="input" type="email" value="<?php echo set_value('email_address'); ?>" placeholder="Type the email address">
            </div>
        </div>
        <div class="field">
            <label class="label">City</label>
            <div class="control select">
                <select id="city_id" name="city_id">
                    <option>--Select a city</option>
                    <?php foreach ($cities as $city): ?>
                    <option value="<?=$city->id?>"><?=$city->name?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link">Save Contact</button>
            </div>
        </div>
    </form>
</div>