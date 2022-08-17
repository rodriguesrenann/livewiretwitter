<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadPhoto extends Component
{
    use WithFileUploads;

    public $photo;

    public function render()
    {
        return view('livewire.user.upload-photo');
    }

    public function upload()
    {
        $this->validate([
            'photo' => 'required|image'
        ]);


        $path = $this->photo->store('users');

        if ($path) {
            $user = auth()->user();

            $user->update([
                'profile_photo_path' => $path
            ]);
        }

        return redirect()->route('tweets');
    }
}
