@extends('layouts.adminmaster')

@section('title')
    Add Librarian | Admin Panel
@endsection

@section('links')
        <link href="../../assets/libs/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <style>
            .field-icon {
float: right;
margin-right: 10px;
margin-top: -25px;
position: relative;
z-index: 2;
cursor: pointer;
}
        </style>
@endsection


@section('content')
<div class="modal fade" id="addLibrarian" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="exampleModalCenterTitle3">Add Librarian</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
          </div>
          <div class="modal-body">
            <form class="parsley-examples" method="post" action="javascript:void()" id="librarian_form" token="{{ csrf_token() }}">
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" placeholder="Enter name" required
                                   class="form-control">
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" placeholder="Enter email address" required
                                   class="form-control">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Password <span class="text-danger">*</span></label><a href="#" id="auto-pass" style="float:right">Auto Generate Password</a>
                            <input type="password" name="password" id="password" placeholder="Enter password" required
                                   class="form-control">
                                   <span toggle="#password" class="fa fa-eye field-icon toggle-password"></span>
                        </div>
                        
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="userName">Status <span class="text-danger">*</span></label>
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
  <div class="modal fade" id="editLibrarian" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="exampleModalCenterTitle3">Update Librarian</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
          </div>
          <div class="modal-body">
            <form class="parsley-examples" method="post" action="javascript:void()" id="editlibrarian_form" token="{{ csrf_token() }}">
                <input type="hidden" name="id" id="libra_id">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" placeholder="Enter name" id="name" required
                                   class="form-control">
                        </div>
                        
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" placeholder="Enter email address" id="email" required
                                   class="form-control">
                        </div>
                    </div>
                    
                    <div class="col-md-12">
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
                <h4 class="page-title">Librarian</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="header-title mb-3"><b>Librarian List</b></h4>
                        <button data-toggle="modal" data-target="#addLibrarian" class="btn btn-icon waves-effect waves-light btn-outline-success" >Add <i class="fe-plus"></i></button>
                    </div>
                

                <table id="datatable" class="table table-striped table-bordered " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Status</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                    @foreach ($librarian as $row)
                        <tr>
                        <td>{{ ++$i }}</td>
                        <td><span style="text-transform: capitalize;" class="badge {{ ($row->librarian_status == 'active') ? 'badge-success' : 'badge-danger' }}"><?php echo $row->librarian_status ?></span></td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ date('j/m/Y', strtotime($row->created_at)) }}</td>
                        <td>
                            <button type="button" class="btn btn-icon waves-effect waves-light btn-outline-primary edit" libra_id="{{ $row->id }}"><i class="fe-edit-1"></i></button>
                            <button type="button" class="btn btn-icon waves-effect btn-outline-danger mg-l-5 delete" libra_id="{{ $row->id}}" ><i class="fe-trash-2"></i></button>
                            
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
    $('#auto-pass').click(()=>{
        $('#password').val(Array(10).fill("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz").map(function(x) { return x[Math.floor(Math.random() * x.length)] }).join(''));
        
    });
    $(".toggle-password").click(function() {

$(this).toggleClass("fa-eye-slash");
var input = $($(this).attr("toggle"));
if (input.attr("type") == "password") {
  input.attr("type", "text");
} else {
  input.attr("type", "password");
}
});
    $(document).ready(function() {
        $('#librarian_form').submit(function(e){
            e.preventDefault();
                var form_data = new FormData($(this)[0]);
                var token = $(this).attr('token');
                form_data.append('_token', token);
                
                $.ajax({
                        url: "{{ route('admin.addLibrarian') }}",
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
                var id = $(this).attr('libra_id');
                $.ajax({
                        url: "{{ route('admin.editLibrarian') }}",
                        method: "GET",
                        data: {id:id},
                        success: function(response, status, jqXHR) {
                            $('#libra_id').val(response.id);
                            $('#name').val(response.name);
                            $('#email').val(response.email);
                            $('#status').val(response.status);
                            $('#editLibrarian').modal('show');
                        }
                });
            })

            $('#editlibrarian_form').submit(function(e){
            e.preventDefault();
                var form_data = new FormData($(this)[0]);
                var token = $(this).attr('token');
                form_data.append('_token', token);
                console.log(form_data);
                $.ajax({
                        url: "{{ route('admin.updateLibrarian') }}",
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
                var id = $(this).attr('libra_id');
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
                            url: "{{ route('admin.deleteLibrarian') }}",
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