

<?php $__env->startSection('title', 'Halaman Jenis Produk'); ?>

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

    .btn-edit {
        background: #D63384;
        color: white;
        border: none;
        border-radius: 10px;
    }

    .btn-delete {
        background: #800020;
        color: white;
        border: none;
        border-radius: 10px;
    }

    .form-control {
        border-radius: 12px;
        border: 2px solid #F4C2D7;
    }

    .table {
        border-radius: 15px;
        overflow: hidden;
    }

    .table thead {
        background: #800020;
        color: white;
    }

    .table thead th {
        border: none;
    }

    .table tbody tr:hover {
        background: #FFF0F5;
    }

    .jumlah-badge {
        background: #FFE4EC;
        color: #800020;
        padding: 7px 15px;
        border-radius: 20px;
        font-weight: 600;
    }
</style>

<div class="container mt-4">

    
    <?php if(session('errors')): ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <?php echo e(session('errors')); ?>

            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <?php echo e(session('success')); ?>

            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    
    <div class="page-title">
        <h2 class="mb-1">🏷️ Manajemen Jenis Produk</h2>
        <small>Kelola semua jenis/kategori produk</small>
    </div>

    <div class="card-custom">

        
        <div class="d-flex justify-content-between align-items-center mb-4">

            <a href="<?php echo e(route('admin.jenis.create')); ?>" class="btn btn-maroon">
                ➕ Tambah Jenis
            </a>

            <form action="<?php echo e(route('admin.jenis.index')); ?>"
                  method="GET"
                  style="width:350px;">

                <div class="input-group">

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Cari jenis..."
                        value="<?php echo e(request('search')); ?>"
                    >

                    <button type="submit" class="btn btn-maroon">
                        🔍 Cari
                    </button>

                </div>
            </form>

        </div>

        
        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Jenis</th>
                        <th>Jumlah Produk</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $jenis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr>

                        
                        <td>
                            <?php echo e($loop->iteration + ($jenis->firstItem() - 1)); ?>

                        </td>

                        
                        <td>
                            <strong>
                                <?php echo e($item->nama_jenis); ?>

                            </strong>
                        </td>

                        
                        <td>
                            <span class="jumlah-badge">
                                <?php echo e($item->produk_count); ?> Produk
                            </span>
                        </td>

                        
                        <td>

                            <div class="d-flex gap-2">

                                
                                <a href="<?php echo e(route('admin.jenis.edit', $item->id)); ?>"
                                   class="btn btn-sm btn-edit">
                                    ✏ Edit
                                </a>

                                
                                <form action="<?php echo e(route('admin.jenis.destroy', $item->id)); ?>"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus jenis ini?')">

                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                    <button type="submit"
                                            class="btn btn-sm btn-delete">
                                        🗑 Hapus
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>
                        <td colspan="4" class="text-center py-4">
                            Belum ada data jenis.
                        </td>
                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

        
        <div class="mt-4 d-flex justify-content-center">
            <?php echo e($jenis->links()); ?>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_sahla\resources\views/jenis/index.blade.php ENDPATH**/ ?>