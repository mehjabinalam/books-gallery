<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['reRenderCategoryList'];

    public $updateMode = false;
    public $name = null;
    public $selected_id = null;

    public function render()
    {
        return view('livewire.category.category-list', [
            'categories' => Category::orderBy('name')->paginate(10)
        ]);
    }

    public function resetRequest()
    {
        $this->name = null;
        $this->selected_id = null;
        $this->updateMode = false;
    }

    public function selectCategory($category_id, $name = null, $updateMode = false)
    {
        $this->updateMode = $updateMode;
        $this->selected_id = $category_id;
        $this->name = $name;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|unique:categories,name,'.$this->selected_id,
        ]);
        try {
            Category::where('id', $this->selected_id)->update([
                'name' => $this->name,
                'slug' => Str::slug($this->name)
            ]);
            $this->resetRequest();
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Category updated successfully."
            ]);
        } catch (\Exception $e) {}
    }

    public function destroy()
    {
        try {
            Category::where('id', $this->selected_id)->delete();
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Category deleted successfully."
            ]);
        } catch (\Exception $e) {}
    }

    public function reRenderCategoryList()
    {
        $this->mount();
        $this->render();
    }
}
