<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <title><?=$title?></title>
    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }

        .btn-hover {
            transition: all 0.3s ease-in-out;
        }

        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        .text-shadow-md {
            text-shadow: 1px 1px 0px #444;
        }

        body {
            background-color: #f3f4f6;
            font-family: sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: linear-gradient(to right, #10b981, #059669);
            color: #ffffff;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
                0 2px 4px -1px rgba(0, 0, 0, 0.06);
            z-index: 10;
        }

        header .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            font-size: 1.5rem;
            font-weight: 700;
        }

        header .search-container {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        header input {
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            background-color: #ffffff;
            color: #1f2937;
            border: 1px solid #e5e7eb;
            outline: none;
            width: 16rem;
        }

        header input:focus {
            box-shadow: 0 0 0 2px #015a32ff;
        }

        header button {
            background-color: #054228ff;
            color: #ffffff;
            font-size: 1rem;
            padding: 0.8rem 1.8rem;
            border-radius: 999px;
            border: none;
            cursor: pointer;
        }

        header button:hover {
            background-color: #083d00ff;
        }

        nav {
            background-color: #ffffff;
            margin-top: 5rem;
        }

        nav .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 1rem;
            display: flex;
            justify-content: center;
        }

        nav ul {
            display: flex;
            gap: 2rem;
            margin-inline: 15;
        }

        nav a {
            color: #004706ff;
            font-weight: 600;
            padding: 0.5rem;
            border-radius: 0.5rem;
            text-decoration: none;
            transition: color 0.3s;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.75rem; /* tăng khoảng cách icon và text */
        }

        .nav-list {
            display: flex;
            gap: 3rem;
        }

        nav span {
            font-size: 0.875rem;
            color: #0a5421ff;
            transition: color 0.3s;
        }

        main {
            flex-grow: 1;
            margin-top: 1rem;
        }

        footer .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 1rem;
            text-align: center;
        }

        footer {
            background-color: #ffe9c3;
            text-align: center;
            padding: 20px 0;
            border-bottom: 5px solid #757575;
            z-index: 1000;
        }

        footer p {
            color: rgb(37, 85, 44);
            font-size: 1rem;
            font-family: Arial;
            font-weight: 1000;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1 class="text-shadow-md">Student Help Zone</h1>
            <div class="search-container">
                <form action="../login/logout.php">
                    <button class="btn-hover">Log out</button>
                </form>
            </div>
        </div>
    </header>

    <nav class="glass-effect">
        <div class="container">
            <ul class="nav-list">
                <li class="text-center">
                    <a href="../admin/adminHome.php" class="btn-hover nav-link">
                        <i class="fas fa-house-chimney fa-lg nav-icon"></i>
                        <span>Home Page</span>
                    </a>
                </li>
                <li class="text-center">
                    <a href="../admin/adminDataFillter.php" class="btn-hover nav-link">
                        <i class="fas fa-database fa-lg nav-icon"></i>
                        <span>Data Filter</span>
                    </a>
                </li>
                <li class="text-center">
                    <a href="../admin/adminManageAccount.php" class="btn-hover nav-link">
                        <i class="fas fa-user-gear fa-lg nav-icon"></i>
                        <span>Manage Account</span>
                    </a>
                </li>
                <li class="text-center">
                    <a href="../admin/adminMailBox.php" class="btn-hover nav-link">
                        <i class="fas fa-envelope fa-lg nav-icon"></i>
                        <span>Mail Box</span>
                    </a>
                </li>
                <li class="text-center">
                    <a href="../admin/adminMailForm.php" class="btn-hover nav-link">
                        <i class="fas fa-paper-plane fa-lg nav-icon"></i>
                        <span>Mail Form</span>
                    </a>
                </li>
                <li class="text-center">
                    <a href="../admin/adminInfo.php" class="btn-hover nav-link">
                        <i class="fas fa-id-badge fa-lg nav-icon"></i>
                        <span>Information</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <main>
        <?=$content?>
    </main>

    <footer>
        <div class="container">
            <p>&copy;Hugo-eduDev - University of Greenwich</p>
        </div>
    </footer>
</body>
</html>
