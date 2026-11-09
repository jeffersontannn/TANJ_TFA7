@extends('layouts.app')

@section('title', 'Users - TANJ POS')

@section('content')
    @if(session('success'))
        <div style="background: linear-gradient(135deg, #d1fae5, #a7f3d0); color: #065f46; padding: 1rem; border-radius: 8px; margin-bottom: 1rem; border-left: 4px solid #10b981;">
            {{ session('success') }}
        </div>
    @endif
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem;">
        <h1 class="gradient-text" style="margin: 0;">User Accounts</h1>
        <a href="{{ route('users.create') }}" class="btn btn-success btn-sm">+ Add User</a>
    </div>

    <div class="card">
        <div class="search-bar">
            <input type="text" class="search-input" id="userSearch" placeholder="🔍 Search users by username or name..." onkeyup="filterUsers()">
            <select class="filter-select" id="roleFilter" onchange="filterUsers()">
                <option value="">All Roles</option>
                <option value="admin">Administrator</option>
                <option value="cashier">Cashier</option>
                <option value="manager">Manager</option>
                <option value="supervisor">Supervisor</option>
            </select>
        </div>

        <table id="usersTable" class="colorful-table-header">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $index => $user)
                    @php
                        $role = 'cashier';
                        if (strtolower($user->username) === 'admin') $role = 'admin';
                        elseif (strtolower($user->username) === 'manager') $role = 'manager';
                        elseif (strtolower($user->username) === 'supervisor') $role = 'supervisor';
                        
                        $roleLabels = [
                            'admin' => 'Administrator',
                            'cashier' => 'Cashier',
                            'manager' => 'Manager',
                            'supervisor' => 'Supervisor'
                        ];
                        
                        $roleIcons = [
                            'admin' => '👑',
                            'cashier' => '💵',
                            'manager' => '📋',
                            'supervisor' => '👔'
                        ];
                        
                        $avatarClasses = ['avatar', 'avatar-alt1', 'avatar-alt2', 'avatar-alt3', 'avatar-alt4', 'avatar-alt5', 'avatar-alt6'];
                        $avatarClass = $avatarClasses[$index % count($avatarClasses)];
                    @endphp
                    <tr class="user-row" data-username="{{ strtolower($user->username) }}" data-name="{{ strtolower($user->full_name) }}" data-role="{{ $role }}">
                        <td>{{ $user->id }}</td>
                        <td>
                            <div class="user-cell">
                                @if($user->avatar_url)
                                    <img src="{{ $user->avatar_url }}" alt="{{ $user->full_name }}" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover; margin-right: 0.75rem;">
                                @else
                                    <div class="{{ $avatarClass }}">{{ substr($user->full_name, 0, 1) }}</div>
                                @endif
                                <div>
                                    <strong>{{ $user->full_name }}</strong>
                                    <br>
                                    <span style="font-size: 0.8rem; color: var(--text-secondary);">{{ $roleIcons[$role] }} {{ $roleLabels[$role] }}</span>
                                </div>
                            </div>
                        </td>
                        <td>{{ $user->username }}</td>
                        <td><span class="badge badge-{{ $role }}">{{ $roleLabels[$role] }}</span></td>
                        <td><span class="badge badge-active">Active</span></td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('users.edit', $user) }}" class="action-btn edit">Edit</a>
                                <form action="{{ route('users.destroy', $user) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn delete">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p id="noResults" style="display: none; text-align: center; padding: 2rem; color: var(--text-secondary);">No users found matching your search.</p>
    </div>

    <div class="grid grid-3" style="margin-top: 2rem;">
        <div class="dashboard-card rainbow-border">
            <h3 class="gradient-text">User Stats</h3>
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid var(--border-color);">
                <span>Total Users</span>
                <strong style="color: #8b5cf6;">{{ $users->count() }}</strong>
            </div>
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid var(--border-color);">
                <span>Administrators</span>
                <strong style="color: #ec4899;">1</strong>
            </div>
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid var(--border-color);">
                <span>Cashiers</span>
                <strong style="color: #06b6d4;">2</strong>
            </div>
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0;">
                <span>Active Now</span>
                <strong style="color: #10b981;">{{ $users->count() }}</strong>
            </div>
        </div>
        <div class="dashboard-card rainbow-border">
            <h3 class="gradient-text">Quick Actions</h3>
            <a href="{{ route('users.create') }}" class="btn btn-sm btn-success" style="width: 100%; margin-bottom: 0.5rem; text-align: center;">👤 Create User</a>
            <button class="btn btn-sm btn-secondary" style="width: 100%; margin-bottom: 0.5rem;">📧 Send Invite</button>
            <button class="btn btn-sm btn-warning" style="width: 100%;">🔐 Reset Passwords</button>
        </div>
        <div class="dashboard-card rainbow-border">
            <h3 class="gradient-text">Recent Users</h3>
            @foreach($users->take(3) as $index => $user)
                @php
                    $iconClasses = ['activity-icon', 'activity-icon alt1', 'activity-icon alt2', 'activity-icon alt3'];
                    $iconClass = $iconClasses[$index % count($iconClasses)];
                @endphp
                <div class="activity-item">
                    @if($user->avatar_url)
                        <img src="{{ $user->avatar_url }}" alt="{{ $user->full_name }}" style="width: 36px; height: 36px; border-radius: 50%; object-fit: cover;">
                    @else
                        <div class="{{ $iconClass }}">{{ substr($user->full_name, 0, 1) }}</div>
                    @endif
                    <div class="activity-content">
                        <strong>{{ $user->full_name }}</strong>
                        <span>@{{ $user->username }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        function filterUsers() {
            const searchTerm = document.getElementById('userSearch').value.toLowerCase();
            const roleFilter = document.getElementById('roleFilter').value;
            const rows = document.querySelectorAll('.user-row');
            let visibleCount = 0;

            rows.forEach(row => {
                const username = row.getAttribute('data-username');
                const name = row.getAttribute('data-name');
                const role = row.getAttribute('data-role');
                
                const matchesSearch = username.includes(searchTerm) || name.includes(searchTerm);
                const matchesRole = roleFilter === '' || role === roleFilter;
                
                if (matchesSearch && matchesRole) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            document.getElementById('noResults').style.display = visibleCount === 0 ? 'block' : 'none';
        }
    </script>
@endsection
