<h1>Add Member</h1>

@if(session('flashusername'))
 <h3><span style="color: green" >member  , {{  session()->get('flashusername') }} added</span>  </h3>
@endif
<form action="/flashsession/addMember" method="POST">
    @csrf
    <input type="text" name="flashusername" placeholder="enter username here ..."><br><br>
    <input type="email" name="email" placeholder="enter email here ..."><br><br>
    <input type="password" name="password" placeholder="enter password here ..."><br><br>
    
    <button type="submit"> ADD</button>
</form>
