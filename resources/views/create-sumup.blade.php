<script src="https://gateway.sumup.com/gateway/ecom/card/v2/sdk.js"></script>



<div id="sumup-card"></div>
<script type="text/javascript" src="https://gateway.sumup.com/gateway/ecom/card/v2/sdk.js"></script>
<script type="text/javascript">
    var TempcheckoutId = "a26ec321-ce3c-454d-8237-175f176ad565";
    var TempAmount = 2;
    var CardFornName = 'Visa';
    SumUpCard.mount({
        checkoutId: TempcheckoutId,

        showFooter: false,
        currency: 'EUR',
        amount: TempAmount,
        showSubmitButton: true,
        onResponse: function(type, body,Success) {
            console.log('Type', type);
            console.log('Body', body);
            if (body.status == 'FAILED')

            {
                console.log('WHoop');



            }


            //document.getElementById('Pay-form').submit();

        }
    });
</script>
