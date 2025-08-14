<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>{{ $invoice->title ?? 'فاکتور فروش' }}</title>
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
            border: 2px double #000;
        }

        .elegant-header {
            text-align: center;
            margin-bottom: 20px;
            padding: 30px;
            background: white;
            border: 1px double #000;
            position: relative;
        }

        .corner-decoration {
            position: absolute;
            width: 20px;
            height: 20px;
            border: 1px solid #000;
            background: white;
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
            font-size: 20px;
            font-weight: bold;
            color: #000;
            margin-bottom: 15px;
            letter-spacing: 2px;
        }

        .elegant-subtitle {
            font-size: 12px;
            color: #000;
            font-style: italic;
        }

        .invoice-details {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-bottom: 20px;
        }

        .detail-elegant {
            background: white;
            border: 2px solid #000;
            padding: 6px 25px;
            border-radius: 25px;
            color: #000;
            font-weight: bold;
            text-align: center;
        }

        .parties-elegant {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 20px;
        }

        .party-elegant {
            background: white;
            border: 1px double #000;
            border-radius: 15px;
            overflow: hidden;
            flex: 1;
        }

        .party-header {
            background: white;
            color: #000;
            padding: 8px;
            font-size: 12px;
            font-weight: bold;
            text-align: center;
            border-bottom: 1px double #000;
        }

        .party-content {
            padding: 8px;
            color: #000;
        }

        .elegant-line {
            display: grid;
            grid-template-columns: 1fr 3fr;
            padding: 6px 0;
            border-bottom: 1px dotted #000;
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
            background: white;
            border: 1px double #000;
            margin-bottom: 18px;
            border-radius: 20px;
            overflow: hidden;
        }

        .products-header {
            background: white;
            color: #000;
            padding: 8px;
            font-size: 12px;
            font-weight: bold;
            text-align: center;
            border-bottom: 4px double #000;
        }

        .elegant-table {
            width: 100%;
            border-collapse: collapse;
        }

        .elegant-table th {
            background: white;
            color: #000;
            padding: 8px;
            text-align: center;
            border-bottom: 1px solid #000;
            border-right: 2px dotted #000;
            font-weight: bold;
            font-size: 12px;
        }

        .elegant-table th:last-child {
            border-right: none;
        }

        .elegant-table td {
            padding: 6px;
            text-align: center;
            border-bottom: 1px dotted #000;
            border-right: 1px dotted #000;
            color: #000;
            background: white;
        }

        .elegant-table td:last-child {
            border-right: none;
        }

        .summary-elegant {
            background: white;
            border: 1px double #000;
            padding: 8px;
            margin-bottom: 15px;
            border-radius: 15px;
        }

        .summary-title {
            font-size: 12px;
            font-weight: bold;
            color: #000;
            text-align: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px dotted #000;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 6px 0;
            border-bottom: 1px dotted #000;
            color: #000;
            font-size: 12px;
        }

        .discount-elegant {
            background: white;
            border: 1px dashed #000;
            padding: 8px;
            margin-bottom: 15px;
            border-radius: 15px;
            text-align: center;
            color: #000;
            font-size: 12px;
        }

        .final-elegant {
            background: white;
            border: 5px double #000;
            padding: 35px;
            text-align: center;
            border-radius: 25px;
            color: #000;
            font-size: 14px;
            font-weight: bold;
        }

        .signature-section {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
        }

        .signature-elegant {
            background: white;
            border: 2px double #000;
            padding: 8px;
            width: 45%;
            text-align: center;
            color: #000;
            border-radius: 15px;
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
    <div class="elegant-header">
        <div class="corner-decoration top-right"></div>
        <div class="corner-decoration top-left"></div>
        <div class="corner-decoration bottom-right"></div>
        <div class="corner-decoration bottom-left"></div>
        <div class="elegant-title">{{ $invoice->title ?? 'فاکتور فروش' }}</div>
        <div class="elegant-subtitle">{{ $invoice->subtitle ?? 'صورتحساب رسمی' }}</div>
        <div class="invoice-details">
            <div class="detail-elegant">شماره: {{ $invoice->invoice_number ?? 'EL-8524' }}</div>
            <div class="detail-elegant">تاریخ: {{ $invoice->invoice_date ?? '1402/08/15' }}</div>
            <div class="detail-elegant">مرجع: {{ $invoice->reference ?? '789456' }}</div>
        </div>
    </div>

    <div class="parties-elegant">
        <div class="party-elegant">
            <div class="party-header">اطلاعات فروشنده</div>
            <div class="party-content">
                <div class="elegant-line">
                    <div class="line-label">شرکت:</div>
                    <div class="line-value">{{ $seller->company ?? 'فروشگاه پوشاک و البسه خانم حسینی' }}</div>
                </div>
                <div class="elegant-line">
                    <div class="line-label">آدرس:</div>
                    <div class="line-value">{{ $seller->address ?? 'یزد، خیابان صفائیه، پاساژ امیر، طبقه دوم، واحد 12' }}</div>
                </div>
                <div class="elegant-line">
                    <div class="line-label">کد پستی:</div>
                    <div class="line-value">{{ $seller->postal_code ?? '12345-67890' }}</div>
                </div>
                <div class="elegant-line">
                    <div class="line-label">تلفن:</div>
                    <div class="line-value">{{ $seller->phone ?? '035-36547821' }}</div>
                </div>
            </div>
        </div>

        <div class="party-elegant">
            <div class="party-header">اطلاعات خریدار</div>
            <div class="party-content">
                <div class="elegant-line">
                    <div class="line-label">نام:</div>
                    <div class="line-value">{{ $buyer->name ?? 'خانم مریم نیکوکار' }}</div>
                </div>
                <div class="elegant-line">
                    <div class="line-label">آدرس:</div>
                    <div class="line-value">{{ $buyer->address ?? 'یزد، خیابان امام، کوچه شهید رجایی، پلاک 145' }}</div>
                </div>
                <div class="elegant-line">
                    <div class="line-label">کد پستی:</div>
                    <div class="line-value">{{ $buyer->postal_code ?? '12345-67890' }}</div>
                </div>
                <div class="elegant-line">
                    <div class="line-label">تلفن:</div>
                    <div class="line-value">{{ $buyer->phone ?? '09135789654' }}</div>
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
            @foreach($invoice->products ?? [] as $index => $product)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ number_format($product->unit_price) }}</td>
                    <td>{{ number_format($product->total) }}</td>
                </tr>
            @endforeach
            @if(empty($invoice->products))
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
            <span>{{ number_format($invoice->total_items ?? 4580000) }} ریال</span>
        </div>
        <div class="summary-row">
            <span>هزینه پست:</span>
            <span>{{ number_format($invoice->postage_cost ?? 120000) }} ریال</span>
        </div>
    </div>

    <div class="discount-elegant">
        <strong>تخفیف ویژه:</strong> {{ number_format($invoice->discount ?? 180000) }} ریال ({{ $invoice->discount_note ?? 'تخفیف خرید بالای 4 میلیون' }})
    </div>

    <div class="final-elegant">
        مبلغ نهایی قابل پرداخت: {{ number_format($invoice->final_amount ?? 4520000) }} ریال
    </div>

    <div class="bank-info">
        <div class="bank-title">اطلاعات بانکی</div>
        <div class="bank-details">
            <div><strong>نام صاحب حساب:</strong> {{ $seller->bank->account_holder ?? 'فروشگاه پوشاک و البسه خانم حسینی' }}</div>
            <div><strong>شماره کارت:</strong> {{ $seller->bank->card_number ?? '6274-1291-5678-9012' }}</div>
            <div><strong>شماره شبا:</strong> {{ $seller->bank->sheba ?? 'IR751790000000741963852741' }}</div>
        </div>
    </div>

    <div class="signature-section">
        <div class="signature-elegant">مهر و امضای فروشنده</div>
        <div class="signature-elegant">امضای خریدار</div>
    </div>
</div>
</body>
</html>
