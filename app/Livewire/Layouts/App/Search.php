<?php

namespace App\Livewire\Layouts\App;

use Livewire\Attributes\Url;
use Livewire\Component;

class Search extends Component
{
    public bool $visible = true;

    #[Url]
    public string $search = '';

    public function mount(): void
    {
        $this->search = substr($this->search, 0, 100);
    }

    public function updated($name, $value) 
    {
        if ($name === 'search') {
            if (strlen($value) > 100) {
                $this->search = substr($value, 0, 100);
            }
            $this->dispatch('searchUpdated', substr($value, 0, 100));
        }
    }

    public function render()
    {
        return view('livewire.layouts.app.search', [
            //'search' => $this->search,
        ]);
    }
}
