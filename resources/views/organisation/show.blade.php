@include('layouts.app')
<table>
    <h1>Detail de l'organisation</h1>
    <tr>
        <th>Id</th>
        <th>Slug</th>
        <th>name</th>
        <th>email</th>
        <th>tel</th>
        <th>address</th>
        <th>type</th>
    </tr>
    <tr>
        <td>{{$organisation->id}}</td>
        <td>{{$organisation->slug}}</td>
        <td>{{$organisation->name}}</td>
        <td>{{$organisation->email}}</td>
        <td>{{$organisation->tel}}</td>
        <td>{{$organisation->address}}</td>
        <td>{{$organisation->type}}</td>
    </tr>
</table>
<div
    v-scope='{
        missions: @json($organisation->missions),
        showForm: false
    }'
>
    <div>
        <button @click="showForm = true">
            Modifier organisation
        </button>
        <br>
        <br>
        <form method="POST" action="{{route('organisations.update', $organisation->id)}}" v-if="showForm">
            @csrf
            @method('PUT')
            <label>
                Slug
                <br>
                <input type="text" name="slug" value="{{ $organisation->slug }}">
            </label>
            <br>
            <br>
            <label>
                Name
                <br>
                <input type="text" name="name" value="{{ $organisation->name }}">
            </label>
            <br>
            <br><label>
                Email
                <br>
                <input type="email" name="email" value="{{ $organisation->email }}">
            </label>
            <br>
            <br><label>
                Phone
                <br>
                <input type="tel" name="phone" value="{{ $organisation->phone }}">
            </label>
            <br>
            <br><label>
                Address
                <br>
                <input type="text" name="address" value="{{ $organisation->address }}">
            </label>
            <br>
            <br>
            <label>
                Type
                <br>
                <input type="text" name="type" value="{{ $organisation->type }}">
            </label>
            <br>
            <br>
            <button type="submit">Enregistrer</button>
        </form>
    </div>
    <div>
        <h1>Liste des Missions</h1>
        <ul>
            <li v-for="mission in missions">
                @{{ mission.id }}
                @{{ mission.title }}
            </li>
        </ul>
    </div>
</div>
<script src="https://unpkg.com/petite-vue" defer init></script>
<div>
    <a href="{{route('missions.create', $organisation)}}"> Nouvelle Mission </a>
</div>

