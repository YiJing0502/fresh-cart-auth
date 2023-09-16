<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ecPayment</title>
</head>

<body>
    <h1>頁面跳轉中...</h1>
    {{-- action目前為測試環境，測試完沒問題才換成正式環境 --}}
    <form action="https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5" method="POST" class="d-none">
        <input type="hidden" name="MerchantID" value="{{$data->MerchantID}}">
    </form>

</body>

</html>
