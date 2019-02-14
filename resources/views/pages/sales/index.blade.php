@extends('/master.layout')

@section('title')
    Sales - clickBacon
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <h2>Sales</h2>
        </div>
            
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="col-md-12 col-sm-12">
                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Total</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sales as $sale)
                                <tr>
                                    <td scope="row">{{ $sale->date->format('F d, Y') }}</td>
                                    <td>${{ number_format($sale->total, 2) }}</td>
                                    <td>
                                        @csrf
                                        <a href="/sales/{{ $sale->id }}/edit">Edit</a> | <a class="delete-sales" href="#" data-id="{{ $sale->id }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                        
                <div class="col-md-12 text-center">
                    <a href="/sales/new">Add New</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="/js/delete.sales.js"></script>
@endsection