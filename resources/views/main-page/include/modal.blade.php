 <div class="modal fade" id="ktpModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">KTP Preview</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div id="ktp" class="text-center">

                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
             </div>
         </div>
     </div>
 </div>

 <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-sm">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Delete Employee Data</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form method="POST" action="{{ route('employee.destroy', 1) }}">
                 @csrf
                 @method('delete')
                 <div class="modal-body">
                     <p>Are you sure want to delete ?</p>
                     <input type="number" id="idEd" name="id" value="333" hidden>
                 </div>
                 <div class="modal-footer">
                     <button type="submit" class="btn btn-primary">Yes</button>
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                 </div>
             </form>
         </div>
     </div>
 </div>


 <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form action="{{ route('employee.update', 0) }}" method="post" enctype="multipart/form-data">
                 @csrf
                 @method('put')
                 <div class="modal-body">
                     <div class="d-flex flex-row w-100 ">
                         <input type="number" value="" id="id_edit" name="id" hidden>
                         <div class="mb-3 me-1 flex-fill">
                             <label for="first_name" class="form-label">First Name</label>
                             <input type="text" class="form-control" id="firstName_edit" placeholder="John"
                                 name="first_name" required>
                         </div>
                         <div class="mb-3 flex-fill">
                             <label for="last_name" class="form-label">Last Name</label>
                             <input type="text" class="form-control" id="lastName_edit" placeholder="Doe"
                                 name="last_name" required>
                         </div>
                     </div>
                     <div class="mb-3 flex-fill">
                         <label for="email" class="form-label">Email</label>
                         <input type="email" class="form-control" id="email_edit" placeholder="zikriakmale@gmail.com"
                             name="email">
                     </div>
                     <div class="mb-3 flex-fill">
                         <label for="phone" class="form-label">Phone Number</label>
                         <div class="input-group mb-3">
                             <span class="input-group-text" id="basic-addon1">+62</span>
                             <input type="text" class="form-control" id="phone_number_edit" placeholder="85363502837"
                                 name="phone_number" required>
                         </div>
                     </div>
                     <div class="mb-3">
                         <label for="date_of_birth" class="form-label">Date Of Birth</label>
                         <input type="date" class="form-control" id="dateOfBirth_edit" name="dob">
                     </div>
                     <div class="mb-3">
                         <label for="exampleFormControlInput1" class="form-label">Provience</label>
                         <select class="form-select" aria-label="provience" id="provience_edit" name="provience">
                             <option value="" selected disabled>Select Provience</option>
                             @foreach ($proviences as $pr)
                                 <option value="{{ $pr->id }}">{{ $pr->name }}</option>
                             @endforeach
                         </select>
                     </div>
                     <div class="mb-3">
                         <label for="city" class="form-label">City</label>
                         <select class="form-select" id="city_edit" aria-label="city" name="city">
                             <option value="" selected disabled>Select City</option>
                             @foreach ($cities as $ct)
                                 <option value="{{ $ct->id }}">{{ $ct->name }}</option>
                             @endforeach
                         </select>
                     </div>
                     <div class="mb-3">
                         <label for="position" class="form-label">Current Position</label>
                         <select class="form-select" id="position_edit" aria-label="positions" name="position">
                             <option value="" selected disabled>Select Current Position</option>
                             @foreach ($staffPositions as $sp)
                                 <option value="{{ $sp->id }}">{{ $sp->name }}</option>
                             @endforeach
                         </select>
                     </div>

                     <div class="mb-3">
                         <label for="bank" class="form-label">Bank</label>
                         <select class="form-select" id="bank_edit" aria-label="bank" name="bank">
                             <option value="" selected disabled>Select Bank Account</option>
                             @foreach ($banks as $bk)
                                 <option value="{{ $bk->id }}">{{ $bk->name }}</option>
                             @endforeach
                         </select>
                     </div>
                     <div class="mb-3">
                         <label for="street" class="form-label">Street</label>
                         <input type="text" class="form-control" id="street_edit" placeholder="jl.pesantren"
                             name="street">
                     </div>
                     <div class="mb-3 flex-fill">
                         <label for="zipCode" class="form-label">ZIP Code</label>
                         <input type="number" class="form-control" id="zipCode_edit" placeholder="20122"
                             name="zip_code">
                     </div>
                     <div class="mb-3">
                         <label for="ktpNumber" class="form-label">KTP Number</label>
                         <input type="number" class="form-control" id="ktpNumber_edit" placeholder="127000001100011"
                             name="ktp_number" required>
                     </div>
                     <div class="mb-3">
                         <label for="ktpFile" class="form-label">Attach KTP</label>
                         <input class="form-control" type="file" id="ktpFile" name="ktp_file">
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="submit" class="btn btn-primary">Update</button>
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                 </div>
             </form>
         </div>
     </div>
 </div>

 <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form action="{{ route('employee.store') }}" method="post" enctype="multipart/form-data">
                 @csrf
                 <div class="modal-body">
                     <div class="d-flex flex-row w-100 ">
                         <div class="mb-3 me-1 flex-fill">
                             <label for="first_name" class="form-label">First Name</label>
                             <input type="text" class="form-control" id="firstName" placeholder="John" name="first_name"
                                 required>
                         </div>
                         <div class="mb-3 flex-fill">
                             <label for="last_name" class="form-label">Last Name</label>
                             <input type="text" class="form-control" id="lastName" placeholder="Doe" name="last_name"
                                 required>
                         </div>
                     </div>
                     <div class="mb-3 flex-fill">
                         <label for="email" class="form-label">Email</label>
                         <input type="email" class="form-control" id="email" placeholder="zikriakmale@gmail.com"
                             name="email">
                     </div>
                     <div class="mb-3 flex-fill">
                         <label for="phone" class="form-label">Phone Number</label>
                         <div class="input-group mb-3">
                             <span class="input-group-text" id="basic-addon1">+62</span>
                             <input type="number" class="form-control" id="phone_number" placeholder="85363502837"
                                 name="phone_number">
                         </div>
                     </div>
                     <div class="mb-3">
                         <label for="date_of_birth" class="form-label">Date Of Birth</label>
                         <input type="date" class="form-control" id="dateOfBirth" name="dob">
                     </div>
                     <div class="mb-3">
                         <label for="exampleFormControlInput1" class="form-label">Provience</label>
                         <select class="form-select" aria-label="provience" name="provience">
                             <option value="" selected disabled>Select Provience</option>
                             @foreach ($proviences as $pr)
                                 <option value="{{ $pr->id }}">{{ $pr->name }}</option>
                             @endforeach
                         </select>
                     </div>
                     <div class="mb-3">
                         <label for="city" class="form-label">City</label>
                         <select class="form-select" aria-label="city" name="city">
                             <option value="" selected disabled>Select City</option>
                             @foreach ($cities as $ct)
                                 <option value="{{ $ct->id }}">{{ $ct->name }}</option>
                             @endforeach
                         </select>
                     </div>
                     <div class="mb-3">
                         <label for="position" class="form-label">Current Position</label>
                         <select class="form-select" aria-label="positions" name="position">
                             <option value="" selected disabled>Select Current Position</option>
                             @foreach ($staffPositions as $sp)
                                 <option value="{{ $sp->id }}">{{ $sp->name }}</option>
                             @endforeach
                         </select>
                     </div>

                     <div class="mb-3">
                         <label for="bank" class="form-label">Bank</label>
                         <select class="form-select" aria-label="bank" name="bank">
                             <option value="" selected disabled>Select Bank Account</option>
                             @foreach ($banks as $bk)
                                 <option value="{{ $bk->id }}">{{ $bk->name }}</option>
                             @endforeach
                         </select>
                     </div>
                     <div class="mb-3">
                         <label for="street" class="form-label">Street</label>
                         <input type="text" class="form-control" id="street" placeholder="jl.pesantren" name="street">
                     </div>
                     <div class="mb-3 flex-fill">
                         <label for="zipCode" class="form-label">ZIP Code</label>
                         <input type="number" class="form-control" id="zipCode" placeholder="20122" name="zip_code">
                     </div>
                     <div class="mb-3">
                         <label for="ktpNumber" class="form-label">KTP Number</label>
                         <input type="number" class="form-control" id="ktpNumber" placeholder="127000001100011"
                             name="ktp_number" required>
                     </div>
                     <div class="mb-3">
                         <label for="ktpFile" class="form-label">Attach KTP</label>
                         <input class="form-control" type="file" id="ktpFile" name="ktp_file" required>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
