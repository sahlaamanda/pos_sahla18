

<?php $__env->startSection('title', 'Users'); ?>

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

    .btn-pink{
        background:#D63384;
        color:white;
        border:none;
        border-radius:10px;
    }

    .btn-pink:hover{
        background:#B03060;
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

    .badge-role{
        background:#FFE4EC;
        color:#800020;
        padding:8px 15px;
        border-radius:20px;
        font-size:13px;
    }
</style>

<div class="container mt-4">

    <div class="page-title">
        <h2 class="mb-1">👤 Manajemen Users</h2>
        <small>Kelola data pengguna sistem</small>
    </div>

    <div class="card-custom">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <a href="<?php echo e(route('admin.users.create')); ?>"
               class="btn btn-maroon">
                ➕ Tambah User
            </a>

            <form action="<?php echo e(route('admin.users.index')); ?>"
                  method="GET"
                  style="width:350px;">

                <div class="input-group">

                    <input
                        type="text"
                        name="search"
                        value="<?php echo e(request('search')); ?>"
                        class="form-control"
                        placeholder="Cari nama atau email...">

                    <button class="btn btn-maroon">
                        🔍cari
                    </button>

                </div>

            </form>

        </div>

        <table class="table table-hover align-middle">

            <thead>
                <tr>
                    <th width="60">#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th width="200">Aksi</th>
                </tr>
            </thead>

            <tbody>

            <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <tr>

                    <td>
                        <?php echo e($loop->iteration + ($users->firstItem() ?? 0) - 1); ?>

                    </td>

                    <td>
                        <strong><?php echo e($user->name); ?></strong>
                    </td>

                    <td>
                        <?php echo e($user->email); ?>

                    </td>

                    <td>
                        <span class="badge-role">
                            <?php echo e(optional($user->role)->name ?? '-'); ?>

                        </span>
                    </td>

                    <td>

                        <div class="d-flex gap-2">

                            <a href="<?php echo e(route('admin.users.edit',$user)); ?>"
                               class="btn btn-sm btn-pink">
                                ✏ Edit
                            </a>

                            <form action="<?php echo e(route('admin.users.destroy',$user)); ?>"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus user ini?')">

                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>

                                <button class="btn btn-sm btn-delete">
                                    🗑 Hapus
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <tr>

                    <td colspan="5" class="text-center py-4">

                        Tidak ada data user.

                    </td>

                </tr>

            <?php endif; ?>

            </tbody>

        </table>

        <div class="mt-4 d-flex justify-content-center">
            <?php echo e($users->links()); ?>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_sahla\resources\views/users/index.blade.php ENDPATH**/ ?>