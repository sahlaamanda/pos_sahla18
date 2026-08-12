

<?php $__env->startSection('title', 'Edit Produk'); ?>

<?php $__env->startSection('content'); ?>

<h4>Edit Produk</h4>

<form action="<?php echo e(route('admin.produk.update', $produk->id)); ?>"
      method="POST"
      enctype="multipart/form-data">

    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <?php echo $__env->make('produk._form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_sahla\resources\views/produk/edit.blade.php ENDPATH**/ ?>