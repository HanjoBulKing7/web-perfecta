<!-- resources/views/pago.blade.php -->
<form method="POST" action="{{ route('paypal.pay') }}">
    @csrf
    <input type="hidden" name="amount" value="100.00">
    <button type="submit">Pagar con PayPal</button>
</form>