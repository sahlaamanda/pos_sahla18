

<?php $__env->startSection('title', 'Halaman Produk'); ?>

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
        background:white;
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
    }

    .btn-maroon:hover{
        background:#A52A4D;
        color:white;
    }

    .btn-edit{
        background:#D63384;
        color:white;
        border:none;
        border-radius:10px;
    }

    .btn-delete{
        background:#800020;
        color:white;
        border:none;
        border-radius:10px;
    }

    .form-control{
        border-radius:12px;
        border:2px solid #F4C2D7;
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

    .produk-img{
        width:80px;
        height:80px;
        object-fit:cover;
        border-radius:15px;
        border:2px solid #F4C2D7;
    }

    .stok-badge{
        background:#FFE4EC;
        color:#800020;
        padding:7px 15px;
        border-radius:20px;
        font-weight:600;
    }
</style>


<div class="container mt-4">


    <div class="page-title">
        <h2 class="mb-1">📦 Manajemen Produk</h2>
        <small>Kelola semua data produk toko</small>
    </div>


    <div class="card-custom">


        <div class="d-flex justify-content-between align-items-center mb-4">


            <a href="<?php echo e(route('admin.produk.create')); ?>" 
               class="btn btn-maroon">

                ➕ Tambah Produk

            </a>



            <form action="<?php echo e(route('admin.produk.index')); ?>" 
                  method="GET"
                  style="width:350px;">


                <div class="input-group">


                    <input type="text"
                           name="search"
                           class="form-control"
                           placeholder="Cari nama produk..."
                           value="<?php echo e(request('search')); ?>">



                    <button class="btn btn-maroon">

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
                        <th>User</th>
                        <th>Foto</th>
                        <th>Nama Produk</th>
                        <th>Jenis</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th width="180">Aksi</th>

                    </tr>

                </thead>



                <tbody>


                <?php $__empty_1 = true; $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>


                    <tr>


                        <td>
                            <?php echo e($loop->iteration + ($produk->firstItem() - 1)); ?>

                        </td>



                        <td>
                            <?php echo e($item->user->name ?? '-'); ?>

                        </td>



                        <td>

                            <?php if($item->foto): ?>

                                <img src="<?php echo e(asset('storage/'.$item->foto)); ?>"
                                     class="produk-img"
                                     alt="Foto Produk">

                            <?php else: ?>

                                <span class="text-muted">
                                    Tidak ada foto
                                </span>

                            <?php endif; ?>

                        </td>




                        <td>

                            <strong>
                                <?php echo e($item->nama); ?>

                            </strong>

                        </td>




                        

                        <td>

                            <?php echo e($item->jenis ?? '-'); ?>


                        </td>




                        

                        <td>

                            Rp <?php echo e(number_format($item->harga_beli,0,',','.')); ?>


                        </td>




                        

                        <td>

                            Rp <?php echo e(number_format($item->harga_jual,0,',','.')); ?>


                        </td>




                        

                        <td>

                            <span class="stok-badge">

                                <?php echo e($item->stok); ?> Unit

                            </span>

                        </td>




                        

                        <td>


                            <div class="d-flex gap-2">


                                <a href="<?php echo e(route('admin.produk.edit',$item->id)); ?>"
                                   class="btn btn-sm btn-edit">

                                    ✏ Edit

                                </a>




                                <form action="<?php echo e(route('admin.produk.destroy',$item->id)); ?>"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus produk ini?')">


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

                        <td colspan="9" class="text-center py-4">

                            Belum ada data produk.

                        </td>

                    </tr>


                <?php endif; ?>



                </tbody>


            </table>


        </div>



        <div class="mt-4 d-flex justify-content-center">

            <?php echo e($produk->links()); ?>


        </div>



    </div>


</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_sahla\resources\views/produk/index.blade.php ENDPATH**/ ?>