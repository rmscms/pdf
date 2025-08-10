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
            direction: rtl;
            unicode-bidi: embed;
            background: #ECFAF8; /* پس‌زمینه سبزآبی مینیمال */
            color: #000;
            line-height: 1.6;
            font-size: 14px;
        }

        .invoice-container {
            max-width: 210mm;
            margin: 0 auto;
            padding: 20mm;
            background: #ECFAF8;
            min-height: 297mm;
            border: 5px double #7FBFB7; /* رنگ کادر */
        }

        .elegant-header {
            text-align: center;
            margin-bottom: 40px;
            padding: 30px;
            background: #E3F6F3; /* رنگ پنل */
            border: 3px double #7FBFB7;
            position: relative;
        }

        .corner-decoration {
            position: absolute;
            width: 20px;
            height: 20px;
            border: 3px solid #7FBFB7;
            background: #E3F6F3;
        }

        .corner-decoration.top-right {
            top: -3px;
            right: -3px;
        }

        .corner-decoration.top-left {
            top: -3px;
            left: -3px;
        }

        .corner-decoration.bottom-right {
            bottom: -3px;
            right: -3px;
        }

        .corner-decoration.bottom-left {
            bottom: -3px;
            left: -3px;
        }

        .elegant-title {
            font-size: 32px;
            font-weight: bold;
            color: #000;
            margin-bottom: 20px;
            letter-spacing: 2px; /* letter-spacing کمتر برای سازگاری با mPDF */
        }

        .elegant-subtitle {
            font-size: 16px;
            color: #000;
            font-style: italic;
        }

        .invoice-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .detail-elegant {
            background: #E3F6F3;
            border: 2px solid #7FBFB7;
            padding: 15px 25px;
            border-radius: 25px;
            color: #000;
            font-weight: bold;
            text-align: center;
        }

        .parties-elegant {
            margin-bottom: 40px;
        }

        .party-elegant {
            background: #E3F6F3;
            border: 3px double #7FBFB7;
            margin-bottom: 25px;
            border-radius: 15px;
            overflow: hidden;
        }

        .party-header {
            background: #C8EEE9; /* رنگ هدر */
            color: #000;
            padding: 20px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            border-bottom: 3px double #7FBFB7;
        }

        .party-content {
            padding: 25px;
            color: #000;
        }

        .elegant-line {
            display: grid;
            grid-template-columns: 1fr 3fr;
            padding: 10px 0;
            border-bottom: 1px dotted #7FBFB7;
            color: #000;
        }

        .line-label {
            font-weight: bold;
            color: #000;
        }

        .line-value {
            color: #000;
        }

        .products-elegant {
            background: #E3F6F3;
            border: 4px double #7FBFB7;
            margin-bottom: 30px;
            border-radius: 20px;
            overflow: hidden;
        }

        .products-header {
            background: #C8EEE9;
            color: #000;
            padding: 25px;
            font-size: 22px;
            font-weight: bold;
            text-align: center;
            border-bottom: 4px double #7FBFB7;
        }

        .elegant-table {
            width: 100%;
            border-collapse: collapse;
        }

        .elegant-table th {
            background: #C8EEE9;
            color: #000;
            padding: 20px;
            text-align: center;
            border-bottom: 3px solid #7FBFB7;
            border-right: 2px dotted #7FBFB7;
            font-weight: bold;
            font-size: 16px;
        }

        .elegant-table th:last-child {
            border-right: none;
        }

        .elegant-table td {
            padding: 18px;
            text-align: center;
            border-bottom: 1px dotted #7FBFB7;
            border-right: 1px dotted #7FBFB7;
            color: #000;
            background: #E3F6F3;
        }

        .elegant-table td:last-child {
            border-right: none;
        }

        .summary-elegant {
            background: #E3F6F3;
            border: 3px double #7FBFB7;
            padding: 25px;
            margin-bottom: 25px;
            border-radius: 15px;
        }

        .summary-title {
            font-size: 18px;
            font-weight: bold;
            color: #000;
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px dotted #7FBFB7;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px dotted #7FBFB7;
            color: #000;
            font-size: 16px;
        }

        .discount-elegant {
            background: #E3F6F3;
            border: 3px dashed #7FBFB7;
            padding: 20px;
            margin-bottom: 25px;
            border-radius: 15px;
            text-align: center;
            color: #000;
            font-size: 16px;
        }

        .final-elegant {
            background: #E3F6F3;
            border: 5px double #7FBFB7;
            padding: 35px;
            text-align: center;
            border-radius: 25px;
            color: #000;
            font-size: 28px;
            font-weight: bold;
        }

        .signature-section {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
        }

        .signature-elegant {
            background: #E3F6F3;
            border: 2px double #7FBFB7;
            padding: 25px;
            width: 45%;
            text-align: center;
            color: #000;
            border-radius: 15px;
        }
    </style>
