<?php

namespace RMS\PDF\Http\Controllers;

use RMS\PDF\PDFFacade as PDF;
use RMS\PDF\Seller;
use RMS\PDF\Buyer;
use RMS\PDF\Invoice;

class PdfController
{
    public function generate()
    {
        try {
            $seller = new Seller([
                'company' => 'فروشگاه پوشاک و البسه خانم حسینی',
                'address' => 'یزد، خیابان صفائیه، پاساژ امیر، طبقه دوم، واحد 12',
                'postal_code' => '12345-67890',
                'phone' => '035-36547821',
                'bank' => [
                    'account_holder' => 'فروشگاه پوشاک و البسه خانم حسینی',
                    'card_number' => '6274-1291-5678-9012',
                    'sheba' => 'IR751790000000741963852741',
                ],
            ]);

            $buyer = new Buyer([
                'name' => 'خانم مریم نیکوکار',
                'address' => 'یزد، خیابان امام، کوچه شهید رجایی، پلاک 145',
                'postal_code' => '12345-67890',
                'phone' => '09135789654',
            ]);

            $invoice = new Invoice([
                'title' => 'فاکتور فروش',
                'subtitle' => 'صورتحساب رسمی',
                'invoice_number' => 'EL-8524',
                'invoice_date' => '1402/08/15',
                'reference' => '789456',
                'items' => [
                    [
                        'description' => 'مانتو مشکی مجلسی',
                        'quantity' => 1,
                        'unit_price' => 1850000,
                        'total' => 1850000,
                    ],
                    [
                        'description' => 'شال نخی طرح دار',
                        'quantity' => 2,
                        'unit_price' => 320000,
                        'total' => 640000,
                    ],
                    [
                        'description' => 'کیف دستی چرمی',
                        'quantity' => 1,
                        'unit_price' => 890000,
                        'total' => 890000,
                    ],
                    [
                        'description' => 'کفش پاشنه بلند',
                        'quantity' => 1,
                        'unit_price' => 1200000,
                        'total' => 1200000,
                    ],
                ],
                'total_items' => 4580000,
                'postage_cost' => 120000,
                'discount' => 180000,
                'discount_note' => 'تخفیف خرید بالای 4 میلیون',
                'final_amount' => 4520000,
            ]);

            return PDF::setFont('vazir')
                ->enableRTL()
                ->loadTheme('elegant', compact('seller', 'buyer', 'invoice'))
                ->download('elegant.pdf');
        } catch (\Mpdf\MpdfException $e) {
            dd('mPDF Error: ' . $e->getMessage());
        } catch (\Exception $e) {
            dd('General Error: ' . $e->getMessage());
        }
    }
}
