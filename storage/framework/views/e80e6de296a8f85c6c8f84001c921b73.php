

<?php $__env->startSection('title', 'Penjualan'); ?>

<?php $__env->startSection('content'); ?>

<style>
    body{
        background:#FFF8FA;
    }

    .page-title{
        background:linear-gradient(135deg,#800020,#A52A4D);
        color:white;
        padding:18px 25px;
        border-radius:20px;
        margin-bottom:25px;
        box-shadow:0 10px 25px rgba(128,0,32,.15);
    }

    .card-custom{
        background:#fff;
        border:none;
        border-radius:20px;
        padding:25px;
        box-shadow:0 10px 25px rgba(128,0,32,.08);
    }

    .btn-maroon{
        background:#800020;
        color:white;
        border:none;
        border-radius:12px;
        padding:10px 18px;
        transition:.3s;
    }

    .btn-maroon:hover{
        background:#A52A4D;
        color:white;
    }

    .btn-detail{
        background:#C2185B;
        color:white;
        border:none;
        border-radius:10px;
    }

    .btn-detail:hover{
        background:#A0174A;
        color:white;
    }

    .btn-edit{
        background:#E75480;
        color:white;
        border:none;
        border-radius:10px;
    }

    .btn-edit:hover{
        background:#C2185B;
        color:white;
    }

    .btn-delete{
        background:#800020;
        color:white;
        border:none;
        border-radius:10px;
    }

    .btn-delete:hover{
        background:#A52A4D;
        color:white;
    }

    .form-control{
        border-radius:12px;
        border:2px solid #F4C2D7;
    }

    .form-control:focus{
        border-color:#800020;
        box-shadow:none;
    }

    .table{
        border-radius:15px;
        overflow:hidden;
    }

    .table thead{
        background:#800020;
        color:white;
    }

    .table thead th{
        border:none;
    }

    .table tbody tr:hover{
        background:#FFF0F5;
    }

    .status-badge{
        background:#FFE4EC;
        color:#800020;
        padding:7px 15px;
        border-radius:20px;
        font-weight:600;
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
        <h2 class="mb-1">🛒 Manajemen Penjualan</h2>
        <small>Kelola semua transaksi penjualan</small>
    </div>

    <div class="card-custom">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <a href="<?php echo e(route('admin.penjualan.create')); ?>"
               class="btn btn-maroon">
                ➕ Tambah Penjualan
            </a>

            <form action="<?php echo e(route('admin.penjualan.index')); ?>"
                  method="GET"
                  style="width:350px;">

                <div class="input-group">

                    <input
                        type="text"
                        name="search"
                        value="<?php echo e(request()->search); ?>"
                        class="form-control"
                        placeholder="Cari transaksi...">

                    <button class="btn btn-maroon">
                        🔍cari
                    </button>

                </div>

            </form>

        </div>

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Kasir</th>
                        <th>Total Pembayaran</th>
                        <th>Metode</th>
                        <th>Status</th>
                        <th width="230">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr>

                        <td><?php echo e($sales->firstItem() + $loop->index); ?></td>

                        <td>
                            <?php echo e($sale->created_at->translatedFormat('d-m-Y H:i')); ?>

                        </td>

                        <td>
                            <strong><?php echo e($sale->user->name); ?></strong>
                        </td>

                        <td>
                            Rp <?php echo e(number_format($sale->total_pembayaran,0,',','.')); ?>

                        </td>

                        <td>
                            <?php echo e($sale->metode_pembayaran); ?>

                        </td>

                        <td>
                            <span class="status-badge">
                                <?php echo e(strtoupper($sale->status)); ?>

                            </span>
                        </td>

                        <td>

                            <div class="d-flex gap-2">

                                <a href="<?php echo e(route('admin.penjualan.show',$sale->id)); ?>"
                                   class="btn btn-sm btn-detail">
                                    👁 Detail
                                </a>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view',$sale)): ?>
                                <a href="<?php echo e(route('admin.penjualan.edit',$sale)); ?>"
                                   class="btn btn-sm btn-edit">
                                    ✏ Edit
                                </a>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete',$sale)): ?>
                                <form action="<?php echo e(route('admin.penjualan.destroy',$sale->id)); ?>"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                    <button class="btn btn-sm btn-delete">
                                        🗑 Hapus
                                    </button>

                                </form>
                                <?php endif; ?>

                            </div>

                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>

                        <td colspan="7" class="text-center py-4">

                            Belum ada data penjualan.

                        </td>

                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

        <div class="mt-4 d-flex justify-content-center">
            <?php echo e($sales->links()); ?>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_sahla\resources\views/penjualan/index.blade.php ENDPATH**/ ?>