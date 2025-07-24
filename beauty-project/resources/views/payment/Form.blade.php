<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago con Stripe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Pago con Stripe</h3>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('payment.process') }}" method="POST" id="payment-form">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="amount">Monto (USD)</label>
                                <input type="number" class="form-control" id="amount" name="amount" min="1" step="0.01" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="card-element">Información de la tarjeta</label>
                                <div id="card-element" class="form-control">
                                    <!-- Stripe Card Element will be inserted here -->
                                </div>
                                <div id="card-errors" role="alert" class="text-danger mt-2"></div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100" id="submit-button">
                                Pagar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var stripe = Stripe('{{ config("services.stripe.key") }}');
        var elements = stripe.elements();
        var cardElement = elements.create('card');
        cardElement.mount('#card-element');

        var form = document.getElementById('payment-form');
        var submitButton = document.getElementById('submit-button');

        form.addEventListener('submit', function(event) {
            event.preventDefault();
            submitButton.disabled = true;

            stripe.createToken(cardElement).then(function(result) {
                if (result.error) {
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                    submitButton.disabled = false;
                } else {
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', result.token.id);
                    form.appendChild(hiddenInput);
                    form.submit();
                }
            });
        });
    </script>
</body>
</html>