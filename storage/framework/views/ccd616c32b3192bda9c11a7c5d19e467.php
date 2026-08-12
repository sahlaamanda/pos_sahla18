<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">

    
    <a class="navbar-brand d-flex align-items-center gap-2" href="<?php echo e(route('dashboard')); ?>">
      <img src="<?php echo e(asset('images/Logo_SMK.png')); ?>" alt="Logo POS" height="32" class="d-inline-block align-text-top">
      <span>POS</span>
    </a>

    <button class="navbar-toggler" type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        
        <li class="nav-item">
          <a class="nav-link <?php echo e(Request::is('dashboard') ? 'active' : ''); ?>"
             href="<?php echo e(route('dashboard')); ?>">
             Dashboard
          </a>
        </li>

        
        <li class="nav-item">
          <a class="nav-link <?php echo e(Request::is('admin/users*') ? 'active' : ''); ?>"
             href="<?php echo e(route('admin.users.index')); ?>">
             Users
          </a>
        </li>

        
        <li class="nav-item">
          <a class="nav-link <?php echo e(Request::is('admin/produk*') ? 'active' : ''); ?>"
             href="<?php echo e(route('admin.produk.index')); ?>">
             Produk
          </a>
        </li>

        
        <li class="nav-item">
          <a class="nav-link <?php echo e(Request::is('admin/penjualan*') ? 'active' : ''); ?>"
             href="<?php echo e(route('admin.penjualan.index')); ?>">
             Penjualan
          </a>
        </li>

        
        <li class="nav-item">
          <a class="nav-link <?php echo e(Request::is('admin/jenis*') ? 'active' : ''); ?>"
             href="<?php echo e(route('admin.jenis.index')); ?>">
             Jenis
          </a>
        </li>

      </ul>

      
      <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
        <?php echo csrf_field(); ?>
      </form>
      <button type="button" class="btn btn-danger" onclick="document.getElementById('logout-form').submit();">
        Logout
      </button>

    </div>
  </div>
</nav><?php /**PATH C:\laragon\www\pos_sahla\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>