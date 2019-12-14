<?php $__env->startSection('title'); ?>
  Update Flower Type
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <form action="/flower_types/<?php echo e($flowerType->id); ?>" method="post">
    <?php echo e(csrf_field()); ?>

    <?php echo method_field('put'); ?>
    <div class="form-group row justify-content-center">
      <label for="staticId" class="col-sm-2">Flower Type Id</label>
      <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext" value=<?php echo e($flowerType->id); ?>>
      </div>
    </div>
    <div class="form-group row justify-content-center">
      <label for="name" class="col-sm-2">Flower Type Name</label>
      <div class="col-sm-10">
        <input class="form-control" type="text" name="name" placeholder="<?php echo e($flowerType->name); ?>">
      </div>
    </div>
    <div class="row justify-content-center">
      <input type="submit" class="btn btn-primary text-white">
    </div>
  </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\florist\resources\views/flower_types/edit.blade.php ENDPATH**/ ?>