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
        :root {
            --primary-green: #10b981;
            --dark-green: #054228;
            --darker-green: #083d00;
            --light-green: #059669;
            --accent-yellow: #ffe9c3;
            --text-dark: #1f2937;
            --shadow-color: rgba(0, 0, 0, 0.15);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(to bottom, #f3f4f6, #e5e7eb);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 4px 20px var(--shadow-color);
            border-radius: 1rem;
        }

        .btn-hover {
            transition: all 0.3s ease;
        }

        .btn-hover:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px var(--shadow-color);
        }

        header {
            position: sticky;
            top: 0;
            background: linear-gradient(to right, var(--primary-green), var(--light-green));
            color: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        header .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 1.25rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            font-size: 1.75rem;
            font-weight: 800;
            letter-spacing: -0.025em;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        header .search-container {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        header button {
            background-color: var(--dark-green);
            color: white;
            font-weight: 600;
            padding: 0.75rem 2rem;
            border-radius: 9999px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        header button:hover {
            background-color: var(--darker-green);
        }

        nav {
            background: transparent;
            margin-top: 0.5rem;
            padding: 0.5rem 0;
        }

        nav .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0.75rem;
            display: flex;
            justify-content: center;
        }

        nav ul {
            display: flex;
            gap: 2.5rem;
            list-style: none;
            padding: 0;
        }

        nav a {
            color: var(--dark-green);
            font-weight: 600;
            padding: 0.75rem 1rem;
            border-radius: 0.75rem;
            text-decoration: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        nav a:hover {
            background-color: var(--primary-green);
            color: white;
        }

        nav i {
            font-size: 1.5rem;
        }

        nav span {
            font-size: 0.9rem;
            font-weight: 500;
        }

        main {
            flex-grow: 1;
            max-width: 1280px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        footer {
            background-color: var(--accent-yellow);
            padding: 1.5rem 0;
            border-top: 4px solid var(--dark-green);
        }

        footer .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1rem;
            text-align: center;
        }

        footer p {
            color: var(--dark-green);
            font-size: 1rem;
            font-weight: 700;
            letter-spacing: 0.05em;
        }

        @media (max-width: 768px) {
            header .container {
                flex-direction: column;
                gap: 1rem;
            }

            header h1 {
                font-size: 1.5rem;
            }

            nav ul {
                flex-wrap: wrap;
                justify-content: center;
                gap: 1rem;
            }

            nav a {
                padding: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Student Help Zone</h1>
            <div class="search-container">
                <form action="../login/logout.php">
                    <button class="btn-hover">Log Out</button>
                </form>
            </div>
        </div>
    </header>

    <nav class="glass-effect">
        <div class="container">
            <ul>
                <li>
                    <a href="../member/memberHome.php" class="btn-hover">
                        <i class="fas fa-house-chimney"></i>
                        <span>Home Page</span>
                    </a>
                </li>
                <li>
                    <a href="../member/notification.php" class="btn-hover">
                        <i class="fas fa-envelope"></i>
                        <span>Notification</span>
                    </a>
                </li>
                <li>
                    <a href="../member/support.php" class="btn-hover">
                        <i class="fas fa-paper-plane"></i>
                        <span>Support</span>
                    </a>
                </li>
                <li>
                    <a href="../member/memberInfo.php" class="btn-hover">
                        <i class="fas fa-id-badge"></i>
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
            <p>© Hugo-eduDev - University of Greenwich</p>
        </div>
    </footer>
</body>
</html>