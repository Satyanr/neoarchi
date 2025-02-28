<?php

namespace App\Livewire\Main;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectComponent extends Component
{
    public $searchproject;
    public $selectedCategory = 'All';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $paginationName = 'ProjectPage';

    public function paginationView()
    {
        return 'components.pagination_custom';
    }

    public function resetProjectPage()
    {
        $this->gotoPage(1, 'ProjectPage');
    }

    public function setCategory($category)
    {
        $this->selectedCategory = $category;
        $this->resetProjectPage();
    }

    public function render()
    {
        $currentProjectPage = request()->input('ProjectPage', 1);
        $query = Project::query();

        if ($this->selectedCategory !== 'All') {
            $query->where('category', $this->selectedCategory);
        }

        $query->where('name', 'LIKE', '%' . $this->searchproject . '%')
              ->orderBy('id', 'DESC');

        return view('livewire.main.project-component', [
            'projects' => $query->paginate(10, ['*'], 'ProjectPage'),
            'currentProjectPage' => $currentProjectPage,
        ]);
    }
}