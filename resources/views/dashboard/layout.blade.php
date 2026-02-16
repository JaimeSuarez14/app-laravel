<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body style="padding: 0; margin: 0">
    <header style="background-color: red;padding:15px;color:white; font-size: 25px;">
        Dashboard
    </header>

    @yield('content')

    <section >
        @yield("morecontent")
    </section>
    <footer style="background-color: green; padding: 15px;color:white">
        Footer
    </footer>
</body>
</html>
