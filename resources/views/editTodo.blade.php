<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Todo List</title>
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
                                Update My Todo List
                            </p>
                            @if ($errors->all())
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                    <strong>Silahkan lihat dan lengkapi form yang isi.</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="pb-2">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="POST" action="{{ url('todo/update/' . $todo->id) }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="title" class="form-label">Title</label>
                                                <input type="text"
                                                    class="form-control @error('title') is-invalid @enderror"
                                                    id="title" name="title" value="{{ $todo->title }}">
                                                <div class="invalid-feedback">
                                                    Please input the title.
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="description" class="form-label">Description</label>
                                                <input type="text" class="form-control" id="description"
                                                    name="description" value="{{ $todo->description }}"></input>
                                            </div>
                                            <div class="mb-3">
                                                <label for="date" class="form-label">Due Date</label>
                                                <input type="date" class="form-control" id="date" name="date"
                                                    value="{{ $todo->date }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="isDone" class="form-label">Status</label>
                                                <select class="form-select @error('isDone') is-invalid @enderror""
                                                    id="isDone" name="isDone" aria-label="Select the status">
                                                    <option selected disabled>Choose the status</option>
                                                    <option value="Done">Done</option>
                                                    </option>
                                                    <option value="NotDone">Not Done</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select the status.
                                                </div>
                                            </div>
                                            <a class="btn btn-warning" href="{{ url('todo') }}"
                                                role="button">Back</a>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>

</html>
