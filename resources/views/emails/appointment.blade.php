<body
    style="
      background-color: #eee;
      color: #000;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    ">
    <div
        style="
        margin: 30px auto;
        width: 70%;
        border: #999 solid 1px;
        padding: 20px;
        border-radius: 15px;
      ">
        <div style="height: 100px; object-fit: cover; position: relative">
            <img src="https://mainstreetmedical.net.au/uploads//146f84424757d950b7151a7eaad3ec9b10873/15900759065ec6a2028f7597-95829912_mian-banner.jpg"
                alt="" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.7" />
            <h3
                style="
            text-align: center;
            color: #ec1d25;
            position: absolute;
            top: 20px;
            left: 40%;
          ">
                MY ONLINE MEDICS
            </h3>
        </div>
        <h5>Hi {{ $user->name }}!</h5>
        <p>Your appointment has been recieved successfully, </p>
        <ul style="text-decoration: none; background-color: #ddd;padding: 10px 50px;">
            <li style="text-decoration: none;">ID: <span
                    style="font-weight: 700;">{{ $user->id . 'MYD' . date('jmY', strtotime($user->created_at)) }}</span>
            </li>
            <li style="margin: 15px 0;">Date: <span style="font-weight: 700;">{{ $appointment->date }}</span></li>
            <li>Time: <span style="font-weight: 700;">{{ $appointment->time }}</span></li>
        </ul>
        <p>Please click the link below to chat one of the doctors </p>
        <a
            href="https://myonlineclinic.ng/appointment/room/{{ $appointment->id }}?id={{ sha1($appointment->id) }}&&new=true">Chat
            wth us now </a>
        <p>Please be punctual and if there's any change in plan, please contact our customer service</p>
        <div style="height: 100px"></div>
    </div>
</body>
