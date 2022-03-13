<table border="1">
    <tr>
       
        <td>ID</td>
        <td>Email</td>
        <td>FirstName</td>
        <td>LastName</td>
        <td>Photo</td>
    </tr>

@foreach ($collection as $item)
<tr>
       
    <td>{{$item['id']}}</td>
    <td>{{$item['email']}}</td>
    <td>{{$item['first_name']}}</td>
    <td>{{$item['last_name']}}</td>
    <td> <img src=" {{$item['avatar']}}"> </td>
</tr>
@endforeach
 {{-- <h3>{{$header}}</h3> --}}
  
</table>