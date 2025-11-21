<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Computed;
use Livewire\Component;

#[Layout('components.layouts.public')]
class CategoryShow extends Component
{
    public Category $category;

    public function mount(Category $category)
    {
        $this->category = $category;
    }

    #[Computed]
    public function news()
    {
        return $this->category
            ->news()
            ->with(['category', 'author'])
            ->published()
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.category-show');
    }
}