</head>
<body>
<div class="invoice-container">
    <div class="elegant-header">
        <div class="corner-decoration top-right"></div>
        <div class="corner-decoration top-left"></div>
        <div class="corner-decoration bottom-right"></div>
        <div class="corner-decoration bottom-left"></div>
        <div class="elegant-title">{{ $title ?? 'فاکتور فروش' }}</div>
        <div class="elegant-subtitle">{{ $subtitle ?? 'صورتحساب رسمی' }}</div>
    </div>

    <div class="invoice-details">
        <div class="detail-elegant">شماره: {{ $invoice_number ?? 'EL-8524' }}</div>
        <div class="detail-elegant">تاریخ: {{ $invoice_date ?? '1402/08/15' }}</div>
        <div class="detail-elegant">مرجع: {{ $reference ?? '789456' }}</div>
    </div>

    <div class="parties-elegant">
        <div class="party-elegant">
            <div class="party-header">اطلاعات فروشنده</div>
            <div class="party-content">
                <div class="elegant-line">
                    <div class="line-label">شرکت:</div>
                    <div class="line-value">{{ $seller['company'] ?? 'فروشگاه پوشاک و البسه خانم حسینی' }}</div>
                </div>
                <div class="elegant-line">
                    <div class="line-label">آدرس:</div>
                    <div class="line-value">{{ $seller['address'] ?? 'یزد، خیابان صفائیه، پاساژ امیر، طبقه دوم، واحد 12' }}</div>
                </div>
                <div class="elegant-line">
                    <div class="line-label">تلفن:</div>
                    <div class="line-value">{{ $seller['phone'] ?? '035-36547821' }}</div>
                </div>
                <div class="elegant-line">
                    <div class="line-label">کارت:</div>
                    <div class="line-value">{{ $seller['card'] ?? '6274-1291-5678-9012' }}</div>
                </div>
                <div class="elegant-line">
                    <div class="line-label">شبا:</div>
                    <div class="line-value">{{ $seller['sheba'] ?? 'IR751790000000741963852741' }}</div>
                </div>
            </div>
        </div>

        <div class="party-elegant">
            <div class="party-header">اطلاعات خریدار</div>
            <div class="party-content">
                <div class="elegant-line">
                    <div class="line-label">نام:</div>
                    <div class="line-value">{{ $buyer['name'] ?? 'خانم مریم نیکوکار' }}</div>
                </div>
                <div class="elegant-line">
                    <div class="line-label">آدرس:</div>
                    <div class="line-value">{{ $buyer['address'] ?? 'یزد، خیابان امام، کوچه شهید رجایی، پلاک 145' }}</div>
                </div>
                <div class="elegant-line">
                    <div class="line-label">تلفن:</div>
                    <div class="line-value">{{ $buyer['phone'] ?? '09135789654' }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="products-elegant">
        <div class="products-header">مشخصات کالاهای خریداری شده</div>
        <table class="elegant-table">
            <thead>
            <tr>
                <th>ردیف</th>
                <th>نام محصول</th>
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
                    <td>مانتو مشکی مجلسی</td>
                    <td>1</td>
                    <td>1,850,000</td>
                    <td>1,850,000</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>شال نخی طرح دار</td>
                    <td>2</td>
                    <td>320,000</td>
                    <td>640,000</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>کیف دستی چرمی</td>
                    <td>1</td>
                    <td>890,000</td>
                    <td>890,000</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>کفش پاشنه بلند</td>
                    <td>1</td>
                    <td>1,200,000</td>
                    <td>1,200,000</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>

    <div class="summary-elegant">
        <div class="summary-title">خلاصه صورتحساب</div>
        <div class="summary-row">
            <span>جمع کل اقلام:</span>
            <span>{{ number_format($total ?? 4580000) }} ریال</span>
        </div>
    </div>

    <div class="discount-elegant">
        <strong>تخفیف ویژه:</strong> {{ number_format($discount ?? 180000) }} ریال ({{ $discount_note ?? 'تخفیف خرید بالای 4 میلیون' }})
    </div>

    <div class="final-elegant">
        مبلغ نهایی قابل پرداخت: {{ number_format($final_amount ?? 4400000) }} ریال
    </div>

    <div class="signature-section">
        <div class="signature-elegant">مهر و امضای فروشنده</div>
        <div class="signature-elegant">امضای خریدار</div>
    </div>
</div>
</body>
</html>
```
