@include('layouts.app')

<div>
    <h1>Bienvenue sur l'app</h1>
    <br>
    <br>
    @if(!Auth::check())
        <a href="/login/redirect">Connexion Github</a>
    @endif
    <br>
    <br>
    @if(Auth::check())
        <a href="{{route('organisations.index')}}">Cliquer ici pour acceder au organisation</a>
    @endif
</div>
