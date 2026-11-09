<!DOCTYPE html>
<html lang="en" id="html-root">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TANJ POS')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4f46e5;
            --primary-light: #6366f1;
            --primary-dark: #4338ca;
            --secondary: #f59e0b;
            --secondary-light: #fbbf24;
            --dark: #0f172a;
            --dark-light: #1e293b;
            --light: #f8fafc;
            --muted: #64748b;
            --border: #e2e8f0;
            --success: #10b981;
            --danger: #ef4444;
            --info: #0ea5e9;
            --radius: 12px;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --bg-body: var(--light);
            --bg-card: #ffffff;
            --bg-nav: linear-gradient(135deg, var(--dark) 0%, var(--dark-light) 100%);
            --text-primary: var(--dark);
            --text-secondary: var(--muted);
            --border-color: var(--border);
        }
        [data-theme="dark"] {
            --bg-body: #0f172a;
            --bg-card: #1e293b;
            --text-primary: #f1f5f9;
            --text-secondary: #94a3b8;
            --border-color: #334155;
            --light: #1e293b;
            --muted: #94a3b8;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: var(--bg-body);
            color: var(--text-primary);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        nav {
            background: var(--bg-nav);
            padding: 0 2rem;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: var(--shadow-lg);
        }
        .nav-container {
            max-width: 1280px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 72px;
        }
        .logo {
            color: #fff;
            font-size: 1.75rem;
            font-weight: 800;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            letter-spacing: -0.5px;
        }
        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }
        .logo span {
            color: var(--secondary);
        }
        nav ul {
            list-style: none;
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }
        nav a {
            color: #cbd5e1;
            text-decoration: none;
            font-weight: 500;
            padding: 0.625rem 1.25rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            position: relative;
        }
        nav a:hover {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.1);
        }
        nav a.active {
            color: #fff;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.4);
        }
        .nav-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .theme-toggle {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            color: #fff;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 1.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        .theme-toggle:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: rotate(15deg);
        }
        .notification-btn {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            color: #fff;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 1.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            position: relative;
        }
        .notification-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }
        .notification-badge {
            position: absolute;
            top: -4px;
            right: -4px;
            background: var(--danger);
            color: #fff;
            font-size: 0.65rem;
            font-weight: 700;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid var(--dark);
        }
        .profile-btn {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            color: #fff;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        .profile-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: scale(1.05);
        }
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: #fff;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 0.5rem;
        }
        main {
            max-width: 1280px;
            margin: 0 auto;
            padding: 2.5rem 1.5rem;
            min-height: calc(100vh - 160px);
        }
        h1 {
            margin-bottom: 1.5rem;
            color: var(--text-primary);
            font-size: 2.25rem;
            font-weight: 800;
            letter-spacing: -0.5px;
        }
        h2 {
            margin-bottom: 1rem;
            color: var(--text-primary);
            font-size: 1.5rem;
            font-weight: 700;
        }
        h3 {
            margin-bottom: 0.5rem;
            color: var(--text-primary);
            font-size: 1.125rem;
            font-weight: 600;
        }
        p {
            margin-bottom: 1rem;
            color: var(--text-secondary);
            line-height: 1.7;
        }
        .card {
            background-color: var(--bg-card);
            border-radius: var(--radius);
            padding: 1.75rem;
            box-shadow: var(--shadow);
            margin-bottom: 1.5rem;
            border: 1px solid var(--border-color);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }
        .grid {
            display: grid;
            gap: 1.5rem;
        }
        .grid-4 {
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        }
        .grid-3 {
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        }
        .grid-2 {
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        }
        .stat-card {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            color: #fff;
            border-radius: var(--radius);
            padding: 1.75rem;
            text-align: center;
            box-shadow: var(--shadow);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }
        .stat-card h3 {
            font-size: 2.75rem;
            font-weight: 800;
            margin-bottom: 0.25rem;
            background: linear-gradient(135deg, #fff, #e0e7ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .stat-card p {
            color: rgba(255,255,255,0.9);
            margin: 0;
            font-weight: 500;
        }
        .stat-card-icon {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            opacity: 0.9;
        }
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(79, 70, 229, 0.4);
        }
        .btn-secondary {
            background: linear-gradient(135deg, var(--secondary), var(--secondary-light));
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
        }
        .btn-secondary:hover {
            box-shadow: 0 6px 16px rgba(245, 158, 11, 0.4);
        }
        .btn-outline {
            background: transparent;
            border: 2px solid var(--primary);
            color: var(--primary);
            box-shadow: none;
        }
        .btn-outline:hover {
            background: var(--primary);
            color: #fff;
        }
        .btn-sm {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
        }
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background-color: var(--bg-card);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            border: 1px solid var(--border-color);
        }
        th, td {
            padding: 1rem 1.25rem;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }
        th {
            background: linear-gradient(135deg, var(--dark), var(--dark-light));
            color: #fff;
            font-weight: 600;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        tr:last-child td {
            border-bottom: none;
        }
        tbody tr {
            transition: background-color 0.2s ease;
        }
        tbody tr:hover {
            background-color: rgba(79, 70, 229, 0.05);
        }
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
            padding: 0.375rem 0.875rem;
            border-radius: 999px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        .badge-active {
            background-color: #d1fae5;
            color: #065f46;
        }
        .badge-inactive {
            background-color: #fee2e2;
            color: #991b1b;
        }
        .badge-admin {
            background: linear-gradient(135deg, #fef3c7, #fde68a);
            color: #92400e;
        }
        .badge-cashier {
            background: linear-gradient(135deg, #dbeafe, #bfdbfe);
            color: #1e40af;
        }
        .badge-manager {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            color: #065f46;
        }
        .badge-supervisor {
            background: linear-gradient(135deg, #ede9fe, #ddd6fe);
            color: #5b21b6;
        }
        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.875rem;
            margin-right: 0.75rem;
        }
        .user-cell {
            display: flex;
            align-items: center;
        }
        .actions {
            display: flex;
            gap: 0.5rem;
        }
        .action-btn {
            padding: 0.375rem 0.75rem;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 500;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .action-btn.view {
            background-color: #dbeafe;
            color: #1e40af;
        }
        .action-btn.view:hover {
            background-color: #bfdbfe;
        }
        .action-btn.edit {
            background-color: #fef3c7;
            color: #92400e;
        }
        .action-btn.edit:hover {
            background-color: #fde68a;
        }
        .action-btn.delete {
            background-color: #fee2e2;
            color: #991b1b;
        }
        .action-btn.delete:hover {
            background-color: #fecaca;
        }
        .search-bar {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }
        .search-input {
            flex: 1;
            min-width: 250px;
            padding: 0.75rem 1rem;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            font-size: 1rem;
            background-color: var(--bg-card);
            color: var(--text-primary);
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }
        .search-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }
        .filter-select {
            padding: 0.75rem 1rem;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            font-size: 1rem;
            background-color: var(--bg-card);
            color: var(--text-primary);
            cursor: pointer;
        }
        .hero {
            background: linear-gradient(135deg, var(--dark) 0%, #1e3a8a 50%, var(--primary) 100%);
            color: #fff;
            border-radius: 20px;
            padding: 4rem 3rem;
            margin-bottom: 2.5rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: pulse 8s ease-in-out infinite;
        }
        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.1); opacity: 0.8; }
        }
        .hero h1 {
            color: #fff;
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1.25rem;
            position: relative;
            z-index: 1;
            letter-spacing: -1px;
        }
        .hero p {
            color: #cbd5e1;
            font-size: 1.2rem;
            max-width: 650px;
            margin: 0 auto 2rem;
            position: relative;
            z-index: 1;
        }
        .hero-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            position: relative;
            z-index: 1;
        }
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }
        .feature-card {
            background: var(--bg-card);
            border-radius: var(--radius);
            padding: 2rem;
            text-align: center;
            box-shadow: var(--shadow);
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
            border-color: var(--primary);
        }
        .feature-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 1rem;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
        }
        .feature-icon.primary {
            background: linear-gradient(135deg, #dbeafe, #bfdbfe);
        }
        .feature-icon.secondary {
            background: linear-gradient(135deg, #fef3c7, #fde68a);
        }
        .feature-icon.success {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
        }
        .feature-icon.info {
            background: linear-gradient(135deg, #e0f2fe, #bae6fd);
        }
        .cta-section {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: #fff;
            border-radius: var(--radius);
            padding: 3rem 2rem;
            text-align: center;
            margin-top: 2rem;
        }
        .cta-section h2 {
            color: #fff;
            font-size: 2rem;
            margin-bottom: 1rem;
        }
        .cta-section p {
            color: rgba(255,255,255,0.9);
            margin-bottom: 1.5rem;
        }
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        .dashboard-card {
            background: var(--bg-card);
            border-radius: var(--radius);
            padding: 1.5rem;
            box-shadow: var(--shadow);
            border: 1px solid var(--border-color);
        }
        .dashboard-card h3 {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-secondary);
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .chart-placeholder {
            height: 200px;
            background: linear-gradient(135deg, rgba(79, 70, 229, 0.1), rgba(99, 102, 241, 0.05));
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-secondary);
            font-size: 0.9rem;
        }
        .activity-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.75rem 0;
            border-bottom: 1px solid var(--border-color);
        }
        .activity-item:last-child {
            border-bottom: none;
        }
        .activity-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.875rem;
            flex-shrink: 0;
        }
        .activity-content {
            flex: 1;
        }
        .activity-content strong {
            display: block;
            font-size: 0.9rem;
            color: var(--text-primary);
        }
        .activity-content span {
            font-size: 0.8rem;
            color: var(--text-secondary);
        }
        .activity-time {
            font-size: 0.75rem;
            color: var(--text-secondary);
        }
        footer {
            background: linear-gradient(135deg, var(--dark) 0%, var(--dark-light) 100%);
            color: #94a3b8;
            padding: 3rem 0 1.5rem;
            margin-top: 3rem;
        }
        .footer-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1.5rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
        }
        .footer-section h4 {
            color: #fff;
            margin-bottom: 1rem;
            font-size: 1rem;
            font-weight: 600;
        }
        .footer-section p,
        .footer-section a {
            color: #94a3b8;
            text-decoration: none;
            font-size: 0.9rem;
            display: block;
            margin-bottom: 0.5rem;
            transition: color 0.2s ease;
        }
        .footer-section a:hover {
            color: #fff;
        }
        .footer-bottom {
            max-width: 1280px;
            margin: 2rem auto 0;
            padding: 1.5rem 1.5rem 0;
            border-top: 1px solid rgba(255,255,255,0.1);
            text-align: center;
            color: #64748b;
            font-size: 0.875rem;
        }
        .timeline {
            position: relative;
            padding-left: 2rem;
        }
        .timeline::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(to bottom, var(--primary), var(--secondary));
        }
        .timeline-item {
            position: relative;
            margin-bottom: 2rem;
            padding-left: 1.5rem;
        }
        .timeline-item::before {
            content: '';
            position: absolute;
            left: -2.25rem;
            top: 0.5rem;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--primary);
            border: 3px solid var(--bg-card);
            box-shadow: var(--shadow);
        }
        .timeline-item h3 {
            color: var(--primary);
            margin-bottom: 0.25rem;
        }
        .timeline-item p {
            color: var(--text-secondary);
            margin: 0;
        }
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .slide-up {
            animation: slideUp 0.5s ease-out;
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @media (max-width: 768px) {
            .mobile-menu-btn {
                display: block;
            }
            nav ul {
                display: none;
                position: absolute;
                top: 72px;
                left: 0;
                right: 0;
                background: var(--bg-nav);
                flex-direction: column;
                padding: 1rem;
                gap: 0.5rem;
            }
            nav ul.active {
                display: flex;
            }
            .nav-actions {
                display: none;
            }
            .hero {
                padding: 3rem 1.5rem;
            }
            .hero h1 {
                font-size: 2rem;
            }
            h1 {
                font-size: 1.75rem;
            }
            .search-bar {
                flex-direction: column;
            }
            .search-input,
            .filter-select {
                width: 100%;
            }
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <nav>
        <div class="nav-container">
            <a href="{{ route('home') }}" class="logo">
                <div class="logo-icon">🛒</div>
                TANJ<span>POS</span>
            </a>
            <button class="mobile-menu-btn" onclick="toggleMobileMenu()">☰</button>
            <ul id="mobile-menu">
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
                <li><a href="{{ route('customers.index') }}" class="{{ request()->routeIs('customers.*') ? 'active' : '' }}">Customers</a></li>
                <li><a href="{{ route('users.index') }}" class="{{ request()->routeIs('users.*') ? 'active' : '' }}">Users</a></li>
            </ul>
            <div class="nav-actions">
                <button class="notification-btn" onclick="showNotifications()">
                    🔔
                    <span class="notification-badge">3</span>
                </button>
                <button class="theme-toggle" onclick="toggleTheme()" id="theme-toggle">🌙</button>
                <button class="profile-btn" onclick="showProfile()">A</button>
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h4>TANJ POS</h4>
                <p>A modern point-of-sale system built with Laravel for efficient retail operations.</p>
            </div>
            <div class="footer-section">
                <h4>Quick Links</h4>
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('about') }}">About</a>
                <a href="{{ route('customers.index') }}">Customers</a>
                <a href="{{ route('users.index') }}">Users</a>
            </div>
            <div class="footer-section">
                <h4>Features</h4>
                <p>Customer Management</p>
                <p>User Management</p>
                <p>Sales Tracking</p>
                <p>Inventory Control</p>
            </div>
            <div class="footer-section">
                <h4>Contact</h4>
                <p>support@tanjpos.com</p>
                <p>+1 (555) 123-4567</p>
                <p>Mon-Fri: 9AM - 6PM</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} TANJ POS. All rights reserved.</p>
        </div>
    </footer>
    <script>
        // Theme toggle
        function toggleTheme() {
            const html = document.documentElement;
            const currentTheme = html.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            html.setAttribute('data-theme', newTheme);
            document.getElementById('theme-toggle').textContent = newTheme === 'dark' ? '☀️' : '🌙';
            localStorage.setItem('theme', newTheme);
        }

        // Load saved theme
        document.addEventListener('DOMContentLoaded', function() {
            const savedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-theme', savedTheme);
            document.getElementById('theme-toggle').textContent = savedTheme === 'dark' ? '☀️' : '🌙';
        });

        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('active');
        }

        function showNotifications() {
            alert('You have 3 new notifications:\n\n1. New customer registered\n2. Low stock alert for Item #42\n3. Daily sales report ready');
        }

        function showProfile() {
            alert('Profile Settings\n\nUsername: admin\nRole: Administrator\nStatus: Active');
        }

        // Add fade-in animation to cards on load
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.card, .stat-card, .feature-card');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.animation = `fadeIn 0.5s ease-in ${index * 0.1}s forwards`;
            });
        });
    </script>
</body>
</html>
