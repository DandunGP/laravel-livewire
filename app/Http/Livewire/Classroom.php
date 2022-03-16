<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Classroom as classroomModel;

class Classroom extends Component
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

        // Classroom::create([
        //     'nama_extra' => $this->nama,
        //     'slug' => $this->slug
        // ]);
    }

    public function edit($idE)
    {
        $cls = Classroom::findOrFail($idE);
        $this->idE = $cls->id;
        $this->nama = $cls->nama_extra;
    }

    public function update()
    {
        $this->validate([
            'nama' => ['required', 'max:50'],
        ]);

        if ($this->idE) {
            $extra = Classroom::find($this->idE);
            $extra->update([
                'nama_kelas' => $this->nama,
                'slug' => $this->slug
            ]);
        }
    }

    public function destroy($idE)
    {
        if($idE){
            Classroom::where('id', $idE)->delete();
        }
    }

    public function render()
    {
        return view('livewire.classroom', ['class' => classroomModel::all()]);
    }
}
