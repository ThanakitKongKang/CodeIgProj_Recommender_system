<div class="column">
    <h2 class="title">Create Contact</h2>
    <form action="<?= base_url('contacts/store') ?>" method="POST">
        <div class="field">
            <label class="label">Contact Name</label>
            <div class="control">
                <input id="name" name="name" class="input" type="text" placeholder="Type the contact name">
            </div>
        </div>
        <div class="field">
            <label class="label">Contact Number</label>
            <div class="control">
                <input id="name" name="number" class="input" type="text" placeholder="Type the contact number">
            </div>
        </div>
        <div class="field">
            <label class="label">Email Address</label>
            <div class="control">
                <input id="email" name="email" class="input" type="email" placeholder="Type the email address">
            </div>
        </div>
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link">Save Contact</button>
            </div>
        </div>
    </form>
</div>