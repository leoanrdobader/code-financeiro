<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <?php echo Form::open(['route' => 'admin.banks.store']); ?>

                <div class="row">
                    <div class="input-field col s6">
                        <?php echo Form::label('name','Nome'); ?>

                        <?php echo Form::text('name',null); ?>

                    </div>
                </div>
                <div class="row">
                    <?php echo Form::submit('Criar banco',['class'=>'btn waves-effect']); ?>

                </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>