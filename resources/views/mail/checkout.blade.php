<html>
    <head>
        <title>JLC - Checkout</title>
    </head>
    <body>
        <div>
            <p><b>Your Cart</b></p>            
            <table>
                <tbody>
                    @if(isset($orders['products']))
                        @foreach($orders['products'] as $product)
                        <tr>
                            <td><b>Product Name:</b></td><td>{{ $product->name }}</td>                        
                        </tr>
                        <tr>
                            <td><b>Price:</b></td><td>Php {{ number_format($product->rental_rate, 2) }}</td>                        
                        </tr>
                        <tr>
                            <td><b>Qty:</b></td><td>{{ $product->qty }}</td>                        
                        </tr>
                        <tr>
                            <td><b>Total:</b></td><td>Php {{ number_format($product->amount, 2) }}</td>                        
                        </tr>
                        <tr><td colspan="2"><hr></td></tr>
                        @endforeach
                    @endif
                    <tr>
                        <td colspan="2"><h1><b>Total: {{ number_format($orders['total'], 2) }}</b></h1></td>                        
                    </tr>
                </tbody>
            </table>
            <div>
                <p>*Note: Sample note here..!!!</p>
            </div>
        </div>
    </body>
</html>