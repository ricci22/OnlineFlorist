<?php $__env->startSection('title'); ?>
  Insert Couriers
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <form action="/couriers" method="post">
    <?php echo e(csrf_field()); ?>

    <?php echo method_field('post'); ?>
    <div class="form-group row justify-content-center">
      <label for="name" class="col-sm-2">Courier Name</label>
      <div class="col-sm-10">
        <input type="text" name="name" class="form-control" placeholder="Name">
      </div>
    </div>
    <div class="form-group row justify-content-center">
      <label for="shippingCost" class="col-sm-2">Courier Shipping Cost</label>
      <div class="col-sm-10">
        <input type="number" name="shippingCost" class="form-control" placeholder="0">
      </div>
    </div>
    <div class="row justify-content-center">
      <input type="submit" class="btn btn-primary text-white">
    </div>
  </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\florist\resources\views/couriers/create.blade.php ENDPATH**/ ?>