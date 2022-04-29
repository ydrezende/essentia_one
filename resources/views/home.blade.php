<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cadastro de clientes</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    </head>
    <body class="bg-darker">
        <div class="container" style="max-width: 720px">
            @if ( isset($save_failure) )
                <div class="alert alert-danger alert-dismissible">
                    Ocorreu um erro ao salvar o cliente.
                </div>
            @endif
            <div class="card text-white bg-dark mb-3">
                <div class="card-header d-flex justify-content-between">
                    <div class="text-uppercase fw-bold">Clientes</div>
                    <div>
                        <a class="btn btn-primary" href="create" title="Adicionar cliente">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
                                <path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z"/>
                                <path d="M13.5 10a.5.5 0 0 1 .5.5V12h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V13h-1.5a.5.5 0 0 1 0-1H13v-1.5a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @each('components.client', $clients, 'client', 'components.client_empty')
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center">
                        {!! $clients->links() !!}
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/bootstrap.js') }}" async></script>
    </body>
</html>
