Hi, {{ $order['name'] }}<br>
Click to <a href="{{ route('order.verify', ['hash' => $order['verification_hash']]) }}">this link</a> for verify your order.
