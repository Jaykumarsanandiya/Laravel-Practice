<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>URL Generation</title>
</head>
<body>
    <a href="{{ route("home")}}">Home</a>
    <a href="{{ route("about-us")}}">About Us</a>

    <a href="{{ URL::signedRoute("secret") }}">Secret</a>

    <a href="{{ URL::temporarySignedRoute("secret" , now()->addSeconds(10)) }}">tempSecret</a>

    <div>
        Home Page
    </div>

    <div>
        {{-- {{url()->previous()}} --}}
        {{-- {{URL::current()}} --}}
        {{-- {{ url('about-us-joy',['apple'=>1,'ball'=>2,'third'=>3])}} --}}
        {{-- {{ route("about-us",["slug" => "Hindi" ,"apple" => 1 ,"ball" => 2])}} --}}
    </div>

    <div>
        {{ route("post.comment" ,["post" => "first-post"  , "comment" => 2]) }}
    </div>

<!--Signed URLs  -->
 <div>
     
 </div>

</body>
</html>