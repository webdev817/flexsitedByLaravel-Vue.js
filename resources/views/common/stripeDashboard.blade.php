<style media="screen">

/**
* The CSS shown here will not be introduced in the Quickstart guide, but shows
* how you can use CSS to style your Element's container.
*/

</style>
@php
  $pk = config('cashier.key');
@endphp

<script type="text/javascript">
// Create a Stripe client.
// var stripe = Stripe('');
var stripe = Stripe('{{ $pk }}');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
      color: 'white',
      fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
      fontSmoothing: 'antialiased',
      fontSize: '16px',
      '::placeholder': {
          color: 'white'
      }
  },
  invalid: {
      color: 'red',
      iconColor: 'red'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {
  style: style,
  hidePostalCode: true
});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');












// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
      displayError.textContent = event.error.message;
  } else {
      displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');


form.addEventListener('submit',  async (e) => {

    event.preventDefault();
    var amount = $("#amount").val();
    amount = parseInt(amount);
    var aEntered = $("#amountEntered").val();
    aEntered = parseInt(aEntered);

    if (isNaN(amount)) {
      amount = null;
    }

    if (isNaN(aEntered)) {
      aEntered = null;
    }

    if (amount == null && aEntered == null) {
      displayErrorOnPurchaseForm("Please choose an amount.");
      return 0;
    }


    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;

    const { setupIntent, error } = await stripe.handleCardSetup(
        clientSecret, card, {
            payment_method_data: {
                billing_details: {}
            }
        }
    );

    if (error) {
        // Display "error.message" to the user...
        var displayError = document.getElementById('card-errors');
        if (error.message) {
            displayError.textContent = error.message;
        } else {
            displayError.textContent = '';
        }
    } else {

      stripeTokenHandler(setupIntent, amount, aEntered);
    }
});

// Submit the form with the token ID.
function stripeTokenHandler(setupIntent, amount, aEntered) {
  // console.log(setupIntent);
  // Insert the setupIntent into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'paymentMethod');
  hiddenInput.setAttribute('value', setupIntent.payment_method);
  form.appendChild(hiddenInput);

  var paymentMethod = setupIntent.payment_method;



  form.submit();
  // Submit the form
}

</script>
