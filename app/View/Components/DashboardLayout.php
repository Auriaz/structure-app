<?php

namespace App\View\Components;

use ProtoneMedia\Splade\Components\PersistentComponent;

class DashboardLayout extends PersistentComponent
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.dashboard');
    }
}
