<html>
<head>
    <title>HULAJNOGI</title>
</head>
<body>
<h1>Hulajnogi</h1>
<?php
    @foreach ($hulajnogi as $hulajnoga)
    {
    {{ $hulajnoga->nazwa }}
    }
@endforeach
?>
</body>
</html>
