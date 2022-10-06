

<?php $__env->startSection('content'); ?>
  <p>Please create a MySQL database and input its access credentials below.</p>
  <form method="POST" action="<?php echo e(route('install.process', ['step' => $step])); ?>">
    <?php echo csrf_field(); ?>
    <div class="form-group">
      <label>Database host</label>
      <input type="text" name="host" placeholder="host" class="form-control" value="<?php echo e(old('host', config('database.connections.mysql.host'))); ?>" required>
    </div>
    <div class="form-group">
      <label>Database port</label>
      <input type="text" name="port" placeholder="port" class="form-control" value="<?php echo e(old('port', config('database.connections.mysql.port'))); ?>" required>
    </div>
    <div class="form-group">
      <label>Database name</label>
      <input type="text" name="name" placeholder="name" class="form-control" value="<?php echo e(old('name', config('database.connections.mysql.database'))); ?>" required>
    </div>
    <div class="form-group">
      <label>Database username</label>
      <input type="text" name="username" placeholder="username" class="form-control" value="<?php echo e(old('username', config('database.connections.mysql.username'))); ?>" required>
    </div>
    <div class="form-group">
      <label>Database password</label>
      <input type="password" name="password" placeholder="password" class="form-control" value="<?php echo e(old('password', config('database.connections.mysql.password'))); ?>" required>
    </div>
    <div class="mt-3">
      <button type="submit" class="btn btn-primary">Next</button>
    </div>
  </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('installer::layouts.install', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/codeghww/primary.codelinar.com/packages/installer/resources/views/pages/step2.blade.php ENDPATH**/ ?>