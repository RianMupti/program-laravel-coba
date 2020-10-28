<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $judul;
    public $type_massage;
    public $isipesan;
    public function __construct($type, $judul, $isipesan)
    {
        $this->type_massage = $type;
        $this->judul = $judul;
        $this->isipesan = $isipesan;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
