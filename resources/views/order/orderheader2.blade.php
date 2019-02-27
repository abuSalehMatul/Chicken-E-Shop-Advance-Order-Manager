{{-- <nav class="navbar navbar-expand-lg navbar-light bg-light"> --}}
    {{-- <a class="navbar-brand" href="#"> 
    <img src="{{('order/img/logo.png')}}">
    </a> --}}
    @php
        $loginOrNot=0;
        if(Auth::user()==null){
           $loginOrNot=1;
        }
        else{
            $loginOrNot=0;
            $user=Auth::user()->id;
            $user=App\User::find($user);
        }
    @endphp
    @if($loginOrNot==0)
         <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <a class="nav-link" href="{{url('/profile')}}">Hi {{$user->first_name}} <i class="fa fa-user"></i> <span class="sr-only">(current)</span></a>
            </li>
         </ul>
    @else
     <ul class="navbar-nav ml-auto">
        <li class="nav-item">
        <a class="nav-link" href="{{url('/loginpagestart')}}">Guest (login)<i class="fa fa-user"></i> <span class="sr-only">(current)</span></a>
        </li>
    </ul>
    @endif
   
{{-- </nav> --}}