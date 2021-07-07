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
        <td>{{$organisation->tel}}</td>
        <td>{{$organisation->address}}</td>
        <td>{{$organisation->type}}</td>
        <td><a href="{{route('organisations.show', $organisation->id)}}"> + </a> </td>
    </tr>
    @endforeach
</table>
