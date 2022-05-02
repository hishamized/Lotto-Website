<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .pay {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 4rem;
            font-family: Arial, Helvetica, sans-serif;
        }
        .pay a, .pay select {
            margin: 1rem;
        }
        a {
            text-decoration: none;
            color: white;
        }
        button {
            padding: 1em;
            background-color: green;
            border: none;
            border-radius: 4px;
            color: white;
            font-weight: bolder;
        }
    </style>
</head>
<body>
    <div class="pay">
        <h3>Payment Method</h3>
        <select name="pay_option" id="pay_option">
            <option value="paypal">PayPal</option>
            <option value="AmazonPay">Amazon Pay</option>
            <option value="PayU">PayU</option>
        </select>
        <button> <a id="pay_now" onclick="payment_method()"  href="#">Pay Now!</a> </button>
    </div>

    <script>
            function payment_method(){
                if(document.getElementById('pay_option').value == "paypal") {
                    document.getElementById('pay_now').href = "https://www.paypal.com/in/home";
              }
              if(document.getElementById('pay_option').value == "AmazonPay") {
                    document.getElementById('pay_now').href = "https://www.amazon.in/amazonpay/home";
              }
              if(document.getElementById('pay_option').value == "PayU") {
                    document.getElementById('pay_now').href = "https://payu.in/payment-gateway?utm_source=google&utm_medium=cpc&utm_campaign=Search-Brand-PayU-Desktop&utm_term=payu&utm_source=google&utm_medium=cpc&campaign=Search-|-Brand-|-PayU-|-Desktop&keyword=&gclid=CjwKCAjwgr6TBhAGEiwA3aVuIQmMvjyxTPWEOBpmUCvv2eUPvL0MJIgkngPWFl_uumoagTriPcqK4BoCV5kQAvD_BwE";
              }
            }
    </script>
</body>
</html>
