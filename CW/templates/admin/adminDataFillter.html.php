
<?php session_start(); ?>
<div class="container mx-auto px-4 py-8 max-w-2xl bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Module Management</h2>

    <form action="../admin/adminDataFillter.php" method="post" class="mb-8 flex gap-4 items-end">
        <div class="flex-1">
            <label class="block font-semibold text-gray-700">Module Name</label>
            <input name="ModuleName"  required class="w-full p-3 border border-gray-300 rounded-md focus:ring-green-500" />

            <label class="block font-semibold text-gray-700">Module Discription</label>
            <input name="ModuleDiscription" required class="w-full p-3 border border-gray-300 rounded-md focus:ring-green-500" />
        </div>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded shadow hover:bg-green-700">Add Module</button>
    </form>

    <h3 class="text-lg font-semibold text-gray-700 mb-4">Available Modules</h3>
    <ul class="space-y-3">
        <?php if (!empty($modules)): ?>
            <?php foreach ($modules as $module): ?>
                <li class="flex items-center justify-between bg-white rounded-lg shadow p-4 hover:bg-green-50">
                    <a href="modulePosts.php?ModuleID=<?= $module['ModuleID'] ?>" class="flex-1">
                        <div class="flex flex-col">
                            <span class="font-bold text-green-700 text-lg"><?= htmlspecialchars($module['ModuleName']) ?></span>
                            <?php if (!empty($module['ModuleDiscription'])): ?>
                                <span class="text-gray-600 text-sm mb-1"><?= htmlspecialchars($module['ModuleDiscription']) ?></span>
                            <?php endif; ?>
                            <?php if (isset($module['PostCount'])): ?>
                                <span class="text-xs text-gray-500">Posts: <?= $module['PostCount'] ?></span>
                            <?php endif; ?>
                        </div>
                    </a>
                    <form action="../admin/deleteModule.php" method="post" onsubmit="return confirm('Delete this module?')">
                        <input type="hidden" name="ModuleID" value="<?= $module['ModuleID'] ?>">
                        <button type="submit" class="ml-4 bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 text-xs">Delete</button>
                    </form>
                    <form action="../admin/editModule.php" method="post">
                        <input type="hidden" name="ModuleID" value="<?= $module['ModuleID'] ?>">
                        <button type="submit" class="ml-4 bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600 text-xs">Edit</button>
                    </form>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li class="text-gray-500">No modules found.</li>
        <?php endif; ?>
    </ul>
</div>
