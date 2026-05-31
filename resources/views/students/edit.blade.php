@extends('layouts.app')

@section('page_title', 'Edit Student')

@section('content')
<style>
    .form-wrapper {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        min-height: calc(100vh - 220px);
        padding: 0;
    }

    .form-container {
        max-width: 600px;
        width: 100%;
        background: white;
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
        margin: 40px 20px 0 20px;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #333;
        font-size: 14px;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #e0e0e0;
        border-radius: 6px;
        font-size: 14px;
        font-family: 'Inter', sans-serif;
        transition: all 0.3s ease;
    }

    .form-group input:focus,
    .form-group select:focus {
        outline: none;
        border-color: #2d7063;
        box-shadow: 0 0 0 3px rgba(45, 112, 99, 0.1);
    }

    .form-actions {
        display: flex;
        gap: 15px;
        margin-top: 35px;
        justify-content: flex-end;
    }

    .btn {
        padding: 12px 30px;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: 'Inter', sans-serif;
    }

    .btn-primary {
        background: #2d7063;
        color: white;
    }

    .btn-primary:hover {
        background: #1e5a4f;
        transform: translateY(-1px);
        box-shadow: 0 2px 8px rgba(45, 112, 99, 0.2);
    }

    .btn-secondary {
        background: #f0f0f0;
        color: #333;
    }

    .btn-secondary:hover {
        background: #e0e0e0;
    }

    .error-message {
        background: #f8d7da;
        color: #721c24;
        padding: 12px 15px;
        border-radius: 6px;
        margin-bottom: 20px;
        border-left: 4px solid #f5c6cb;
    }

    .error-list {
        list-style: none;
    }

    .error-list li {
        padding: 5px 0;
    }
</style>

<div class="form-wrapper">
    <div class="form-container">
        <h2 style="margin-bottom: 30px; color: #333; font-size: 20px;">Edit Student Information</h2>

        @if($errors->any())
            <div class="error-message">
                <strong>Error! Please check the form below.</strong>
                <ul class="error-list">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Full Name *</label>
                <input type="text" id="name" name="name" value="{{ old('name', $student->name) }}" placeholder="Enter student name" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address *</label>
                <input type="email" id="email" name="email" value="{{ old('email', $student->email) }}" placeholder="Enter email address" required>
            </div>

            <div class="form-group">
                <label for="age">Age *</label>
                <input type="number" id="age" name="age" value="{{ old('age', $student->age) }}" placeholder="Enter age" min="1" max="100" required>
            </div>

            <div class="form-actions">
                <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Student</button>
            </div>
        </form>
    </div>
</div>
@endsection