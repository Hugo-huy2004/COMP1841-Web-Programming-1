<?php session_start(); ?>
<div class="container mx-auto px-4 py-8">
    <div class="w-full max-w-3xl mx-auto bg-white rounded-lg shadow border border-gray-200">
        <h2 class="text-3xl font-bold text-gray-800 px-6 pt-6 pb-4 border-b border-gray-100 flex items-center gap-3">
            <span class="inline-block bg-green-100 text-green-600 rounded-full p-2">
                <i class="fas fa-bell"></i>
            </span>
            Mailbox
        </h2>

        <?php if (!empty($notifications)): ?>
            <div class="divide-y divide-gray-200">
                <?php foreach ($notifications as $notification): ?>
                    <div class="relative px-6 py-4 hover:bg-gray-50 transition duration-150">
                        <form action="../admin/deleteMail.php" method="post"
                              class="absolute top-4 right-4"
                              onsubmit="return confirm('Are you sure to delete this message?');">
                            <input type="hidden" name="MailID" value="<?= htmlspecialchars($notification['MailID']) ?>">
                            <button type="submit" title="Delete this mail"
                                    class="text-gray-400 hover:text-red-600 text-xl font-bold">
                                &hellip;
                            </button>
                        </form>

                        <div class="mb-2">
                            <span class="text-sm text-gray-500">From:</span>
                            <span class="text-sm font-medium text-gray-800">
                                <?= htmlspecialchars($notification['Sender'], ENT_QUOTES, 'UTF-8') ?>
                            </span>
                        </div>

                        <div class="mb-2">
                            <span class="text-sm text-gray-500">Time:</span>
                            <span class="text-sm text-gray-800">
                                <?= htmlspecialchars($notification['MailDate'], ENT_QUOTES, 'UTF-8') ?>
                            </span>
                        </div>

                        <div class="mb-2">
                            <span class="text-sm text-gray-500">Subject:</span>
                            <span class="text-sm font-semibold text-green-700">
                                <?= htmlspecialchars($notification['Subject'], ENT_QUOTES, 'UTF-8') ?>
                            </span>
                        </div>

                        <div>
                            <span class="text-sm text-gray-500 block mb-1">Message:</span>
                            <div class="text-sm text-gray-800 whitespace-pre-line leading-snug">
                                <?= nl2br(htmlspecialchars($notification['Message'], ENT_QUOTES, 'UTF-8')) ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="text-gray-400 text-center text-lg py-20 flex flex-col items-center gap-2">
                <i class="fas fa-inbox text-5xl text-gray-300"></i>
                <span>No Mail.</span>
            </div>
        <?php endif; ?>
    </div>
</div>
