
<?php session_start(); ?>
<div class="max-w-2xl mx-auto p-4">
    <div class="bg-white rounded-lg shadow-md p-4 mb-6 border border-gray-200">
        <form action="../admin/addpost.php" method="post" class="space-y-3" enctype="multipart/form-data">
            <input type="hidden" name="userID" value="<?= htmlspecialchars($_SESSION['userID'] ?? '') ?>">
            <div class="flex gap-3 items-center">
                <img src="data:image/jpeg;base64,<?=base64_encode($_SESSION['userAvatar'])?>" class="w-10 h-10 rounded-full object-cover border border-gray-200">
                <input name="Title" placeholder="Title of your post" required class="flex-1 p-2 border rounded-md" />
            </div>
            <textarea name="Content" rows="2" placeholder="Write something..." required class="w-full p-2 border rounded-md"></textarea>
            <div class="flex gap-2 items-center">
                <select name="ModuleID" required class="p-2 border rounded-md">
                    <option value="">-- Select Module --</option>
                    <?php foreach ($modules as $m): ?>
                        <option value="<?= $m['ModuleID'] ?>"><?= htmlspecialchars($m['ModuleName']) ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="file" accept="image/*" name="PostImage" class="text-sm">
            </div>

            <button type="submit" class="w-full bg-green-600 text-white font-semibold py-2 rounded hover:bg-green-700">Post</button>
        </form>
    </div>

    <?php foreach ($posts as $post): ?>
        <div class="bg-white rounded-2xl shadow-lg p-6 mb-6 border border-gray-200 hover:shadow-xl transition">
            <div class="flex items-center gap-4 mb-3">
                <img src="data:image/jpeg;base64,<?=base64_encode($post['userAvatar'] ?? ($_post['userAvatar'] ?? ''))?>" class="w-16 h-16 rounded-full object-cover border-2 border-green-400">
                <div class="flex-1">
                    <div class="flex items-center gap-2">
                        <span class="font-bold text-lg text-gray-900"><?= htmlspecialchars($post['Fullname'] ?? 'Unknown', ENT_QUOTES, 'UTF-8') ?></span>
                        <span class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded-full font-semibold ml-2">
                            <?= htmlspecialchars($post['ModuleName'] ?? 'No Module', ENT_QUOTES, 'UTF-8') ?>
                        </span>
                    </div>
                    <span class="text-xs text-gray-500"><?= htmlspecialchars($post['DateOfPost'] ?? 'No Date', ENT_QUOTES, 'UTF-8') ?></span>
                </div>
                <div class="flex items-center gap-2 ml-auto">
                    <form action="../admin/deletepost.php" method="post" style="display:inline">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($post['PostID'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                        <button type="submit" title="Delete" class="text-black-500 hover:text-black-700 p-1"><i class="fas fa-times"></i></button>
                    </form>
                    <form action="../admin/editpost.php" method="post" style="display:inline">
                        <input type="hidden" name="PostID" value="<?= htmlspecialchars($post['PostID'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                        <button type="submit" title="Edit" class="text-black-500 hover:text-black-700 p-1">
                            <i class="fas fa-edit"></i>
                        </button>
                    </form>
                </div>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-2"><?= htmlspecialchars($post['Title'] ?? 'No Title', ENT_QUOTES, 'UTF-8') ?></h3>
            <p class="text-base text-gray-800 mb-4 whitespace-pre-line"><?= htmlspecialchars($post['Content'] ?? 'No Content', ENT_QUOTES, 'UTF-8') ?></p>
            <?php if($post['PostImage']): ?>
                <img src="data:image/jpeg;base64,<?=base64_encode($post['PostImage'])?>" class="object-cover w-3xl max-h-[400px] bg-gray-100 mx-auto rounded-md">
            <?php endif; ?>
            <div class="flex items-center gap-6 mt-2">
                <form action="../admin/comment.php" method="post">
                    <input type="hidden" name="postID" value="<?=htmlspecialchars($post['PostID'],ENT_QUOTES,'UTF-8')?>">
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-full text-base font-semibold transition">
                        Comment
                    </button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</div>
