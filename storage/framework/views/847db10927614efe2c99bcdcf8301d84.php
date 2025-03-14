<?php $__env->startSection('title', 'Категории - Управление товарами и заказами'); ?>
<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Категории</h1>
        <a href="<?php echo e(route('categories.create')); ?>" class="btn btn-success">Добавить категорию</a>
    </div>
    <div class="card">
        <div class="card-body">
            <?php if($categories->isEmpty()): ?>
                <p class="text-center">Категории не найдены.</p>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($category->id); ?></td>
                                    <td><?php echo e($category->name); ?></td>
                                    <td class="d-flex">
                                        <a href="<?php echo e(route('categories.show', $category)); ?>" class="btn btn-sm btn-info me-2">Просмотр</a>
                                        <a href="<?php echo e(route('categories.edit', $category)); ?>" class="btn btn-sm btn-primary me-2">Редактировать</a>
                                        <form action="<?php echo e(route('categories.destroy', $category)); ?>" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить эту категорию?');">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                                        </form>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/alpewa/Desktop/TestovoePHP/resources/views/categories/index.blade.php ENDPATH**/ ?>