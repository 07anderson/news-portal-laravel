<?php

namespace App\Livewire;

use App\Models\News;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.public')]
class PublicHomepage extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.public-homepage', [
            'news' => News::query()
                ->with(['category', 'author'])
                ->published()
                ->orderBy('created_at', 'desc')
                ->paginate(10),
        ]);
    }
}
