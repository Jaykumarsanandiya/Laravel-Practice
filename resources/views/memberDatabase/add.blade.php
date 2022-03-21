<h1> Add Member </h1>
<form border=1 method="POST" action="/database/add">
   
   @csrf
   <input type="text" name="username" placeholder="enter username ..." > <br> <br>
   <input type="email" name="email" placeholder="enter email ..." > <br> <br>
   <input type="text" name="address" placeholder="enter address ..."  > <br> <br>
   <button type="submit">Add member</button>
</form>