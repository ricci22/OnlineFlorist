<?php $__env->startSection('callToActionBtn'); ?>
  <div class="row justify-content-center">
    <a class="btn btn-primary text-white m-auto" href="/couriers/create" role="button">Insert Courier</a>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
  Manage Couriers
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <?php echo $__env->make('inc.search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php if(count($couriers) > 0): ?>
    <div class="container">
      <div class="row justify-content-center">
        <?php $__currentLoopData = $couriers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="card m-2" style="width: 12.5rem;">
            <div class="card-body">
              <h5 class="card-title text-center">ID : <?php echo e($courier->id); ?></h5>
              <h4 class="card-title text-center"><?php echo e($courier->name); ?></h4>
              <h6 class="card-title text-center">Cost: Rp <?php echo e($courier->shippingCost); ?></h6>
              <div class="row justify-content-center">
                <a href="/couriers/<?php echo e($courier->id); ?>/edit" class="btn btn-dark ml-sm-2 mr-auto">Update</a>
                <form action="/couriers/<?php echo e($courier->id); ?>" method="post">
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
    <h3 class="row justify-content-center m-lg-5 text-danger">No Couriers Found!</h3>
  <?php endif; ?>
  <div class="row justify-content-center">
    <?php if(count($couriers) > 0): ?>
      <?php echo e($couriers->links()); ?>

    <?php endif; ?>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\florist\resources\views/couriers/index.blade.php ENDPATH**/ ?>