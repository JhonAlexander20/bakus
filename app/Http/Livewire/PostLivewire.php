<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostLivewire extends Component{
    use WithPagination;

    public function render(){
        $posts=Post::paginate(8);
        $categories=Category::all();
        return view('livewire.post-livewire',compact('posts','categories'));
    }
}
