<!DOCTYPE html>
<html>
    <head>
        <title>Laravue</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="shortcut icon" type="image/x-icon" href="{{ env('APP_URL') }}/image/favicon.ico" /> -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:200,300,400,600" rel="stylesheet"> 
        <link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/flexboxgrid/6.3.1/flexboxgrid.min.css" type="text/css" >
        <link rel="stylesheet" href="{{ env('APP_URL').elixir('css/app.css') }}">
    </head>
    <body>
        <div id="app" v-cloak></div>

        <script src="{{ env('APP_URL') }}/js/app.js"></script>
    </body>
</html>
