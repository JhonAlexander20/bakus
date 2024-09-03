<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Str;

class CrudTag extends Component{
    public $isOpen=false;
    public $search,$tag;
    protected $listeners=['render','delete'=>'delete'];

    protected $rules=[
        'tag.name'=>'required',
        'tag.slug'=>'required',
    ];

    public function render(){
        $tags=Tag::where('name','LIKE','%'.$this->search.'%')->latest('id')->paginate(6);
        return view('livewire.crud-tag',compact('tags'));
    }

    public function create(){
        $this->isOpen=true;
    }

    public function store(){
        $this->validate();
        if(!isset($this->tag['id'])){
            Tag::create($this->tag);
        }else{
            $tag=Tag::find($this->tag['id']);
            $tag->name=$this->tag['name'];
            $tag->slug=$this->tag['slug'];
            $tag->save();
        }
        $this->reset(['isOpen','tag']);
        $this->emitTo('CrudTag','render');
    }

    public function delete(Tag $item){
        $item->delete();
    }

    public function edit($tag){
        $this->tag=$tag;
        $this->isOpen=true;
    }

    public function updatedTagName(){
        $this->tag['slug']=Str::slug($this->tag['name']);
    }

}
