<?php $__env->startSection('title'); ?>
  Update Flowers
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <form action="/flowers/<?php echo e($flower->id); ?>" method="post" enctype="multipart/form-data">
    <?php echo e(csrf_field()); ?>

    <?php echo method_field('put'); ?>
  <div class="form-group row justify-content-center">
    <label for="name" class="col-sm-2">Flower Name</label>
    <div class="col-sm-10">
      <input type="name" name="name" class="form-control" placeholder="<?php echo e($flower->name); ?>">
    </div>
  </div>
  <div class="form-group row justify-content-center">
    <label for="price" class="col-sm-2">Flower Price</label>
    <div class="col-sm-10">
      <input type="number" name="price" class="form-control" placeholder="<?php echo e($flower->price); ?>">
    </div>
  </div>
  <div class="form-group row justify-content-center">
    <label for="stock" class="col-sm-2">Flower Stock</label>
    <div class="col-sm-10">
      <input type="number" name="stock" class="form-control" placeholder="<?php echo e($flower->stock); ?>">
    </div>
  </div>
  <div class="form-group row justify-content-center">
    <label for="type" class="col-form-label col-sm-2">Flower Type Names</label>
    <div class="col-sm-10">
      <select name="type" class="form-control">
        <?php $__currentLoopData = $flowerTypeNames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($flower->flowerTypes_id == $key): ?>
            <option value="<?php echo e($key); ?>" selected><?php echo e($value); ?></option>
          <?php else: ?>
            <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
    </div>
  </div>
  <div class="form-group row justify-content-center">
    <label for="desc" class="col-sm-2">Flower Description</label>
    <div class="col-sm-10">
      <textarea name="desc" class="form-control" placeholder="<?php echo e($flower->desc); ?>"></textarea>
    </div>
  </div>
  <div class="form-group row justify-content-center">
    <label class="col-form-label col-sm-2">Flower Cover Image</label>
    <div class="col-sm-10">
      <input type="file" name="cover_image">
    </div>
  </div>
  <div class="row justify-content-center">
    <input type="submit" class="btn btn-primary text-white">
  </div>
  </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\florist\resources\views/flowers/edit.blade.php ENDPATH**/ ?>