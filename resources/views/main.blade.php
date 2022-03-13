<h1>Main Page</h1>

<a href="/about">About Us</a>
<a href="/contact">Contact Us</a>

@if($name == "jay")
<h1>User is Jay</h1>
@else
<h1>Unknown User</h1>
@endif


@foreach ($users as $user)
  <h1> {{ $user }}</h1> 
@endforeach
{{10+10}}


@include('inner')

<script>
   var users = @json($users);
   console.log(users);
</script>