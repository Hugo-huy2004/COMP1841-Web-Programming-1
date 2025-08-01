<?php ob_start();?>

<div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold text-green-700 mb-6">Edit Post</h2>
    <form action="../admin/editpost.php" method="post" enctype="multipart/form-data" class="space-y-4">
        <input type="hidden" name="postID" value="<?= htmlspecialchars($post['PostID'] ?? '') ?>">
        <div>
            <label class="block font-semibold text-gray-700">Title</label>
            <input name="Title" value="<?= htmlspecialchars($post['Title'] ?? '') ?>" required class="w-full p-2 border rounded" />
        </div>
        <div>
            <label class="block font-semibold text-gray-700">Content</label>
            <textarea name="Content" rows="3" required class="w-full p-2 border rounded"><?= htmlspecialchars($post['Content'] ?? '') ?></textarea>
        </div>
        <div>
            <label class="block font-semibold text-gray-700">Module</label>
            <select name="ModuleID" required class="w-full p-2 border rounded">
                <?php foreach ($modules as $m): ?>
                    <option value="<?= $m['ModuleID'] ?>" <?= ($post['ModuleID'] == $m['ModuleID']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($m['ModuleName']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="w-full bg-green-600 text-white font-semibold py-2 rounded hover:bg-green-700">Save Changes</button>
    </form>
</div>
