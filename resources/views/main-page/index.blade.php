<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('dist/app.css') }}">
    @yield('css')
    <title>Employee Data - Juke Solutions</title>
</head>

<body>
    <div>
        <h1 class="text-center py-3">Employee Data</h1>
        <hr />
    </div>
    <div class="container">
        <div class="d-flex flex-row justify-content-between my-3">

            <div>
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('status') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
            <div>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">Add
                    Employee</button>
            </div>
        </div>
        <div class="row">
            <div class="col ">
                <div class="card p-3 table-responsive">
                    <table id="employeeDt" class="table table-strip  datatable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>DoB</th>
                                <th>Address</th>
                                <th>KTP Number</th>
                                <th>KTP File</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employeeData as $ed)
                                <tr>
                                    <td>{{ $ed->first_name }}</td>
                                    <td>{{ $ed->last_name }}</td>
                                    <td>{{ $ed->dob }}</td>
                                    <td>{{ $ed->street }}</td>
                                    <td>{{ $ed->ktp_number }}</td>
                                    <td><button class="btn btn-success" data-bs-target="#ktpModal"
                                            data-bs-toggle="modal" data-ktp="{{ $ed->uri_ktp }}">Show</button></td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center   ">
                                            <button class="btn btn-success me-1" data-bs-target="#updateModal"
                                                data-bs-toggle="modal"
                                                data-all="{{ json_encode($ed) }}">Update</button>
                                            <button class="btn btn-warning" data-bs-target="#deleteModal"
                                                data-bs-toggle="modal" data-id="{{ $ed->id }}">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    @include('main-page.include.modal')

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#employeeDt').DataTable();

            $('#updateModal').on('show.bs.modal', function(e) {
                const data = $(e.relatedTarget).data('all');
                $('#id_edit').val(data.id);
                $('#firstName_edit').val(data.first_name);
                $('#lastName_edit').val(data.last_name);
                $('#email_edit').val(data.email);
                $('#phone_number_edit').val(data.phone.slice(3,data.phone.lenghth));
                $('#dateOfBirth_edit').val(data.dob);
                $('#provience_edit').val(data.province_id);
                $('#city_edit').val(data.city_id);
                $('#position_edit').val(data.staff_position_id);
                $('#bank_edit').val(data.bank_id);
                $('#street_edit').val(data.street);
                $('#zipCode_edit').val(data.zip_code);
                $('#ktpNumber_edit').val(data.ktp_number);
            })
            $('#deleteModal').on('show.bs.modal', function(e) {
                const id = $(e.relatedTarget).data('id');
                $('#idEd').val(id);
            })
            $('#ktpModal').on('show.bs.modal', function(e) {
                const dataktp = $(e.relatedTarget).data('ktp');
                $('#ktp').html(`
                    <img src="{{ asset('user-data') }}/ori-${dataktp}" style="width:200px;height:200px  "></img>`)
            })
        });

    </script>
    @yield('js')
</body>

</html>
