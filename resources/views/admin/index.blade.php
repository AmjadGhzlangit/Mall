@extends('admin.admin_dashboard')

@section('content')
    <div class="page-content">
      
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
               
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7 col-xl-10 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th class="pt-0">id</th>
                                            <th class="pt-0">Category Name</th>
                                            <th class="pt-0">Category Descripition</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($categories as $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->description }}</td>
                                                <td>
                                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                <input type="submit" class="btn btn-danger" value="Delete">
                                              </form>   
                                            </td>
                                                <td>
                                                    <form action="{{ route('admin.categories.edit', $category->id) }}" method="GET">
                                                      @csrf
                                                  <input type="submit" class="btn btn-success" value="Edit">
                                                </form>
                                                </td>

                                            </tr>
                                        @empty

                                            <p>No Categories found</p>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div> <!-- row -->

    </div>
@endsection
