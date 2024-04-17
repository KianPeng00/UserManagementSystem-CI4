<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<?= validation_list_errors() ?>

<?php if (!empty(session()->getFlashData('fail'))) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('fail') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<h1 class="mb-4"><?= $pageTitle ?></h1>
<?= form_open('/login') ?>
<div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username') ?>" placeholder="Enter Your Username..">
</div>
<div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="password" value="<?= set_value('password') ?>" placeholder="Enter Your Password..">
</div>
<button type="submit" class="btn btn-primary mt-3">Login</button>
<?= form_close() ?>
<?= $this->endSection() ?>