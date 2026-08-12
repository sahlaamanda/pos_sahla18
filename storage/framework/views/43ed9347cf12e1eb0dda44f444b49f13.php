
<?php if(!empty($produk?->foto)): ?>
    <div class="mb-3">
        <label class="form-label">Foto Saat Ini</label>
        <br>

        <img
            src="<?php echo e(asset('storage/' . $produk->foto)); ?>"
            width="150"
            height="150"
            class="img-thumbnail"
            style="object-fit: cover;"
            alt="Foto <?php echo e($produk->nama ?? 'Produk'); ?>"
        >
    </div>
<?php endif; ?>



<div class="row">
    <div class="col-md-6">
        <div class="mb-3">

            <label for="foto" class="form-label">
                Foto Produk
            </label>

            <input
                type="file"
                id="foto"
                name="foto"
                accept="image/jpeg,image/png,image/jpg,image/webp"
                onchange="previewImage(this)"
                class="form-control <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
            >

            <small class="text-muted">
                Format: JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
            </small>

            <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback">
                    <?php echo e($message); ?>

                </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        </div>
    </div>


    
    <div class="col-md-6">
        <div class="mb-3">

            <label class="form-label">
                Preview Foto
            </label>

            <br>

            <img
                id="preview"
                src="<?php echo e(!empty($produk?->foto) ? asset('storage/' . $produk->foto) : ''); ?>"
                class="img-thumbnail mt-2"
                width="150"
                height="150"
                alt="Preview Foto"
                style="
                    object-fit: cover;
                    <?php echo e(!empty($produk?->foto) ? '' : 'display:none;'); ?>

                "
            >

        </div>
    </div>
</div>



<div class="mb-3">

    <label for="nama" class="form-label">
        Nama Produk
    </label>

    <input
        type="text"
        id="nama"
        name="nama"
        class="form-control <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
        value="<?php echo e(old('nama', $produk?->nama ?? '')); ?>"
        placeholder="Masukkan nama produk"
        required
    >

    <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback">
            <?php echo e($message); ?>

        </div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

</div>



<div class="mb-3">

    <label for="jenis_id" class="form-label">
        Jenis Produk
    </label>

    <select
        id="jenis_id"
        name="jenis_id"
        class="form-select <?php $__errorArgs = ['jenis_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
        required
    >

        <option value="">
            -- Pilih Jenis Produk --
        </option>

        <?php $__empty_1 = true; $__currentLoopData = $jenis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

            <option
                value="<?php echo e($j->id); ?>"
                <?php echo e(old('jenis_id', $produk?->jenis_id) == $j->id ? 'selected' : ''); ?>

            >
                <?php echo e($j->nama_jenis); ?>

            </option>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

            <option value="" disabled>
                Belum ada jenis produk
            </option>

        <?php endif; ?>

    </select>

    <?php $__errorArgs = ['jenis_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback">
            <?php echo e($message); ?>

        </div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

</div>



<div class="mb-3">

    <label for="harga_beli" class="form-label">
        Harga Beli
    </label>

    <input
        type="number"
        id="harga_beli"
        name="harga_beli"
        class="form-control <?php $__errorArgs = ['harga_beli'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
        value="<?php echo e(old('harga_beli', $produk?->harga_beli ?? '')); ?>"
        min="0"
        placeholder="Masukkan harga beli"
        required
    >

    <?php $__errorArgs = ['harga_beli'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback">
            <?php echo e($message); ?>

        </div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

</div>



<div class="mb-3">

    <label for="harga_jual" class="form-label">
        Harga Jual
    </label>

    <input
        type="number"
        id="harga_jual"
        name="harga_jual"
        class="form-control <?php $__errorArgs = ['harga_jual'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
        value="<?php echo e(old('harga_jual', $produk?->harga_jual ?? '')); ?>"
        min="0"
        placeholder="Masukkan harga jual"
        required
    >

    <?php $__errorArgs = ['harga_jual'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback">
            <?php echo e($message); ?>

        </div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

</div>



<div class="mb-3">

    <label for="stok" class="form-label">
        Stok
    </label>

    <input
        type="number"
        id="stok"
        name="stok"
        class="form-control <?php $__errorArgs = ['stok'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
        value="<?php echo e(old('stok', $produk?->stok ?? '')); ?>"
        min="0"
        placeholder="Masukkan jumlah stok"
        required
    >

    <?php $__errorArgs = ['stok'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback">
            <?php echo e($message); ?>

        </div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

</div>



<div class="d-flex gap-2 mt-4">

    <button type="submit" class="btn btn-primary">
        💾 Simpan
    </button>

    <a
        href="<?php echo e(route('admin.produk.index')); ?>"
        class="btn btn-secondary"
    >
        Batal
    </a>

</div>



<script>
function previewImage(input) {

    const preview = document.getElementById('preview');

    if (!input.files || !input.files[0]) {
        return;
    }

    const file = input.files[0];

    if (file.size > 2 * 1024 * 1024) {

        alert('Ukuran foto maksimal 2 MB.');

        input.value = '';
        preview.src = '';
        preview.style.display = 'none';

        return;
    }

    const allowedTypes = [
        'image/jpeg',
        'image/png',
        'image/jpg',
        'image/webp'
    ];

    if (!allowedTypes.includes(file.type)) {

        alert('Format foto harus JPG, JPEG, PNG, atau WEBP.');

        input.value = '';
        preview.src = '';
        preview.style.display = 'none';

        return;
    }

    const reader = new FileReader();

    reader.onload = function(event) {

        preview.src = event.target.result;
        preview.style.display = 'inline-block';

    };

    reader.readAsDataURL(file);
}
</script><?php /**PATH C:\laragon\www\pos_sahla\resources\views/produk/_form.blade.php ENDPATH**/ ?>