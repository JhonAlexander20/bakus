<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class CrudCategory extends Component{

    public $isOpen=false;
    public $search,$category;
    protected $listeners=['render','delete'=>'delete'];

    protected $rules=[
        'category.name'=>'required',
        'category.slug'=>'required',
    ];

    public function render(){
        $categories=Category::where('name','LIKE','%'.$this->search.'%')->paginate();
        return view('livewire.crud-category',compact('categories'));
    }

    public function create(){
        $this->isOpen=true;
    }

    public function store(){
        $this->validate();
        if(!isset($this->category['id'])){
            Category::create($this->category);
        }else{
            $category=Category::find($this->category['id']);
            $category->name=$this->category['name'];
            $category->slug=$this->category['slug'];
            $category->save();
        }
        $this->reset(['isOpen','category']);
        $this->emitTo('CrudCategory','render');
    }

    public function delete(Category $item){
        $item->delete();
    }

    public function edit($category){
        $this->category=$category;
        $this->isOpen=true;
    }

    public function updatedCategoryName(){
        $this->category['slug']=Str::slug($this->category['name']);
    }

}
