<?php $__env->startSection('title'); ?>
  Update Courier
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <form action="/couriers/<?php echo e($courier->id); ?>" method="post">
    <?php echo e(csrf_field()); ?>

    <?php echo method_field('put'); ?>
    <div class="form-group row justify-content-center">
      <label for="staticId" class="col-sm-2">Courier Id</label>
      <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext" value=<?php echo e($courier->id); ?>>
      </div>
    </div>
    <div class="form-group row justify-content-center">
      <label for="name" class="col-sm-2">Courier Name</label>
      <div class="col-sm-10">
        <input type="text" name="name" class="form-control" placeholder="<?php echo e($courier->name); ?>">
      </div>
    </div>
    <div class="form-group row justify-content-center">
      <label for="shippingCost" class="col-sm-2">Courier Shipping Cost</label>
      <div class="col-sm-10">
        <input type="number" name="shippingCost" class="form-control" placeholder="<?php echo e($courier->shippingCost); ?>">
      </div>
    </div>
    <div class="row justify-content-center">
      <input type="submit" class="btn btn-primary text-white">
    </div>
  </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\florist\resources\views/couriers/edit.blade.php ENDPATH**/ ?>