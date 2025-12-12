<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Music Shop' ?></title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/music-shop/public/css/style.css">
</head>

<body class="d-flex flex-column min-vh-100">

<header class="bg-dark text-white">
    <nav class="navbar navbar-expand-lg navbar-dark container">
        <a class="navbar-brand" href="/">Music Shop</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link <?= ($_GET['r'] ?? '') === 'catalog' ? 'active' : '' ?>" href="/">Catalog</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($_GET['r'] ?? '') === 'news' ? 'active' : '' ?>" href="/?r=news">News</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($_GET['r'] ?? '') === 'gallery' ? 'active' : '' ?>" href="/?r=gallery">Gallery</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($_GET['r'] ?? '') === 'pages' ? 'active' : '' ?>" href="/?r=pages">Pages</a>
                </li>

            </ul>

            <ul class="navbar-nav">

                <?php if(\App\Core\Auth::check()): ?>
                    <li class="nav-item">
                        <a class="btn btn-warning btn-sm me-2" href="/?r=admin">Admin</a>
                    </li>
                    <li class="nav-item">
    <a class="btn btn-info btn-sm me-2" href="/?r=support">Support</a>
</li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light btn-sm" href="/?r=logout">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="btn btn-outline-light btn-sm" href="/?r=login">Login</a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
    </nav>
</header>

<div class="container flex-grow-1 mt-4">
