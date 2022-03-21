<h1>Member List</h1>

@if( isset($nameDelete) )
{{-- <?php  dd( $nameDelete)   ?> --}}
  <span style="color: green">  <h3>{{ $nameDelete }} deleted successfully</h3> </span>
@endif
<table border="1">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>City</td>
        <td>Delete</td>
        <td>Edit</td>
    </tr>
    @foreach ($data as $item)
        <tr>
            <td>{{ $item['id'] }}</td>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['email'] }}</td>
            <td>{{ $item['address'] }}</td>
            <td><a href="/database/delete/{{  $item['id'] }}">Delete</a> </td>
            <td><a href="/database/editShow/{{  $item['id'] }}">Edit</a> </td>
        </tr>
    @endforeach

<a href="/database/add"> <button >ADD Employee</button></a> 
</table>
<span>
    {{ $data->links() }}
</span>

<style>
    .w-5 {
        display: none;
    }

</style>
