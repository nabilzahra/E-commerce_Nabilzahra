<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $order->order_number }} - Makeup Store</title>
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
            background: linear-gradient(135deg, #FFF0F5 0%, #FFE4E9 100%);
            min-height: 100vh;
            padding: 30px 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: #E91E63;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
            margin-bottom: 25px;
            background: white;
            padding: 12px 25px;
            border-radius: 15px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .back-button:hover {
            background: #FFF0F5;
            transform: translateX(-5px);
        }

        .invoice-card {
            background: white;
            border-radius: 25px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            overflow: hidden;
            margin-bottom: 25px;
        }

        /* Invoice Header */
        .invoice-header {
            background: linear-gradient(135deg, #E91E63 0%, #D81B60 100%);
            color: white;
            padding: 40px;
            position: relative;
            overflow: hidden;
        }

        .invoice-header::before {
            content: '💄';
            position: absolute;
            font-size: 15rem;
            opacity: 0.1;
            right: -50px;
            top: -50px;
            transform: rotate(-20deg);
        }

        .header-content {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: 20px;
        }

        .store-info h1 {
            font-size: 2rem;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .store-info p {
            opacity: 0.9;
            font-size: 0.95rem;
        }

        .invoice-meta {
            text-align: right;
        }

        .invoice-number {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }

        .invoice-date {
            opacity: 0.9;
            font-size: 0.95rem;
        }

        /* Status Badge */
        .status-badge {
            display: inline-block;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-top: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-pending {
            background: #FFF3E0;
            color: #F57C00;
        }

        .status-processing {
            background: #E3F2FD;
            color: #1976D2;
        }

        .status-shipped {
            background: #F3E5F5;
            color: #7B1FA2;
        }

        .status-delivered {
            background: #E8F5E9;
            color: #388E3C;
        }

        .status-cancelled {
            background: #FFEBEE;
            color: #D32F2F;
        }

        /* Tracking Section */
        .tracking-section {
            padding: 40px;
            background: linear-gradient(135deg, #FFF0F5 0%, #FFE4E9 100%);
        }

        .tracking-title {
            font-size: 1.4rem;
            color: #E91E63;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .tracking-steps {
            position: relative;
        }

        .tracking-step {
            display: flex;
            gap: 25px;
            margin-bottom: 35px;
            position: relative;
        }

        .tracking-step:last-child {
            margin-bottom: 0;
        }

        .step-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            flex-shrink: 0;
            position: relative;
            z-index: 2;
            transition: all 0.3s ease;
        }

        .step-icon.active {
            background: linear-gradient(135deg, #E91E63 0%, #D81B60 100%);
            color: white;
            box-shadow: 0 8px 20px rgba(233, 30, 99, 0.4);
            animation: pulse-icon 2s infinite;
        }

        @keyframes pulse-icon {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        .step-icon.completed {
            background: #4CAF50;
            color: white;
        }

        .step-icon.pending {
            background: #f5f5f5;
            color: #999;
            border: 3px dashed #ddd;
        }

        .step-line {
            position: absolute;
            left: 30px;
            top: 60px;
            width: 3px;
            height: calc(100% - 60px);
            background: #e0e0e0;
        }

        .step-line.active {
            background: linear-gradient(180deg, #E91E63 0%, #F8BBD0 100%);
        }

        .step-content {
            flex: 1;
            padding-top: 8px;
        }

        .step-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }

        .step-title.active {
            color: #E91E63;
        }

        .step-description {
            color: #666;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .step-time {
            color: #999;
            font-size: 0.85rem;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* Customer & Shipping Info */
        .info-section {
            padding: 40px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .info-box {
            background: #FFF0F5;
            padding: 25px;
            border-radius: 15px;
            border-left: 4px solid #E91E63;
        }

        .info-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #E91E63;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .info-text {
            color: #333;
            line-height: 1.7;
            font-size: 0.95rem;
        }

        .info-text strong {
            display: block;
            margin-bottom: 3px;
        }

        /* Order Items */
        .items-section {
            padding: 0 40px 40px 40px;
        }

        .section-title {
            font-size: 1.4rem;
            color: #333;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .items-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .items-table thead {
            background: linear-gradient(135deg, #FFF0F5 0%, #FFE4E9 100%);
        }

        .items-table th {
            padding: 18px 20px;
            text-align: left;
            font-weight: 600;
            color: #E91E63;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .items-table td {
            padding: 20px;
            border-bottom: 1px solid #f5f5f5;
            color: #333;
        }

        .items-table tbody tr:last-child td {
            border-bottom: none;
        }

        .items-table tbody tr:hover {
            background: #FFFBFC;
        }

        .product-name {
            font-weight: 500;
            color: #333;
            margin-bottom: 5px;
        }

        .product-details {
            font-size: 0.85rem;
            color: #999;
        }

        /* Summary */
        .summary-section {
            padding: 0 40px 40px 40px;
        }

        .summary-box {
            background: linear-gradient(135deg, #FFF0F5 0%, #FFE4E9 100%);
            padding: 30px;
            border-radius: 15px;
            max-width: 400px;
            margin-left: auto;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid rgba(233, 30, 99, 0.1);
            color: #666;
        }

        .summary-row:last-child {
            border-bottom: none;
            padding-top: 20px;
            margin-top: 10px;
            border-top: 2px solid #E91E63;
        }

        .summary-row.total {
            font-size: 1.3rem;
            font-weight: 700;
            color: #E91E63;
        }

        /* Action Buttons */
        .actions-section {
            padding: 0 40px 40px 40px;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 15px 30px;
            border-radius: 15px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #E91E63 0%, #D81B60 100%);
            color: white;
            box-shadow: 0 5px 15px rgba(233, 30, 99, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(233, 30, 99, 0.4);
        }

        .btn-secondary {
            background: white;
            color: #E91E63;
            border: 2px solid #E91E63;
        }

        .btn-secondary:hover {
            background: #FFF0F5;
            transform: translateY(-2px);
        }

        /* Print Styles */
        @media print {
            body {
                background: white;
                padding: 0;
            }

            .back-button,
            .actions-section {
                display: none;
            }

            .invoice-card {
                box-shadow: none;
            }
        }

        @media (max-width: 768px) {
            .invoice-header,
            .tracking-section,
            .info-section,
            .items-section,
            .summary-section,
            .actions-section {
                padding: 25px;
            }

            .header-content {
                flex-direction: column;
            }

            .invoice-meta {
                text-align: left;
            }

            .items-table {
                font-size: 0.9rem;
            }

            .items-table th,
            .items-table td {
                padding: 12px;
            }

            .summary-box {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ url('/front/home') }}" class="back-button">
            <i class="fas fa-arrow-left"></i>
            Kembali ke Beranda
        </a>

        <div class="invoice-card">
            <!-- Invoice Header -->
            <div class="invoice-header">
                <div class="header-content">
                    <div class="store-info">
                        <h1>
                            <i class="fas fa-store"></i>
                            Makeup Store
                        </h1>
                        <p>📍 Jl. Cantik No. 123, Jakarta Selatan</p>
                        <p>📞 +62 812-3456-7890 | 📧 hello@makeupstore.com</p>
                    </div>
                    <div class="invoice-meta">
                        <div class="invoice-number">#{{ $order->order_number }}</div>
                        <div class="invoice-date">
                            <i class="far fa-calendar"></i>
                            {{ $order->created_at->format('d F Y, H:i') }}
                        </div>
                        <span class="status-badge status-{{ $order->status }}">
                            @if($order->status === 'pending') 🕐 Pending
                            @elseif($order->status === 'processing') 📦 Diproses
                            @elseif($order->status === 'shipped') 🚚 Dikirim
                            @elseif($order->status === 'delivered') ✅ Selesai
                            @else ❌ Dibatalkan
                            @endif
                        </span>
                    </div>
                </div>
            </div>

            <!-- Tracking Section -->
            <div class="tracking-section">
                <h2 class="tracking-title">
                    <i class="fas fa-shipping-fast"></i>
                    Status Pengiriman
                </h2>
                <div class="tracking-steps">
                    <!-- Step 1: Order Placed -->
                    <div class="tracking-step">
                        <div class="step-line {{ in_array($order->status, ['processing', 'shipped', 'delivered']) ? 'active' : '' }}"></div>
                        <div class="step-icon completed">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="step-content">
                            <div class="step-title completed">Pesanan Diterima</div>
                            <div class="step-description">Pesanan Anda telah kami terima dan sedang kami verifikasi</div>
                            <div class="step-time">
                                <i class="far fa-clock"></i>
                                {{ $order->created_at->format('d M Y, H:i') }}
                            </div>
                        </div>
                    </div>

                    <!-- Step 2: Processing -->
                    <div class="tracking-step">
                        <div class="step-line {{ in_array($order->status, ['shipped', 'delivered']) ? 'active' : '' }}"></div>
                        <div class="step-icon {{ in_array($order->status, ['processing', 'shipped', 'delivered']) ? ($order->status === 'processing' ? 'active' : 'completed') : 'pending' }}">
                            <i class="fas {{ in_array($order->status, ['processing', 'shipped', 'delivered']) ? 'fa-box' : 'fa-box-open' }}"></i>
                        </div>
                        <div class="step-content">
                            <div class="step-title {{ $order->status === 'processing' ? 'active' : '' }}">
                                Sedang Dikemas
                            </div>
                            <div class="step-description">Tim kami sedang mempersiapkan pesanan Anda dengan penuh perhatian</div>
                            @if(in_array($order->status, ['processing', 'shipped', 'delivered']))
                            <div class="step-time">
                                <i class="far fa-clock"></i>
                                {{ $order->updated_at->format('d M Y, H:i') }}
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Step 3: Shipped -->
                    <div class="tracking-step">
                        <div class="step-line {{ $order->status === 'delivered' ? 'active' : '' }}"></div>
                        <div class="step-icon {{ in_array($order->status, ['shipped', 'delivered']) ? ($order->status === 'shipped' ? 'active' : 'completed') : 'pending' }}">
                            <i class="fas {{ in_array($order->status, ['shipped', 'delivered']) ? 'fa-truck' : 'fa-shipping-fast' }}"></i>
                        </div>
                        <div class="step-content">
                            <div class="step-title {{ $order->status === 'shipped' ? 'active' : '' }}">
                                Dalam Pengiriman
                            </div>
                            <div class="step-description">Paket sedang dalam perjalanan menuju alamat Anda</div>
                            @if(in_array($order->status, ['shipped', 'delivered']))
                            <div class="step-time">
                                <i class="far fa-clock"></i>
                                Estimasi: 2-3 hari kerja
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Step 4: Delivered -->
                    <div class="tracking-step">
                        <div class="step-icon {{ $order->status === 'delivered' ? 'active' : 'pending' }}">
                            <i class="fas {{ $order->status === 'delivered' ? 'fa-home' : 'fa-house-user' }}"></i>
                        </div>
                        <div class="step-content">
                            <div class="step-title {{ $order->status === 'delivered' ? 'active' : '' }}">
                                Pesanan Tiba
                            </div>
                            <div class="step-description">Paket telah sampai di alamat tujuan. Selamat menikmati! 💄✨</div>
                            @if($order->status === 'delivered')
                            <div class="step-time">
                                <i class="far fa-clock"></i>
                                {{ $order->updated_at->format('d M Y, H:i') }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Customer & Shipping Info -->
            <div class="info-section">
                <div class="info-box">
                    <div class="info-title">
                        <i class="fas fa-user"></i>
                        Informasi Customer
                    </div>
                    <div class="info-text">
                        <strong>{{ $order->customer_name }}</strong>
                        {{ $order->customer_email }}<br>
                        {{ $order->customer_phone }}
                    </div>
                </div>

                <div class="info-box">
                    <div class="info-title">
                        <i class="fas fa-map-marker-alt"></i>
                        Alamat Pengiriman
                    </div>
                    <div class="info-text">
                        {{ $order->customer_address }}<br>
                        {{ $order->city }} - {{ $order->postal_code }}
                    </div>
                </div>

                <div class="info-box">
                    <div class="info-title">
                        <i class="fas fa-credit-card"></i>
                        Metode Pembayaran
                    </div>
                    <div class="info-text">
                        {{ $order->notes ?: 'COD - Bayar di Tempat' }}
                    </div>
                </div>
            </div>

            <!-- Order Items -->
            <div class="items-section">
                <h2 class="section-title">
                    <i class="fas fa-shopping-bag"></i>
                    Detail Pesanan
                </h2>
                <table class="items-table">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th style="text-align: center;">Qty</th>
                            <th style="text-align: right;">Harga</th>
                            <th style="text-align: right;">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->orderItems as $item)
                        <tr>
                            <td>
                                <div class="product-name">{{ $item->product_name }}</div>
                                <div class="product-details">SKU: MKP-{{ str_pad($item->product_id, 3, '0', STR_PAD_LEFT) }}</div>
                            </td>
                            <td style="text-align: center;">{{ $item->quantity }}</td>
                            <td style="text-align: right;">Rp{{ number_format($item->product_price, 0, ',', '.') }}</td>
                            <td style="text-align: right; font-weight: 600;">Rp{{ number_format($item->subtotal, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Summary -->
            <div class="summary-section">
                <div class="summary-box">
                    <div class="summary-row">
                        <span>Subtotal Produk</span>
                        <span>Rp{{ number_format($order->subtotal, 0, ',', '.') }}</span>
                    </div>
                    <div class="summary-row">
                        <span>Biaya Pengiriman</span>
                        <span>Gratis</span>
                    </div>
                    <div class="summary-row total">
                        <span>Total Pembayaran</span>
                        <span>Rp{{ number_format($order->total, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="actions-section">
                <button class="btn btn-primary" onclick="window.print()">
                    <i class="fas fa-print"></i>
                    Cetak Invoice
                </button>
                <a href="{{ url('/front/home') }}" class="btn btn-secondary">
                    <i class="fas fa-shopping-bag"></i>
                    Belanja Lagi
                </a>
                @if($order->status === 'delivered')
                <a href="#" class="btn btn-secondary">
                    <i class="fas fa-star"></i>
                    Beri Ulasan
                </a>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
