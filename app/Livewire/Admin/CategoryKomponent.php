<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Crypt;

class CategoryKomponent extends Component
{
    public $searchkategori, $nama_kategori, $kategori_id;
    public $updateMode = false;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $paginationName = 'KategoriPage';

    public function paginationView()
    {
        return 'components.pagination_custom';
    }
    public function resetKategoriPage()
    {
        $this->gotoPage(1, 'KategoriPage');
    }
    public function resetInput()
    {
        $this->nama_kategori = '';
        $this->kategori_id = '';
    }
    public function render()
    {
        $currentKategoriPage = request()->input('KategoriPage', 1);
        return view('livewire.admin.category-komponent', [
            'kategoris' => Category::where('name', 'LIKE', '%' . $this->searchkategori . '%')
                ->orderBy('id', 'DESC')
                ->paginate(10, ['*'], 'KategoriPage'),
            'kategorisInput' => Category::all(),
            'currentKategoriPage' => $currentKategoriPage,
        ]);
    }

    public function storeKategori()
    {
        $this->validate(
            [
                'nama_kategori' => 'required',
            ],
            [
                'nama_kategori.required' => 'Nama kategori tidak boleh kosong',
            ],
        );
        Category::create([
            'name' => $this->nama_kategori,
            'slug' => Str::slug($this->nama_kategori),
        ]);
        session()->flash('message', 'Kategori berhasil ditambahkan');
        $this->resetInput();
    }

    public function destroyKategori($id)
    {
        $id = Crypt::decrypt($id);
        Category::find($id)->delete();
        session()->flash('message', 'Kategori berhasil dihapus');
    }
}
