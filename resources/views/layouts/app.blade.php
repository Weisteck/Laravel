<!doctype html>
<head>
    <meta charset="utf-8">
    <title>Mon APP</title>
</head>
<body>
<div>
    @if(Auth::check())
        <span>{{Auth::user()->name}}</span>
        <span>{{Auth::user()->email}}</span>
        <a href="/logout">Me Deconnecter</a>
    @endif
        <br>
        <br>
</div>
