<?php

namespace App\Livewire;

use Livewire\Component;

class Search extends Component
{
    public string $search = '';

    public function render()
    {
        return view('livewire.search', [
            'posts' => $this->search ? [['title' => $this->search]] : [],
        ]);
    }
}