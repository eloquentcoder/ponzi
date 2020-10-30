<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\ProvideHelp;
use Livewire\WithFileUploads;

class AccountActivation extends Component
{
    use WithFileUploads;

    public $continue_clicked = false;
    public $merged;
    public $file_upload;
    public $user_id;
    public $help_id;


    public function mount()
    {
        $provide_help = auth()->user()->providehelp()->where([
            ['is_activation', 1],
            ['merge_status', 1]
        ])->first();

        if ($provide_help) {
            $this->help_id = $provide_help->id;
            $this->user_id = $provide_help->gethelp->user->id;
            $this->merged = true;
        }
    }

    public function showDetails()
    {
        $user = User::where('role', 'admin')->get()->random();
        $this->user_id = $user->id;

        $get_help = $user->gethelp()->create([
            'amount' => 1000,
            'merge_status' => true,
        ]);

        $provide_help = $get_help->providehelp()->create([
            'amount' => 1000,
            'merge_status' => true,
            'is_activation' => 1,
            'user_id' => auth()->user()->id
        ]);

        $this->merged = !$this->merged;

        $this->continue_clicked = !$this->continue_clicked;
    }

    public function fileUpload()
    {
        $this->validate([
            'file_upload' => 'image', // 1MB Max
        ]);
        $name = md5($this->file_upload . microtime()).'.'.$this->file_upload->extension();
        $this->file_upload->storeAs('photos', $name);
        $provide_help = ProvideHelp::find($this->help_id);
        $provide_help->update([
            'proof_of_payment' => $name
        ]);

        session()->flash('message', 'The photo is successfully uploaded!');

    }

    public function render()
    {
        return view('livewire.account-activation', [
            'user' => User::find($this->user_id),
            'provide_help' => ProvideHelp::find($this->help_id)
        ]);
    }

}
