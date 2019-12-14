<?php $__env->startSection('title'); ?>
  Catalog
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <?php echo $__env->make('inc.search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php if(count($flowers) > 0): ?>
    <div class="container">
      <div class="row justify-content-center">
        <?php $__currentLoopData = $flowers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a href="/flowers/<?php echo e($flower->id); ?>" class="text-decoration-none !important text-dark">
            <div class="card m-2" style="width: 15rem;height: 20rem">
              <div class="card-body">
                <h4 class="card-title text-center"><?php echo e($flower->name); ?></h4>
                <img class="card-img-top" width="150" height="150" src="/storage/cover_image/<?php echo e($flower->cover_image); ?>" alt="Card image cap">
                <div class="card-body m-md-n3">
                  <p class="card-text"><?php echo e((substr($flower->desc, 0, 45)."...")); ?></p>
                </div>
                <div class="row justify-content-center">
                  <a href="/flowers/<?php echo e($flower->id); ?>" class="btn btn-dark ml-sm-4 mr-auto">Details</a>
                  <a href="/carts/<?php echo e($flower->id); ?>/edit" class="btn btn-secondary mr-sm-4 ml-auto">Order</a>
                </div>
              </div>
            </div>
          </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  <?php else: ?>
    <h3 class="row justify-content-center m-lg-5 text-danger">I'm Sorry We're Out of Flowers!!</h3>
  <?php endif; ?>
  <div class="row justify-content-center">
    <?php if(count($flowers) > 0): ?>
      <?php echo e($flowers->links()); ?>

    <?php endif; ?>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\florist\resources\views/pages/index.blade.php ENDPATH**/ ?>