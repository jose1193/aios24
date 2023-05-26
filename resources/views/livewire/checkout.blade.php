<form action="/session" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="publishCode" value="{{ $publishCode }}">
    <button type="submit" id="checkout-live-button">Checkout</button>
</form>
