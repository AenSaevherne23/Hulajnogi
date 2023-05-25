<html>
<head>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>HULAJNOGI</title>
</head>
<body>
<h1>List of Hulajnogi</h1>
<table>
    <thread>
        <tr>
            <th>id</th>
            <th>nazwa</th>
            <th>model</th>

        </tr>
    </thread>
</table>

    @foreach ($hulajnogi as $hulajnoga)

    <p>{{ $hulajnoga->nazwa }}</p>
    <p>{{$hulajnoga->model}}</p>

@endforeach

</body>
</html>
