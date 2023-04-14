<?php

use CodeIgniter\I18n\Time;
use Spatie\Menu\Menu;
use Spatie\Menu\Html;
use Spatie\Menu\Link;

if (!function_exists('str_contains')) {
    function str_contains($haystack, $needle)
    {
        return $needle !== '' && mb_strpos($haystack, $needle) !== false;
    }
}

if (!function_exists('str_starts_with')) {
    function str_starts_with($haystack, $needle)
    {
        return substr($haystack, 0, strlen($needle)) === $needle;
    }
}

if (!function_exists('starts_with')) {
    function starts_with($haystack, $needle)
    {
        return substr($haystack, 0, strlen($needle)) === $needle;
    }
}

if (! function_exists('has_error')) {
    /**
     * Determines whether an error exists
     * for a form field. This requires the errors
     * are passed back like:
     *  return redirect()->back()->with('errors', $this->validation->getErrors());
     */
    function has_error(string $field): bool
    {
        if (! session()->has('errors')) {
            return false;
        }

        return isset(session('errors')[$field]);
    }
}

if (! function_exists('error')) {
    /**
     * Displays the error message for a single form field.
     */
    function error(string $field)
    {
        return session('errors')[$field] ?? '';
    }
}

if (! function_exists('app_date')) {
    /**
     * Formats a date according to the format
     * specified in the general settings page.
     *
     * It can take a string, a DateTime, or a Time instance.
     *
     * If $includeTimezone === true, will return the tz abbreviation
     * at the end of the date (i.e. CST, PST, etc)
     *
     * @param mixed $date
     *
     * @throws Exception
     */
    function app_date($date, bool $includeTime = false, bool $includeTimezone = false): string
    {
        $format = $includeTime
            ? [
                setting('App.dateFormat'),
                setting('App.timeFormat'),
                $includeTimezone ? 'T' : '',
            ]
            : [
                setting('App.dateFormat'),
                $includeTimezone ? 'T' : '',
            ];

        $format = trim(implode(' ', $format));

        if (is_string($date)) {
            $date = Time::parse($date);
        }

        $date->setTimezone(setting('App.appTimezone'));

        return $date->format($format);
    }
}

if (!function_exists('generateMenu')) {
    function generateMenu(array $tree)
    {
        return Menu::build($tree, function ($menu, $item) {
            if (!$item->children->isEmpty()) {
                $header = Link::to('#', '<i class="nav-icon '.$item->icon.'"></i>
                                        &nbsp;'.$item->name ?? 'header')->addClass('nav-link nav-group-toggle');
                $menu->submenu($header, generateMenu($item->children->all())->addClass('nav-group-items')->addParentClass('nav-group'));
            } else {
                // $menu->add(Html::raw('<a class="nav-link" href="'.$item->route.'">
                $menu->addIfCan($item->permissions->pluck('name'), Html::raw('<a class="nav-link" href="'.$item->route.'">       
                
                                        <i class="nav-icon '.$item->icon.'"></i>
                                        &nbsp;'.$item->name.'
                                    </a>')->addParentClass('nav-item'));
            }
        });
    }
}
