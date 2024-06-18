<div>
    <div wire:ignore.self class="modal fade in" id="deleteModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Delete Categories</h4>
                </div>
                <form wire:submit.prevent="destroyCategory">

                    <div class="modal-body">
                        <p>Are you sure you want to delete this data?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes. Delete</button>
                    </div>
                </form>
            </div>

        </div>

    </div>


    <section class="content-header">
        <h1>
            Page Categories
        </h1>
    </section>

    <section class="content">

        @if (session('message'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            {{ session('message') }}
        </div>
        @endif

        <div class="box">
            <div class="box-header with-border">
                {{-- <h3 class="box-title">Category</h3> --}}
                <div class="pull-left">
                    <a href="{{ url('admin/category/create') }}" class="btn btn-success"><i class="fa fa-plus"></i>
                        Create
                        Category</a>
                </div>
            </div>

            <div class="box-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->status == '1' ? 'Hidden' : 'Visible' }}</td>
                            <td>
                                <a href="{{ url('admin/category/' . $category->id . '/edit') }}"
                                    class="btn btn-primary btn-xs">Edit</a>
                                <a href="#" wire:click="deleteCategory({{ $category->id }})" data-toggle="modal"
                                    data-target="#deleteModal" class="btn btn-danger btn-xs">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $categories->links() }}
        </div>
    </section>

</div>

@push('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#deleteModal').modal('hide');
    });
</script>
@endpush