<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!-- <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark"> -->


        <div class="container-fluid">
            <h3 class="text-info px-5">User Management System</h3>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if (session()->has('logged_in')) : ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= base_url() . route_to('users.index') ?>">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() . route_to('logout') ?>">Logout</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() . route_to('login.form') ?>">Login</a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>
            <?php if (session()->has('logged_in')) : ?>
                <span class="text-info"><?php
                                        session()->get('userdata')['username']; ?></span>
            <?php endif ?>
        </div>
    </nav>
    <div class="container mt-3">
        <?= $this->renderSection('content') ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>