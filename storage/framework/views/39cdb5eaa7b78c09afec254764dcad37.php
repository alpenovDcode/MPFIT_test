<?php $__env->startSection('title', 'Просмотр категории - Управление товарами и заказами'); ?>
<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Просмотр категории</h1>
        <div>
            <a href="<?php echo e(route('categories.edit', $category)); ?>" class="btn btn-primary me-2">Редактировать</a>
            <a href="<?php echo e(route('categories.index')); ?>" class="btn btn-secondary">Назад к списку</a>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Информация о категории</h5>
            <div class="mb-3">
                <strong>ID:</strong> <?php echo e($category->id); ?>

            </div>
            <div class="mb-3">
                <strong>Название:</strong> <?php echo e($category->name); ?>

            </div>
            <div class="mb-3">
                <strong>Дата создания:</strong> <?php echo e($category->created_at->format('d.m.Y H:i:s')); ?>

            </div>
            <div class="mb-3">
                <strong>Дата обновления:</strong> <?php echo e($category->updated_at->format('d.m.Y H:i:s')); ?>

            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Товары в этой категории</h5>
            <?php if($category->products->isEmpty()): ?>
                <p class="text-center">В этой категории нет товаров.</p>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Цена</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($product->id); ?></td>
                                    <td><?php echo e($product->name); ?></td>
                                    <td><?php echo e(number_format($product->price, 2, '.', ' ')); ?> ₽</td>
                                    <td>
                                        <a href="<?php echo e(route('products.show', $product)); ?>" class="btn btn-sm btn-info">Просмотр</a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/alpewa/Desktop/TestovoePHP/resources/views/categories/show.blade.php ENDPATH**/ ?>