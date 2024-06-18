<div>

    @include('livewire.admin.brand.modal-form')

    <section class="content-header">
        <h1>
            Page Brands
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
                <div class="pull-left">
                    <a href="#" data-toggle="modal" data-target="#addBrandModal" class="btn btn-success"><i
                            class="fa fa-plus"></i>
                        Create
                        Brand</a>
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
                        @forelse ($brands as $brand)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $brand->name }}</td>
                            <td>{{ $brand->slug }}</td>
                            <td>{{ $brand->status == '1' ? 'Hidden' : 'Visible' }}</td>
                            <td>
                                <a href="#" wire:click="editBrand({{ $brand->id }})" data-toggle="modal"
                                    data-target="#updateBrandModal" class="btn btn-primary btn-xs">Edit</a>
                                <a href="#" wire:click="deleteBrand({{ $brand->id }})" data-toggle="modal"
                                    data-target="#deleteBrandModal" class="btn btn-danger btn-xs">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">No Brands Data Found!</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    {{ $brands->links() }}
                </ul>
            </div>
            {{-- <div>
                {{ $brands->links() }}
            </div> --}}
        </div>
    </section>

</div>

@push('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#addBrandModal').modal('hide');
        $('#updateBrandModal').modal('hide');
        $('#deleteBrandModal').modal('hide');
    });
</script>
@endpush