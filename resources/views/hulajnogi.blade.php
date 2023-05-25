<html>
<head>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>HULAJNOGI</title>
</head>
<body>
<h1>List of Hulajnogiij</h1>
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

    <p>{{ $hulajnoga->Nazwa }}</p>
    <p>{{ $hulajnoga->Model }}</p>



@endforeach
<?php
    use App\Models\Hulajnogi;
    /*$rekordy=Hulajnogi::factory()->count(5)->create();*/
    ?>

</body>
</html>
