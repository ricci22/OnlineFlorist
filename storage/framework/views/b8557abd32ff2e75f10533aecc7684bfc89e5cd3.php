<?php $__env->startSection('title'); ?>
  Flower Details
<?php $__env->stopSection(); ?>
<?php $__env->startSection('callToActionBtn'); ?>
  <div class="row justify-content-center">
    <a class="btn btn-primary text-white m-auto" href="/" role="button">More Flowers...</a>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <div class="container">
    <div class="row justify-content-center">
      <div class="card col-4">
        <div class="card-body">
          <img class="card-img" width="300" height="300" src="/storage/cover_image/<?php echo e($flower->cover_image); ?>" alt="Card image cap">
        </div>
      </div>
      <div class="card col-8">
        <div class="row float-left ml-lg-2 mt-lg-2">
          <h4 class="card-title text-center"><?php echo e($flower->name); ?></h4>
        </div>
        <hr class="mt-lg-n1">
        <div class="row float-left ml-lg-2" style="height: 17rem">
          <p><?php echo e($flower->desc); ?></p>
        </div>
        <form action="/carts/<?php echo e($flower->id); ?>" method="post">
          <?php echo csrf_field(); ?>
          <?php echo method_field('put'); ?>
          <div class="row">
            <div class="form-group col-3">
              <label for="qty">Stock : <?php echo e($flower->stock); ?></label>
              <input type="number" name="qty" class="form-control" placeholder="0">
            </div>
            <div class="col-6">
              <h3 class="float-right text-primary">Rp. <?php echo e($flower->price); ?></h3>
            </div>
            <div class="col-auto float-right">
              <input type="submit" class="btn btn-primary text-white m-auto" value="Add to Cart">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\florist\resources\views/pages/show.blade.php ENDPATH**/ ?>