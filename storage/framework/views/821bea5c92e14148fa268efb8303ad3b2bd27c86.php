<?php if($errors->any()): ?>
    
    <ul class="collection">
        <li class="collection-item red white-text"><strong>Foram encontrados os seguintes erros:</strong></li>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <li class="collection-item red white-text"><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </ul>
<?php endif; ?>