<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'App Pegawai')</title>
    <style>
        /* ===== VARIABLES & RESET ===== */
        :root {
            --primary: #3b82f6;
            --primary-dark: #2563eb;
            --secondary: #64748b;
            --accent: #f59e0b;
            --success: #10b981;
            --danger: #ef4444;
            --light: #f8fafc;
            --dark: #1e293b;
            --gray: #94a3b8;
            --border: #e2e8f0;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --radius: 8px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--dark);
            background-color: #f1f5f9;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ===== HEADER STYLES ===== */
        header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        header h1 {
            padding: 1.5rem 2rem;
            font-size: 1.8rem;
            font-weight: 700;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }

        /* ===== NAVIGATION STYLES ===== */
        nav {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }

        nav ul {
            display: flex;
            list-style: none;
            padding: 0 2rem;
            gap: 0.5rem;
        }

        nav li {
            position: relative;
        }

        nav a {
            display: block;
            padding: 1rem 1.5rem;
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
            transition: all 0.3s ease;
            border-radius: var(--radius) var(--radius) 0 0;
            position: relative;
            overflow: hidden;
        }

        nav a:hover {
            background: var(--light);
            color: var(--primary);
            transform: translateY(-2px);
        }

        nav a:hover::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--primary);
        }

        nav a:active {
            transform: translateY(0);
        }

        /* ===== MAIN CONTENT STYLES ===== */
        main {
            flex: 1;
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }

        .content-container {
            background: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        /* ===== FOOTER STYLES ===== */
        footer {
            background: var(--dark);
            color: white;
            text-align: center;
            padding: 1.5rem;
            margin-top: auto;
        }

        footer p {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        /* ===== RESPONSIVE DESIGN ===== */
        @media (max-width: 768px) {
            header h1 {
                padding: 1rem;
                font-size: 1.5rem;
                text-align: center;
            }

            nav ul {
                flex-direction: column;
                padding: 0;
            }

            nav a {
                padding: 0.75rem 1rem;
                border-radius: 0;
                border-bottom: 1px solid var(--border);
            }

            nav a:hover::before {
                height: 100%;
                width: 4px;
            }

            main {
                padding: 1rem;
            }

            .content-container {
                padding: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            header h1 {
                font-size: 1.3rem;
                padding: 0.75rem;
            }

            nav a {
                padding: 0.6rem 0.8rem;
                font-size: 0.9rem;
            }

            main {
                padding: 0.5rem;
            }

            .content-container {
                padding: 1rem;
            }
        }

        /* ===== ANIMATIONS ===== */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .content-container {
            animation: fadeIn 0.5s ease-out;
        }

        /* ===== ACTIVE LINK STYLING ===== */
        nav a.active {
            background: var(--primary);
            color: white;
        }

        nav a.active::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--accent);
        }

        /* ===== UTILITY CLASSES ===== */
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .mt-1 { margin-top: 0.5rem; }
        .mt-2 { margin-top: 1rem; }
        .mt-3 { margin-top: 1.5rem; }
        .mb-1 { margin-bottom: 0.5rem; }
        .mb-2 { margin-bottom: 1rem; }
        .mb-3 { margin-bottom: 1.5rem; }
        .p-1 { padding: 0.5rem; }
        .p-2 { padding: 1rem; }
        .p-3 { padding: 1.5rem; }

    </style>
</head>
<body>
    <header>
        <h1>@yield('page-title', 'App Pegawai')</h1>
        <nav>
            <ul>
                <li><a href="{{ url('/employees') }}">Employee</a></li>
                <li><a href="{{ url('/departments') }}">Department</a></li>
                <li><a href="{{ url('/attendances') }}">Attendance</a></li>
                <li><a href="{{ url('/salaries') }}">Salary</a></li>
                <li><a href="{{ url('/positions') }}">Position</a></li>
            </ul>   
        </nav>
    </header>
    <main>
        <div class="content-container">
            @yield('content')
        </div>
    </main>
    <footer>
        <p>&copy; {{ date('Y') }} App Pegawai - Human Resources Management System</p>
    </footer>

    <script>
        // Add active class to current page navigation
        document.addEventListener('DOMContentLoaded', function() {
            const currentUrl = window.location.pathname;
            const navLinks = document.querySelectorAll('nav a');
            
            navLinks.forEach(link => {
                if (link.getAttribute('href') === currentUrl) {
                    link.classList.add('active');
                }
            });
        });
    </script>
</body>
</html>