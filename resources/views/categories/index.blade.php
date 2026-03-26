<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Category Table</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container mt-5">
        @include('includes.message')
<a href="{{ route('products.index') }}"> Product</a>
        <h2 class="mb-4">Category Table</h2>

        <form action="{{ route('categories.create') }}" method="GET" class="mb-3">
            <button type="submit" class="btn btn-success">Add New Category</button>
        </form>

        <form class="d-flex mb-3" method="GET" action="{{ route('categories.index') }}">
            <input
                class="form-control me-2"
                type="search"
                name="search"
                placeholder="Search by name"
                value="{{ request('search') }}"
            />
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>

        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th width="180">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if ($categories->total() == 0)
                    <tr>
                        <td colspan="3" class="text-danger text-center">Không có dữ liệu nào</td>
                    </tr>
                @else
                    @foreach ($categories as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('categories.destroy', $item->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Bạn có chắc muốn xóa category này?')"
                                    >
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        {{ $categories->links() }}
    </div>
</body>

</html>