<?php

namespace App\Livewire\Main;

use App\Models\Article;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class ArtikelComponent extends Component
{
    public $searchartikel;
    public $selectedCategory = 'All';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $paginationName = 'ArtikelPage';

    public function paginationView()
    {
        return 'components.pagination_custom';
    }

    public function resetArtikelPage()
    {
        $this->gotoPage(1, 'ArtikelPage');
    }

    public function setCategory($category)
    {
        $this->selectedCategory = $category;
        $this->resetArtikelPage();
    }

    public function render()
    {
        $currentArtikelPage = request()->input('ArtikelPage', 1);
        $query = Article::query();

        if ($this->selectedCategory !== 'All') {
            $query->whereHas('category', function ($q) {
                $q->where('name', $this->selectedCategory);
            });
        }

        if (!empty($this->searchartikel)) {
            $query->where('title', 'LIKE', '%' . $this->searchartikel . '%');
        }

        $query->orderBy('id', 'DESC');

        return view('livewire.main.artikel-component', [
            'artikels' => $query->paginate(5, ['*'], 'ArtikelPage'),
            'categories' => Category::all(),
            'currentArtikelPage' => $currentArtikelPage,
        ]);
    }
}