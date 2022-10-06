

<?php $__env->startSection('content'); ?>
  <p>Database is successfully set up! Please input admin user details below.</p>
  <form class="ui form" method="POST" action="<?php echo e(route('install.process', ['step' => $step])); ?>">
    <?php echo csrf_field(); ?>
    <div class="form-group">
      <label>Name</label>
      <input type="text" name="name" placeholder="Name" class="form-control" value="<?php echo e(old('name')); ?>" required>
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="email" name="email" placeholder="Email" class="form-control" value="<?php echo e(old('email')); ?>" required>
    </div>
    <div class="form-group">
      <label>Password</label>
      <input type="password" name="password" placeholder="Password" class="form-control" value="<?php echo e(old('password')); ?>" required>
    </div>
    <div class="mt-3">
      <button type="submit" class="btn btn-primary">Next</button>
    </div>
  </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('installer::layouts.install', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/codeghww/primary.codelinar.com/packages/installer/resources/views/pages/step3.blade.php ENDPATH**/ ?>