

<?php $__env->startSection('title', 'Tambah Produk'); ?>

<?php $__env->startSection('content'); ?>

<div class="container mt-4">

    <h4>Tambah Produk</h4>

    <form
        action="<?php echo e(route('admin.produk.store')); ?>"
        method="POST"
        enctype="multipart/form-data"
    >

        <?php echo csrf_field(); ?>

        <?php echo $__env->make('produk._form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    </form>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_sahla\resources\views/produk/create.blade.php ENDPATH**/ ?>