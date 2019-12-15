<?php $__env->startSection('callToActionBtn'); ?>
  <div class="row justify-content-center">
    <a class="btn btn-primary text-white m-auto" href="/flower_types/create" role="button">Insert Flower Type</a>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
  Manage Flower Types
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <div class="justify-content-center">
    <form class="form-inline" action="/flower_types/search" method="post">
      <?php echo csrf_field(); ?>
      <input class="form-control col-lg-5 ml-auto mr-2" type="text" name="search" placeholder="I want to find...">
      <button type="submit" class="btn btn-primary text-white mr-auto ml-2">Search</button>
    </form>
  </div>
  <?php if(count($flowerTypes) > 0): ?>
    <div class="container">
      <div class="row justify-content-center">
        <?php $__currentLoopData = $flowerTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flowerType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="card m-2" style="width: 12.5rem;">
            <div class="card-body">
              <h5 class="card-title text-center"><?php echo e($flowerType->name); ?></h5>
              <div class="row justify-content-center">
                <a href="/flower_types/<?php echo e($flowerType->id); ?>/edit" class="btn btn-dark ml-sm-2 mr-auto">Update</a>
                <form action="/flower_types/<?php echo e($flowerType->id); ?>" method="post">
                  <?php echo e(csrf_field()); ?>

                  <?php echo method_field('delete'); ?>
                  <input type="submit" class="btn btn-secondary mr-sm-2 ml-auto" value="Delete">
                </form>
              </div>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  <?php else: ?>
    <h3 class="row justify-content-center m-lg-5 text-danger">No Flower Types Found!</h3>
  <?php endif; ?>
  <div class="row justify-content-center">
    <?php if(count($flowerTypes) > 0): ?>
      <?php echo e($flowerTypes->links()); ?>

    <?php endif; ?>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\florist\resources\views/flower_types/index.blade.php ENDPATH**/ ?>