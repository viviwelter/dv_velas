<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('tituloPagina') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <!-- navbar do welcome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Styles -->
    <link href="{{-- asset('css/app.css') --}}" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    @include('base.menu')

    <div class="container">
        <br>
        @include('base.flash-message')
        @yield('conteudo')
    </div>

    <!-- FOOTER WELCOME -->
    <footer>
        <style>
            html, body {
                margin: 0;
                padding: 0;
                height: 100%;
            }
            #wrapper{
                min-height: 100%;
                position: relative;
            }
            div.body-content{
                /** Altura do rodapé tem que ser igual a isso aqui e vice-versa **/
                padding-bottom: 100px;
            }
            footer{
                text-align: center;
                padding: 3px;
                font-family: Aboreto;
                background-color: Tan;
                color: white;
                width: 100%;
                height: 100px;
                position: absolute;
                bottom: 0;
                left: 0;
            }
        </style>
        <p><strong>Autoras: Débora Goellner e Vitória Welter</strong><br>
        <p>&copy 2023 Todos os direitos reservados</p>
    </footer>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
</body>

</html>
