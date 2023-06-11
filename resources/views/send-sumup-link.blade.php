
<div id="sumup-card"></div>
<script
    type="text/javascript"
    src="https://gateway.sumup.com/gateway/ecom/card/v2/sdk.js"
></script>
<script type="text/javascript">
    SumUpCard.mount({
        id: 'sumup-card',
        checkoutId: {{$data['clientId']}},
        onResponse: function (type, body) {
            console.log('Type', type);
            console.log('Body', body);
        },
    });
</script>
