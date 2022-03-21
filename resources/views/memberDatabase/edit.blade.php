
<h1> Add Member </h1>
<form border=1 method="POST" action="/database/edit">
    {{-- <?php  print_r($editData)   ?> --}}
   @csrf
   <input type="hidden" name="id" value="{{$editData["id"]}}"> 
   <input type="text" name="username" placeholder="enter username ..." value="{{$editData["name"]}}"> <br> <br>
   <input type="email" name="email" placeholder="enter email ..." value="{{$editData["email"]}}" > <br> <br>
   <input type="text" name="address" placeholder="enter address ..."  value="{{$editData["address"]}}"> <br> <br>
   <button type="submit">Update member Details</button>
</form>