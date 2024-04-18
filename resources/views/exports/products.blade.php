<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th style="font-weight: 700; font-size: 14px; height:1cm;  width:5cm;">Name</th>
                <th style="font-weight: 700; font-size: 14px; height:1cm; width:5cm;">Email</th>
                <th style="font-weight: 700; font-size: 14px; height:1cm; width:5cm;">Quantity</th>
                <th style="font-weight: 700; font-size: 14px; height:1cm; width:5cm;">Price</th>
                <th style="font-weight: 700; font-size: 14px; height:1cm; width:5cm;">Category</th>
                <th style="font-weight: 700; font-size: 14px; height:1cm; width:5cm;">SubCategory</th>
                <th style="font-weight: 700; font-size: 14px; height:1cm; width:5cm;">Status</th>
                <th style="font-weight: 700; font-size: 14px; height:1cm; width:5cm;">Unit</th>
                <th style="font-weight: 700; font-size: 14px; height:1cm; width:5cm;">Tax</th>
                <th style="font-weight: 700; font-size: 14px; height:1cm; width:5cm;">Supplier</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->reference }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->subcategory->name }}</td>
                    <td>{{ $product->status }}</td>
                    <td>{{ $product->unit->name }}</td>
                    <td>{{ $product->tax->rate }}</td>
                    <td>{{ $product->supplier->name }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
