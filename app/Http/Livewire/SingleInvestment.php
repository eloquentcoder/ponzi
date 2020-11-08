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
    public $pro;
    public $file_upload;
    public $receipt_no;

    public function mount($id)
    {
        $this->ids = $id;
        $this->pro = ProvideHelp::where([
            ['user_id', auth()->user()->id]
        ])->first();

        $this->receipt_no = $this->pro->receipt_no;
    }

    public function fileUpload()
    {
        $this->validate([
            'file_upload' => 'image', // 1MB Max
        ]);
        $name = md5($this->file_upload . microtime()).'.'.$this->file_upload->extension();
        $this->file_upload->storeAs('photos', $name);
        $provide_help = ProvideHelp::find($this->pro->id);
        $provide_help->update([
            'proof_of_payment' => $name
        ]);
        session()->flash('message', 'The photo is successfully uploaded!');
    }

    public function receiptUpload()
    {
        $this->validate([
            'receipt_no' => 'required', // 1MB Max
        ]);

        $provide_help = ProvideHelp::find($this->pro->id);
        $provide_help->update([
            'receipt_no' => $this->receipt_no
        ]);

        session()->flash('message', 'Receipt Saved Successfully!');

    }

    public function render()
    {
        return view('livewire.single-investment', [
            'single_invest' => GetHelp::find($this->ids),
            'provider' => ProvideHelp::find($this->pro->id)
        ]);
    }
}
