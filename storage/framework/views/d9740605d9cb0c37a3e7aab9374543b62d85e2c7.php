<?php $__env->startSection('title'); ?>
  Insert Flower Type
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <form action="/flower_types" method="post">
    <?php echo e(csrf_field()); ?>

    <?php echo method_field('post'); ?>
    <div class="form-group row justify-content-center">
      <label for="name" class="col-sm-2">Flower Type Name</label>
      <div class="col-sm-10">
        <input class="form-control" type="text" id="name" name="name" placeholder="Name">
      </div>
    </div>
    <div class="row justify-content-center">
      <input type="submit" class="btn btn-primary text-white">
    </div>
  </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\florist\resources\views/flower_types/create.blade.php ENDPATH**/ ?>