

<?php $__env->startSection('title', 'Edit Jenis Produk'); ?>

<?php $__env->startSection('content'); ?>

<style>
    body {
        background: #FFF8FA;
    }

    .page-title {
        background: linear-gradient(135deg, #800020, #A52A4D);
        color: white;
        padding: 18px 25px;
        border-radius: 20px;
        margin-bottom: 25px;
        box-shadow: 0 10px 25px rgba(128, 0, 32, .15);
    }

    .card-custom {
        background: white;
        border: none;
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 10px 25px rgba(128, 0, 32, .08);
    }

    .btn-maroon {
        background: #800020;
        color: white;
        border: none;
        border-radius: 12px;
        padding: 10px 18px;
    }

    .btn-maroon:hover {
        background: #A52A4D;
        color: white;
    }

    .form-control,
    textarea.form-control {
        border-radius: 12px;
        border: 2px solid #F4C2D7;
    }

    .form-control:focus {
        border-color: #800020;
        box-shadow: none;
    }
</style>

<div class="container mt-4">

    <div class="page-title">
        <h2 class="mb-1">✏️ Edit Jenis Produk</h2>
        <small>Perbarui data jenis produk</small>
    </div>

    <div class="card-custom">

        <form action="<?php echo e(route('admin.jenis.update', $jenis->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-3">
                <label class="form-label">Nama Jenis</label>

                <input
                    type="text"
                    name="nama_jenis"
                    class="form-control"
                    value="<?php echo e(old('nama_jenis', $jenis->nama_jenis)); ?>"
                    placeholder="Contoh: Minuman"
                >

                <?php $__errorArgs = ['nama_jenis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-danger"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

           

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-maroon">
                    💾 Update
                </button>

                <a href="<?php echo e(route('admin.jenis.index')); ?>" class="btn btn-secondary">
                    Batal
                </a>
            </div>

        </form>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_sahla\resources\views/jenis/edit.blade.php ENDPATH**/ ?>