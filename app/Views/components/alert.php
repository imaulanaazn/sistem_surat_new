<?php if (session()->has('success') || session()->has('error')): ?>
    <?php if (session()->has('success')): ?>
        <div class="mb-4 rounded-lg bg-green-100 border border-green-400 text-green-700 px-4 py-3 relative" role="alert">
            <strong class="font-bold">Berhasil!</strong>
            <span class="block sm:inline"><?= esc(session('success')) ?></span>
        </div>
    <?php endif ?>

    <?php if (session()->has('error') && is_string(session('error'))): ?>
        <div class="mb-4 rounded-lg bg-red-100 border border-red-400 text-red-700 px-4 py-3 relative" role="alert">
            <strong class="font-bold">Gagal!</strong>
            <span class="block sm:inline"><?= esc(session('error')) ?></span>
        </div>
    <?php endif ?>

     <!-- ERROR VALIDATION (ARRAY) -->
    <?php if (session()->has('error') && is_array(session('error'))): ?>
        <div class="mb-4 rounded-lg bg-red-100 border border-red-400 text-red-700 px-4 py-3 relative" role="alert">
            <strong class="font-bold">Validasi Gagal!</strong>

            <ul class="mt-2 list-disc list-inside text-sm">
                <?php foreach (session('error') as $err): ?>
                    <li><?= esc($err) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif ?>
<?php endif ?>