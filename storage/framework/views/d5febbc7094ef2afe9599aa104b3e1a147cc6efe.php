

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
                        <td><div class="row valign-wrapper"><div class="col s12"> <?php echo e($bank->id); ?></div></div> </td>
                        <td>
                            <div class="row valign-wrapper">
                                <div class="col s2"><img src="<?php echo e(asset("storage/banks/images/{$bank->logo}")); ?>" class="bank-logo"></div>
                                <div class="col s10"><span class="left"><?php echo e($bank->name); ?></span></div>
                            </div>
                        </td>
                        <td>
                            <div class="row valign-wrapper">
                                <div class="col s12">
                                    <a href="<?php echo e(route('admin.banks.edit',['bank'=> $bank->id])); ?>">Editar</a> |
                                    <delete-action action="<?php echo e(route('admin.banks.destroy',['bank'=> $bank->id])); ?>" action-element="link-delete-<?php echo e($bank->id); ?>" csrf-token="<?php echo e(csrf_token()); ?>">
                                        <?php $modalId = "modal-delete-$bank->id";?>
                                        <a id="link-delete-<?php echo e($bank->id); ?>" href="#<?php echo e($modalId); ?>">Excluir</a>
                                        <modal :modal="<?php echo e(json_encode(['id' => $modalId])); ?>" style="display: none;">
                                            <div slot="content">
                                                <h4>Mensagem de confirmação</h4>
                                                <p><strong>Deseja excluir esse banco?</strong></p>
                                                <div class="divider"></div>
                                                <p>Nome: <strong><?php echo e($bank->name); ?></strong></p>
                                                <div class="divider"></div>
                                            </div>
                                            <div slot="footer">
                                                <button class="btn btn-flat waves-effect green lighten-2 modal-close modal-action" id="link-delete-<?php echo e($bank->id); ?>">OK</button>
                                                <button class="btn btn-flat waves-effect waves-red modal-close modal-action">Cancelar</button>
                                            </div>
                                        </modal>
                                    </delete-action>
                                </div>
                            </div>
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