<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<?php if (!empty(session()->getFlashData('success'))) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="container d-flex justify-content-between mb-4">
    <h2><?= $pageTitle ?></h2>
    <a class="btn btn-primary align-bottom" href="<?= base_url() . route_to('users.create') ?>">Create New User</a>
</div>


<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th colspan="" scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($allUsers) === 0) : ?>
            <p>No users in the system</p>
        <?php else : ?>
            <?php foreach ($allUsers as $user) : ?>
                <tr>
                    <th scope="row"><?= $user['id'] ?></th>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td>
                        <a class="btn btn-primary" href="<?= base_url() . '/users/edit/' . $user['id'] ?>">Edit</a>
                        <a class="btn btn-primary" href="<?= base_url() . '/users/delete/' . $user['id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php endif ?>
    </tbody>
</table>
<?= $this->endSection() ?>