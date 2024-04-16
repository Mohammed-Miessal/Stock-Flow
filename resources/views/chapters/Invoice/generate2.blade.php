<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
        }
    </style>
</head>


<body>
    <div
        style="max-width: 800px;margin: auto;padding: 16px;border: 1px solid #eee;font-size: 16px;line-height: 24px;font-family: 'Inter', sans-serif;color: #555;background-color: #F9FAFC;">
        <table style="font-size: 12px; line-height: 20px;">
            <thead>
                <tr>
                    <td style="padding: 0 16px 18px 16px;">
                        <h1
                            style="color: #1A1C21;font-size: 18px;font-style: normal;font-weight: 600;line-height: normal;">
                            EcoStock (Invoice)</h1>
                        <p>hello@email.com</p>
                        <p>+44 7766002333</p>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <table
                            style="background-color: #FFF; padding: 20px 16px; border: 1px solid #D7DAE0;width: 100%; border-radius: 12px;font-size: 12px; line-height: 20px; table-layout: fixed;">
                            <tbody>
                                <tr>
                                    <td
                                        style="vertical-align: top; width: 30%; padding-right: 20px;padding-bottom: 35px;">
                                        <p style="font-weight: 700; color: #1A1C21;">Client Name</p>
                                        <p style="color: #5E6470;">{{ $invoice->customer->name }}</p>
                                        <p style="color: #5E6470;">{{ $invoice->customer->email }}</p>
                                    </td>
                                    <td
                                        style="vertical-align: top; width: 35%; padding-right: 20px;padding-bottom: 35px;">
                                        <p style="font-weight: 700; color: #1A1C21;">Start Date</p>
                                        <p style="color: #5E6470;">
                                            {{ \Carbon\Carbon::parse($invoice->invoice_date)->format('d, m, Y') }}
                                        </p>
                                        <p style="font-weight: 700; color: #1A1C21;">End Date</p>
                                        <p style="color: #5E6470;">
                                            {{ \Carbon\Carbon::parse($invoice->due_date)->format('d, m, Y') }}</p>
                                    </td>
                                    <td style="vertical-align: top;padding-bottom: 35px;">
                                        <table style="table-layout: fixed;width:-webkit-fill-available;">
                                            <tr>
                                                <th style="text-align: left; color: #1A1C21;">Job ID</th>
                                                <td style="text-align: right;">123567</td>
                                            </tr>
                                            <tr>
                                                <th style="text-align: left; color: #1A1C21;">Job date</th>
                                                <td style="text-align: right;">14/12/2020</td>
                                            </tr>
                                            <tr>
                                                <th style="text-align: left; color: #1A1C21;">Distance</th>
                                                <td style="text-align: right;">1.568 miles</td>
                                            </tr>
                                            <tr>
                                                <th style="text-align: left; color: #1A1C21;">Pick-up time</th>
                                                <td style="text-align: right;">19:58</td>
                                            </tr>
                                            <tr>
                                                <th style="text-align: left; color: #1A1C21;">Time delivered</th>
                                                <td style="text-align: right;">20:58</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 13px;">
                                        <p style="color: #5E6470;">Service </p>
                                        <p style="font-weight: 700; color: #1A1C21;">Invoice</p>
                                    </td>
                                    <td style="text-align: center; padding-bottom: 13px;">
                                        {{-- Afficher juste les 15 premiers caractères de l'invoice number --}}
                                        <p style="color: #5E6470;">Invoice number</p>
                                        <p style="font-weight: 700; color: #1A1C21;">
                                            #{{ substr($invoice->invoice_number, 0, 15) }}</p>

                                    </td>
                                    <td style="text-align: end; padding-bottom: 13px;">
                                        <p style="color: #5E6470;">Invoice date</p>
                                        <p style="font-weight: 700; color: #1A1C21;">{{ \Carbon\Carbon::now()->format('d, M, Y') }}</p>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <table style="width: 100%;border-spacing: 0;">
                                            <thead>
                                                <tr style="text-transform: uppercase;">
                                                    <td style="padding: 8px 0; border-block:1px solid #D7DAE0;">Item
                                                        Detail</td>
                                                    <td
                                                        style="padding: 8px 0; border-block:1px solid #D7DAE0; width: 40px;">
                                                        Qty
                                                    </td>
                                                    <td
                                                        style="padding: 8px 0; border-block:1px solid #D7DAE0; text-align: end; width: 100px;">
                                                        Price Unit</td>
                                                    <td
                                                        style="padding: 8px 0; border-block:1px solid #D7DAE0; text-align: end; width: 120px;">
                                                        Total Amount</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- <tr>
                                                    <td style="padding-block: 12px;">
                                                        <p style="font-weight: 700; color: #1A1C21;">Drops</p>
                                                        <p style="color: #5E6470;">On-demand delivery</p>
                                                    </td>
                                                    <td style="padding-block: 12px;">
                                                        <p style="font-weight: 700; color: #1A1C21;">1</p>
                                                    </td>
                                                    <td style="padding-block: 12px; text-align: end;">
                                                        <p style="font-weight: 700; color: #1A1C21;">£5.00</p>
                                                    </td>
                                                    <td style="padding-block: 12px; text-align: end;">
                                                        <p style="font-weight: 700; color: #1A1C21;">£5.00</p>
                                                    </td>
                                                </tr> --}}
                                                @foreach ($invoice->products as $product)
                                                    <tr>
                                                        <td style="padding-block: 12px;">
                                                            <p style="font-weight: 700; color: #1A1C21;">
                                                                {{ $product->name }}</p>
                                                            {{-- <p style="color: #5E6470;">On-demand delivery</p> --}}
                                                        </td>
                                                        <td style="padding-block: 12px;">
                                                            <p style="font-weight: 700; color: #1A1C21;">
                                                                {{ $product->pivot->quantity }}</p>
                                                        </td>
                                                        <td style="padding-block: 12px; text-align: end;">
                                                            <p style="font-weight: 700; color: #1A1C21;">
                                                                {{ $product->price }} DH</p>
                                                        </td>
                                                        <td style="padding-block: 12px; text-align: end;">
                                                            <p style="font-weight: 700; color: #1A1C21;">
                                                                {{ $product->pivot->total_per_product }} DH</p>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td style="padding: 12px 0; border-top:1px solid #D7DAE0;"></td>
                                                    <td style="border-top:1px solid #D7DAE0;" colspan="3">
                                                        <table style="width: 100%;border-spacing: 0;">
                                                            <tbody>
                                                                {{-- <tr>
                                                                    <th
                                                                        style="padding-top: 12px;text-align: start; color: #1A1C21;">
                                                                        Subtotal</th>
                                                                    <td
                                                                        style="padding-top: 12px;text-align: end; color: #1A1C21;">
                                                                        {{ $invoice->total }}</td>
                                                                </tr> --}}
                                                                {{-- <tr>
                                                                    <th
                                                                        style="padding: 12px 0;text-align: start; color: #1A1C21;">
                                                                        VAT in items (0%) (1)</th>
                                                                    <td
                                                                        style="padding: 12px 0;text-align: end; color: #1A1C21;">
                                                                        £5.00</td>
                                                                </tr> --}}
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th
                                                                        style="padding: 12px 0 30px 0;text-align: start; color: #1A1C21;border-top:1px solid #D7DAE0;">
                                                                        Total Price </th>
                                                                    <th
                                                                        style="padding: 12px 0 30px 0;text-align: end; color: #1A1C21;border-top:1px solid #D7DAE0;">
                                                                        {{ $invoice->total }}</th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>

        </table>
    </div>
</body>

</html>
