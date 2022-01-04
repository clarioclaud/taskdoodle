<html>
    <head>
        <title>Mail From E-library</title>
    </head>
    <body>
        <h4>Subscription Expires at tommorrow</h4>
        <p>Hi {{ $user->name }}</p>
        <p>Your {{ $book->name }} Book Subscription Expires Tommorrow.  Please Subscribe Again to continue reading.</p><br>
        <p>Thank You...</p>
    </body>
</html>