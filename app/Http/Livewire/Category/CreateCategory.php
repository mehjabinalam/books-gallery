<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;

class CreateCategory extends Component
{
    public $name = null, $selected_id = null;

    public function render()
    {
        return view('livewire.category.create-category');
    }

    public function resetInput()
    {
        $this->name = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|unique:categories,name',
        ]);
        try {
            Category::create([
                'name' => $this->name,
                'slug' => Str::slug($this->name)
            ]);
            $this->resetInput();
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Category created successfully."
            ]);
            $this->emit('reRenderCategoryList');
        } catch (\Exception $e) {}
    }
}
