<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\News;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.public')]
class NewsCategory extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public Category $category;

    public function render()
    {
        return view('livewire.public-homepage', [
            'news' => News::query()
                ->with(['category', 'author'])
                ->published()
                ->where('category_id', $this->category->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10),
        ]);
    }
}
