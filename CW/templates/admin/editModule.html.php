<div class="container mx-auto px-4 py-8 max-w-md bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Module</h2>
    <form action="../admin/editModule.php" method="post" class="space-y-5">
        <input type="hidden" name="ModuleID" value="<?= htmlspecialchars($module['ModuleID']) ?>">
        <div>
            <label class="block font-semibold text-gray-700">Module Name</label>
            <input name="ModuleName" value="<?= htmlspecialchars($module['ModuleName']) ?>" required class="w-full p-3 border border-gray-300 rounded-md focus:ring-green-500" />
        </div>
        <div>
            <label class="block font-semibold text-gray-700">Module Description</label>
            <input name="ModuleDiscription" value="<?= htmlspecialchars($module['ModuleDiscription']) ?>" required class="w-full p-3 border border-gray-300 rounded-md focus:ring-green-500" />
        </div>
        <button type="submit" class="w-full bg-green-600 text-white font-semibold py-3 rounded-full hover:bg-green-700 transition-all">Save Changes</button>
    </form>
</div>
