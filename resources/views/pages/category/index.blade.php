@extends('/master.layout')

@section('title')
    Category - clickBacon
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <h2>Categories</h2>
        </div>
            
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="col-md-12 col-sm-12">
                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td scope="row">
                                        {{ $category->name }}
                                    </td>
                                    <td>
                                        @csrf
                                        <a href="/category/{{ $category->id }}/edit">Edit</a> | <a class="delete-category" href="#" data-id="{{ $category->id }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                        
                <div class="col-md-12 text-center">
                    <a href="/category/new">Add New</a>
                </div>
                
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="/js/delete.category.js"></script>
@endsection