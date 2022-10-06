

<?php $__env->startSection('content'); ?>
  <p>Please activate your product license.</p>
  <form class="ui form" method="POST" action="<?php echo e(route('install.process', ['step' => $step])); ?>">
    <?php echo csrf_field(); ?>
    <div class="form-group">
      <label>Purchase code</label>
      <input type="text" name="code" placeholder="Purchase code" class="form-control" value="<?php echo e(old('code', env(FP_CODE))); ?>" required>
    </div>
    <div class="form-group">
      <label>License holder email</label>
      <input type="text" name="email" placeholder="Email" class="form-control" value="<?php echo e(old('email', env(FP_EMAIL))); ?>" required>
    </div>
    <div class="mt-3">
      <button type="submit" class="btn btn-primary">Next</button>
    </div>
  </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('installer::layouts.install', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/codeghww/primary.codelinar.com/packages/installer/resources/views/pages/step1.blade.php ENDPATH**/ ?>