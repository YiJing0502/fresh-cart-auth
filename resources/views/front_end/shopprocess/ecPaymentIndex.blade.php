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
    <form id="ecPay" action="https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5" method="POST" class="d-none">
        <input type="hidden" name="MerchantID" value="{{$data->MerchantID}}">
        <input type="hidden" name="MerchantTradeNo" value="{{$data->MerchantTradeNo}}">
        <input type="hidden" name="MerchantTradeDate" value="{{$data->MerchantTradeDate}}">
        <input type="hidden" name="PaymentType" value="{{$data->PaymentType}}">
        <input type="hidden" name="TotalAmount" value="{{$data->TotalAmount}}">
        <input type="hidden" name="TradeDesc" value="{{$data->TradeDesc}}">
        <input type="hidden" name="ItemName" value="{{$data->ItemName}}">
        <input type="hidden" name="ReturnURL" value="{{$data->ReturnURL}}">
        <input type="hidden" name="ChoosePayment" value="{{$data->ChoosePayment}}">
        {{-- 重要 --}}
        <input type="hidden" name="CheckMacValue" value="{{$data->CheckMacValue}}">
        <input type="hidden" name="EncryptType" value="{{$data->EncryptType}}">
        <input type="hidden" name="ClientBackURL" value="{{$data->ClientBackURL}}">
        <input type="hidden" name="IgnorePayment" value="{{$data->IgnorePayment}}">
    </form>
    <script>
        // 替使用者送出表單
        const ecPay = document.querySelector('#ecPay');
        ecPay.submit();
    </script>
</body>

</html>
