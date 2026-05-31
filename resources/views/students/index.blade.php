@extends('layouts.app')

@section('page_title', 'Students')

@section('content')
<style>
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 40px;
        width: 100%;
    }

    .page-title {
        flex: 1;
    }

    .page-title h1 {
        font-size: 32px;
        color: #333;
        margin: 0 0 8px 0;
        font-weight: 700;
    }

    .page-title p {
        font-size: 14px;
        color: #888;
        margin: 0;
    }

    .page-actions {
        display: flex;
        gap: 12px;
        align-items: center;
        flex-shrink: 0;
        margin-left: 30px;
    }

    .btn-add {
        background: #2d7063;
        color: white;
        border: none;
        padding: 12px 24px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }

    .btn-add:hover {
        background: #1e5a4f;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(45, 112, 99, 0.2);
    }

    .success-message {
        background: #d4edda;
        color: #155724;
        padding: 15px 20px;
        border-radius: 6px;
        margin-bottom: 24px;
        border-left: 4px solid #28a745;
        display: flex;
        align-items: center;
        gap: 12px;
        animation: slideIn 0.3s ease-out;
    }

    .success-message i {
        font-size: 18px;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .table-wrapper {
        background: white;
        border-radius: 8px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }

    .table-header {
        background: #f8f8f8;
        padding: 20px 25px;
        border-bottom: 1px solid #e0e0e0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .table-header h3 {
        font-size: 16px;
        font-weight: 600;
        color: #333;
        margin: 0;
    }

    .table-container {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table thead {
        background: #f8f8f8;
        border-bottom: 1px solid #e0e0e0;
    }

    table th {
        padding: 16px 20px;
        text-align: left;
        font-weight: 600;
        color: #666;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    table td {
        padding: 16px 20px;
        border-bottom: 1px solid #f0f0f0;
        color: #555;
        font-size: 14px;
    }

    table tbody tr {
        transition: background 0.2s ease;
    }

    table tbody tr:hover {
        background: #fafafa;
    }

    .student-name {
        display: flex;
        align-items: center;
        gap: 12px;
        font-weight: 500;
        color: #333;
    }

    .student-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, #2d7063 0%, #1e5a4f 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        font-size: 16px;
        flex-shrink: 0;
    }

    .action-buttons {
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .btn-view {
        color: #2d7063;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition: color 0.2s ease;
        padding: 4px 0;
    }

    .btn-view:hover {
        color: #1e5a4f;
    }

    .btn-action {
        background: none;
        border: none;
        cursor: pointer;
        font-size: 14px;
        color: #999;
        transition: color 0.2s ease;
        padding: 4px 8px;
        display: flex;
        align-items: center;
    }

    .btn-action:hover {
        color: #2d7063;
    }

    .btn-delete:hover {
        color: #e74c3c;
    }

    .checkbox {
        width: 18px;
        height: 18px;
        cursor: pointer;
        accent-color: #2d7063;
    }

    .no-data {
        text-align: center;
        padding: 80px 40px;
        color: #999;
    }

    .no-data i {
        font-size: 48px;
        margin-bottom: 20px;
        opacity: 0.3;
        display: block;
    }

    .no-data h3 {
        font-size: 18px;
        color: #666;
        margin: 0 0 10px 0;
    }

    .no-data p {
        font-size: 14px;
        margin: 0;
    }

    .no-data a {
        color: #2d7063;
        text-decoration: none;
        font-weight: 600;
    }

    .no-data a:hover {
        text-decoration: underline;
    }
</style>

<!-- Page Header -->
<div class="page-header">
    <div class="page-title">
        <h1>Students</h1>
        <p>Manage all registered students in the system</p>
    </div>
    <div class="page-actions">
        <a href="{{ route('students.create') }}" class="btn-add">
            <i class="fas fa-plus"></i> Add Student
        </a>
    </div>
</div>

<!-- Success Message -->
@if(session('success'))
    <div class="success-message">
        <i class="fas fa-check-circle"></i>
        <span>{{ session('success') }}</span>
    </div>
@endif

<!-- Table Section -->
<div class="table-wrapper">
    @if($students->count() > 0)
        <div class="table-header">
            <h3>{{ $students->count() }} Student{{ $students->count() !== 1 ? 's' : '' }} Found</h3>
        </div>
        
        <div class="table-container">
            <table id="studentsTable">
                <thead>
                    <tr>
                        <th style="width: 40px;"><input type="checkbox" class="checkbox" id="selectAll"></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th style="width: 120px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr class="student-row">
                        <td><input type="checkbox" class="checkbox student-checkbox"></td>
                        <td>
                            <div class="student-name">
                                <div class="student-avatar">{{ substr($student->name, 0, 1) }}</div>
                                <span>{{ $student->name }}</span>
                            </div>
                        </td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->age }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('students.edit', $student->id) }}" class="btn-view">Edit</a>
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete" title="Delete" onclick="return confirm('Are you sure you want to delete this student?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
    <div class="no-data">
        <i class="fas fa-inbox"></i>
        <h3>No students found</h3>
        <p>Start by <a href="{{ route('students.create') }}">adding a new student</a></p>
    </div>
    @endif
</div>

<script>
    // Select all checkbox
    const selectAll = document.getElementById('selectAll');
    const studentCheckboxes = document.querySelectorAll('.student-checkbox');

    if (selectAll) {
        selectAll.addEventListener('change', function() {
            studentCheckboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });

        studentCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                selectAll.checked = Array.from(studentCheckboxes).every(cb => cb.checked);
            });
        });
    }
</script>
@endsection