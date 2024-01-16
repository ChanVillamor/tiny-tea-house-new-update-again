<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tiny Tea House</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #f8fae5;
            color: #2b0303;
            font-family: 'Nunito', sans-serif;
            font-weight: 600;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
            gap: 5rem;
        }

        .position-ref {
            position: relative;
        }

        /* .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        } */

        .content {
            text-align: center;
        }

        .title {
            font-size: clamp(3.125rem, 1.0973rem + 6.4885vw, 5.25rem);
        }

        .links {
            display: flex;
            justify-content: center;
            gap: 1rem;

        }

        .links>a {
            color: #f8fae5;
            background-color: #2b0303;
            padding: 13px 22px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .05rem;
            text-decoration: none;
            text-transform: uppercase;

        }

        .links a:hover {
            background-color: #a76430;

        }

        .m-b-md {
            margin-bottom: 30px;
        }

        /* tablet responsive */

        @media only screen and (min-width: 600px) and (max-width: 1024px) {

            .flex-center {
                align-items: center;
                display: flex;
                flex-direction: column;
                justify-content: center;
                gap: 5rem;
            }
        }

        /* mobile responsive */
        @media only screen and (max-width: 600px) {
            .flex-center {
                align-items: center;
                display: flex;
                flex-direction: column;
                justify-content: center;

            }

            .logo img {
                width: 250px;
                height: 250px;
            }

            .title {
                padding: 10px;
                margin-top: -50px;
            }
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        <div class="logo">
            <img src="brand-logo.png" alt="brand-logo" class="brand-logo" width="400px" height="400px">
        </div>
        <div class="content">
            <div class="title m-b-md">
                Tiny Tea House
            </div>

            <div class="links">
                <!-- For more projects: Visit NetGO+  -->
                <a href="admin/">Admin Log In</a>
                <a href="cashier/">Cashier Log In</a>
                <!-- <a href="pos/customer">Customer Log In</a> -->
            </div>
        </div>
    </div>

    <!-- Optional JavaScript
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --> -->
</body>

</html>