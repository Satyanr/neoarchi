<?php

namespace App\Livewire\Admin;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class ArtikelKomponent extends Component
{
    public $searchArtikel, $title, $thumbnail, $status, $content, $artikel_id;
    public $updateMode = false;
    use WithPagination;
    use WithFileUploads;
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
    protected $listeners = ['setContent'];

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function resetInput()
    {
        $this->title = '';
        $this->thumbnail = '';
        $this->status = '';
        $this->content = '';
        $this->artikel_id = '';
    }
    public function render()
    {
        $currentArtikelPage = request()->input('ArtikelPage', 1);
        return view('livewire.admin.artikel-komponent', [
            'artikels' => Article::where('title', 'LIKE', '%' . $this->searchArtikel . '%')
                ->orderBy('id', 'DESC')
                ->paginate(10, ['*'], 'ArtikelPage'),
            'artikelsInput' => Article::all(),
            'currentArtikelPage' => $currentArtikelPage,
        ]);
    }

    // public function storeArtikel()
    // {
    //     $this->validate(
    //         [
    //             'title' => 'required',
    //             'thumbnail' => 'required',
    //             'content' => 'required',
    //         ],
    //         [
    //             'title.required' => 'Judul Artikel tidak boleh kosong',
    //             'thumbnail.required' => 'Thumbnail tidak boleh kosong',
    //             'content.required' => 'Content tidak boleh kosong',
    //         ],
    //     );
    //     $filename = time() . $this->thumbnail->getClientOriginalName();
    //     $destinationPath = 'public/project_img';

    //     Storage::putFileAs($destinationPath, $this->thumbnail, $filename);

    //     Article::create([
    //         'title' => $this->title,
    //         'slug' => Str::slug($this->title),
    //         'thumbnail' => $filename,
    //         'status' => $this->status,
    //         'content' => $this->content,
    //     ]);
    //     session()->flash('message', 'Artikel berhasil ditambahkan');
    //     $this->resetInput();
    // }

    // public function editArtikel($id)
    // {
    //     $id = Crypt::decrypt($id);
    //     $artikel = Article::find($id);
    //     $this->artikel_id = $id;
    //     $this->title = $artikel->title;
    //     $this->status = $artikel->status;
    //     $this->content = $artikel->content;
    //     $this->updateMode = true;
    // }

    // public function updateArtikel()
    // {
    //     $this->validate(
    //         [
    //             'title' => 'required',
    //             'status' => 'required',
    //             'content' => 'required',
    //         ],
    //         [
    //             'title.required' => 'Judul Artikel tidak boleh kosong',
    //             'status.required' => 'Status tidak boleh kosong',
    //             'content.required' => 'Content tidak boleh kosong',
    //         ],
    //     );
    //     if ($this->thumbnail) {
    //         $filename = time() . $this->thumbnail->getClientOriginalName();
    //         $destinationPath = 'public/project_img';

    //         Storage::putFileAs($destinationPath, $this->thumbnail, $filename);
    //         Article::find($this->artikel_id)->update([
    //             'title' => $this->title,
    //             'slug' => Str::slug($this->title),
    //             'thumbnail' => $filename,
    //             'status' => $this->status,
    //             'content' => $this->content,
    //         ]);
    //     } else {
    //         Article::find($this->artikel_id)->update([
    //             'title' => $this->title,
    //             'slug' => Str::slug($this->title),
    //             'status' => $this->status,
    //             'content' => $this->content,
    //         ]);
    //     }
    //     session()->flash('message', 'Artikel berhasil diupdate');
    //     $this->resetInput();
    //     $this->updateMode = false;
    // }

    public function destroyartikel($id)
    {
        $id = Crypt::decrypt($id);
        $artikel = Article::findOrFail($id);
        $imagePath = public_path('ArtikelImages') . '/' . $artikel->thumbnail;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        // Storage::delete('public/artikel_img/' . $artikel->thumbnail);
        Article::find($id)->delete();
        session()->flash('message', 'Artikel berhasil dihapus');
    }
}
