<?php session_start();  ?>

<div class="flex justify-center">
    <div class="w-full max-w-xl">
        <div class="flex justify-between items-center mb-3">
            <a href="../admin/adminHome.php" class="inline-block px-3 py-2 bg-green-500 text-white rounded-full shadow hover:bg-green-600 transition" title="Quay lại"><i class="fas fa-arrow-left"></i></a>
            <span class="font-bold text-lg text-green-700">Comment</span>
            <span></span>
        </div>
        <?php if (!empty($post)): ?>
        <div class="bg-white rounded-2xl shadow-lg p-6 mb-6 border border-gray-200 hover:shadow-xl transition">
            <div class="items-center gap-4 mb-4">
                <div class="flex items-center gap-4 mb-4">
                    <img src="data:image/jpeg;base64,<?=base64_encode($post['userAvatar'] ?? ($_SESSION['userAvatar'] ?? ''))?>" class="w-14 h-14 rounded-full object-cover border-2 border-green-400">
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
        <?php endif; ?>
    <div class="mt-2 space-y-4">
        <form action="../admin/comment.php" method="post" class="mb-6 p-4 bg-white rounded-xl shadow flex flex-col gap-2">
            <input type="hidden" name="postID" value="<?= htmlspecialchars($post['PostID'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
            <textarea name="repContent" rows="2" placeholder="" required class="w-full p-5 border border-green-300 rounded focus:outline-none focus:ring-2 focus:ring-green-400"></textarea>
            <button type="submit" class="self-end bg-green-600 text-white px-5 py-2 rounded-full font-semibold shadow hover:bg-green-700 transition flex items-center gap-2"><i class="fas fa-paper-plane"></i></button>
        </form>
        <div class="space-y-3">
            <?php if (!empty($comments)): ?>
                <?php foreach ($comments as $cmt): ?>
                    <div class="bg-gray-50 rounded-xl p-3 flex items-center justify-between border border-gray-200">
                        <div class="flex gap-1">
                            <img src="data:image/jpeg;base64,<?=base64_encode($cmt['userAvatar'])?>" class="w-14 h-14 rounded-full object-cover border-2 border-green-400">
                            <div class="bg-white rounded-3xl shadow-lg p-3 mb-3 border hover:shadow-xl transition mx-auto ">
                                <span class="font-semibold text-green-700">
                                <?= htmlspecialchars($cmt['Fullname'] ?? 'Unknown') ?>:
                                </span>
                                <span class="ml-2 text-gray-800">
                                    <?= htmlspecialchars($cmt['RepContent'] ?? '') ?>
                                </span>
                                <span class="text-xs text-gray-500 ml-2">
                                    <?= htmlspecialchars($cmt['DateOfReply'] ?? '') ?>
                                </span>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <form action="../admin/deletecomment.php" method="post" style="display:inline">
                                <input type="hidden" name="postID" value="<?=htmlspecialchars($post['PostID'], ENT_QUOTES,'UTF-8');?>">
                                <input type="hidden" name="commentID" value="<?= htmlspecialchars($cmt['RepPostID'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                                <button type="submit" title="Delete" class="text-red-300 hover:text-red-700 p-1 rounded-full bg-white shadow flex items-right justify-center"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="text-gray-500">None Comment.</div>
            <?php endif; ?>
        </div>
    </div>
    </div>
</div>
