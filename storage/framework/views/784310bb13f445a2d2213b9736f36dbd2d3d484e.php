<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col s8 offset-s2 z-depth-2">
            <h3 class="center">Code Financeiro Admin</h3>

            <form method="POST" action="<?php echo e(env('URL_ADMIN_LOGIN')); ?>">
                <?php echo e(csrf_field()); ?>

                <div class="row">
                     <div class="input-field col s12">
                         <?php $messageError = $errors->has('password') ? "data-error='{ $errors->first('email')}'" : null ?>
                         <input id="email" type="email" class="validate <?php echo e($messageError ? 'invalide' : $messageError); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                         <label for="email" <?php echo $messageError; ?>>E-Mail</label>
                     </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <?php $messageError = $errors->has('password') ? "data-error='{ $errors->first('password')}'" : null ?>
                        <input id="password" type="password" class="validate <?php echo e($messageError ? 'invalide' : $messageError); ?>" name="password" value="<?php echo e(old('password')); ?>" required>
                        <label for="password" <?php echo $messageError; ?>>Senha</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input type="checkbox" name="remember">
                        <label for="remember">Lembrar-me</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <button type="submit" class="btn">Login</button>
                        <a class="btn btn-link" href="<?php echo e(url('/password/reset')); ?>">Esqueceu sua senha?</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>