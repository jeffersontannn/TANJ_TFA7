@extends('layouts.app')

@section('title', 'Home - TANJ POS')

@section('content')
    <div class="hero slide-up">
        <h1>Welcome to TANJ Point of Sale</h1>
        <p>A modern, powerful POS system built with Laravel to streamline your retail operations, manage customers, and track sales efficiently.</p>
        <div class="hero-actions">
            <a href="{{ route('customers.index') }}" class="btn btn-secondary">View Customers</a>
            <a href="{{ route('users.index') }}" class="btn">View Users</a>
            <a href="{{ route('about') }}" class="btn btn-outline" style="border-color: #fff; color: #fff;">Learn More</a>
        </div>
    </div>

    <div class="dashboard-grid">
        <div class="dashboard-card">
            <h3>Sales Overview</h3>
            <div class="chart-placeholder">
                <div style="text-align: center;">
                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">📈</div>
                    <div>Sales Chart</div>
                    <div style="font-size: 0.8rem; margin-top: 0.5rem;">Last 7 days: ₱12,450</div>
                </div>
            </div>
        </div>
        <div class="dashboard-card">
            <h3>Recent Activity</h3>
            <div class="activity-item">
                <div class="activity-icon">👤</div>
                <div class="activity-content">
                    <strong>New customer registered</strong>
                    <span>John Doe added to database</span>
                </div>
                <div class="activity-time">2m ago</div>
            </div>
            <div class="activity-item">
                <div class="activity-icon">💰</div>
                <div class="activity-content">
                    <strong>Sale completed</strong>
                    <span>₱1,250 - 3 items</span>
                </div>
                <div class="activity-time">15m ago</div>
            </div>
            <div class="activity-item">
                <div class="activity-icon">📦</div>
                <div class="activity-content">
                    <strong>Low stock alert</strong>
                    <span>Item #42 - Only 5 left</span>
                </div>
                <div class="activity-time">1h ago</div>
            </div>
        </div>
        <div class="dashboard-card">
            <h3>Quick Stats</h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div style="text-align: center; padding: 1rem; background: linear-gradient(135deg, rgba(139, 92, 246, 0.1), rgba(236, 72, 153, 0.1)); border-radius: 8px;">
                    <div style="font-size: 1.5rem; font-weight: 700; color: #8b5cf6;">{{ $customerCount }}</div>
                    <div style="font-size: 0.8rem; color: var(--text-secondary);">Customers</div>
                </div>
                <div style="text-align: center; padding: 1rem; background: linear-gradient(135deg, rgba(6, 182, 212, 0.1), rgba(34, 211, 238, 0.1)); border-radius: 8px;">
                    <div style="font-size: 1.5rem; font-weight: 700; color: #06b6d4;">{{ $userCount }}</div>
                    <div style="font-size: 0.8rem; color: var(--text-secondary);">Users</div>
                </div>
                <div style="text-align: center; padding: 1rem; background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(52, 211, 153, 0.1)); border-radius: 8px;">
                    <div style="font-size: 1.5rem; font-weight: 700; color: #10b981;">₱45k</div>
                    <div style="font-size: 0.8rem; color: var(--text-secondary);">Revenue</div>
                </div>
                <div style="text-align: center; padding: 1rem; background: linear-gradient(135deg, rgba(245, 158, 11, 0.1), rgba(251, 191, 36, 0.1)); border-radius: 8px;">
                    <div style="font-size: 1.5rem; font-weight: 700; color: #f59e0b;">128</div>
                    <div style="font-size: 0.8rem; color: var(--text-secondary);">Orders</div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-4" style="margin-bottom: 2rem;">
        <div class="stat-card">
            <div class="stat-card-icon">👥</div>
            <h3 class="gradient-text">{{ $customerCount }}</h3>
            <p>Customers</p>
        </div>
        <div class="stat-card stat-card-alt1">
            <div class="stat-card-icon">👤</div>
            <h3 class="gradient-text">{{ $userCount }}</h3>
            <p>Users</p>
        </div>
        <div class="stat-card stat-card-alt2">
            <div class="stat-card-icon">📄</div>
            <h3 class="gradient-text">4</h3>
            <p>Pages</p>
        </div>
        <div class="stat-card stat-card-alt3">
            <div class="stat-card-icon">⚡</div>
            <h3 class="gradient-text">Laravel</h3>
            <p>Framework</p>
        </div>
    </div>

    <div style="margin-top: 3rem;">
        <h2 style="text-align: center; margin-bottom: 2rem;">Why Choose TANJ POS?</h2>
        <div class="feature-grid">
            <div class="feature-card rainbow-border">
                <div class="feature-icon purple">💰</div>
                <h3>Fast Transactions</h3>
                <p>Process sales quickly with an intuitive interface designed for speed and efficiency.</p>
            </div>
            <div class="feature-card rainbow-border">
                <div class="feature-icon pink">📊</div>
                <h3>Real-time Reports</h3>
                <p>Get instant insights into your sales, inventory, and customer data.</p>
            </div>
            <div class="feature-card rainbow-border">
                <div class="feature-icon cyan">🔒</div>
                <h3>Secure & Reliable</h3>
                <p>Built with Laravel's security best practices to keep your data safe.</p>
            </div>
            <div class="feature-card rainbow-border">
                <div class="feature-icon warning">☁️</div>
                <h3>Cloud Ready</h3>
                <p>Easily deploy and scale your POS system on any cloud platform.</p>
            </div>
        </div>
    </div>

    <div class="cta-section glow-effect">
        <h2 class="gradient-text">Ready to Get Started?</h2>
        <p>Explore the customer and user management features to see how TANJ POS can help your business.</p>
        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
            <a href="{{ route('customers.index') }}" class="btn btn-success">View Customers</a>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">View Users</a>
        </div>
    </div>
@endsection
