@extends('layouts.app')

@section('title', 'About - TANJ POS')

@section('content')
    <div class="card" style="text-align: center; padding: 3rem 2rem;">
        <h1 style="font-size: 2.5rem; margin-bottom: 1rem;">About TANJ POS</h1>
        <p style="font-size: 1.1rem; max-width: 700px; margin: 0 auto;">
            TANJ Point of Sale is a modern, comprehensive system designed to streamline retail and sales operations for businesses of all sizes.
        </p>
    </div>

    <div class="grid grid-3" style="margin-bottom: 2rem;">
        <div class="card" style="text-align: center;">
            <div class="feature-icon primary" style="margin: 0 auto 1rem;">🎯</div>
            <h2>Our Mission</h2>
            <p>To empower businesses with intuitive, efficient tools that simplify daily transactions and enhance customer relationships.</p>
        </div>
        <div class="card" style="text-align: center;">
            <div class="feature-icon secondary" style="margin: 0 auto 1rem;">👁️</div>
            <h2>Our Vision</h2>
            <p>To become the leading point-of-sale solution trusted by retailers worldwide for its reliability and innovation.</p>
        </div>
        <div class="card" style="text-align: center;">
            <div class="feature-icon success" style="margin: 0 auto 1rem;">💎</div>
            <h2>Our Values</h2>
            <p>Integrity, innovation, customer focus, and continuous improvement drive everything we do.</p>
        </div>
    </div>

    <div class="card">
        <h2>Our Journey</h2>
        <div class="timeline">
            <div class="timeline-item">
                <h3>2024 - Project Inception</h3>
                <p>TANJ POS was conceptualized to address the need for a modern, Laravel-based point-of-sale system.</p>
            </div>
            <div class="timeline-item">
                <h3>2025 - Core Development</h3>
                <p>Built the foundation with customer management, user management, and database integration.</p>
            </div>
            <div class="timeline-item">
                <h3>2026 - Modern Redesign</h3>
                <p>Complete UI/UX overhaul with modern design, responsive layout, dark mode, and enhanced user experience.</p>
            </div>
            <div class="timeline-item">
                <h3>Future - Expansion</h3>
                <p>Planning to add inventory management, sales reporting, multi-store support, and mobile app.</p>
            </div>
        </div>
    </div>

    <div class="grid grid-2">
        <div class="card">
            <h2>Technology Stack</h2>
            <p><strong>Backend:</strong> Laravel 12, PHP 8.2, Eloquent ORM</p>
            <p><strong>Database:</strong> SQLite (development), MySQL/PostgreSQL ready</p>
            <p><strong>Frontend:</strong> Blade Templates, Custom CSS, Vanilla JS, Responsive Design</p>
            <p><strong>Tools:</strong> Composer, Artisan, Git, GitHub, Cloudflare Tunnel</p>
        </div>
        <div class="card">
            <h2>Key Features</h2>
            <p>✅ Customer account management with full CRUD operations</p>
            <p>✅ User management with role-based access</p>
            <p>✅ Modern, responsive UI with dark mode</p>
            <p>✅ Real-time database integration</p>
            <p>✅ Mobile-friendly interface</p>
            <p>✅ Scalable architecture</p>
            <p>✅ Dashboard with analytics</p>
            <p>✅ Search and filter functionality</p>
        </div>
    </div>

    <div class="cta-section" style="margin-top: 2rem;">
        <h2>Join Our Community</h2>
        <p>Stay updated with the latest features and improvements to TANJ POS.</p>
        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
            <a href="{{ route('home') }}" class="btn" style="background: #fff; color: var(--primary); box-shadow: none;">Back to Home</a>
            <a href="{{ route('customers.index') }}" class="btn btn-secondary">View Customers</a>
        </div>
    </div>
@endsection
