<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Управление товарами и заказами'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(route('home')); ?>">Магазин</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('home')); ?>">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('categories.index')); ?>">Категории</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('products.index')); ?>">Товары</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('orders.index')); ?>">Заказы</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> <?php /**PATH /Users/alpewa/Desktop/TestovoePHP/resources/views/layouts/app.blade.php ENDPATH**/ ?>