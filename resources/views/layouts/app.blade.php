<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Student Management System')</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f5f5f5;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        .header-top {
            background: linear-gradient(90deg, #2d7063 0%, #1e5a4f 100%);
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .header-title {
            font-size: 16px;
            font-weight: 600;
        }
        
        .main-content {
            flex: 1;
            padding: 30px;
        }
        
        .table-container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
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
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: #666;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        table td {
            padding: 15px;
            border-bottom: 1px solid #f0f0f0;
            color: #555;
            font-size: 13px;
        }
        
        table tbody tr {
            transition: background 0.3s ease;
        }
        
        table tbody tr:hover {
            background: #fafafa;
        }
        
        .student-name {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 500;
        }
        
        .student-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            object-fit: cover;
            background: linear-gradient(135deg, #2d7063 0%, #1e5a4f 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 14px;
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
            transition: color 0.3s ease;
        }
        
        .btn-view:hover {
            color: #1e5a4f;
        }
        
        .btn-action {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 16px;
            color: #999;
            transition: color 0.3s ease;
            padding: 4px 8px;
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
        
        .btn-add {
            background: #2d7063;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }
        
        .btn-add:hover {
            background: #1e5a4f;
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(45, 112, 99, 0.2);
        }
        
        .no-data {
            text-align: center;
            padding: 60px 20px;
            color: #999;
        }
        
        .no-data i {
            font-size: 48px;
            margin-bottom: 20px;
            opacity: 0.5;
        }
        
        @media (max-width: 1200px) {
            .stats-container {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .main-content {
                padding: 15px;
            }
            
            .stats-container {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .filters-section {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .filters-left {
                width: 100%;
            }
            
            .search-box {
                max-width: 100%;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="header-top">
        <div class="header-title">🏫 Pangasinan State University - Student Management System</div>
        <div class="header-right">
            <i class="fas fa-cog header-icon"></i>
            <i class="fas fa-user-circle header-icon"></i>
        </div>
    </div>

    <div class="main-content">
        @yield('content')
    </div>
</body>
</html>
