@extends('layouts.app')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <div class="d-flex align-items-center">
                <h5 class="page-title">Dashboard</h5>
                <ul class="breadcrumb ml-2">
                    <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    <li class="breadcrumb-item active">Administrators</li>
                </ul>
            </div>
        </div>
        <div class="col-auto text-right float-right ml-auto">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add_event"> Create New category</a>
        </div>
    </div>
</div>
<!-- /Page Header -->


<div class="row">

    <div class="col-md-10 offset-md-1">
        <div class="card-body">

            <div class="table-responsive">
                <table class="datatable table table-stripped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Created by</th>
                            <th>Updated At</th>
                            <th class="text-right">Operations</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->category }}</td>
                            <td> dev chidi</td>
                            {{-- ->addSeconds($seconds)
                            ->format('Y-m-d H:i:s'); --}}
                            <td>{{ Carbon\Carbon::parse($category['updated_at'])->diffForHumans(); }}</td>
                            <td class="text-right">
                                <a data-id="{{ $category->id}}" data-toggle="modal" data-target="#edit_event"
                                    class="btn btn-sm btn-white text-success mr-2 "><i class="fas fa-edit mr-1"></i>
                                    edit
                                </a>
                                <a href="{{ route('article.category.destroy', $category->id) }}"
                                    class="btn btn-sm btn-white text-danger mr-2"
                                    onclick="return confirm('Are you sure you want to delete this category?');"><i
                                        class="far fa-trash-alt mr-1"></i>Delete</a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Add Event Modal -->
<div id="add_event" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add new category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('articles.category.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Full Name <span class="text-danger">*</span></label>
                        <input class="form-control @error('category') is-invalid @enderror" type="text" name="category"
                            id="name" placeholder="Type category">

                        @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Event Modal -->
<!-- Hide and show Password -->

<!-- Add Event Modal -->
<div id="edit_event" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label>Category <span class="text-danger">*</span></label>
                    <input class="form-control update-cat @error('category') is-invalid @enderror" type="text"
                        name="category" id="name" placeholder="Type category">

                    @error('category')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="submit-section">
                    <button class="btn btn-primary submit-btn" type="submit">Update</button>
                </div>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function revealPassFunction() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }

    $(document).ready(function() {
        $('#edit_event').on('show.bs.modal', function (e) {

            var button = $(e.relatedTarget);
            var cat_id = button.data('id');
            var modal = $(this);
$('.submit-section').on('click', function(){
    if( $('.update-cat').val() == "" ) return
    var category = $('.update-cat').val();
    $.ajax({
    url: "/article/category/update/"+cat_id,
    type: "POST",
    dataType:'json',
    data: {
        category: category,
        _token: "{{ csrf_token() }}"
    },
    beforeSend: function() {
        $('.submit-btn').text('Updating...')
    },
    success: function(res) {
        if(res.status == "success"){
        $('.submit-btn').addClass('btn-success')
        $('.submit-btn').attr('disabled', true)
        $('.submit-btn').text('Done')
        setTimeout(function() {  location.reload(); }, 850)

        }else{
        $('.submit-btn').text('Error!')
        }

    }
 })


})
                })
        })
</script>
@endsection
