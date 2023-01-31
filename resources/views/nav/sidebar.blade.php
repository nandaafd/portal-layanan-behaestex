<a href="#" class="logo"> <span>Portal</span> IT <br> BEHAESTEX </a>
    <img src="{{('images/logobtx.png')}}" class="img-fluid" alt="">
    <nav class="navbar">
        <ul>
            <li>
                <a href="index.html" class='sidebar-link'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                        <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z"/>
                      </svg>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="index.html" class='sidebar-link'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                     </svg>
                    <span>About</span>
                </a>
            </li>
        </ul>
       
       <div class="button">
        @if (Auth::user())
        <a href="{{url('logout')}}" class="btn btn-primary" id="login">Logout</a>
        
        @else
        <a href="{{url('login')}}" class="btn btn-primary" id="login">Login</a>
        <a href="{{url('register')}}" class="btn btn-outline-primary" id="register">Register</a>
        @endif
        
    </div>
    </nav>
    