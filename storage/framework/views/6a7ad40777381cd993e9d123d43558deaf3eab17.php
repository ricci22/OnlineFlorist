<?php $__env->startSection('title'); ?>
  Manage Users
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <?php echo $__env->make('inc.search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php if(count($users) > 0): ?>
    <div class="container mt-3">
      <div class="row justify-content-center">
          <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
              <th scope="col">Picture</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Gender</th>
              <th scope="col">Address</th>
              <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td width="20%"><img class="card-img" height="50%" src="/storage/pictures/<?php echo e($user->picture); ?>" alt="Card image cap"></td>
                <td><?php echo e($user->name); ?></td>
                <td><?php echo e($user->email); ?></td>
                <td><?php echo e($user->phone); ?></td>
                <td><?php echo e($user->gender); ?></td>
                <td><?php echo e($user->address); ?></td>
                <td width="15%">
                  <div class="row">
                    <a href="/users/<?php echo e($user->id); ?>/edit" class="btn btn-dark float-left">Update</a>
                    <form action="/users/<?php echo e($user->id); ?>" method="post">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('delete'); ?>
                      <input type="submit" class="btn btn-secondary" value="Remove">
                    </form>
                  </div>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
      </div>
    </div>
  <?php else: ?>
    <h3 class="row justify-content-center m-lg-5 text-danger">No Users Found!</h3>
  <?php endif; ?>
  <div class="row justify-content-center">
    <?php if(count($users) > 0): ?>
      <?php echo e($users->links()); ?>

    <?php endif; ?>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\florist\resources\views/users/index.blade.php ENDPATH**/ ?>