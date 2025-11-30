<?php

namespace App\Livewire;

use App\Models\News;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.public')]
class PublicHomepage extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    #[Validate('nullable|string|max:50')]
    public string $search = '';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.public-homepage', [
            'news' => News::query()
                ->with(['category', 'author'])
                ->published()
                ->when(
                    $this->search,
                    fn($query) => $query->where('title', 'like', '%' . $this->search . '%')
                )
                ->orderBy('created_at', 'desc')
                ->paginate(10),
        ]);
    }
}
