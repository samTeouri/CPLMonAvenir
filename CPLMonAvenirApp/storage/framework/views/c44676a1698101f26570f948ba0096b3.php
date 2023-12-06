<?php $__env->startSection('main-content'); ?>
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Liste des matières
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item"><?php echo e($annee); ?></li>
                        <li class="breadcrumb-item"><a class="link-fx" href="">Matières</a></li>
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
                <h3 class="block-title">Liste des matières</h3> <a class="btn btn-success"
                    href="<?php echo e(route('matiere.create')); ?>">Nouvelle matière</a>
            </div>
            <div class="block-content">
                <p class="font-size-sm text-muted">
                    Voici la liste des matières enseignées dans les différents niveaux de l'établissement.
                </p>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                        <thead>
                            <tr>
                                <th>Nom de la matière</th>
                                <th class="text-center">Niveaux d'enseignement</th>
                                <th class="text-center" style="width: 100px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($matieres): ?>
                                <?php $__currentLoopData = $matieres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $matiere): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="font-w600 font-size-sm">
                                            <?php echo e($matiere->intitule); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php $__currentLoopData = $matiere->promotions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promotion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span class="badge badge-primary"><?php echo e($promotion->nom); ?>eme</span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td class="text-center">
                                            <form action="<?php echo e(route('matiere.delete', $matiere->id)); ?>" method="post">
                                                <?php echo method_field('delete'); ?>
                                                <?php echo csrf_field(); ?>
                                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="2">Pas de matières disponibles</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/CPLMonAvenir/CPLMonAvenirApp/resources/views/matiere/index.blade.php ENDPATH**/ ?>