<?php $__env->startSection('title'); ?>
  Order History
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <?php if(count($transactions) > 0): ?>
    <div class="container mt-3">
      <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <table class="table mb-3">
          <tr><th>Transaction ID : <?php echo e($transaction->id); ?><th><tr>
          <tr><th>Transaction Date : <?php echo e($transaction->created_at); ?><th></tr>
          <tr><th>Member Name : <?php echo e($transaction->uname); ?><th></tr>
          <tr><th>Courier : <?php echo e($transaction->cname); ?><th></tr>
        </table>
        <table class="table table-striped">
          <thead class="thead-dark">
          <tr>
            <th scope="col">Picture</th>
            <th scope="col">Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Total</th>
          </tr>
          </thead>
          <tbody>
          <?php $__currentLoopData = $transactionDetails->where('transaction_id', $transaction->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transactionDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td width="20%"><img class="card-img" height="100px" src="/storage/cover_image/<?php echo e($transactionDetail->fimage); ?>" alt="Image Not Loaded"></td>
              <td><?php echo e($transactionDetail->fname); ?></td>
              <td><?php echo e($transactionDetail->qty); ?></td>
              <td>Rp <?php echo e($transactionDetail->flower->price); ?></td>
              <td>Rp <?php echo e($transactionDetail->total); ?></td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
          <tr class="table-light">
            <th></th>
            <th></th>
            <th></th>
            <th>ShippingCost</th>
            <th>Rp <?php echo e($transaction->courier->shippingCost); ?></th>
          </tr>
          <tr class="table-light">
            <th></th>
            <th></th>
            <th></th>
            <th>Grand Total</th>
            <th>Rp <?php echo e($transaction->total); ?></th>
          </tr>
        </table>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  <?php else: ?>
    <h3 class="row justify-content-center m-lg-5 text-danger">Currrently You haven't Order anything yet!</h3>
  <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\florist\resources\views/order/index.blade.php ENDPATH**/ ?>