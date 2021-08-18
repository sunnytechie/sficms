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
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add_event">Create New User</a>
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
                            <th>createdd by</th>
                            <th>Created At</th>
                            <th class="text-right">Operations</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->category }}</td>
                            <td> dev chidi</td>

                            <td>{{ Carbon\Carbon::parse($category['created_at'])->toFormattedDateString() }}</td>
                            <td class="text-right">
                                <a href="{{ route('auth.edit', $category->id) }}" target="_blank"
                                    class="btn btn-sm btn-white text-success mr-2"><i class="fas fa-edit mr-1"></i>
                                    Edit</a>
                                <a href="{{ route('article.category.destroy', $category->id) }}"
                                    class="btn btn-sm btn-white text-danger mr-2"
                                    onclick="return confirm('Are you sure you want to delete category: {{ $category->category }} ?');"><i
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
<script>
    function revealPassFunction() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
</script>
@endsection
