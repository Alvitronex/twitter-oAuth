<style>
    .loginappx{
        background-color: black;
        
    }
    .container{
        width: 400px;
        padding: 5px;
        text-align: center;
        margin-right: 35%;
        margin-left: 35%;
        margin-top:5%;
        background-color:white;
        font-family: sans-serif;
        font-weight:800;
        border-radius:15px;

    }
    .text1loginappx{
    text-align: center;
    font-size: 30px;
    }
    .login-register{
    border: 2px solid lightseagreen;
    margin:5px;

    }
    
    .loginx{
    border-radius: 15px;
    background-color: aliceblue;
    color: black;
    margin:5px;
    font-size: 20px;
    padding:1px;
    }
    a{
        
        color: inherit;
        text-decoration: inherit
    }
    .loginx img{
        height: 20px;
    }
 
    .createCount{
    border-radius: 15px;
    background-color: lightseagreen;
    border: 2px solid white;
    color: black;
    margin:5px;


    }
    .log-in{
        border-radius: 15px;
        background-color: black;
        border: 2px solid white;
        color: white;
        margin:5px;
 
    }
</style>
<body class="loginappx">
    <div class="container">
        <div class="text1loginappx">
                <img src="https://th.bing.com/th/id/OIP.ZweGejPwbT5wwshQ2-8qUQHaHa?w=184&h=184&c=7&r=0&o=5&pid=1.7" alt="" >
                <br>
                Ahora puedes iniciar sesion con
                <br>
                <br>
        </div>
                
                <div class="login-register">
                
                <div class="loginx">
                
                    <a
                        href="{{route('auth.redirect')}}">
                        {{ __('Login with ') }}
                        <img src="https://th.bing.com/th/id/OIP.ZweGejPwbT5wwshQ2-8qUQHaHa?w=184&h=184&c=7&r=0&o=5&pid=1.7" alt="" >
                    </a>
                </div>
                <div class="log-in">
                    <a
                        href="{{ route('login') }}">
                        {{ __('Login with your count?') }}
                    </a>
                </div>       
                   
                <div class="createCount">
                        <a
                            href="{{ route('register') }}">
                            {{ __('Create a count with us?') }}
                        </a>
                </div>
                                    
              
        </div>


</body>


