@extends('layouts.app')

@section('title', 'Add Customer - TANJ POS')

@section('content')
    <div class="card" style="max-width: 600px; margin: 0 auto;">
        <h1>Add New Customer</h1>
        
        @if($errors->any())
            <div style="background-color: #fee2e2; color: #991b1b; padding: 1rem; border-radius: 8px; margin-bottom: 1rem;">
                <ul style="margin-left: 1.5rem;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('customers.store') }}" method="POST">
            @csrf
            
            <div style="margin-bottom: 1rem;">
                <label for="full_name" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Full Name *</label>
                <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}" required 
                       style="width: 100%; padding: 0.75rem; border: 2px solid #ddd; border-radius: 8px; font-size: 1rem;">
            </div>
            
            <div style="margin-bottom: 1rem;">
                <label for="email" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Email *</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required 
                       style="width: 100%; padding: 0.75rem; border: 2px solid #ddd; border-radius: 8px; font-size: 1rem;">
            </div>
            
            <div style="margin-bottom: 1.5rem;">
                <label for="phone" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Phone</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" 
                       style="width: 100%; padding: 0.75rem; border: 2px solid #ddd; border-radius: 8px; font-size: 1rem;">
            </div>
            
            <div style="display: flex; gap: 1rem;">
                <button type="submit" class="btn">Save Customer</button>
                <a href="{{ route('customers.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
@endsection
