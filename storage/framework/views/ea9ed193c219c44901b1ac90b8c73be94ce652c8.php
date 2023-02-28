<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kedar Collection is a market of handcrafted products. You get the best price of any product here.">
    <meta name="keywords" content="Kedar Collection is a market of handcrafted products. You get the best price of any product here.">
    <meta name="author" content="pixelstrap">
    <link rel="shortcut icon" href="<?php echo e(asset('/images/favicon.ico')); ?>" type="image/x-icon">
    <link rel="icon" href="<?php echo e(asset('/images/favicon.ico')); ?>" type="image/x-icon">
    <title>Kedar Collections | A collection of Handcrafts</title>
    <style type="text/css">
        .img-wrapper-square {
    width: 150px;
    height: 150px;
    border-bottom: blueviolet;
    border-radius: 0.3em;
    overflow: hidden;
  }

  .img-wrapper-rounded {
    width: 150px;
    height: 150px;
    border-bottom: blueviolet;
    border-radius: 50%;
    overflow: hidden;

  }

  .img-wrapper-square img {
    height: 200px;
  }

  .img-wrapper-rounded img {
    height: 200px;
  }
  .img-height-200{
    height: 200px !important;
  }
    </style>
    <?php echo $__env->make('userpanel.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('style'); ?>
    <style>
    .error{
       margin:1px;
       color:red;     
    }
</style>

  </head>
  <body <?php if(Route::current()->getName() == 'index'): ?> onload="startTime()" <?php endif; ?>>
    <?php if(Route::current()->getName() == 'user-dashboard'): ?> 
      <div class="loader-wrapper">
        <div class="loader-index"><span></span></div>
        <svg>
          <defs></defs>
          <filter id="goo">
            <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
            <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
          </filter>
        </svg>
      </div>
     <?php endif; ?>
    <!-- tap on top starts-->
    <!-- <div class="tap-top"><i data-feather="chevrons-up"></i></div> -->
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
   
      <!-- Page Header Start-->
      <?php echo $__env->make('userpanel.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!-- Page Header Ends  -->
      <!-- Page Body Start-->
    
        <!-- Page Sidebar Start-->
       
        <!-- Page Sidebar Ends-->
       
        <!-- <div class="container-fluid">        
            <div class="page-title">
              <div class="row p-2">
                <div class="col-6">
                  <?php echo $__env->yieldContent('breadcrumb-title'); ?>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('/')); ?>"> <i data-feather="home"></i></a></li>
                    <?php echo $__env->yieldContent('breadcrumb-items'); ?>
                  </ol>
                </div>
              </div>
            </div>
          </div> -->
        <!-- <div class="container-fluid">         -->
         <?php echo $__env->yieldContent('banner'); ?>
          <!-- </div> -->

          <!-- Container-fluid starts-->
          <div class="row justify-content-center">
            <div class="col-md-11">
            <?php if(session('message')): ?>
                        <div class="alert alert-info" role="alert">
                            <?php echo e(session('message')); ?>

                        </div>
                    <?php endif; ?>
         
            </div>
          </div>
          
          <?php echo $__env->yieldContent('content'); ?>
          <!-- Container-fluid Ends-->
     
        <!-- footer start-->
        <?php echo $__env->make('userpanel.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
        
      
   
    <!-- latest jquery-->
    <?php echo $__env->make('userpanel.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
  
  </body>
</html><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/userpanel/master.blade.php ENDPATH**/ ?>