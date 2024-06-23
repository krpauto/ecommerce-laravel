{{-- START : Modal Create --}}
<div wire:ignore.self class="modal fade in" id="addBrandModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Create Brands</h4>
      </div>

      <form wire:submit.prevent="storeBrand">
        <div class="modal-body">

          <div class="form-group">
            <label>Name Brand</label>
            <input type="text" class="form-control" wire:model.defer="name" placeholder="Enter name brand">
            @error('name')
            <span class="help-block">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label>Slug Brand</label>
            <input type="text" class="form-control" wire:model.defer="slug" placeholder="Enter slug brand">
            @error('name')
            <span class="help-block">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label>Category</label>
            <select class="form-control" wire:model.defer="category_id">
              <option value="">-- Select Category --</option>
              @foreach ($categories as $categoryItem)
              <option value="{{ $categoryItem->id }}">{{ $categoryItem->name }}</option>
              @endforeach
            </select>
            @error('category_id')
            <span class="help-block">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label>Status</label>
            <select class="form-control" wire:model.defer="status">
              <option value="0">Visible</option>
              <option value="1">Hidden</option>
            </select>
            @error('status')
            <span class="help-block">{{ $message }}</span>
            @enderror
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" wire:click="closeModal" class="btn btn-default pull-left"
            data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>
{{-- END : Modal Create --}}

{{-- START : Modal Update --}}
<div wire:ignore.self class="modal fade in" id="updateBrandModal" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Edit Brand</h4>
      </div>
      <div wire:loading class="p-2">
        <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">Loading Data Brand</span>
        </div>
      </div>
      <div wire:loading.remove>
        <form wire:submit.prevent="updateBrand">
          <div class="modal-body">

            <div class="form-group">
              <label>Name Brand</label>
              <input type="text" class="form-control" wire:model.defer="name" placeholder="Enter name brand">
              @error('name')
              <span class="help-block">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label>Slug Brand</label>
              <input type="text" class="form-control" wire:model.defer="slug" placeholder="Enter slug brand">
              @error('name')
              <span class="help-block">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label>Category</label>
              <select class="form-control" wire:model.defer="category_id">
                <option value="">-- Select Category --</option>
                @foreach ($categories as $categoryItem)
                <option value="{{ $categoryItem->id }}">{{ $categoryItem->name }}</option>
                @endforeach
              </select>
              @error('category_id')
              <span class="help-block">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label>Status</label>
              <select class="form-control" wire:model.defer="status">
                <option value="0">Visible</option>
                <option value="1">Hidden</option>
              </select>
              @error('status')
              <span class="help-block">{{ $message }}</span>
              @enderror
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" wire:click="closeModal" class="btn btn-default pull-left"
              data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
{{-- END : Modal Update --}}

{{-- START : Modal Delete --}}
<div wire:ignore.self class="modal fade in" id="deleteBrandModal" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Delete Brand</h4>
      </div>
      <div wire:loading class="p-2">
        <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">Loading Data Brand</span>
        </div>
      </div>
      <div wire:loading.remove>
        <form wire:submit.prevent="destroyBrand">
          <div class="modal-body">
            <p>Are you sure you want to delete this data?</p>
          </div>
          <div class="modal-footer">
            <button type="button" wire:click="closeModal" class="btn btn-default pull-left"
              data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Yes, Delete</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
{{-- END : Modal Delete --}}