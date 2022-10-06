

<?php $__env->startSection('content'); ?>
  <p>Congratulations! Installation is completed and <b><?php echo e(config('app.name')); ?></b> is now up and running.</p>
  <p>
    In order for the application and all games to work correctly please add the following cron job to your server
    (if you add the cron job via cPanel you need to omit the leading asterisk symbols):
  </p>
  <div class="alert alert-info mb-3">
    <pre class="mb-0"><?php echo e(\App\Helpers\Utils::getCronJobCommand()); ?></pre>
  </div>
  <a href="/" class="btn btn-primary" target="_blank">Front page</a>
  <a href="/login" class="btn btn-primary" target="_blank">Log in</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('installer::layouts.install', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/codeghww/primary.codelinar.com/packages/installer/resources/views/pages/step4.blade.php ENDPATH**/ ?>