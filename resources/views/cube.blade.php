<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'فاکتور فروش' }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Vazir, sans-serif;
            direction: rtl;
            unicode-bidi: embed;
            background: white;
            color: #000;
            line-height: 1.4;
            font-size: 12px;
        }

        .invoice-container {
            max-width: 210mm;
            margin: 0 auto;
            padding: 8mm;
            background: white;
            min-height: 297mm;
        }

        .header-cube {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 20px;
            margin-bottom: 18px;
        }

        .cube-item {
            background: white;
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
            color: #000;
            font-weight: bold;
            font-size: 12px;
        }

        .cube-item.main {
            grid-column: 2;
            font-size: 14px;
            background: white;
            border: 1px solid #000;
        }

        .companies-grid {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 18px;
        }

        .company-cube {
            background: white;
            border: 1px solid #000;
            overflow: hidden;
            flex: 1;
        }

        .cube-header {
            background: white;
            color: #000;
            padding: 6px;
            font-size: 12px;
            font-weight: bold;
            text-align: center;
            border-bottom: 1px solid #000;
        }

        .cube-body {
            padding: 8px;
            color: #000;
            background: white;
        }

        .cube-row {
            display: flex;
            justify-content: space-between;
            padding: 6px 0;
            border-bottom: 1px dotted #000;
            color: #000;
        }

        .cube-label {
            font-weight: bold;
            color: #000;
        }

        .items-cube {
            background: white;
            border: 1px solid #000;
            margin-bottom: 18px;
            overflow: hidden;
        }

        .items-header {
            background: white;
            color: #000;
            padding: 8px;
            font-size: 12px;
            font-weight: bold;
            text-align: center;
            border-bottom: 4px solid #000;
        }

        .cube-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        .cube-table th {
            background: white;
            color: #000;
            padding: 6px;
            text-align: center;
            border: 2px solid #000;
            font-weight: bold;
            font-size: 12px;
        }

        .cube-table td {
            padding: 6px;
            text-align: center;
            border: 2px solid #000;
            color: #000;
            background: white;
        }

        .totals-cube {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 15px;
        }

        .total-item {
            background: white;
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
            color: #000;
            font-size: 12px;
            font-weight: bold;
        }

        .discount-cube {
            background: white;
            border: 1px dashed #000;
            padding: 8px;
            margin-bottom: 15px;
            text-align: center;
            color: #000;
            font-size: 12px;
        }

        .final-cube {
            background: white;
            border: 1px solid #000;
            padding: 15px;
            text-align: center;
            color: #000;
            font-size: 18px;
            font-weight: bold;
        }

        .footer-cubes {
            margin-top: 40px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .footer-cube {
            background: white;
            border: 2px solid #000;
            padding: 8px;
            text-align: center;
            color: #000;
            font-size: 12px;
        }

        .bank-info {
            background: white;
            border: 1px solid #000;
            padding: 10px;
            margin-top: 15px;
            border-radius: 5px;
        }

        .bank-title {
            font-size: 12px;
            font-weight: bold;
            color: #000;
            text-align: center;
            margin-bottom: 8px;
            padding-bottom: 5px;
            border-bottom: 1px solid #000;
        }

        .bank-details {
            font-size: 12px;
            color: #000;
        }

        .bank-details div {
            margin-bottom: 4px;
        }
    </style>
</head>
<body>
<div class="invoice-container">
    <div class="header-cube">
        <div class="cube-item">شماره: {{ $invoice_number ?? 'CB-9517' }}</div>
        <div class="cube-item main">{{ $title ?? 'فاکتور فروش' }}</div>
        <div class="cube-item">تاریخ: {{ $invoice_date ?? '1402/08/15' }}</div>
    </div>

    <div class="companies-grid">
        <div class="company-cube">
            <div class="cube-header">مشخصات فروشنده</div>
            <div class="cube-body">
                <div class="cube-row">
                    <span class="cube-label">شرکت:</span>
                    <span>{{ $seller['company'] ?? 'تعمیرگاه تخصصی خودرو مهدی' }}</span>
                </div>
                <div class="cube-row">
                    <span class="cube-label">آدرس:</span>
                    <span>{{ $seller['address'] ?? 'اهواز، خیابان کیانپارس، جنب پمپ بنزین، پلاک 67' }}</span>
                </div>
                <div class="cube-row">
                    <span class="cube-label">کد پستی:</span>
                    <span>{{ $seller['postal_code'] ?? '61368-45678' }}</span>
                </div>
                <div class="cube-row">
                    <span class="cube-label">تلفن:</span>
                    <span>{{ $seller['phone'] ?? '061-33567821' }}</span>
                </div>
            </div>
        </div>

        <div class="company-cube">
            <div class="cube-header">مشخصات خریدار</div>
            <div class="cube-body">
                <div class="cube-row">
                    <span class="cube-label">نام:</span>
                    <span>{{ $buyer['name'] ?? 'آقای مجید کریمی' }}</span>
                </div>
                <div class="cube-row">
                    <span class="cube-label">آدرس:</span>
                    <span>{{ $buyer['address'] ?? 'اهواز، خیابان جمهوری، کوچه شهیدان، پلاک 154' }}</span>
                </div>
                <div class="cube-row">
                    <span class="cube-label">کد پستی:</span>
                    <span>{{ $buyer['postal_code'] ?? '61368-12345' }}</span>
                </div>
                <div class="cube-row">
                    <span class="cube-label">تلفن:</span>
                    <span>{{ $buyer['phone'] ?? '09166987452' }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="items-cube">
        <div class="items-header">فهرست خدمات و قطعات</div>
        <table class="cube-table">
            <thead>
            <tr>
                <th>ردیف</th>
                <th>شرح خدمت / قطعه</th>
                <th>تعداد</th>
                <th>قیمت واحد</th>
                <th>مجموع</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items ?? [] as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item['description'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>{{ number_format($item['unit_price']) }}</td>
                    <td>{{ number_format($item['total']) }}</td>
                </tr>
            @endforeach
            @if(empty($items))
                <tr>
                    <td>1</td>
                    <td>تعویض روغن موتور</td>
                    <td>1</td>
                    <td>280,000</td>
                    <td>280,000</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>فیلتر هوا خودرو</td>
                    <td>1</td>
                    <td>120,000</td>
                    <td>120,000</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>تنظیم فرمان و چرخ</td>
                    <td>1</td>
                    <td>180,000</td>
                    <td>180,000</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>شستشوی کامل خودرو</td>
                    <td>1</td>
                    <td>70,000</td>
                    <td>70,000</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>

    <div class="totals-cube">
        <div class="total-item">
            جمع کل خدمات: {{ number_format($total_services ?? 650000) }} ریال
        </div>
        <div class="total-item">
            هزینه پست: {{ number_format($postage_cost ?? 100000) }} ریال
        </div>
    </div>

    <div class="discount-cube">
        <strong>تخفیف:</strong> {{ number_format($discount ?? 50000) }} ریال ({{ $discount_note ?? 'تخفیف مشتری وفادار' }})
    </div>

    <div class="final-cube">
        مبلغ نهایی قابل پرداخت: {{ number_format($final_amount ?? 700000) }} ریال
    </div>

    <div class="bank-info">
        <div class="bank-title">اطلاعات بانکی</div>
        <div class="bank-details">
            <div><strong>نام صاحب حساب:</strong> {{ $bank['account_holder'] ?? 'تعمیرگاه تخصصی خودرو مهدی' }}</div>
            <div><strong>شماره کارت:</strong> {{ $bank['card_number'] ?? '6037-9975-2468-1357' }}</div>
            <div><strong>شماره شبا:</strong> {{ $bank['sheba'] ?? 'IR741700000000852963741258' }}</div>
        </div>
    </div>

    <div class="footer-cubes">
        <div class="footer-cube">{{ $footer_left ?? 'گارانتی 6 ماهه' }}</div>
        <div class="footer-cube">{{ $footer_right ?? 'خدمات 24 ساعته' }}</div>
    </div>
</div>
</body>
</html>
