<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
        <style type="text/css">
            .is-complete{
                text-decoration: line-through;
            }
            .container{
                margin-top: 50px;
            }
            .title{
                text-align: center;
                font-size: 40px;
            }
            .project_links{
                font-size: 15px;
            }
        </style>
        <title>@yield('title')</title>
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
