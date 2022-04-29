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
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if( ! isset($client) )
                <div class="card text-white bg-dark mb-3">
                    <div class="card-header d-flex justify-content-between">
                        <div class="text-uppercase fw-bold">Cadastrar cliente</div>
                        <div>
                            <a class="btn btn-danger" href="/" title="Descartar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                    <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                                </svg>
                            </a>
                            <button  type="submit" form="client-form" class="btn btn-success" title="Salvar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                    <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="client-form" method="post" action="/" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome:</label>
                                <input required type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Insira o nome">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail:</label>
                                <input required type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Insira o e-mail">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Telefone:</label>
                                <input required type="tel" class="form-control" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Insira o telefone">
                            </div>
                            <div class="mb-3">
                                <label for="avatar" class="form-label">Foto</label>
                                <input class="form-control" type="file" name="avatar">
                            </div>
                        </form>
                    </div>
                </div>
            @else
                <div class="card text-white bg-dark mb-3">
                    <div class="card-header d-flex justify-content-between">
                        <div class="text-uppercase fw-bold">Cadastrar cliente</div>
                        <div>
                            <a class="btn btn-danger" href="/" title="Descartar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                    <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                                </svg>
                            </a>
                            <button  type="submit" form="client-form" class="btn btn-success" title="Salvar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                    <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="client-form" method="post" action="/{{$client->id}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome:</label>
                                <input required type="text" class="form-control" name="name" id="name" value="{{ $client->name }}" placeholder="Insira o nome">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail:</label>
                                <input required type="email" class="form-control" name="email" id="email" value="{{ $client->email }}" placeholder="Insira o e-mail">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Telefone:</label>
                                <input required type="tel" class="form-control" name="phone" id="phone" value="{{ $client->phone }}" placeholder="Insira o telefone">
                            </div>
                            <div class="mb-3">
                                <label for="avatar" class="form-label">Foto</label>
                                <input class="form-control" type="file" name="avatar">
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
        <script src="{{ asset('js/masker.js') }}"></script>
        <script>
            VMasker(document.querySelector('#phone')).maskPattern('(99) 99999-9999');
        </script>
    </body>
</html>
