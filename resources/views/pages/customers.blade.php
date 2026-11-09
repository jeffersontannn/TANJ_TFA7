@extends('layouts.app')

@section('title', 'Customers - TANJ POS')

@section('content')
    @if(session('success'))
        <div style="background-color: #d1fae5; color: #065f46; padding: 1rem; border-radius: 8px; margin-bottom: 1rem;">
            {{ session('success') }}
        </div>
    @endif
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem;">
        <h1 style="margin: 0;">Customer Accounts</h1>
        <a href="{{ route('customers.create') }}" class="btn btn-sm">+ Add Customer</a>
    </div>

    <div class="card">
        <div class="search-bar">
            <input type="text" class="search-input" id="customerSearch" placeholder="🔍 Search customers by name, email, or phone..." onkeyup="filterCustomers()">
            <select class="filter-select" id="customerFilter" onchange="filterCustomers()">
                <option value="">All Customers</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <table id="customersTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                    <tr class="customer-row" data-name="{{ strtolower($customer->full_name) }}" data-email="{{ strtolower($customer->email) }}" data-phone="{{ $customer->phone }}">
                        <td>{{ $customer->id }}</td>
                        <td>
                            <div class="user-cell">
                                <div class="avatar">{{ substr($customer->full_name, 0, 1) }}</div>
                                <div>
                                    <strong>{{ $customer->full_name }}</strong>
                                    <br>
                                    <span style="font-size: 0.8rem; color: var(--text-secondary);">Customer since {{ $customer->created_at->format('M Y') }}</span>
                                </div>
                            </div>
                        </td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('customers.edit', $customer) }}" class="action-btn edit">Edit</a>
                                <form action="{{ route('customers.destroy', $customer) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this customer?');">
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
        <p id="noResults" style="display: none; text-align: center; padding: 2rem; color: var(--text-secondary);">No customers found matching your search.</p>
    </div>

    <div class="grid grid-3" style="margin-top: 2rem;">
        <div class="dashboard-card">
            <h3>Customer Stats</h3>
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid var(--border-color);">
                <span>Total Customers</span>
                <strong>{{ $customers->count() }}</strong>
            </div>
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid var(--border-color);">
                <span>Active</span>
                <strong style="color: var(--success);">{{ $customers->count() }}</strong>
            </div>
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0;">
                <span>New This Month</span>
                <strong style="color: var(--primary);">{{ $customers->count() }}</strong>
            </div>
        </div>
        <div class="dashboard-card">
            <h3>Quick Actions</h3>
            <a href="{{ route('customers.create') }}" class="btn btn-sm" style="width: 100%; margin-bottom: 0.5rem; text-align: center;">📥 Add Customer</a>
            <button class="btn btn-sm btn-secondary" style="width: 100%; margin-bottom: 0.5rem;">📤 Export Customers</button>
            <button class="btn btn-sm btn-outline" style="width: 100%;">🔄 Refresh Data</button>
        </div>
        <div class="dashboard-card">
            <h3>Recent Customers</h3>
            @foreach($customers->take(3) as $customer)
                <div class="activity-item">
                    <div class="activity-icon">{{ substr($customer->full_name, 0, 1) }}</div>
                    <div class="activity-content">
                        <strong>{{ $customer->full_name }}</strong>
                        <span>{{ $customer->email }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        function filterCustomers() {
            const searchTerm = document.getElementById('customerSearch').value.toLowerCase();
            const filterValue = document.getElementById('customerFilter').value;
            const rows = document.querySelectorAll('.customer-row');
            let visibleCount = 0;

            rows.forEach(row => {
                const name = row.getAttribute('data-name');
                const email = row.getAttribute('data-email');
                const phone = row.getAttribute('data-phone');
                
                const matchesSearch = name.includes(searchTerm) || email.includes(searchTerm) || phone.includes(searchTerm);
                
                if (matchesSearch) {
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
