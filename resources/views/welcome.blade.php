<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card" id="list1" style="border-radius: .75rem; background-color: #eff1f2;">
                        <div class="card-body py-4 px-4 px-md-5">
                            <p class="h1 text-center mt-3 mb-4 pb-3 text-primary">
                                <i class="fas fa-check-square me-1"></i>
                                My Todo List
                            </p>
                            @if ($errors->all())
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                    <strong>Silahkan lihat dan lengkapi form yang isi.</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <form method="POST" action="{{ url('todo/save') }}">
                                @csrf
                                <div class="pb-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="input-group mb-3">
                                                <input type="text" id="title" name="title"
                                                    placeholder="Todo List Title"
                                                    class="form-control @error('title') is-invalid @enderror">
                                                <textarea class="form-control" id="description" name="description" placeholder="Todo List Description"></textarea>
                                                <div class="d-grid gap-2 d-md-flex justify-content-md-end mx-3">
                                                    <div class="mb-3">
                                                        <label>Set due date</label>
                                                        <input type="date" id="date" class="form-control"
                                                            id="date" name="date">
                                                    </div>
                                                    <button class="btn btn-success" type="submit">Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <hr class="my-4">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Due Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($todos as $todo)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $todo->title }}</td>
                                            <td>
                                                @if (!$todo->description)
                                                    <div>-</div>
                                                @else
                                                    {{ $todo->description }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($todo->date)
                                                    {{ date('d-M-Y', strtotime($todo->date)) }}
                                                @else
                                                    <div>-</div>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($todo->isDone)
                                                    <div class="badge bg-success">Done</div>
                                                @else
                                                    <div class="badge bg-warning">Not Done</div>
                                                @endif
                                            </td>
                                            <td>
                                                @if (!$todo->isDone)
                                                    <a class="btn btn-warning"
                                                        href="{{ url('todo/edit/' . $todo->id) }}"
                                                        role="button">Edit</a>
                                                @endif
                                                <a class="btn btn-danger" href="{{ url('todo/delete/' . $todo->id) }}"
                                                    role="button"
                                                    onclick="return confirm('Apakah Anda Yakin Ingin Hapus Data Tersebut?')"
                                                    title="Hapus Data">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>

</html>
