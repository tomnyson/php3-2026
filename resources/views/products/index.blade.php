<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simple Bootstrap Table</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container mt-5">
       @include('includes.message')

        <h2 class="mb-4">Product Table</h2>
        <form action="{{ route('products.create') }}" method="GET" class="mb-3">
            <button type="submit" class="btn btn-success">Add New Product</button>
        </form>
        <form class="d-flex mb-3" method="GET" action="{{ route('products.index') }}">
            <input class="form-control me-2" type="search" name="search" placeholder="Search by name"
                value="{{ request('search') }}" />
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                @endphp
                @if ($products->total() == 0)
                <p class="text-danger text-center">Khong co du lieu nao</p>
                @else
                @foreach ($products as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }} {{$item->image}}</td>
                        <td>{{ $item->description }}</td>
                       
                        <td><img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" width="100"
                                onerror="this.onerror=null; this.src='https://placehold.co/400';"></td>
                        <td>${{ number_format($item->price, 2) }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm">Edit</button>
                            <form action="{{ route('products.destroy', $item->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach

                @endif


            </tbody>
        </table>
    
    </div>
        {{ $products->links() }}
</body>

</html>
