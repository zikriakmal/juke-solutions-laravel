<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('dist/app.css') }}">
    @yield('css')
    <title>Document</title>
</head>

<body>
    <div>
        <h1 class="text-center">Employee Data</h1>
    </div>
    <div class="container">
        <div class="text-end">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">Add Employee</button>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>DoB</th>
                            <th>Address</th>
                            <th>Currency</th>
                            <th>KTP File</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('employee.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="John" name="first_name">
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="Doe" name="last_name">
                        </div>
                        <div class="mb-3">
                            <label for="date_of_birth" class="form-label">Date Of Birth</label>
                            <input type="date" class="form-control" id="dateOfBirth" name="dob">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Provience</label>
                            <select class="form-select" aria-label="provience" name="provience">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <select class="form-select" aria-label="city" name="city">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="street" class="form-label">KTP Number</label>
                            <input type="text" class="form-control" id="street" placeholder="jl.pesantren"
                                name="street">
                        </div>
                        <div class="mb-3">
                            <label for="ktpNumber" class="form-label">KTP Number</label>
                            <input type="number" class="form-control" id="ktpNumber" placeholder="127000001100011"
                                name="ktp_number">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Attach KTP</label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
    </div>

    @yield('js')
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
