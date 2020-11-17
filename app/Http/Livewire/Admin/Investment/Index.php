<?php

namespace App\Http\Livewire\Admin\Investment;

use Livewire\Component;
use App\Models\ProvideHelp;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $confirmed;

    public function render()
    {
        return view('livewire.admin.investment.index', [
            'investments' => ProvideHelp::latest('created_at')
                            ->where(function($query){
                                $query->with('User')->whereHas('User', function($q) {
                                    $q->where('role', 'user');
                                });
                            })
                            ->paginate(10)
        ]);
    }
}
