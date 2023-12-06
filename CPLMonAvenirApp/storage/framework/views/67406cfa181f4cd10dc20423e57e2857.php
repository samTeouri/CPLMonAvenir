<?php $__env->startSection('main-content'); ?>
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Cours de <?php echo e($classe->nom); ?>

                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Cours</li>
                        <li class="breadcrumb-item"><?php echo e($classe->promotion->nom); ?>eme</li>
                        <li class="breadcrumb-item"><?php echo e($classe->nom); ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">
        <!---- Copiez collez (il s'agit des alertes pour le retour d'actions)----->

        <?php if($notification = Session::get('notification')): ?>
            <?php if($notification['type'] === 'success'): ?>
                <div class="alert alert-success alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p class="mb-0"><?php echo e($notification['message']); ?></p>
                </div>
            <?php endif; ?>
            <?php if($notification['type'] === 'warning'): ?>
                <div class="alert alert-warning alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p class="mb-0"><?php echo e($notification['message']); ?></p>
                </div>
            <?php endif; ?>
            <?php if($notification['type'] === 'error'): ?>
                <div class="alert alert-danger alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p class="mb-0"><?php echo e($notification['message']); ?></p>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <!---- Copiez collez ----->
        <div class="block block-rounded">
            <div class="block-header">
                <h3 class="block-title">Liste des cours</h3>
            </div>
            <div class="block-content">
                <p class="font-size-sm text-muted">
                    
                </p>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                        <thead>
                            <tr>
                                <th style="width: 200px;">Libellé</th>
                                <th class="text-center" style="width: 200px;">Professeur</th>
                                <th class="text-center" style="width: 200px;">Coefficient</th>
                                <th class="text-center" style="width: 200px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($cours): ?>
                                <?php $__currentLoopData = $cours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(Str::substr($cour->nom, 0, -17)); ?></td>
                                        <td class="text-center text-primary fw-bolder"><a href="#"><?php echo e($cour->professeur->nom); ?> <?php echo e($cour->professeur->prenom); ?></a></td>
                                        <td class="text-center"><?php echo e($cour->coefficient); ?></td>
                                        <td class="text-center">
                                            <a class="btn btn-success"
                                                href="<?php echo e(route('cours.show', $cour->id)); ?>"><i
                                                    class="si si-eye"></i> Détails</a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <tr>
                                    <td class="text-center h4 p-3" colspan="5">Pas de cours dans cette classe !</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/CPLMonAvenir/CPLMonAvenirApp/resources/views/cours/index.blade.php ENDPATH**/ ?>