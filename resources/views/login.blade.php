@extends('ly')



@section('body')

	<div class="container">
		<div class="login-box">
			<h2>Login</h2>
			<form action="{{route('login')}}" method="post">
                @csrf
				<div class="user-box">
					<input type="text" name="username" required>
					<label>Username</label>
				</div>
				<div class="user-box">
					<input type="password" name="password" required>
					<label>Password</label>
				</div>
				
					<input type="submit" value="Sign In">
				</a>
			</form>
		</div>
		
	</div>


@endsection