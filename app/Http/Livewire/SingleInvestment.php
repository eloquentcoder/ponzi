<?php

namespace App\Http\Livewire;

use App\Models\GetHelp;
use Livewire\Component;
use App\Models\ProvideHelp;
use Livewire\WithFileUploads;

class SingleInvestment extends Component
{
    use WithFileUploads;

    public $ids;
    public $pro_id;
    public $file_upload;

    public function mount($id)
    {
        $this->ids = $id;
        $this->pro_id = ProvideHelp::where([
            ['user_id', auth()->user()->id],
            ['get_help_id', $id]
        ])->first()->id;
    }

    public function fileUpload()
    {
        $this->validate([
            'file_upload' => 'image', // 1MB Max
        ]);
        $name = md5($this->file_upload . microtime()).'.'.$this->file_upload->extension();
        $this->file_upload->storeAs('photos', $name);
        $provide_help = ProvideHelp::find($this->pro_id);
        $provide_help->update([
            'proof_of_payment' => $name
        ]);

        session()->flash('message', 'The photo is successfully uploaded!');

    }

    public function render()
    {
        return view('livewire.single-investment', [
            'single_invest' => GetHelp::find($this->ids),
            'provider' => ProvideHelp::find($this->pro_id)
        ]);
    }
}
