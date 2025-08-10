```blade
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
            background: white;
            color: #000;
            line-height: 1.6;
            font-size: 14px;
        }

        .invoice-container {
            max-width: 210mm;
            margin: 0 auto;
            padding: 15mm;
            background: white;
            min-height: 297mm;
        }

        .header-section {
            background: white;
            border: 3px solid #000;
            padding: 25px;
            margin-bottom: 25px;
            text-align: center;
        }

        .invoice-title {
            font-size: 30px;
            font-weight: bold;
            color: #000;
            margin-bottom: 15px;
        }

        .invoice-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .detail-box {
            background: white;
            border: 2px solid #000;
            padding: 12px 20px;
            color: #000;
            font-weight: bold;
            border-radius: 5px;
        }

        .parties-container {
            display: block;
            margin-bottom: 30px;
        }

        .party-info {
            background: white;
            border: 2px solid #000;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        .party-title {
            background: white;
            color: #000;
            font-size: 18px;
            font-weight: bold;
            padding: 10px;
            margin-bottom: 15px;
            text-align: center;
            border: 2px solid #000;
            border-radius: 5px;
        }

        .party-details {
            color: #000;
        }

        .party-details div {
            margin-bottom: 8px;
            padding: 5px 0;
        }

        .items-section {
            margin-bottom: 30px;
        }

        .section-title {
            background: white;
            color: #000;
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            border: 2px solid #000;
            margin-bottom: 15px;
        }

        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }

        .items-table th {
            background: white;
            color: #000;
            padding: 15px;
            text-align: center;
            border: 2px solid #000;
            font-weight: bold;
        }

        .items-table td {
            padding: 12px;
            text-align: center;
            border: 2px solid #000;
            color: #000;
            background: white;
        }

        .totals-section {
            background: white;
            border: 2px solid #000;
            padding: 20px;
            margin-bottom: 20px;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #000;
            color: #000;
        }

        .discount-info {
            background: white;
            border: 2px solid #000;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            color: #000;
        }

        .final-amount {
            background: white;
            border: 3px solid #000;
            padding: 25px;
            text-align: center;
            border-radius: 10px;
            color: #000;
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="invoice-container">
    <div class="header-section">
        <div class="invoice-title">{{ $title ?? 'فاکتور فروش' }}</div>
        <div class="invoice-details">
            <div class="detail-box">شماره: {{ $invoice_number ?? 'F-9842' }}</div>
            <div class="detail-box">تاریخ: {{ $invoice_date ?? '1402/08/15' }}</div>
        </div>
    </div>

    <div class="parties-container">
        <div class="party-info">
            <div class="party-title">اطلاعات فروشنده</div>
            <div class="party-details">
                <div><strong>شرکت:</strong> {{ $seller['company'] ?? 'فروشگاه لوازم الکترونیک پارس' }}</div>
                <div><strong>آدرس:</strong> {{ $seller['address'] ?? 'مشهد، بلوار وکیل آباد، جنب بانک ملی، پلاک 234' }}</div>
                <div><strong>تلفن:</strong> {{ $seller['phone'] ?? '051-36547821' }}</div>
                <div><strong>کارت:</strong> {{ $seller['card'] ?? '6274-1291-8765-4321' }}</div>
                <div><strong>شبا:</strong> {{ $seller['sheba'] ?? 'IR630560000000198765432147' }}</div>
            </div>
        </div>

        <div class="party-info">
            <div class="party-title">اطلاعات خریدار</div>
            <div class="party-details">
                <div><strong>نام:</strong> {{ $buyer['name'] ?? 'خانم فاطمه کریمی' }}</div>
                <div><strong>آدرس:</strong> {{ $buyer['address'] ?? 'مشهد، خیابان امام رضا، کوچه شهید باهنر، پلاک 56' }}</div>
                <div><strong>تلفن:</strong> {{ $buyer['phone'] ?? '09155987654' }}</div>
            </div>
        </div>
    </div>

    <div class="items-section">
        <div class="section-title">مشخصات کالاها</div>
        <table class="items-table">
            <thead>
            <tr>
                <th>ردیف</th>
                <th>شرح کالا</th>
                <th>تعداد</th>
                <th>قیمت واحد</th>
                <th>مبلغ کل</th>
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
                    <td>تلویزیون ال ای دی 55 اینچ سامسونگ</td>
                    <td>1</td>
                    <td>32,500,000</td>
                    <td>32,500,000</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>ساندبار سونی مدل HT-S350</td>
                    <td>1</td>
                    <td>4,200,000</td>
                    <td>4,200,000</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>کابل HDMI طول 3 متر</td>
                    <td>2</td>
                    <td>180,000</td>
                    <td>360,000</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>

    <div class="totals-section">
        <div class="total-row">
            <span><strong>جمع کل:</strong></span>
            <span><strong>{{ number_format($total ?? 37060000) }} ریال</strong></span>
        </div>
    </div>

    <div class="discount-info">
        <strong>تخفیف:</strong> {{ number_format($discount ?? 560000) }} ریال ({{ $discount_note ?? 'تخفیف خرید نقدی' }})
    </div>

    <div class="final-amount">
        مبلغ نهایی قابل پرداخت: {{ number_format($final_amount ?? 36500000) }} ریال
    </div>
</div>
</body>
</html>
