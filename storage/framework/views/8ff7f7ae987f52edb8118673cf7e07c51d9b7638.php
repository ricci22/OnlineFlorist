<?php $__env->startSection('title'); ?>
  Cart
<?php $__env->stopSection(); ?>
<?php $__env->startSection('callToActionBtn'); ?>
  <div class="row justify-content-center">
    <a class="btn btn-primary text-white m-auto" href="/" role="button">More Flowers...</a>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <?php if($cartExist): ?>
    <?php if(count($cartDetails) > 0): ?>
      <div class="container mt-3">
        <div class="row justify-content-center">

          <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
              <th scope="col">Picture</th>
              <th scope="col">Name</th>
              <th scope="col">Quantity</th>
              <th scope="col">Price</th>
              <th scope="col">Total</th>
              <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $cartDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td width="20%"><img class="card-img" height="100px" src="/storage/cover_image/<?php echo e($cartDetail->flower->cover_image); ?>" alt="Image Not Loaded"></td>
                <td><?php echo e($cartDetail->flower->name); ?></td>
                <td><?php echo e($cartDetail->qty); ?></td>
                <td><?php echo e($cartDetail->flower->price); ?></td>
                <td><?php echo e($cartDetail->total); ?></td>
                <td width="15%">
                  <div class="row">
                    <form action="/carts/<?php echo e($cartDetail->id); ?>" method="post">
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

          <form action="/carts" method="post">
            <?php echo csrf_field(); ?>
            <div class="form-group row">
              <label for="courier" class="col-form-label col-auto"></label>
              <div class="col-auto">
                <select id="courierOption"  onchange="onChangeSelectedCourier()" name="courier" class="form-control courierOption">
                  <option disabled selected>Select your Courier</option>
                  <?php $__currentLoopData = $couriers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($courier->id); ?>"><?php echo e($courier->name); ?> :Shipping Cost: Rp <?php echo e($courier->shippingCost); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>

            <div class="row justify-content-center">
              <h7>*Price below not including the shipping cost</h7>
              <h6 id="courierPrice"> </h6>
            </div>

            <div class="row justify-content-center">
              <label for="grandTotal" hidden>
                <input id="grandTotal" type="text" value="<?php echo e($cartsTotal); ?>">
              </label>
              <h5 id="grandTotalPlusCourier">Grand Total : Rp. <?php echo e($cartsTotal); ?></h5>
            </div>

            <div class="row justify-content-center">
              <input type="submit" class="btn btn-dark text-white" value="Checkout">
            </div>
          </form>

        </div>
      </div>
    <?php else: ?>
      <h3 class="row justify-content-center m-lg-5 text-danger">Your Cart is currently Empty!</h3>
    <?php endif; ?>
  <?php else: ?>
    <h3 class="row justify-content-center m-lg-5 text-danger">Your Cart is currently Empty!</h3>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<script>
  // function onChangeSelectedCourier() {
  //   var c = document.getElementsByClassName("courierOption").id;
  //   var t = document.getElementById("grandTotal").value;
  //   var grandTotal = parseInt(c) + parseInt(t);
  //   document.getElementById("courierPrice").innerHTML = c;
  //   document.getElementById("grandTotalPlusCourier").innerHTML = "Grand Total : Rp " + grandTotal;
  // }
</script>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\florist\resources\views/carts/index.blade.php ENDPATH**/ ?>