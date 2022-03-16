<?php

namespace App\Http\Livewire\Extracurricular;

use Livewire\Component;
use App\Models\Extracurricular;

class Index extends Component
{
    public $nama;
    public $idE;

    public function openModal($id)
    {
        // $this->emit('openModal',$id);
        $this->dispatchBrowserEvent('openModal',[
            'id'=>$id,
        ]);
    }

    public function closeModal($id)
    {
        // $this->emit('closeModal',$id);
        $this->dispatchBrowserEvent('closeModal',[
            'id'=>$id,
        ]);
    }

    public function openModalAdd(){
        $this->openModal('insertData');
    }

    public function store()
    {
        dd('Hello');
        // $this->validate([
        //     'nama' => ['required', 'max:50'],
        //     'slug' => 'required'
        // ]);

        // Extracurricular::create([
        //     'nama_extra' => $this->nama,
        //     'slug' => $this->slug
        // ]);
    }

    public function edit($idE)
    {
        $extra = Extracurricular::findOrFail($idE);
        $this->idE = $extra->id;
        $this->nama = $extra->nama_extra;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'nama' => ['required', 'max:50'],
            'slug' => 'required'
        ]);

        if ($this->idE) {
            $extra = Extracurricular::find($this->idE);
            $extra->update([
                'nama_extra' => $this->nama,
                'slug' => $this->slug
            ]);
        }
        $this->updateMode = false;
    }

    public function destroy($idE)
    {
        if($idE){
            Extracurricular::where('id', $idE)->delete();
        }
    }

    public function render()
    {
        return view('livewire.extracurricular.index', ['extra' => Extracurricular::all()]);
    }
}
