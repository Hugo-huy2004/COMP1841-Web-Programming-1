<?php ob_start();?>
<div class="container mx-auto px-4 py-8">
    <div class="glass-effect rounded-lg p-6 max-w-2xl mx-auto">
        <form action="../admin/adminMailForm.php" method="post" class="space-y-6 text-lg text-gray-700">
            <label for="receiver" class="block font-semibold mb-1">Receiver mail:</label>
            <select name="receiver" id="receiver" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required>
                <?php foreach($users as $user):?>
                    <option value="<?=htmlspecialchars($user['userID'],ENT_QUOTES, 'UTF-8') ?>">
                        <?=htmlspecialchars($user['Email'],ENT_QUOTES,'UTF-8')?>
                    </option>
                <?php endforeach;?>
            </select>
            <label for="subject" class="block font-semibold mb-1">Subject:</label>
            <input type="text" name="subject" id="subject" 
                   class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required>
            <label for="message" class="block font-semibold mb-1">Message:</label>
            <textarea name="message" rows="6" 
                      class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required></textarea>
            <button type="submit" class="w-full bg-green-600 text-white font-semibold py-3 px-4 rounded-full hover:bg-green-700 transition-all">
                Send
            </button>
        </form>
    </div>
</div>