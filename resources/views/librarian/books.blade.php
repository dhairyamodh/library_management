@extends('layouts.librarianmaster')

@section('title')
    Books | Admin Panel
@endsection

@section('links')
        <link href="../../assets/libs/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
        <!-- App css -->
@endsection


@section('content')
<div class="modal fade" id="addLibrarian" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="exampleModalCenterTitle3">Add Book</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
          </div>
          <div class="modal-body">
            <form class="parsley-examples" method="post" action="javascript:void()" id="book_form" token="{{ csrf_token() }}">
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Book Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" placeholder="Enter book name" required
                                   class="form-control">
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Book INR No<span class="text-danger">*</span></label>
                            <input type="text" name="inr_no" placeholder="Enter INR no." required
                                   class="form-control">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Book RFID <span class="text-danger">*</span></label>
                            <input type="text" name="rfid_no" placeholder="Enter RFID" required
                                   class="form-control">
                        </div>
                        
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="userName">Book Status <span class="text-danger">*</span></label>
                            <select class="form-control" name="status" required data-placeholder="Select Status">
                               <option value="active">Active</option>
                               <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    
                </div>
                
          </div>
          <div class="modal-footer">
                <button type="submit" class="btn btn-primary" >Add</button>
             <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            
          </div>
          

        </form>
       </div>
    </div>
  </div>
  <div class="modal fade" id="editBook" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="exampleModalCenterTitle3">Update Book</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
          </div>
          <div class="modal-body">
            <form class="parsley-examples" method="post" action="javascript:void()" id="editbook_form" token="{{ csrf_token() }}">
                <input type="hidden" name="id" id="book_id">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Book Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" placeholder="Enter book name" required
                                   class="form-control">
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Book INR No<span class="text-danger">*</span></label>
                            <input type="text" name="inr_no" id="inr_no" placeholder="Enter INR no." required
                                   class="form-control">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Book RFID <span class="text-danger">*</span></label>
                            <input type="text" name="rfid_no" id="rfid_no" placeholder="Enter RFID" required
                                   class="form-control">
                        </div>
                        
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="userName">Status <span class="text-danger">*</span></label>
                            <select class="form-control" name="status" id="status" required data-placeholder="Select Status">
                               <option value="active">Active</option>
                               <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    
                </div>
                
          </div>
          <div class="modal-footer">
                <button type="submit" class="btn btn-primary" >Add</button>
             <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            
          </div>
          

        </form>
       </div>
    </div>
  </div>
<div class="container-fluid">
                        
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Book</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="header-title mb-3"><b>Book List</b></h4>
                        <button data-toggle="modal" data-target="#addLibrarian" class="btn btn-icon waves-effect waves-light btn-outline-success" >Add <i class="fe-plus"></i></button>
                    </div>
                

                <table id="datatable" class="table table-striped table-bordered " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Status</th>
                        <th>Name</th>
                        <th>INR No</th>
                        <th>RFID No</th>
                        <th>Created date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                    @foreach ($books as $row)
                        <tr>
                        <td>{{ ++$i }}</td>
                        <td><span style="text-transform: capitalize;" class="badge {{ ($row->book_status == 'active') ? 'badge-success' : 'badge-danger' }}"><?php echo $row->book_status ?></span></td>
                        <td>{{ $row->book_name }}</td>
                        <td>{{ $row->book_inr_no }}</td>
                        <td>{{ $row->book_rfid }}</td>
                        <td>{{ date('j/m/Y', strtotime($row->created_at)) }}</td>
                        <td>
                            <button type="button" class="btn btn-icon waves-effect waves-light btn-outline-primary edit" book_id="{{ $row->id }}"><i class="fe-edit-1"></i></button>
                            <button type="button" class="btn btn-icon waves-effect btn-outline-danger mg-l-5 delete" book_id="{{ $row->id}}" ><i class="fe-trash-2"></i></button>
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
    
@endsection

