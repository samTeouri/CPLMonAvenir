<?php $__env->startSection('main-content'); ?>
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    <?php echo e(substr($cours->nom, 0, 23)); ?>

                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Cours</li>
                        <li class="breadcrumb-item"><?php echo e(substr($cours->classe->nom, 0, 6)); ?></li>
                        <li class="breadcrumb-item"><a class="link-fx"
                                href="#"><?php echo e($cours->matiere->intitule); ?></a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">

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

        <div class="block block-rounded p-lg-5 p-3 mt-5">

            <form action="<?php echo e(route('cours.update', ['cours' => $cours->id])); ?>" method="post">
                <?php echo csrf_field(); ?>
                <h3><?php echo e($cours->matiere->intitule); ?></h3>

                <div class="col-12 py-3">
                    <div class="row justify-content-around mx-0 px-0">
                        <div class="form-group col-12 col-lg-6">
                            <label for="nom">Nom du cours</label>
                            <input type="text" class="form-control form-control-alt" id="nom" name="nom" value="<?php echo e($cours->nom); ?>" disabled/>
                        </div>
                        <div class="form-group col-12 col-lg-4">
                            <label for="intitule">Professeur</label>
                            <select class="form-control form-control-alt" id="professeur_id" name="professeur_id" style="width: 100%;"
                                data-placeholder="Choisissez un professeur">
                                <?php $__currentLoopData = $professeurs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $professeur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($professeur->id); ?>"
                                    <?php if($professeur->id == $cours->professeur->id): ?> selected <?php endif; ?>><?php echo e($professeur->nom); ?> <?php echo e($professeur->prenom); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group col-12 col-lg-2">
                            <label for="coefficient">Coefficient</label>
                            <input type="number" class="form-control form-control-alt" id="coefficient" name="coefficient"
                                placeholder="Coefficient" value="<?php echo e($cours->coefficient); ?>" />
                        </div>
                    </div>
                </div>
                <div class="d-flex mt-5">
                    <button class="btn btn-success" type="submit">Enregistrer modifications</button>
                </div>

            </form>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/CPLMonAvenir/CPLMonAvenirApp/resources/views/cours/show.blade.php ENDPATH**/ ?>