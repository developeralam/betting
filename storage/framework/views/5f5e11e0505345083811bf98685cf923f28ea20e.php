<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo e(config('app.name')); ?> | Installation</title>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
  <div id="app">
    <div class="container">
      <div class="row mt-3 mb-3">
        <div class="col">
          <h1 class="border-bottom">
            Installation: <?php echo e($title); ?>

          </h1>
        </div>
      </div>
      <?php if($errors->any()): ?>
        <div class="row mt-3 mb-3">
          <div class="col">
            <div class="alert alert-danger">
              <h4 class="alert-heading">
                Error:
              </h4>
              <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <div class="row">
        <div class="col">
          <?php echo $__env->yieldContent('content'); ?>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<?php /**PATH /home/codeghww/primary.codelinar.com/packages/installer/resources/views/layouts/install.blade.php ENDPATH**/ ?>