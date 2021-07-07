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
<div v-scope='{missions: @json($organisation->missions)}'>
    <h1>Liste des Missions</h1>
    <ul>
        <li v-for="mission in missions">
            @{{  mission.id }}
            @{{ mission.title }}
        </li>
    </ul>
{{--    <button @click="missions.push({'id': 'enrevoir ', 'title': 'bye'})" >clique moi</button>--}}
</div>
<script src="https://unpkg.com/petite-vue" defer init></script>
<div>
    <a href="{{route('missions.create', $organisation)}}"> Nouvelle Mission </a>
</div>

