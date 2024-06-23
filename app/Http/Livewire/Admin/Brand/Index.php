<?php

namespace App\Http\Livewire\Admin\Brand;

use Livewire\Component;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $name, $slug, $status, $brand_id, $category_id;

    public function rules()
    {
        return [
            'name'          => 'required|string',
            'slug'          => 'required|string',
            'status'        => 'nullable',
            'category_id'   => 'required|integer'
        ];
    }
    public function resetInput()
    {
        $this->brand_id     = NULL;
        $this->name         = NULL;
        $this->slug         = NULL;
        $this->status       = NULL;
        $this->category_id  = NULL;
    }

    public function storeBrand()
    {
        $validatedData = $this->validate();
        Brand::create([
            'name'      => $this->name,
            'slug'      => Str::slug($this->slug),
            'category_id' => $this->category_id,
            'status'    => $this->status == true ? '1' : '0',
        ]);
        session()->flash('message', 'Brand added successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function openModal()
    {
        $this->resetInput();
    }

    public function editBrand(int $brand_id)
    {
        $this->brand_id = $brand_id;
        $brand = Brand::findOrFail($brand_id);
        $this->name         = $brand->name;
        $this->slug         = $brand->slug;
        $this->status       = $brand->status;
        $this->category_id  = $brand->category_id;
    }

    public function updateBrand()
    {
        $validatedData = $this->validate();
        Brand::findOrFail($this->brand_id)->update([
            'name'      => $this->name,
            'slug'      => Str::slug($this->slug),
            'category_id' => $this->category_id,
            'status'    => $this->status == true ? '1' : '0',
        ]);
        session()->flash('message', 'Brand updated successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function deleteBrand($brand_id)
    {
        $this->brand_id = $brand_id;
    }

    public function destroyBrand()
    {
        Brand::findOrFail($this->brand_id)->delete();
        session()->flash('message', 'Brand deleted successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function render()
    {
        $categories = Category::where('status', '0')->get();
        $brands = Brand::orderBy('name', 'ASC')->paginate(10);
        return view('livewire.admin.brand.index', ['brands' => $brands, 'categories' => $categories])->extends('layouts.admin')->section('content');
    }
}