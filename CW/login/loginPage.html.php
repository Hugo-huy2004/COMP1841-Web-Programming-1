<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to Student Help Zone</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="h-screen w-screen">

    <div class="relative h-full w-full bg-cover bg-center" style="background-image: url('https://standoutinternational.net/upload/filemanager/g1.jpg');">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center px-4">

            <header class="mb-8 text-center">
                <h1 class="text-5xl font-extrabold text-white tracking-wide">STUDENT HELP ZONE</h1>
                <p class="text-xl text-gray-200 mt-2">Welcome to Greenwich University</p>
            </header>

            <form action="validate.php" method="post" class="w-full max-w-md bg-white/80 backdrop-blur-md rounded-xl shadow-lg p-8 space-y-4">
                <h2 class="text-2xl font-semibold text-center text-gray-800">Login</h2>
                <p class="text-sm text-center text-gray-600 mb-4">Program for Administrator & Student</p>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="text" name="email" id="email" required
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" required
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent">
                </div>

                <button type="submit"
                    class="w-full bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 transition font-semibold">
                    Login
                </button>
            </form>

            <footer class="mt-8 text-sm text-gray-300 text-center">
                &copy; <?= date('Y') ?> Hugo-eduDev - University of Greenwich
            </footer>
        </div>
    </div>

</body>
</html>

<script>
    <?php if(isset($_SESSION['error'])): ?>
        Swal.fire({
            icon: 'error',
            title: 'Login Fail!',
            text: '<?= addslashes($_SESSION['error'])?>'
        });
        <?php unset($_SESSION['error']);?>
    <?php endif; ?>
</script>