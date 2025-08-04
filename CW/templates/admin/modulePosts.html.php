<div class="mx-auto w-[768px]">
    <div class="flex mb-3 mx-auto gap-2">
        <a href="../admin/adminDatafillter.php" class="inline-block px-3 py-2 bg-green-500 text-white rounded-full shadow hover:bg-green-600 transition" title="Quay lại"><i class="fas fa-arrow-left"></i></a>
        <div class="mx-auto font-bold text-2xl text-green-700">All post of Module <?=htmlspecialchars($module['ModuleName'],ENT_QUOTES,'UTF-8')?></div>
    </div>
</div>
<?php if (!empty($posts)): ?>
<?php foreach ($posts as $post):?>
<div class="bg-white rounded-2xl shadow-lg p-6 mb-6 border border-gray-200 hover:shadow-xl transition w-[768px] mx-auto">
    <div class="items-center gap-4 mb-4">
        <div class="flex items-center gap-4 mb-4">
            <img src="data:image/jpeg;base64,<?=base64_encode($post['userAvatar'])?>" class="w-14 h-14 rounded-full object-cover border-2 border-green-400">
            <div class="flex-1">
                <div class="flex items-center gap-2 mb-1">
                    <span class="font-bold text-lg text-gray-900"><?= htmlspecialchars($post['Fullname'] ?? 'Unknown', ENT_QUOTES, 'UTF-8') ?></span>
                    <span class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded-full font-semibold ml-2">
                        <?= htmlspecialchars($post['ModuleName'] ?? 'No Module', ENT_QUOTES, 'UTF-8') ?>
                    </span>
                </div>
                <span class="text-xs text-gray-500 mb-2 block"><?= htmlspecialchars($post['DateOfPost'] ?? 'No Date', ENT_QUOTES, 'UTF-8') ?></span>
            </div>
        </div>
        <div class="items-center gap-2 ml-auto">
            <h3 class="text-xl font-semibold text-gray-900 mb-2"><?= htmlspecialchars($post['Title'] ?? 'No Title', ENT_QUOTES, 'UTF-8') ?></h3>
            <p class="text-base text-gray-800 mb-2 whitespace-pre-line"><?= htmlspecialchars($post['Content'] ?? 'No Content', ENT_QUOTES, 'UTF-8') ?></p>
        </div>
    </div>
</div>
<?php endforeach;?>
<?php else:?>
    <div class="italic text-gray-500 text-xl text-center mx-auto mt-20">This module have no post</div>
<?php endif; ?>