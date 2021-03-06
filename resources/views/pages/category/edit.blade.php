@extends('/master.layout')

@section('title')
    Edit - {{ $category->name }}
@endsection

@section('content')
    <div class="row justify-content-center">
        <h2>Edit Category</h2>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="col-md-12 col-sm-12 card py-3">
                <form action="/category/{{ $category->id }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <label><strong>Category Name</strong></label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ $category->name }}" required>
                    <div class="col-md-12 mt-3 d-flex justify-content-end">
                        <a href="/" class="btn btn-secondary shadow">Back</a>
                        <button class="btn btn-primary shadow ml-2">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection