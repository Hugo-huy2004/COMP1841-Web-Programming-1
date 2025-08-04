<?php session_start(); ?>
<div class="container mx-auto px-4 py-8">
    <div class="glass-effect rounded-lg p-6 max-w-2xl mx-auto relative">

        <form action="editAdminInfo.php" method="post" enctype="multipart/form-data" class="space-y-4 text-lg text-gray-700">
            <input type="hidden" value="<?= htmlspecialchars($_SESSION['userID'] ?? '', ENT_QUOTES, 'UTF-8') ?>" name="userID">

            <label for="Fullname" class="font-semibold">Full Name</label>
            <input type="text" value="<?= htmlspecialchars($_SESSION['Fullname'] ?? 'Unknown', ENT_QUOTES, 'UTF-8') ?>"
                   class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                   id="Fullname" name="Fullname" required>

            <label for="Email" class="font-semibold">Email:</label>
            <input type="email" value="<?= htmlspecialchars($_SESSION['Email'] ?? 'Unknown', ENT_QUOTES, 'UTF-8') ?>"
                   class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                   id="Email" name="Email" required>

            <label for="Address" class="font-semibold">Address:</label>
            <input type="text" value="<?= htmlspecialchars($_SESSION['Address'] ?? 'Unknown', ENT_QUOTES, 'UTF-8') ?>"
                   class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                   id="Address" name="Address" required>

            <label for="Phonenumber" class="font-semibold">Phone Number:</label>
            <input type="text" value="<?= htmlspecialchars($_SESSION['Phonenumber'] ?? 'Unknown', ENT_QUOTES, 'UTF-8') ?>"
                   class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                   id="Phonenumber" name="Phonenumber" required>

            <button type="submit" class="btn-hover bg-blue-600 text-white font-semibold py-2 px-4 rounded-full hover:bg-blue-700 transition-all mt-4">
                Update Information
            </button>
        </form>
    </div>
</div>