<?php session_start();  ?>

<div class="flex justify-center">
    <div class="w-full max-w-xl">
        <div class="flex justify-between items-center mb-3">
            <a href="../member/memberHome.php" class="inline-block px-3 py-2 bg-green-500 text-white rounded-full shadow hover:bg-green-600 transition" title="Quay lại"><i class="fas fa-arrow-left"></i></a>
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
        <form action="../member/commentMember.php" method="post" class="mb-6 p-4 bg-white rounded-xl shadow flex flex-col gap-2">
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
                        <?php if ($_SESSION['userID'] == $cmt['userID'] || $_SESSION['Role'] == 'admin'): ?>
                            <div class="relative ml-auto">
                                <button class="text-gray-500 hover:text-gray-700 p-1" onclick="toggleMenu(this)">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <div class="absolute right-0 mt-2 w-32 bg-white border border-gray-200 rounded-md shadow-lg hidden z-10">
                                    <form action="../member/deletecommentMember.php" method="post" class="border-b border-gray-200">
                                        <input type="hidden" name="postID" value="<?=htmlspecialchars($post['PostID'], ENT_QUOTES,'UTF-8');?>">
                                        <input type="hidden" name="commentID" value="<?= htmlspecialchars($cmt['RepPostID'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                                        <button type="submit" title="Delete" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                            <i class="fas fa-trash mr-2"></i>Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="text-gray-500">None Comment.</div>
            <?php endif; ?>
        </div>
    </div>
    </div>
</div>

<script>
function toggleMenu(button) {
    // Đóng tất cả menu khác
    document.querySelectorAll('[class*="absolute right-0 mt-2"]').forEach(menu => {
        if (menu !== button.nextElementSibling) {
            menu.classList.add('hidden');
        }
    });
    
    // Toggle menu hiện tại
    const menu = button.nextElementSibling;
    menu.classList.toggle('hidden');
}

// Đóng menu khi click bên ngoài
document.addEventListener('click', function(event) {
    const menus = document.querySelectorAll('[class*="absolute right-0 mt-2"]');
    const buttons = document.querySelectorAll('button[onclick*="toggleMenu"]');
    
    let clickedInsideMenu = false;
    buttons.forEach(button => {
        if (button.contains(event.target)) {
            clickedInsideMenu = true;
        }
    });
    
    menus.forEach(menu => {
        if (!menu.contains(event.target) && !clickedInsideMenu) {
            menu.classList.add('hidden');
        }
    });
});
</script>
