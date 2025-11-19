<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Makeup Store</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f5f5f5;
            display: flex;
        }

        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, #E91E63 0%, #D81B60 50%, #C2185B 100%);
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            padding: 0 0 180px 0;
            color: white;
            box-shadow: 4px 0 20px rgba(0,0,0,0.15);
            overflow-y: auto;
        }

        .sidebar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="0.05" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,165.3C1248,171,1344,149,1392,138.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') no-repeat bottom;
            background-size: cover;
            pointer-events: none;
        }

        .sidebar-header {
            padding: 25px 22px 20px;
            background: rgba(0,0,0,0.15);
            border-bottom: 2px solid rgba(255,255,255,0.1);
            margin-bottom: 8px;
            position: relative;
        }

        .sidebar-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #FFB6C1, #FFC0CB, #FFB6C1);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0%, 100% { opacity: 0.5; }
            50% { opacity: 1; }
        }

        .sidebar-header .logo-container {
            display: flex;
            align-items: center;
            gap: 13px;
            margin-bottom: 8px;
        }

        .sidebar-header .logo-icon {
            width: 46px;
            height: 46px;
            background: white;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(255, 182, 193, 0.4);
            overflow: hidden;
            padding: 7px;
        }

        .sidebar-header .logo-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .sidebar-header h2 {
            font-size: 1.45rem;
            font-weight: 700;
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .sidebar-header p {
            font-size: 0.8rem;
            opacity: 0.85;
            margin: 0;
            padding-left: 59px;
            letter-spacing: 1.1px;
        }

        .menu-section {
            padding: 12px 0;
        }

        .menu-section-title {
            padding: 9px 22px;
            font-size: 0.72rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.3px;
            opacity: 0.6;
            margin-bottom: 4px;
        }

        .menu-item {
            padding: 14px 22px;
            display: flex;
            align-items: center;
            gap: 13px;
            color: white;
            text-decoration: none;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border-left: 4px solid transparent;
            margin: 3px 0;
            position: relative;
            overflow: hidden;
        }

        .menu-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 0;
            background: linear-gradient(90deg, rgba(255,255,255,0.2), rgba(255,255,255,0.05));
            transition: width 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .menu-item:hover::before {
            width: 100%;
        }

        .menu-item:hover, .menu-item.active {
            background: rgba(255,255,255,0.15);
            border-left-color: #FFB6C1;
            padding-left: 25px;
            box-shadow: inset 0 0 20px rgba(255,182,193,0.2);
        }

        .menu-item.active {
            background: rgba(255,255,255,0.2);
            border-left-color: white;
        }

        .menu-item i {
            font-size: 1.2rem;
            width: 29px;
            height: 29px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255,255,255,0.1);
            border-radius: 7px;
            transition: all 0.3s ease;
            z-index: 1;
        }

        .menu-item:hover i {
            background: rgba(255,255,255,0.25);
            transform: scale(1.1) rotate(5deg);
        }

        .menu-item span {
            font-weight: 500;
            font-size: 0.93rem;
            z-index: 1;
        }

        .menu-badge {
            margin-left: auto;
            background: #C2185B;
            color: white;
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
            z-index: 1;
            box-shadow: 0 2px 8px rgba(194, 24, 91, 0.4);
        }

        .sidebar-footer {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px;
            background: rgba(0,0,0,0.2);
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-footer .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            background: rgba(255,255,255,0.1);
            border-radius: 12px;
            margin-bottom: 12px;
        }

        .sidebar-footer .user-avatar-small {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #FFB6C1, #FFC0CB);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .sidebar-footer .user-details {
            flex: 1;
        }

        .sidebar-footer .user-name {
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 2px;
        }

        .sidebar-footer .user-role {
            font-size: 0.75rem;
            opacity: 0.8;
        }

        .sidebar-footer .footer-info {
            text-align: center;
            font-size: 0.72rem;
            opacity: 0.7;
            line-height: 1.5;
        }

        .main-content {
            margin-left: 280px;
            flex: 1;
            padding: 30px;
            background: linear-gradient(135deg, #FFF0F5 0%, #FFE4E9 100%);
            min-height: 100vh;
        }

        .top-bar {
            background: white;
            padding: 20px 30px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .top-bar h1 {
            color: #333;
            font-size: 1.8rem;
            font-weight: 700;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: linear-gradient(135deg, #FFB6C1, #FFC0CB);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 1.2rem;
        }

        .logout-btn {
            background: #E91E63;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .logout-btn:hover {
            background: #C2185B;
            transform: translateY(-2px);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            display: flex;
            align-items: center;
            gap: 20px;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
        }

        .stat-icon.pink {
            background: linear-gradient(135deg, #E91E63, #D81B60);
            color: white;
        }

        .stat-icon.purple {
            background: linear-gradient(135deg, #C2185B, #AD1457);
            color: white;
        }

        .stat-icon.orange {
            background: linear-gradient(135deg, #EC407A, #E91E63);
            color: white;
        }

        .stat-icon.green {
            background: linear-gradient(135deg, #F48FB1, #EC407A);
            color: white;
        }

        .stat-info h3 {
            color: #666;
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .stat-info p {
            color: #333;
            font-size: 1.8rem;
            font-weight: 700;
        }

        .content-section {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f0f0f0;
        }

        .section-header h2 {
            color: #333;
            font-size: 1.4rem;
            font-weight: 700;
        }

        .btn-primary {
            background: linear-gradient(135deg, #E91E63, #D81B60);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(233, 30, 99, 0.4);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead {
            background: #f8f9fa;
        }

        table th {
            padding: 15px;
            text-align: left;
            color: #666;
            font-weight: 600;
            font-size: 0.9rem;
            border-bottom: 2px solid #e0e0e0;
        }

        table td {
            padding: 15px;
            border-bottom: 1px solid #f0f0f0;
            color: #333;
        }

        table tbody tr:hover {
            background: #f8f9fa;
        }

        .product-img {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            object-fit: cover;
        }

        .badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .badge.success {
            background: #d4edda;
            color: #155724;
        }

        .badge.warning {
            background: #fff3cd;
            color: #856404;
        }

        .badge.danger {
            background: #f8d7da;
            color: #721c24;
        }

        .action-btns {
            display: flex;
            gap: 8px;
        }

        .btn-sm {
            padding: 6px 12px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }

        .btn-edit {
            background: #ffc107;
            color: #333;
        }

        .btn-edit:hover {
            background: #e0a800;
        }

        .btn-delete {
            background: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background: #c82333;
        }

        .empty-state {
            text-align: center;
            padding: 50px 20px;
            color: #999;
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 20px;
            opacity: 0.3;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.6);
            backdrop-filter: blur(5px);
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .modal.show {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: white;
            padding: 0;
            border-radius: 20px;
            max-width: 600px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
            animation: slideUp 0.3s ease;
        }

        @keyframes slideUp {
            from { 
                transform: translateY(50px);
                opacity: 0;
            }
            to { 
                transform: translateY(0);
                opacity: 1;
            }
        }

        .modal-header {
            background: linear-gradient(135deg, #E91E63, #D81B60);
            color: white;
            padding: 25px 30px;
            border-radius: 20px 20px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h3 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .close {
            color: white;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            background: rgba(255,255,255,0.2);
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .close:hover {
            background: rgba(255,255,255,0.3);
            transform: rotate(90deg);
        }

        .modal-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 0.95rem;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #E91E63;
            box-shadow: 0 0 0 3px rgba(233, 30, 99, 0.2);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .modal-footer {
            padding: 20px 30px;
            border-top: 1px solid #e0e0e0;
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }

        .btn-cancel {
            background: #6c757d;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-cancel:hover {
            background: #5a6268;
        }

        .btn-save {
            background: linear-gradient(135deg, #E91E63, #D81B60);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(233, 30, 99, 0.4);
        }

        .detail-row {
            display: flex;
            padding: 15px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-weight: 600;
            color: #666;
            width: 150px;
            flex-shrink: 0;
        }

        .detail-value {
            color: #333;
            flex: 1;
        }

        .alert {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <div class="logo-container">
                <div class="logo-icon">
                    <img src="{{ asset('assets/Images/logo1.webp') }}" alt="Makeup Store Logo">
                </div>
                <h2>Makeup Store</h2>
            </div>
            <p>ADMIN PANEL</p>
        </div>
        
        <div class="menu-section">
            <div class="menu-section-title">Main Menu</div>
            <a href="#dashboard" class="menu-item active" onclick="showSection('dashboard')">
                <i class="fas fa-chart-line"></i>
                <span>Dashboard</span>
            </a>
            <a href="#products" class="menu-item" onclick="showSection('products')">
                <i class="fas fa-box-open"></i>
                <span>Kelola Produk</span>
                <span class="menu-badge">8</span>
            </a>
            <a href="#orders" class="menu-item" onclick="showSection('orders')">
                <i class="fas fa-shopping-bag"></i>
                <span>Kelola Pesanan</span>
                <span class="menu-badge">{{ $orders->count() }}</span>
            </a>
        </div>

        <div class="menu-section">
            <div class="menu-section-title">Management</div>
            <a href="#users" class="menu-item" onclick="showSection('users')">
                <i class="fas fa-users-cog"></i>
                <span>Kelola User</span>
            </a>
            <a href="#settings" class="menu-item" onclick="showSection('settings')">
                <i class="fas fa-cog"></i>
                <span>Pengaturan</span>
            </a>
        </div>

        <div class="menu-section">
            <div class="menu-section-title">Other</div>
            <a href="{{ route('front.home') }}" class="menu-item">
                <i class="fas fa-store"></i>
                <span>Lihat Toko</span>
            </a>
        </div>

        <div class="sidebar-footer">
            <div class="user-profile">
                <div class="user-avatar-small">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                <div class="user-details">
                    <div class="user-name">{{ auth()->user()->name }}</div>
                    <div class="user-role">{{ ucfirst(auth()->user()->role) }}</div>
                </div>
            </div>
            <div class="footer-info">
                <div>© 2025 Makeup Store</div>
                <div>Admin Dashboard v1.0</div>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="top-bar">
            <h1>Dashboard Admin</h1>
            <div class="user-info">
                <div class="user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                <div style="margin-right: 15px;">
                    <div style="font-weight: 600; color: #333;">{{ auth()->user()->name }}</div>
                    <div style="font-size: 0.85rem; color: #666;">{{ ucfirst(auth()->user()->role) }}</div>
                </div>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Dashboard Section -->
        <div id="dashboard-section" class="section-content">
            <div style="background: white; padding: 25px; border-radius: 15px; margin-bottom: 25px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                <h3 style="color: #C2185B; font-size: 1.5rem; margin-bottom: 10px;">
                    Selamat Datang, {{ auth()->user()->name }}! 👋
                </h3>
                <p style="color: #666; font-size: 1rem;">
                    Kelola toko makeup Anda dari dashboard admin ini. Anda dapat mengelola produk, pesanan, dan customer.
                </p>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon pink">
                        <i class="fas fa-box"></i>
                    </div>
                    <div class="stat-info">
                        <h3>Total Produk</h3>
                        <p>8</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon purple">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="stat-info">
                        <h3>Total Pesanan</h3>
                        <p>{{ $orders->count() }}</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon orange">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-info">
                        <h3>Total Customer</h3>
                        <p>24</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon green">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div class="stat-info">
                        <h3>Total Pendapatan</h3>
                        <p>Rp{{ number_format($orders->where('status', '!=', 'cancelled')->sum('total') / 1000, 1) }}rb</p>
                    </div>
                </div>
            </div>

            <div class="content-section">
                <div class="section-header">
                    <h2>Pesanan Terbaru</h2>
                    <a href="#orders" class="btn-primary" onclick="showSection('orders')">Lihat Semua</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Produk</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders->take(5) as $order)
                        <tr>
                            <td>{{ $order->order_number }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>
                                @foreach($order->orderItems->take(2) as $item)
                                    {{ Str::limit($item->product_name, 20) }}@if(!$loop->last), @endif
                                @endforeach
                                @if($order->orderItems->count() > 2)
                                    +{{ $order->orderItems->count() - 2 }}
                                @endif
                            </td>
                            <td>Rp{{ number_format($order->total, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge 
                                    @if($order->status === 'delivered') success
                                    @elseif($order->status === 'cancelled') danger
                                    @else warning
                                    @endif">
                                    @if($order->status === 'pending') Pending
                                    @elseif($order->status === 'processing') Diproses
                                    @elseif($order->status === 'shipped') Dikirim
                                    @elseif($order->status === 'delivered') Selesai
                                    @else Dibatalkan
                                    @endif
                                </span>
                            </td>
                            <td>{{ $order->created_at->format('d M Y') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 40px; color: #999;">
                                <i class="fas fa-inbox" style="font-size: 3rem; display: block; margin-bottom: 15px; opacity: 0.3;"></i>
                                Belum ada pesanan
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Products Section -->
        <div id="products-section" class="section-content" style="display: none;">
            <div class="content-section">
                <div class="section-header">
                    <h2>Kelola Produk</h2>
                    <button class="btn-primary">
                        <i class="fas fa-plus"></i> Tambah Produk
                    </button>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="{{ asset('assets/Images/produk.jpg') }}" class="product-img" alt="Product"></td>
                            <td>SOMETHING Checkmatte Transferproof Lipstick</td>
                            <td>Lipstick</td>
                            <td>Rp80.000</td>
                            <td>45</td>
                            <td>
                                <div class="action-btns">
                                    <button class="btn-sm btn-edit" onclick="editProduct(1, 'SOMETHING Checkmatte Transferproof Lipstick', 'Lipstick', 80000, 45)"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="btn-sm btn-delete" onclick="deleteProduct('SOMETHING Checkmatte Transferproof Lipstick')"><i class="fas fa-trash"></i> Hapus</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="{{ asset('assets/Images/produk1.jpg') }}" class="product-img" alt="Product"></td>
                            <td>Glad2glow 2-in-1 Perfect Fair Cushion Powder</td>
                            <td>Foundation</td>
                            <td>Rp146.000</td>
                            <td>32</td>
                            <td>
                                <div class="action-btns">
                                    <button class="btn-sm btn-edit" onclick="editProduct(2, 'Glad2glow 2-in-1 Perfect Fair Cushion Powder', 'Foundation', 146000, 32)"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="btn-sm btn-delete" onclick="deleteProduct('Glad2glow 2-in-1 Perfect Fair Cushion Powder')"><i class="fas fa-trash"></i> Hapus</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="{{ asset('assets/Images/produk2.webp') }}" class="product-img" alt="Product"></td>
                            <td>Mascara Maybelline Sky High Waterproof</td>
                            <td>Mascara</td>
                            <td>Rp109.000</td>
                            <td>28</td>
                            <td>
                                <div class="action-btns">
                                    <button class="btn-sm btn-edit" onclick="editProduct(3, 'Mascara Maybelline Sky High Waterproof', 'Mascara', 109000, 28)"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="btn-sm btn-delete" onclick="deleteProduct('Mascara Maybelline Sky High Waterproof')"><i class="fas fa-trash"></i> Hapus</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="{{ asset('assets/Images/produk3.jpg') }}" class="product-img" alt="Product"></td>
                            <td>Wardah Colorfit Cream Blush</td>
                            <td>Blush</td>
                            <td>Rp78.000</td>
                            <td>50</td>
                            <td>
                                <div class="action-btns">
                                    <button class="btn-sm btn-edit" onclick="editProduct(4, 'Wardah Colorfit Cream Blush', 'Blush', 78000, 50)"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="btn-sm btn-delete" onclick="deleteProduct('Wardah Colorfit Cream Blush')"><i class="fas fa-trash"></i> Hapus</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="{{ asset('assets/Images/produk4.jpeg') }}" class="product-img" alt="Product"></td>
                            <td>PINKFLASH Pink Dessert Eyeshadow Palette</td>
                            <td>Eyeshadow</td>
                            <td>Rp62.000</td>
                            <td>38</td>
                            <td>
                                <div class="action-btns">
                                    <button class="btn-sm btn-edit" onclick="editProduct(5, 'PINKFLASH Pink Dessert Eyeshadow Palette', 'Eyeshadow', 62000, 38)"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="btn-sm btn-delete" onclick="deleteProduct('PINKFLASH Pink Dessert Eyeshadow Palette')"><i class="fas fa-trash"></i> Hapus</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Orders Section -->
        <div id="orders-section" class="section-content" style="display: none;">
            <div class="content-section">
                <div class="section-header">
                    <h2>Kelola Pesanan</h2>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Produk</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                        <tr>
                            <td>{{ $order->order_number }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>
                                @foreach($order->orderItems->take(2) as $item)
                                    {{ $item->product_name }}@if(!$loop->last), @endif
                                @endforeach
                                @if($order->orderItems->count() > 2)
                                    <br><small>+{{ $order->orderItems->count() - 2 }} lainnya</small>
                                @endif
                            </td>
                            <td>Rp{{ number_format($order->total, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge 
                                    @if($order->status === 'delivered') success
                                    @elseif($order->status === 'cancelled') danger
                                    @elseif($order->status === 'pending') warning
                                    @else warning
                                    @endif">
                                    @if($order->status === 'pending') Pending
                                    @elseif($order->status === 'processing') Diproses
                                    @elseif($order->status === 'shipped') Dikirim
                                    @elseif($order->status === 'delivered') Selesai
                                    @else Dibatalkan
                                    @endif
                                </span>
                            </td>
                            <td>{{ $order->created_at->format('d M Y') }}</td>
                            <td>
                                <button class="btn-sm btn-edit" onclick="viewOrderDetailFromDB({{ $order->id }})">
                                    <i class="fas fa-eye"></i> Detail
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" style="text-align: center; padding: 40px; color: #999;">
                                <i class="fas fa-inbox" style="font-size: 3rem; display: block; margin-bottom: 15px; opacity: 0.3;"></i>
                                Belum ada pesanan masuk
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Users Section -->
        <div id="users-section" class="section-content" style="display: none;">
            <div class="content-section">
                <div class="section-header">
                    <h2>Kelola User</h2>
                    <button class="btn-primary">
                        <i class="fas fa-plus"></i> Tambah User
                    </button>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Bergabung</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Admin</td>
                            <td>admin@makeup.com</td>
                            <td><span class="badge danger">Admin</span></td>
                            <td>1 Jan 2025</td>
                            <td>
                                <div class="action-btns">
                                    <button class="btn-sm btn-edit" onclick="editUser('Admin', 'admin@makeup.com', 'admin')"><i class="fas fa-edit"></i> Edit</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Sarah Dewi</td>
                            <td>sarah@gmail.com</td>
                            <td><span class="badge success">Customer</span></td>
                            <td>15 Nov 2025</td>
                            <td>
                                <div class="action-btns">
                                    <button class="btn-sm btn-edit" onclick="editUser('Sarah Dewi', 'sarah@gmail.com', 'customer')"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="btn-sm btn-delete" onclick="deleteUser('Sarah Dewi')"><i class="fas fa-trash"></i> Hapus</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Rina Putri</td>
                            <td>rina@gmail.com</td>
                            <td><span class="badge success">Customer</span></td>
                            <td>14 Nov 2025</td>
                            <td>
                                <div class="action-btns">
                                    <button class="btn-sm btn-edit" onclick="editUser('Rina Putri', 'rina@gmail.com', 'customer')"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="btn-sm btn-delete" onclick="deleteUser('Rina Putri')"><i class="fas fa-trash"></i> Hapus</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Maya Sari</td>
                            <td>maya@gmail.com</td>
                            <td><span class="badge success">Customer</span></td>
                            <td>13 Nov 2025</td>
                            <td>
                                <div class="action-btns">
                                    <button class="btn-sm btn-edit" onclick="editUser('Maya Sari', 'maya@gmail.com', 'customer')"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="btn-sm btn-delete" onclick="deleteUser('Maya Sari')"><i class="fas fa-trash"></i> Hapus</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Settings Section -->
        <div id="settings-section" class="section-content" style="display: none;">
            <div class="content-section">
                <div class="section-header">
                    <h2>Pengaturan Toko</h2>
                    <button class="btn-primary" onclick="saveSettings()">
                        <i class="fas fa-save"></i> Simpan Pengaturan
                    </button>
                </div>

                <div style="display: grid; gap: 25px;">
                    <!-- Store Information -->
                    <div style="background: #f8f9fa; padding: 25px; border-radius: 15px;">
                        <h3 style="color: #333; font-size: 1.2rem; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-store" style="color: #C2185B;"></i>
                            Informasi Toko
                        </h3>
                        <div class="form-group">
                            <label>Nama Toko</label>
                            <input type="text" id="storeName" value="Makeup Store" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email Toko</label>
                            <input type="email" id="storeEmail" value="info@makeupstore.com" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nomor Telepon</label>
                            <input type="tel" id="storePhone" value="+62 812-3456-7890" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea id="storeAddress" class="form-control" rows="3">Jl. Kecantikan No. 123, Jakarta Selatan, DKI Jakarta 12345</textarea>
                        </div>
                    </div>

                    <!-- Business Hours -->
                    <div style="background: #f8f9fa; padding: 25px; border-radius: 15px;">
                        <h3 style="color: #333; font-size: 1.2rem; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-clock" style="color: #C2185B;"></i>
                            Jam Operasional
                        </h3>
                        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px;">
                            <div class="form-group">
                                <label>Hari Kerja</label>
                                <input type="text" id="weekdayHours" value="09:00 - 21:00" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Akhir Pekan</label>
                                <input type="text" id="weekendHours" value="10:00 - 22:00" class="form-control">
                            </div>
                        </div>
                    </div>

                    <!-- Shipping Settings -->
                    <div style="background: #f8f9fa; padding: 25px; border-radius: 15px;">
                        <h3 style="color: #333; font-size: 1.2rem; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-shipping-fast" style="color: #C2185B;"></i>
                            Pengaturan Pengiriman
                        </h3>
                        <div class="form-group">
                            <label>Biaya Pengiriman Default (Rp)</label>
                            <input type="number" id="shippingCost" value="15000" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Gratis Ongkir Minimal Belanja (Rp)</label>
                            <input type="number" id="freeShippingMin" value="200000" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Estimasi Pengiriman (hari)</label>
                            <input type="text" id="shippingEstimate" value="2-3" class="form-control">
                        </div>
                    </div>

                    <!-- Payment Settings -->
                    <div style="background: #f8f9fa; padding: 25px; border-radius: 15px;">
                        <h3 style="color: #333; font-size: 1.2rem; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-credit-card" style="color: #C2185B;"></i>
                            Metode Pembayaran
                        </h3>
                        <div style="display: grid; gap: 15px;">
                            <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; padding: 12px; background: white; border-radius: 8px; border: 2px solid #e0e0e0;">
                                <input type="checkbox" checked style="width: 18px; height: 18px; cursor: pointer;">
                                <span style="flex: 1; font-weight: 500;">COD (Cash on Delivery)</span>
                                <i class="fas fa-money-bill-wave" style="color: #28a745;"></i>
                            </label>
                            <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; padding: 12px; background: white; border-radius: 8px; border: 2px solid #e0e0e0;">
                                <input type="checkbox" checked style="width: 18px; height: 18px; cursor: pointer;">
                                <span style="flex: 1; font-weight: 500;">Transfer Bank</span>
                                <i class="fas fa-university" style="color: #007bff;"></i>
                            </label>
                            <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; padding: 12px; background: white; border-radius: 8px; border: 2px solid #e0e0e0;">
                                <input type="checkbox" checked style="width: 18px; height: 18px; cursor: pointer;">
                                <span style="flex: 1; font-weight: 500;">E-Wallet (GoPay, OVO, DANA)</span>
                                <i class="fas fa-wallet" style="color: #17a2b8;"></i>
                            </label>
                            <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; padding: 12px; background: white; border-radius: 8px; border: 2px solid #e0e0e0;">
                                <input type="checkbox" checked style="width: 18px; height: 18px; cursor: pointer;">
                                <span style="flex: 1; font-weight: 500;">QRIS</span>
                                <i class="fas fa-qrcode" style="color: #6f42c1;"></i>
                            </label>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div style="background: #f8f9fa; padding: 25px; border-radius: 15px;">
                        <h3 style="color: #333; font-size: 1.2rem; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-share-alt" style="color: #C2185B;"></i>
                            Media Sosial
                        </h3>
                        <div class="form-group">
                            <label><i class="fab fa-instagram"></i> Instagram</label>
                            <input type="text" id="instagram" value="@makeupstore.id" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><i class="fab fa-facebook"></i> Facebook</label>
                            <input type="text" id="facebook" value="Makeup Store Official" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><i class="fab fa-tiktok"></i> TikTok</label>
                            <input type="text" id="tiktok" value="@makeupstore.id" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><i class="fab fa-whatsapp"></i> WhatsApp</label>
                            <input type="text" id="whatsapp" value="+62 812-3456-7890" class="form-control">
                        </div>
                    </div>

                    <!-- Notification Settings -->
                    <div style="background: #f8f9fa; padding: 25px; border-radius: 15px;">
                        <h3 style="color: #333; font-size: 1.2rem; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-bell" style="color: #C2185B;"></i>
                            Notifikasi
                        </h3>
                        <div style="display: grid; gap: 12px;">
                            <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                                <input type="checkbox" checked style="width: 18px; height: 18px; cursor: pointer;">
                                <span>Email notifikasi untuk pesanan baru</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                                <input type="checkbox" checked style="width: 18px; height: 18px; cursor: pointer;">
                                <span>Email notifikasi untuk pembayaran</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                                <input type="checkbox" checked style="width: 18px; height: 18px; cursor: pointer;">
                                <span>Notifikasi stok produk menipis</span>
                            </label>
                            <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                                <input type="checkbox" style="width: 18px; height: 18px; cursor: pointer;">
                                <span>Newsletter untuk customer</span>
                            </label>
                        </div>
                    </div>

                    <!-- Appearance -->
                    <div style="background: #f8f9fa; padding: 25px; border-radius: 15px;">
                        <h3 style="color: #333; font-size: 1.2rem; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-palette" style="color: #C2185B;"></i>
                            Tampilan Website
                        </h3>
                        <div class="form-group">
                            <label>Warna Tema Utama</label>
                            <div style="display: flex; gap: 10px; align-items: center;">
                                <input type="color" id="primaryColor" value="#E91E63" style="width: 60px; height: 40px; border-radius: 8px; border: 2px solid #e0e0e0; cursor: pointer;">
                                <input type="text" value="#E91E63" class="form-control" style="flex: 1;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Banner Promo Homepage</label>
                            <input type="text" id="promoBanner" value="PROMO SPESIAL - DISKON 30%!" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add/Edit Product -->
    <div id="productModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="productModalTitle">Tambah Produk</h3>
                <span class="close" onclick="closeModal('productModal')">&times;</span>
            </div>
            <div class="modal-body">
                <form id="productForm">
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" id="productName" placeholder="Masukkan nama produk" required>
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select id="productCategory" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Lipstick">Lipstick</option>
                            <option value="Foundation">Foundation</option>
                            <option value="Mascara">Mascara</option>
                            <option value="Blush">Blush</option>
                            <option value="Eyeshadow">Eyeshadow</option>
                            <option value="Eyeliner">Eyeliner</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" id="productPrice" placeholder="Masukkan harga" required>
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" id="productStock" placeholder="Masukkan jumlah stok" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea id="productDescription" placeholder="Masukkan deskripsi produk"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn-cancel" onclick="closeModal('productModal')">Batal</button>
                <button class="btn-save" onclick="saveProduct()">Simpan</button>
            </div>
        </div>
    </div>

    <!-- Modal Order Detail -->
    <div id="orderModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Detail Pesanan</h3>
                <span class="close" onclick="closeModal('orderModal')">&times;</span>
            </div>
            <div class="modal-body" id="orderDetailContent">
                <!-- Order details will be inserted here -->
            </div>
            <div class="modal-footer">
                <button class="btn-cancel" onclick="closeModal('orderModal')">Tutup</button>
                <button class="btn-save" onclick="updateOrderStatus()">Update Status</button>
            </div>
        </div>
    </div>

    <!-- Modal Add/Edit User -->
    <div id="userModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="userModalTitle">Tambah User</h3>
                <span class="close" onclick="closeModal('userModal')">&times;</span>
            </div>
            <div class="modal-body">
                <form id="userForm">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" id="userName" placeholder="Masukkan nama lengkap" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="userEmail" placeholder="Masukkan email" required>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select id="userRole" required>
                            <option value="customer">Customer</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" id="userPassword" placeholder="Masukkan password">
                        <small style="color: #666;">Kosongkan jika tidak ingin mengubah password</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn-cancel" onclick="closeModal('userModal')">Batal</button>
                <button class="btn-save" onclick="saveUser()">Simpan</button>
            </div>
        </div>
    </div>

    <script>
        // Show section navigation
        function showSection(section) {
            document.querySelectorAll('.section-content').forEach(el => {
                el.style.display = 'none';
            });
            
            document.querySelectorAll('.menu-item').forEach(el => {
                el.classList.remove('active');
            });
            
            document.getElementById(section + '-section').style.display = 'block';
            
            if (event && event.target) {
                event.target.closest('.menu-item').classList.add('active');
            }
        }

        // Modal functions
        function openModal(modalId) {
            document.getElementById(modalId).classList.add('show');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('show');
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.classList.remove('show');
            }
        }

        // Product Functions
        function addProduct() {
            document.getElementById('productModalTitle').textContent = 'Tambah Produk';
            document.getElementById('productForm').reset();
            openModal('productModal');
        }

        function editProduct(id, name, category, price, stock) {
            document.getElementById('productModalTitle').textContent = 'Edit Produk';
            document.getElementById('productName').value = name;
            document.getElementById('productCategory').value = category;
            document.getElementById('productPrice').value = price;
            document.getElementById('productStock').value = stock;
            openModal('productModal');
        }

        function saveProduct() {
            const name = document.getElementById('productName').value;
            const category = document.getElementById('productCategory').value;
            const price = document.getElementById('productPrice').value;
            const stock = document.getElementById('productStock').value;

            if (!name || !category || !price || !stock) {
                alert('Mohon lengkapi semua field!');
                return;
            }

            // Simulate save
            closeModal('productModal');
            showAlert('Produk berhasil disimpan!', 'success');
            
            // In real app, you would send data to backend here
            console.log('Saving product:', { name, category, price, stock });
        }

        function deleteProduct(name) {
            if (confirm(`Apakah Anda yakin ingin menghapus produk "${name}"?`)) {
                showAlert('Produk berhasil dihapus!', 'success');
                // In real app, you would send delete request to backend
                console.log('Deleting product:', name);
            }
        }

        // Order Functions
        function viewOrderDetailFromDB(orderId) {
            // Fetch order details from server
            fetch(`/orders/${orderId}`, {
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const order = data.order;
                    let productsHtml = '';
                    order.order_items.forEach(item => {
                        productsHtml += `<div style="margin: 5px 0;">• ${item.product_name} (${item.quantity}x) - Rp${item.product_price.toLocaleString('id-ID')}</div>`;
                    });
                    
                    const statusOptions = {
                        'pending': 'Pending',
                        'processing': 'Diproses',
                        'shipped': 'Dikirim',
                        'delivered': 'Selesai',
                        'cancelled': 'Dibatalkan'
                    };
                    
                    let statusSelect = '<select id="orderStatus" class="form-control" style="width: 200px; padding: 8px; border-radius: 8px; border: 2px solid #e0e0e0;">';
                    for (const [key, value] of Object.entries(statusOptions)) {
                        statusSelect += `<option value="${key}" ${order.status === key ? 'selected' : ''}>${value}</option>`;
                    }
                    statusSelect += '</select>';
                    
                    const content = `
                        <div class="detail-row">
                            <div class="detail-label">Order ID:</div>
                            <div class="detail-value"><strong>${order.order_number}</strong></div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Customer:</div>
                            <div class="detail-value">${order.customer_name}<br><small>${order.customer_email}</small></div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Telepon:</div>
                            <div class="detail-value">${order.customer_phone}</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Produk:</div>
                            <div class="detail-value">${productsHtml}</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Subtotal:</div>
                            <div class="detail-value">Rp${order.subtotal.toLocaleString('id-ID')}</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Total:</div>
                            <div class="detail-value"><strong style="font-size: 1.2rem; color: #E91E63;">Rp${order.total.toLocaleString('id-ID')}</strong></div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Status:</div>
                            <div class="detail-value">${statusSelect}</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Tanggal:</div>
                            <div class="detail-value">${new Date(order.created_at).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric', hour: '2-digit', minute: '2-digit' })}</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Alamat Pengiriman:</div>
                            <div class="detail-value">${order.customer_address}<br>${order.city} - ${order.postal_code}</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Catatan:</div>
                            <div class="detail-value">${order.notes || '-'}</div>
                        </div>
                    `;
                    
                    document.getElementById('orderDetailContent').innerHTML = content;
                    document.getElementById('orderModal').dataset.orderId = orderId;
                    openModal('orderModal');
                } else {
                    alert('Gagal memuat detail pesanan');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat memuat detail pesanan');
            });
        }

        function viewOrderDetail(orderId, customer, products, total, status, date) {
            const content = `
                <div class="detail-row">
                    <div class="detail-label">Order ID:</div>
                    <div class="detail-value"><strong>${orderId}</strong></div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Customer:</div>
                    <div class="detail-value">${customer}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Produk:</div>
                    <div class="detail-value">${products}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Total:</div>
                    <div class="detail-value"><strong>${total}</strong></div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Status:</div>
                    <div class="detail-value">
                        <select id="orderStatus" class="form-control" style="width: 200px; padding: 8px; border-radius: 8px; border: 2px solid #e0e0e0;">
                            <option value="Proses" ${status === 'Proses' ? 'selected' : ''}>Proses</option>
                            <option value="Selesai" ${status === 'Selesai' ? 'selected' : ''}>Selesai</option>
                            <option value="Dibatalkan" ${status === 'Dibatalkan' ? 'selected' : ''}>Dibatalkan</option>
                        </select>
                    </div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Tanggal:</div>
                    <div class="detail-value">${date}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Alamat Pengiriman:</div>
                    <div class="detail-value">Jl. Contoh No. 123, Jakarta Selatan</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Metode Pembayaran:</div>
                    <div class="detail-value">COD - Cek Dulu</div>
                </div>
            `;
            
            document.getElementById('orderDetailContent').innerHTML = content;
            openModal('orderModal');
        }

        function updateOrderStatus() {
            const newStatus = document.getElementById('orderStatus').value;
            const orderId = document.getElementById('orderModal').dataset.orderId;
            
            if (!orderId) {
                closeModal('orderModal');
                showAlert(`Status pesanan berhasil diubah menjadi "${newStatus}"!`, 'success');
                return;
            }
            
            // Update status in database
            fetch(`/orders/${orderId}/update-status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ status: newStatus })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    closeModal('orderModal');
                    showAlert('Status pesanan berhasil diupdate!', 'success');
                    // Reload page to show updated status
                    setTimeout(() => {
                        location.reload();
                    }, 1500);
                } else {
                    alert('Gagal mengupdate status pesanan');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengupdate status');
            });
        }

        // User Functions
        function addUser() {
            document.getElementById('userModalTitle').textContent = 'Tambah User';
            document.getElementById('userForm').reset();
            openModal('userModal');
        }

        function editUser(name, email, role) {
            document.getElementById('userModalTitle').textContent = 'Edit User';
            document.getElementById('userName').value = name;
            document.getElementById('userEmail').value = email;
            document.getElementById('userRole').value = role;
            openModal('userModal');
        }

        function saveUser() {
            const name = document.getElementById('userName').value;
            const email = document.getElementById('userEmail').value;
            const role = document.getElementById('userRole').value;

            if (!name || !email || !role) {
                alert('Mohon lengkapi semua field!');
                return;
            }

            closeModal('userModal');
            showAlert('User berhasil disimpan!', 'success');
            // In real app, you would send data to backend
            console.log('Saving user:', { name, email, role });
        }

        function deleteUser(name) {
            if (confirm(`Apakah Anda yakin ingin menghapus user "${name}"?`)) {
                showAlert('User berhasil dihapus!', 'success');
                // In real app, you would send delete request to backend
                console.log('Deleting user:', name);
            }
        }

        // Alert notification
        function showAlert(message, type) {
            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${type}`;
            alertDiv.innerHTML = `
                <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
                ${message}
            `;
            
            const mainContent = document.querySelector('.main-content');
            mainContent.insertBefore(alertDiv, mainContent.firstChild);
            
            setTimeout(() => {
                alertDiv.style.opacity = '0';
                alertDiv.style.transition = 'opacity 0.5s ease';
                setTimeout(() => alertDiv.remove(), 500);
            }, 3000);
        }

        // Settings Functions
        function saveSettings() {
            const settings = {
                storeName: document.getElementById('storeName').value,
                storeEmail: document.getElementById('storeEmail').value,
                storePhone: document.getElementById('storePhone').value,
                storeAddress: document.getElementById('storeAddress').value,
                weekdayHours: document.getElementById('weekdayHours').value,
                weekendHours: document.getElementById('weekendHours').value,
                shippingCost: document.getElementById('shippingCost').value,
                freeShippingMin: document.getElementById('freeShippingMin').value,
                shippingEstimate: document.getElementById('shippingEstimate').value,
                instagram: document.getElementById('instagram').value,
                facebook: document.getElementById('facebook').value,
                tiktok: document.getElementById('tiktok').value,
                whatsapp: document.getElementById('whatsapp').value,
                primaryColor: document.getElementById('primaryColor').value,
                promoBanner: document.getElementById('promoBanner').value
            };

            showAlert('Pengaturan berhasil disimpan!', 'success');
            console.log('Saving settings:', settings);
            // In real app, you would send settings to backend
        }

        // Update button click handlers after page load
        document.addEventListener('DOMContentLoaded', function() {
            // Add Product button
            const addProductBtn = document.querySelector('#products-section .btn-primary');
            if (addProductBtn) {
                addProductBtn.onclick = addProduct;
            }

            // Add User button
            const addUserBtn = document.querySelector('#users-section .btn-primary');
            if (addUserBtn) {
                addUserBtn.onclick = addUser;
            }

            // Attach delete handlers
            document.querySelectorAll('.btn-delete').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const row = this.closest('tr');
                    const name = row.querySelector('td:first-child').textContent || 
                                 row.querySelector('td:nth-child(2)').textContent;
                    
                    if (row.closest('#products-section')) {
                        deleteProduct(name);
                    } else if (row.closest('#users-section')) {
                        deleteUser(name);
                    }
                });
            });
        });
    </script>
</body>
</html>
