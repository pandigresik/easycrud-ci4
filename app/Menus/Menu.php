<?php

namespace App\Menus;

class Menu extends \Tatter\Menus\Menu
{
    public function __toString(): string
    {
        return $this->builder
            ->link(site_url('/'), 'Home')->addClass('nav-link')
            ->link(site_url('/about'), 'About')->addClass('nav-link')
            ->html('<hr>')
            ->link(site_url('/contact'), 'Contact')->addClass('nav-link')
            ->render();
    }
}
