# RMS PDF Package

A Laravel package for generating PDF invoices with full RTL support, specifically designed for Persian (Farsi) language invoices using the mPDF library.

## Features
- Generates PDF invoices with complete RTL and Persian font support (Vazir font by default).
- Structured data management using `Seller`, `Buyer`, `Bank`, `Product`, and `Invoice` classes.
- Customizable invoice templates using Blade views.
- Configurable default font and theme via a configuration file.
- Seamless integration with Laravel 12.
- Supports dynamic data injection for invoices.
- Includes a test route for easy development and testing.

## Requirements
- PHP >= 8.1
- Laravel >= 12.0
- mPDF >= 8.2

## Installation

1. **Install via Composer**:
   ```bash
   composer require rmscms/pdf
   ```

2. **Publish Assets**:
   Publish fonts, views, and configuration to your project:
   ```bash
   php artisan vendor:publish --tag=rms-pdf-fonts
   php artisan vendor:publish --tag=rms-pdf-views
   php artisan vendor:publish --tag=rms-pdf-config
   ```
   This copies:
   - Vazir fonts to `public/vendor/rms-pdf/fonts`.
   - Blade templates to `resources/views/vendor/rms-pdf`.
   - Configuration file to `config/rms-pdf.php`.

3. **Verify Dependencies**:
   The `mpdf/mpdf:^8.2` dependency is automatically included via the package's `composer.json`.

## Configuration

The package uses the Vazir font and `elegant` template by default for Persian text. These can be customized in the `config/rms-pdf.php` file:

```php
return [
    'default_font' => 'vazir',
    'default_theme' => 'elegant',
    'fontdata' => [
        'vazir' => [
            'R' => 'Vazir.ttf',
            'B' => 'Vazir-Bold.ttf',
            'useOTL' => 0xFF,
            'useKashida' => 75,
        ],
    ],
];
```

### Adding Custom Fonts
To use a different font (e.g., `IRANSans`), place the `.ttf` files in your project's `public/vendor/rms-pdf/fonts` after publishing, and update `config/rms-pdf.php`:

```php
return [
    'default_font' => 'iransans',
    'default_theme' => 'elegant',
    'fontdata' => [
        'iransans' => [
            'R' => 'IRANSans.ttf',
            'B' => 'IRANSans-Bold.ttf',
            'useOTL' => 0xFF,
            'useKashida' => 75,
        ],
    ],
];
```

Run the publish command to ensure fonts are available:
```bash
php artisan vendor:publish --tag=rms-pdf-fonts
```

## Usage

The package provides a `PDF` facade to generate invoices. Data is structured using the `Seller`, `Buyer`, `Bank`, `Product`, and `Invoice` classes.

### Classes
- **Seller**: Manages seller information and bank details.
  - Properties: `company`, `address`, `postal_code`, `phone`, `bank` (instance of `Bank`).
- **Bank**: Manages bank account details.
  - Properties: `account_holder`, `card_number`, `sheba`.
- **Buyer**: Manages buyer information.
  - Properties: `name`, `address`, `postal_code`, `phone`.
- **Product**: Represents a single invoice item.
  - Properties: `description`, `quantity`, `unit_price`, `total`.
- **Invoice**: Manages invoice details and a collection of products.
  - Properties: `title`, `subtitle`, `invoice_number`, `invoice_date`, `reference`, `total_items`, `postage_cost`, `discount`, `discount_note`, `final_amount`, `products` (array of `Product` objects), `footer_left`, `footer_right`.

### Creating a Custom Template
To create a custom invoice template, follow these steps:
1. **Create a Blade File**:
   Place your template in `resources/views/vendor/rms-pdf` (after publishing views). Use the `elegant.blade.php` template as a reference:
   - Structure your HTML with `lang="fa" dir="rtl"` for Persian support.
   - Use `unicode-bidi: embed` in CSS for proper text rendering.
   - Access data via `$seller`, `$buyer`, and `$invoice` objects (e.g., `$seller->company`, `$invoice->products`).
2. **Style with CSS**:
   - Use mPDF-compatible CSS properties like `border`, `border-radius`, `flex`, `grid`, `padding`, `margin`.
   - Avoid complex CSS (e.g., `box-shadow`, `gradient`) as mPDF has limited support.
   - Ensure `font-family` matches the configured font (e.g., `Vazir` or `IRANSans`) and `direction: rtl` for Persian text.
3. **Publish the Template**:
   If you add templates to the package source, they will be published with:
   ```bash
   php artisan vendor:publish --tag=rms-pdf-views
   ```
4. **Set Default Theme**:
   Update `config/rms-pdf.php` to use your custom template:
   ```php
   'default_theme' => 'your-custom-theme',
   ```

### Route Configuration
The package includes a test route in `routes/pdf.php` for development purposes. To use it, ensure your application's `routes/web.php` includes:
```php
// routes/web.php
use RMS\PDF\Http\Controllers\PdfController;

Route::get('/rms-pdf-test', [PdfController::class, 'generate']);
```

### Testing
To test the package:
1. Publish fonts, views, and configuration:
   ```bash
   php artisan vendor:publish --tag=rms-pdf-fonts
   php artisan vendor:publish --tag=rms-pdf-views
   php artisan vendor:publish --tag=rms-pdf-config
   ```
2. Visit `/rms-pdf-test` in your browser to download the PDF generated by the package's test controller (`RMS\PDF\Http\Controllers\PdfController`).
3. Verify that:
   - Persian text (e.g., "ریال", "فاکتور فروش") is rendered correctly with connected characters.
   - Styles (e.g., `grid`, `flex`, `border`, `double`, `dotted`, `border-radius`) are applied properly.
   - Data from `Seller`, `Buyer`, `Bank`, and `Invoice` classes is displayed correctly.

### Troubleshooting
- **Text Rendering Issues**: Ensure the font files (e.g., `Vazir.ttf`, `Vazir-Bold.ttf` or `IRANSans.ttf`, `IRANSans-Bold.ttf`) are in `public/vendor/rms-pdf/fonts` and are from a reliable source (e.g., [Vazir GitHub](https://github.com/rastikerdar/vazir-font/releases)).
- **Class Not Found Errors**: Run `composer dump-autoload` in your project root to refresh the autoloader.
- **Styling Issues**: If styles like `border-radius` or `grid` don't render correctly, simplify the CSS or check mPDF documentation for supported properties.

### Contributing
Contributions are welcome! Please submit issues or pull requests to the [GitHub repository](https://github.com/rmscms/pdf).

### License
This package is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).