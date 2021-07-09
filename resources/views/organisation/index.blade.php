@include('layouts.app')
<table>
    <tr>
        <th>Id</th>
        <th>Slug</th>
        <th>name</th>
        <th>email</th>
        <th>tel</th>
        <th>address</th>
        <th>type</th>
        <th>Detail</th>
    </tr>
    @foreach($organisations as $organisation)
        <tr>
            <td>{{$organisation->id}}</td>
            <td>{{$organisation->slug}}</td>
            <td>{{$organisation->name}}</td>
            <td>{{$organisation->email}}</td>
            <td>{{$organisation->phone}}</td>
            <td>{{$organisation->address}}</td>
            <td>{{$organisation->type}}</td>
            <td><a href="{{route('organisations.show', $organisation->id)}}"> + </a></td>
        </tr>
    @endforeach
</table>


<div v-scope="{showForm: false}">
    <button @click="showForm = true">
        Nouvelle organisation
    </button>
    <br>
    <br>
    <form method="POST" action="{{route('organisations.store')}}" v-if="showForm">
        @csrf
        <label>
            Slug
            <br>
            <input type="text" name="slug">
        </label>
        <br>
        <br>
        <label>
            Name
            <br>
            <input type="text" name="name">
        </label>
        <br>
        <br><label>
            Email
            <br>
            <input type="email" name="email">
        </label>
        <br>
        <br><label>
            Phone
            <br>
            <input type="tel" name="phone">
        </label>
        <br>
        <br><label>
            Address
            <br>
            <input type="text" name="address">
        </label>
        <br>
        <br>
        <label>
            Type
            <br>
            <input type="text" name="type">
        </label>
        <br>
        <br>
        <button type="submit">Enregistrer</button>
    </form>
</div>
<script src="https://unpkg.com/petite-vue" defer init></script>
