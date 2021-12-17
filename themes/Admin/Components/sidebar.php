<div id="app-sidepanel" class="app-sidepanel sidepanel-visible">
    <div id="sidepanel-drop" class="sidepanel-drop"></div>
    <div class="sidepanel-inner d-flex flex-column">
        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">×</a>
        <div class="app-branding">
            <a class="app-logo" href="/<?= ADMIN_AREA ?>"><img class="logo-icon me-2"
                    src="<?= asset('admin/images/app-logo.svg', 'css') ?>" alt="logo"><span
                    class="logo-text"><?= setting('App.siteName') ?? 'bonfire' ?></span></a>
        </div>
        <!--//app-branding-->

        <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
            <ul class="app-menu list-unstyled accordion" id="menu-accordion">
                <li class="nav-item">
                    <a class="nav-link <?= url_is('/'.ADMIN_AREA) ? 'active' : '' ?>" href="/<?= ADMIN_AREA ?>"><i class="fas fa-home"></i> Dashboard</a>
                </li>
                
                <?php if(isset($menu)) : ?>
                    <?php foreach($menu->collections() as $_key => $collection) : ?>
                    
                        <?php if($collection->isCollapsible()) : ?>
                            <li class="nav-item has-submenu">
                                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-<?= $_key ?>"
                                    aria-expanded="false" aria-controls="submenu-2">
                                
                                    <span class="nav-link-text"><?= $collection->title ?></span>
                                    <span class="submenu-arrow">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z">
                                            </path>
                                        </svg>
                                    </span>
                                    <!--//submenu-arrow-->
                                </a>
                                <div id="submenu-<?= $_key ?>" class="collapse submenu submenu-2" data-bs-parent="#menu-accordion">
                                    <ul class="submenu-list list-unstyled">
                                    <?php foreach($collection->items() as $item) : ?>
                                        <li class="nav-item">
                                            <a class="nav-link <?= url_is($item->url.'*') ? 'active' : '' ?>" href="<?= $item->url ?>">
                                                <?= $item->icon ?>
                                                <?= $item->title ?>
                                            </a>
                                        </li>
                                    <?php endforeach ?>
                                    </ul>
                                </div>
                            </li>                            
                        <?php else : ?>
                            <li class="nav-item">
                                <span class="nav-link"><?= $collection->title ?></span>
                            </li>                            
                        <?php endif ?>                    
                    <?php endforeach ?>
                <?php endif ?>                                
            </ul>
            <!--//app-menu-->
        </nav>
        <!--//app-nav-->                

    </div>
    <!--//sidepanel-inner-->
</div>