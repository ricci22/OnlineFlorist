<?php $__env->startSection('title'); ?>
  Profile
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header"><?php echo e(__('Update')); ?></div>
          <div class="card-body">
            <form method="POST" action="/users/<?php echo e($user->id); ?>" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              <?php echo method_field('put'); ?>
              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Name')); ?></label>
                <div class="col-md-6">
                  <input id="name" type="text" class="form-control <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name" placeholder="<?php echo e($user->name); ?>" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>
                </div>
              </div>

              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?></label>
                <div class="col-md-6">
                  <input id="email" type="email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" placeholder="<?php echo e($user->email); ?>" value="<?php echo e(old('email')); ?>" required autocomplete="email">
                </div>
              </div>

              <div class="form-group row">
                <label for="phone" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Phone Number')); ?></label>
                <div class="col-md-6">
                  <input id="phone" type="number" class="form-control" name="phone" placeholder="<?php echo e((int)$user->phone); ?>" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="gender" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Gender')); ?></label>
                <div class="col-md-6">
                  <?php if($user->gender == "male"): ?>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="gender" value="male" checked>Male
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="gender" value="female">Female
                      </label>
                    </div>
                  <?php else: ?>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="gender" value="male">Male
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="gender" value="female" checked>Female
                      </label>
                    </div>
                  <?php endif; ?>
                </div>
              </div>

              <div class="form-group row">
                <label for="address" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Address')); ?></label>
                <div class="col-md-6">
                  <textarea name="address" class="form-control" placeholder="<?php echo e($user->address); ?>"></textarea>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Profile Pictures</label>
                <div class="col-md-6">
                  <input type="file" name="picture">
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    <?php echo e(__('Update')); ?>

                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\florist\resources\views/users/show.blade.php ENDPATH**/ ?>