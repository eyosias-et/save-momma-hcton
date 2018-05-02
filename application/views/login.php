<div id="container">
    <style>
        body{
            font-family: 'Open Sans', sans-serif;
            width:100%; 
            text-align:center;
        }

        h1{
            padding-top:10px;
            font-size:1.5em;
            color:#525252;
        }

        .box{
            background:white;
            width:300px;
            border-radius:6px;
            margin: 0 auto 0 auto;
            border: #2980b9 4px solid;
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .email{
            background:#ecf0f1;
            border: #ccc 1px solid;
            border-bottom: #ccc 2px solid;
            padding: 8px;
            width:250px;
            color:#AAAAAA;
            margin-top:10px;
            font-size:1em;
            border-radius:4px;
        }

        .password{
            border-radius:4px;
            background:#ecf0f1;
            border: #ccc 1px solid;
            padding: 8px;
            width:250px;
            font-size:1em;
        }

        .btn{
            background:#2ecc71;
            width:125px;
            padding-top:5px;
            padding-bottom:5px;
            color:white;
            border-radius:4px;
            border: #27ae60 1px solid;
            
            margin-top:20px;
            margin-bottom:20px;
            float:center;
            margin-left:16px;
            font-weight:800;
            font-size:0.8em;
        }

        .btn:hover{
            background:#2CC06B; 
        }
        #containter{
            position: relative;
        }
    </style>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>

    <div class="box">
        <form method="post">
    <h1>Login</h1>

    <input type="name" name="username" class="email" required/>
    
    <input type="password" name="password" class="email" required/>
    
    <input type="submit" class="btn" value="Sign In"/> <!-- End Btn -->
    
    </form>
    </div> <!-- End Box -->
    
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
    <script>
        function field_focus(field, email)
            {
                if(field.value == email)
                {
                field.value = '';
                }
            }

            function field_blur(field, email)
            {
                if(field.value == '')
                {
                field.value = email;
                }
            }

            //Fade in dashboard box
            $(document).ready(function(){
                $('.box').hide().fadeIn(1000);
                });

            //Stop click event
            $('a').click(function(event){
                event.preventDefault(); 
                });
    </script>
</div>