@section('scripts')
<script src="../../assets/libs/parsleyjs/parsley.min.js"></script>
<script src="../../assets/js/pages/form-validation.init.js"></script>
<script src="../../assets/js/pages/form-advanced.init.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="../../assets/libs/datatables/jquery.dataTables.min.js"></script>
        <script src="../../assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="../../assets/libs/datatables/dataTables.responsive.min.js"></script>
        <script src="../../assets/libs/datatables/responsive.bootstrap4.min.js"></script>
        <script src="../../assets/js/pages/datatables.init.js"></script>
<script>
    $(document).ready(function() {
        $('#book_form').submit(function(e){
            e.preventDefault();
                var form_data = new FormData($(this)[0]);
                var token = $(this).attr('token');
                form_data.append('_token', token);
                console.log(form_data);
                $.ajax({
                        url: "{{ route('librarian.addBook') }}",
                        method: "POST",
                        dataType:"json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        success: function(response, status, jqXHR) {
                           

                            if (response.status == 'success') {
                                swal({
                                    title: response.title,
                                    text: response.msg,
                                    icon: response.status
                                }).then(() => {
                                    window.location.reload();
                            })
                            
                                
                            } else{
                                swal({
                                    title: response.title,
                                    text: response.msg,
                                    icon: response.status
                                })
                            }
                        },
                        error: function(jqXHR, status, err) {
                            swal({
                                    title: 'Error',
                                    text: err,
                                    icon: status
                                })
                        }
                    })
            });

            $('body').on('click','.edit',function(){
                var id = $(this).attr('book_id');
                $.ajax({
                        url: "{{ route('librarian.editBook') }}",
                        method: "GET",
                        data: {id:id},
                        success: function(response, status, jqXHR) {
                            $('#book_id').val(response.id);
                            $('#name').val(response.name);
                            $('#inr_no').val(response.inr_no);
                            $('#rfid_no').val(response.rfid_no);
                            $('#status').val(response.status);
                            $('#editBook').modal('show');
                        }
                });
            })

            $('#editbook_form').submit(function(e){
            e.preventDefault();
                var form_data = new FormData($(this)[0]);
                var token = $(this).attr('token');
                form_data.append('_token', token);
                console.log(form_data);
                $.ajax({
                        url: "{{ route('librarian.updateBook') }}",
                        method: "POST",
                        dataType:"json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        success: function(response, status, jqXHR) {
                           

                            if (response.status == 'success') {
                                swal({
                                    title: response.title,
                                    text: response.msg,
                                    icon: response.status
                                }).then(() => {
                                    window.location.reload();
                            })
                            
                                
                            } else{
                                swal({
                                    title: response.title,
                                    text: response.msg,
                                    icon: response.status
                                })
                            }
                        },
                        error: function(jqXHR, status, err) {
                            swal({
                                    title: 'Error',
                                    text: err,
                                    icon: status
                                })
                        }
                    })
            });

            $('body').on('click','.delete',function(){
                var id = $(this).attr('book_id');
                swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                buttons: [
                    'No, cancel it!',
                    'Yes, I am sure!'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {
                    
                        $.ajax({
                            url: "{{ route('librarian.deleteBook') }}",
                            method: "GET",
                            data: {id:id},
                            success: function(response, status, jqXHR) {
                                swal({
                                    title: response.title,
                                    text: response.msg,
                                    icon: response.status
                            }).then(function() {
                                location.reload(true);
                            })
                            },
                            error: function(jqXHR, status, err) {
                            swal({
                                    title: 'Error',
                                    text: err,
                                    icon: status
                                })
                            }
                        })
                    
                }
            })
            })
    });
</script>

@if (session('success'))

<script>
      toastr["success"]("{{ session('success') }}", "", {
           positionClass:     "toast-top-right",
           closeButton:       "true",
           progressBar:       "true",
           preventDuplicates: "true",
           newestOnTop:       "true",
         });
         
   </script>   
   @endif

   @if (session('error'))

<script>
      toastr["error"]("{{ session('error') }}", "", {
           positionClass:     "toast-top-right",
           closeButton:       "true",
           progressBar:       "true",
           preventDuplicates: "true",
           newestOnTop:       "true",
         });
         
   </script>   
   @endif

@endsection