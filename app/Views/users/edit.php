<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h1 class="mb-4"><?= $pageTitle ?></h1>
<?= validation_list_errors() ?>
<?= form_open('users/update/' . $userToEdit['id']) ?>
<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" name="name" id="name" value="<?= $userToEdit['name'] ?>" placeholder="Enter Your Name..">
</div>
<div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" name="username" id="username" value="<?= $userToEdit['username'] ?>" placeholder="Enter Your Username..">
</div>
<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" id="email" value="<?= $userToEdit['email'] ?>" placeholder="Enter Your Email..">
</div>
<div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="password" value="" placeholder="Enter Your Password..">
</div>
<button type="submit" class="btn btn-primary mt-3">Submit</button>
<a class="btn btn-primary mt-3" href="<?= base_url() . route_to('users.index') ?>">Back</a>

<!-- </form> -->
<?= form_close() ?>
<?= $this->endSection() ?>