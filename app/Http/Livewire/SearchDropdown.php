<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchDropdown extends Component
{
    public $search = '';
    public function render()
    {
        $searchResults=[];
        if(strlen($this->search)>=2){
            $searchResults = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyYmU2YmIyMDgxMDgxMTE1MTgwYzZhMTE1ZjIxOTZkYSIsInN1YiI6IjVlN2VmMTU0NzAzMDlmMDAxMjYwZTQyMCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.W9bCmccH6S29iEi2-xo0q4s2Olr8U5F0TWkEXuvt0pk')
            ->get('https://api.themoviedb.org/3/search/movie?query='.$this->search)
            ->json()['results'];

        }
        

        return view('livewire.search-dropdown',[
            'searchResults' => collect($searchResults)->take(7),
        ]);
    }
}
