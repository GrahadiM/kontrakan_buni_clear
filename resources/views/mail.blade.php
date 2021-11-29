<!DOCTYPE html>

<html>

<head>

    <title>Hello Develpoer!</title>

</head>

<body>

    <h1>{{ Str::ucfirst($data['subject']).' from '.Str::ucfirst($data['name']) }}</h1>

    <p>{{ __('Email : ').$data['email'] }}</p>
    <p>{{ Str::ucfirst($data['message']) }}</p>

   

    <p>Thanks for read this...</p>

</body>

</html>