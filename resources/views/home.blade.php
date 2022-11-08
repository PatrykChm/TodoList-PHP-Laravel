<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoList DotAndSpot</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.js">
    </script>


    <link rel="stylesheet" href="{{ URL::asset('../css/app.css') }}">



</head>

<body class="bg-info">

    <div class="container w-50 mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="text-center mb-3">DotAndSpot Todos 🤘</h3>
                <form action="{{ route('store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="content" class="form-control"
                            placeholder="Dodaj nowe zadanie do wykonania :)">

                        <button type="submit" class="btn btn-black btn-sm px-4"><i class="fas fa-plus"></i></button>
                    </div>
                </form>
                <!-- Task count -->
                @if (count($todolists))

                <ul class="list-group list-group-flush mt-3">

                    @foreach ($todolists as $todolist)

                    <li class="list-group-item">
                        <form action="{{ route('destroy', $todolist->id) }}" method="POST">
                            {{$todolist->content}}
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-link btn-sm float-end"><i class="fas fa-trash"></i></button>
                        </form>
                    </li>
                    @endforeach
                </ul>

                @else
                <p class="text-center mt-3">Nie ma zadań na liście!</p>
                @endif
            </div>
            @if(count($todolists))
            <div class="card-footer">
                Zadania do zrobienia: {{ count($todolists)}}
            </div>
            @else
            @endif
        </div>
    </div>

</body>

</html>