@extends('ly')



@section('body')
<div class="container">
    <div class="signup-box">
       
        <h2>Sign Up</h2>
        <form action="{{route('storeuser')}}" method="post" enctype='multipart/form-data'>
            @csrf
            <div class="user-box">
                <input type="text" name="username" required="">
                <label>Username</label>
            </div>
            <div class="user-box">
                <input type="email" name="email" required="">
                <label>Email</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" required="">
                <label>Password</label>
            </div>
            <div class="form-group">
                <label for="file">add image </label>
                <input type="file"  name="image" >
            </div>
        
                <input type="submit" value="Sign Up">
            </a>
        </form>
    </div>
</div>


@endsection