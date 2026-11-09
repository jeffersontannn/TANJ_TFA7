@extends('layouts.app')

@section('title', 'Add User - TANJ POS')

@section('content')
    <div class="card" style="max-width: 600px; margin: 0 auto;">
        <h1>Add New User</h1>
        
        @if($errors->any())
            <div style="background-color: #fee2e2; color: #991b1b; padding: 1rem; border-radius: 8px; margin-bottom: 1rem;">
                <ul style="margin-left: 1.5rem;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div style="margin-bottom: 1rem;">
                <label for="username" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Username *</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" required 
                       style="width: 100%; padding: 0.75rem; border: 2px solid #ddd; border-radius: 8px; font-size: 1rem;">
            </div>
            
            <div style="margin-bottom: 1rem;">
                <label for="full_name" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Full Name *</label>
                <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}" required 
                       style="width: 100%; padding: 0.75rem; border: 2px solid #ddd; border-radius: 8px; font-size: 1rem;">
            </div>
            
            <div style="margin-bottom: 1.5rem;">
                <label for="avatar" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Profile Picture</label>
                <input type="file" id="avatar" name="avatar" accept="image/*" 
                       style="width: 100%; padding: 0.75rem; border: 2px solid #ddd; border-radius: 8px; font-size: 1rem;">
                <small style="color: #666;">Max 2MB. JPG, PNG, GIF allowed.</small>
            </div>
            
            <div style="display: flex; gap: 1rem;">
                <button type="submit" class="btn">Save User</button>
                <a href="{{ route('users.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
@endsection
