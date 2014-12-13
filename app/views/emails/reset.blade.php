<h1>Reset Your Password!</h1>

<p>Hi {{$user->name}}</p>

<p>Please use this access code and follow the link below to reset your password:</p>
<h2>{{$accesscode}}</h2>

<p>{{ link_to('/resetpassword') }}</p>

<p>See you soon!</p>

<p>PSAP Database Team</p>