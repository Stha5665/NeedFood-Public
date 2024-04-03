<!DOCTYPE html>
<html lang="en">
<head>

    <title>NeedFood-UserNotification</title>
</head>
<body>
<h1>{{$title}}</h1>
<p>{{$description}}</p>

@if($status == 'verified')
    <p>You have Choosen for {{$delivery_type == 'donation' ? 'Self-Delivery':'Collection'}} on {{$delivery_date}}</p>
@endif

<p>Thank you for being with us.</p>

</body>
</html>
