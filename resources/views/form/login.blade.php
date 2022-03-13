<h1>Login Page</h1>
 
{{-- @if($errors->any())
@foreach ($errors->all() as $error)
    <li>{{$error}}</li>
@endforeach
@endif --}}
<form action="login_submit" method="POST">
    @csrf
 <input type="text" name="username" placeholder="enter name" value="{{old('username')}}">
 <br>
 <span style="color: red"> @error('username'){{$message}} @enderror</span>
<br>
 <input type="password" name="userpassword" placeholder="enter password" value="{{old('userpassword')}}">
 <br>
 <span style="color: red"> @error('userpassword'){{$message}} @enderror</span>
 <button type="submit">Login</button>
</form>