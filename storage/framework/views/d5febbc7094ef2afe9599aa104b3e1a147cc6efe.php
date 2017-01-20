<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <h4>Listagem de bancos</h4>
            <a href="<?php echo e(route('admin.banks.create')); ?>" class="btn waves-effect">Novo banco</a>
            <table class="bordered striped highlight centered responsive-table z-depth-5">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr>
                        <td><?php echo e($bank->id); ?></td>
                        <td><?php echo e($bank->name); ?></td>
                        <td>
                            <a href="<?php echo e(route('admin.banks.edit',['bank'=> $bank->id])); ?>">Editar</a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </tbody>
            </table>
            <?php echo $banks->links(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>