@extends('/master.layout')

@section('title')
    Edit - Sales
@endsection

@section('content')
    <div class="row justify-content-center">
        <h2>Edit Sales</h2>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="col-md-12 col-sm-12 card py-3">
                <form action="/sales/{{ $sales[0]->id }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <label><strong>Date</strong></label>
                    
                    <input type="date" name="date" class="form-control" value="{{ $sales[0]->date->format('Y-m-d') }}" required>
                    <table class="table table-sm table-striped mt-1">
                        <thead>
                            <tr>
                                <th scope="col">Category</th>
                                <th scope="col">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($salesItems as $salesItem)
                                <tr>
                                    <td scope="row">
                                        <input type="hidden" name="category_id[]" value="{{ $salesItem->category_id }}">
                                        {{ $salesItem->name }}
                                    </td>
                                    <td>
                                       <input type="number" name="amount[]" class="form-control amount" value="{{ $salesItem->amount }}" min="0" step="0.01">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="col-md-12 mt-3 d-flex justify-content-end">
                        <h5 id="total">Total: ${{ number_format($total, 2) }}</h5>
                    </div>
                    <div class="col-md-12 mt-3 d-flex justify-content-end">
                        <a href="/sales" class="btn btn-secondary shadow">Back</a>
                        <button class="btn btn-primary shadow ml-2">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="/js/sales.calculator.js"></script>
@endsection