<?php session_start(); ?>
<div class="container mx-auto px-4 py-8 max-w-xl bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Add New Member</h2>

    <form action="../admin/adminAddUser.php" method="post" class="space-y-5">
        <div>
            <label class="block font-semibold text-gray-700">Username</label>
            <input name="Username" required class="w-full p-3 border border-gray-300 rounded-md focus:ring-green-500" />
        </div>

        <div>
            <label class="block font-semibold text-gray-700">Full Name</label>
            <input name="Fullname" required class="w-full p-3 border border-gray-300 rounded-md focus:ring-green-500" />
        </div>

        <div>
            <label class="block font-semibold text-gray-700">Email</label>
            <input type="email" name="Email" required class="w-full p-3 border border-gray-300 rounded-md focus:ring-green-500" />
        </div>

        <div>
            <label class="block font-semibold text-gray-700">Phone Number</label>
            <input name="Phonenumber" required class="w-full p-3 border border-gray-300 rounded-md focus:ring-green-500" />
        </div>

        <div>
            <label class="block font-semibold text-gray-700">Address</label>
            <input name="Address" required class="w-full p-3 border border-gray-300 rounded-md focus:ring-green-500" />
        </div>

        <div>
            <label class="block font-semibold text-gray-700">Role</label>
            <select name="Role" required class="appearance-none w-full p-3 border border-gray-300 rounded-md focus:ring-green-500">
                <option value="" disabled selected>-- Select Role --</option>
                <option value="admin">Admin</option>
                <option value="member">Member</option>
            </select>
        </div>

        <div>
            <label class="block font-semibold text-gray-700">Password</label>
            <input type="password" name="Password" required class="w-full p-3 border border-gray-300 rounded-md focus:ring-green-500" />
        </div>

        
        <button type="submit" class="pt-4"
                class="w-full bg-green-600 text-white font-semibold py-3 rounded-full hover:bg-green-700 transition-all">
            Add Member
        </button>
        
    </form>
</div>
