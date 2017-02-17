<?php echo $__env->make('errors._error_field', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $errorClass = ($errors->first('name') ? ['class' => 'validate invalid'] : []); ?>
<div class="row">
    <div class="input-field col s6">
        <?php echo Form::text('name',null,$errorClass); ?>

        <?php echo Form::label('name','Nome',['data-error' => $errors->first('name')]); ?>

    </div>
    <div class="input-field file-field col s6">
        <div class="btn">
            <span>Logo</span>
            <?php echo Form::file('logo'); ?>

        </div>
        <div class="file-path-wrapper">
            <input type="text" class="file-path"/>
        </div>
    </div>
</div>