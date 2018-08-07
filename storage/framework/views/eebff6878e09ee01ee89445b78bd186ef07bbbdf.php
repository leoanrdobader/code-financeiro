

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <h4>Novo banco</h4>
            <?php echo Form::open(['route' => 'admin.banks.store', 'files' => true]); ?>

                <?php echo $__env->make('admin.banks._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="row">
                    <?php echo Form::submit('Criar banco',['class'=>'btn waves-effect right']); ?>

                </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>