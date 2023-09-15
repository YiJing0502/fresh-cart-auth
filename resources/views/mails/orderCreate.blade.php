<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .footer {
            display: flex;
        }

        .store-name {
            margin-left: auto;
        }
    </style>
</head>

<body>
    <h1>您好，{{ $myData['user_name'] }}</h1>
    <p>您已成立訂單，訂單編號為 {{ $myData['order_number'] }}</p>
    <p>總金額為{{ $myData['order_total'] }}</p>
    <p>寄送日期：{{ $myData['order_date'] }}</p>
    <p>收件人姓名：{{ $myData['order_name'] }}</p>
    <p>收件人地址：{{ $myData['order_address'] }}</p>
    <p>收件人電話：{{ $myData['order_phone'] }}</p>
    <p>備註：{{ $myData['order_desc'] }}</p>
    <p>付款方式：{{ $myData['pay_way'] }}</p>
    <p>訂單狀態：{{ $myData['order_status'] }}</p>
    <p>付款狀態：{{ $myData['payment_status'] }}</p>
    <p>運送狀態：{{ $myData['delivery_status'] }}</p>
    <div class="footer">
        <p>謝謝您的惠顧，您的支持是我們成長的動力！</p>
        <p class="store-name">Fresh Cart敬上</p>
    </div>
</body>

</html>
