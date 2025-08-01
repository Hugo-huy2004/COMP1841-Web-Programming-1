<?php session_start(); ?>
<div class="container mx-auto px-4 py-8">
    <form method="get" action="../admin/adminManageAccount.php" class="mb-6">
        <input type="text" name="search" placeholder="Entering the information of member"
               value="<?= htmlspecialchars($search ?? '', ENT_QUOTES) ?>"
               class="w-full md:w-1/2 p-3 border border-gray-300 rounded-md focus:ring-green-500" />
    </form>

    <div class="mb-4">
        <a href="../admin/adminAddUser.php" class="bg-green-600 text-white px-4 py-2 rounded shadow hover:bg-green-700 inline-block">
            Add Member
        </a>
    </div>

    <?php if (!empty($Users)): ?>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 shadow-md rounded-xl overflow-hidden">
                <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                    <tr>
                        <th class="px-4 py-3 text-left">Username</th>
                        <th class="px-4 py-3 text-left">Full Name</th>
                        <th class="px-4 py-3 text-left">Email</th>
                        <th class="px-4 py-3 text-left">Phone</th>
                        <th class="px-4 py-3 text-left">Address</th>
                        <th class="px-4 py-3 text-left">Role</th>
                        <th class="px-4 py-3 text-left">Password</th>
                        <th class="px-4 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($Users as $User): ?>
                        <tr class="border-t border-gray-200 hover:bg-gray-50 text-sm">
                            <td class="px-4 py-2"><?= htmlspecialchars($User['Username']) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($User['Fullname']) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($User['Email']) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($User['Phonenumber']) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($User['Address']) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($User['Role']) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($User['Password']) ?></td>
                            <td class="px-4 py-2 text-center">
                                <form action="../admin/adminDeleteUser.php" method="post" onsubmit="return confirm('Are you sure you want to delete this member?')">
                                    <input type="hidden" name="userID" value="<?= $User['userID'] ?>">
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-xs">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p class="text-gray-500 mt-4">No members found.</p>
    <?php endif; ?>
</div>
