<?php

namespace App\Livewire\Admin;

use App\Models\Project;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class ProjekKomponent extends Component
{
    public $searchProject, $nama_project, $description, $thumbnail, $status, $category, $project_id;
    public $updateMode = false;
    use WithPagination;
    use WithFileUploads;
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
    public function resetInput()
    {
        $this->nama_project = '';
        $this->description = '';
        $this->thumbnail = '';
        $this->status = '';
        $this->category = '';
        $this->project_id = '';
    }
    public function render()
    {
        $currentProjectPage = request()->input('ProjectPage', 1);
        return view('livewire.admin.projek-komponent', [
            'projects' => Project::where('name', 'LIKE', '%' . $this->searchProject . '%')
                ->orderBy('id', 'DESC')
                ->paginate(10, ['*'], 'ProjectPage'),
            'projectsInput' => Project::all(),
            'currentProjectPage' => $currentProjectPage,
        ]);
    }

    // public function storeProject()
    // {
    //     $this->validate(
    //         [
    //             'nama_project' => 'required',
    //             'description' => 'required',
    //             'thumbnail' => 'required',
    //             'status' => 'required',
    //             'category' => 'required',
    //         ],
    //         [
    //             'nama_project.required' => 'Nama project tidak boleh kosong',
    //             'description.required' => 'Deskripsi project tidak boleh kosong',
    //             'thumbnail.required' => 'Thumbnail project tidak boleh kosong',
    //             'status.required' => 'Status project tidak boleh kosong',
    //             'category.required' => 'Kategori project tidak boleh kosong',
    //         ],
    //     );
    //     $filename = time() . $this->thumbnail->getClientOriginalName();
    //     $destinationPath = 'public/project_img';

    //     Storage::putFileAs($destinationPath, $this->thumbnail, $filename);

    //     Project::create([
    //         'name' => $this->nama_project,
    //         'slug' => Str::slug($this->nama_project),
    //         'description' => $this->description,
    //         'thumbnail' => 'storage/tindakan_img/' . $filename,
    //         'status' => $this->status,
    //         'category' => $this->category,
    //     ]);
    //     session()->flash('message', 'Project berhasil ditambahkan');
    //     $this->resetInput();
    // }

    // public function editProject($id)
    // {
    //     $id = Crypt::decrypt($id);
    //     $this->updateMode = true;
    //     $project = Project::find($id);
    //     $this->project_id = $id;
    //     $this->nama_project = $project->name;
    //     $this->description = $project->description;
    //     $this->thumbnail = $project->thumbnail;
    //     $this->status = $project->status;
    //     $this->category = $project->category;
    // }

    // public function updateProject()
    // {
    //     $this->validate(
    //         [
    //             'nama_project' => 'required',
    //             'description' => 'required',
    //             'status' => 'required',
    //             'category' => 'required',
    //         ],
    //         [
    //             'nama_project.required' => 'Nama project tidak boleh kosong',
    //             'description.required' => 'Deskripsi project tidak boleh kosong',
    //             'status.required' => 'Status project tidak boleh kosong',
    //             'category.required' => 'Kategori project tidak boleh kosong',
    //         ],
    //     );
    //     if ($this->project_id) {
    //         $project = Project::find($this->project_id);
    //         if ($this->thumbnail) {
    //             $filename = time() . $this->thumbnail->getClientOriginalName();
    //             $destinationPath = 'public/project_img';
    //             Storage::putFileAs($destinationPath, $this->thumbnail, $filename);
    //             $project->update([
    //                 'name' => $this->nama_project,
    //                 'slug' => Str::slug($this->nama_project),
    //                 'description' => $this->description,
    //                 'thumbnail' => 'storage/project_img/' . $filename,
    //                 'status' => $this->status,
    //                 'category' => $this->category,
    //             ]);
    //         } else {
    //             $project->update([
    //                 'name' => $this->nama_project,
    //                 'slug' => Str::slug($this->nama_project),
    //                 'description' => $this->description,
    //                 'status' => $this->status,
    //                 'category' => $this->category,
    //             ]);
    //         }
    //         $this->updateMode = false;
    //         session()->flash('message', 'Project berhasil diupdate');
    //         $this->resetInput();
    //     }
    // }

    public function destroyProject($id)
    {
        $id = Crypt::decrypt($id);
        $project = Project::findOrFail($id);
        $imagePath = public_path('ProjectImages') . '/' . $project->thumbnail;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // $img = $project->thumbnail;
        // $filename = explode('/', $img);
        // Storage::delete('public/project_img/' . $filename[3]);
        Project::find($id)->delete();
        session()->flash('message', 'Project berhasil dihapus');
    }
}
