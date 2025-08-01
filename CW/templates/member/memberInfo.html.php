<?php session_start();?>
<div class="container mx-auto px-4 py-8">
    <div class="glass-effect rounded-lg p-6 max-w-2xl mx-auto relative">
        <div class="absolute top-4 right-4">
            <a href="" class="btn-hover bg-green-800 text-white font-semibold py-2 px-4 rounded-full flex items-center gap-2 hover:bg-green-900 transition-all">
                <i class="fas fa-pencil-alt"></i>
            </a>
        </div>
        <div class="flex flex-col items-center mb-6">
            <form id="avatarForm" action="../upDateAvatar.php" method="post" enctype="multipart/form-data">
                <input type="file" name="userAvatar" id="avatarInput" accept="image/*" class="hidden"
                    onchange="document.getElementById('avatarForm').submit();">
                
                    <img src="data:image/jpeg;base64,<?= base64_encode($_SESSION['userAvatar'] ?? '') ?>" alt="User Avatar"
                    alt="Profile Image"
                    class="transition-transform duration-200 hover:scale-110 cursor-pointer mx-auto w-32 h-32 sm:w-40 sm:h-40 object-cover rounded-full mb-6 border-2 border-gray-400 bg-gray-50 shadow-md cursor-pointer"
                    onclick="document.getElementById('avatarInput').click();"
                    title="Click to change your profile picture">
            </form>
            <h2 class="text-2xl font-bold text-gray-800 text-shadow-md">Member Information</h2>
        </div>
        <div class="space-y-4">
            <p class="text-lg text-gray-700">
                <span class="font-semibold">Full Name:</span> 
                <?= htmlspecialchars($_SESSION['Fullname'] ?? 'Unknown', ENT_QUOTES, 'UTF-8') ?>
            </p>
            <p class="text-lg text-gray-700">
                <span class="font-semibold">Email:</span> 
                <?= htmlspecialchars($_SESSION['Email'] ?? 'Unknown', ENT_QUOTES, 'UTF-8') ?>
            </p>
            <p class="text-lg text-gray-700">
                <span class="font-semibold">Address:</span> 
                <?= htmlspecialchars($_SESSION['Address'] ?? 'Unknown', ENT_QUOTES, 'UTF-8') ?>
            </p>
            <p class="text-lg text-gray-700">
                <span class="font-semibold">Phone Number:</span> 
                <?= htmlspecialchars($_SESSION['Phonenumber'] ?? 'Unknown', ENT_QUOTES, 'UTF-8') ?>
            </p>
            <p class="text-lg text-gray-700">
                <span class="font-semibold">Account Created On:</span> 
                <?= htmlspecialchars($_SESSION['createDate'] ?? 'Unknown', ENT_QUOTES, 'UTF-8') ?>
            </p>
        </div>
    </div>
</div>