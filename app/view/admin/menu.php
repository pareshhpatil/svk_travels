<?php
switch ($this->selectedMenu) {
    
}
?>  

<div class="page-sidebar-wrapper">
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler">
                </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            <li >
                &nbsp;<br>&nbsp;
            </li>

            <li class="<?php echo ($select == 'm6') ? 'active open' : 'start'; ?>">
                <a href="/admin/dashboard">
                    <i class="icon-home"></i>
                    <span class="<?php echo ($select == 'm6') ? 'active' : 'title'; ?>">Dashboard</span>
                </a>
            </li>
            <li class="<?php echo ($this->mainMenu == 'master') ? 'active open' : ''; ?>">
                <a href="javascript:;">
                    <i class="icon-basket"></i>
                    <span class="title">Masters</span>
                    <span class="arrow"></span>
                    <?php echo ($select == 'm1') ? '<span class="selected"></span>' : ''; ?>
                </a>
                <ul class="sub-menu">
                    <li <?php
                    if ($this->selectedMenu == 'driver') {
                        echo 'class="active"';
                    }
                    ?>>
                        <a href="/admin/master/driver">
                            Driver</a>
                    </li>
                    <li <?php
                    if ($this->selectedMenu == 'vehicle') {
                        echo 'class="active"';
                    }
                    ?>>
                        <a href="/admin/master/vehicle">
                            Vehicle</a>
                    </li>
                    <li <?php
                    if ($this->selectedMenu == 'vendor') {
                        echo 'class="active"';
                    }
                    ?>>
                        <a href="/admin/master/vendor">
                            Vendor</a>
                    </li>
                    <li <?php
                    if ($this->selectedMenu == 'company') {
                        echo 'class="active"';
                    }
                    ?>>
                        <a href="/admin/master/company">
                            Company</a>
                    </li>
                    <li <?php
                    if ($this->selectedMenu == 'card') {
                        echo 'class="active"';
                    }
                    ?>>
                        <a href="/admin/master/card">
                            Card</a>
                    </li>
                    <li <?php
                    if ($this->selectedMenu == 'location') {
                        echo 'class="active"';
                    }
                    ?>>
                        <a href="/admin/master/location">
                            Location</a>
                    </li>
                </ul>
            </li>
            <li class="<?php echo ($this->mainMenu == 'employee') ? 'active open' : ''; ?>">
                <a href="javascript:;">
                    <i class="icon-user"></i>
                    <span class="title">Employee</span>
                    <span class="arrow"></span>
                    <?php echo ($select == 'm1') ? '<span class="selected"></span>' : ''; ?>
                </a>
                <ul class="sub-menu">
                    <li <?php
                    if ($this->selectedMenu == 'absent') {
                        echo 'class="active"';
                    }
                    ?>>
                        <a href="/admin/employee/absent">
                            Absent</a>
                    </li>
                    <li <?php
                    if ($this->selectedMenu == 'advance') {
                        echo 'class="active"';
                    }
                    ?>>
                        <a href="/admin/employee/advance">
                            Advance</a>
                    </li>
                    <li <?php
                    if ($this->selectedMenu == 'overtime') {
                        echo 'class="active"';
                    }
                    ?>>
                        <a href="/admin/employee/overtime">
                            Over Time</a>
                    </li>
                    <li <?php
                    if ($this->selectedMenu == 'payment') {
                        echo 'class="active"';
                    }
                    ?>>
                        <a href="/admin/employee/payment">
                            Payment</a>
                    </li>
                    
                </ul>
            </li>
            <li class="<?php echo ($this->mainMenu == 'vehicle') ? 'active open' : ''; ?>">
                <a href="javascript:;">
                    <i class="icon-disc"></i>
                    <span class="title">Vehicle</span>
                    <span class="arrow"></span>
                    <?php echo ($select == 'm1') ? '<span class="selected"></span>' : ''; ?>
                </a>
                <ul class="sub-menu">
                    <li <?php
                    if ($this->selectedMenu == 'replacecab') {
                        echo 'class="active"';
                    }
                    ?>>
                        <a href="/admin/vehicle/replacecab">
                            Replace Cab</a>
                    </li>
                    
                    
                </ul>
            </li>
           <li class="<?php echo ($this->selectedMenu == 'fuel') ? 'active open' : ''; ?>">
                <a href="/admin/transaction/fuel">
                    <i class="icon-drop"></i>
                    <span class="title">Fuel</span>
                </a>
            </li>
           <li class="<?php echo ($this->selectedMenu == 'logsheet') ? 'active open' : ''; ?>">
                <a href="/admin/logsheet/bill">
                    <i class="icon-notebook"></i>
                    <span class="title">Log sheet</span>
                </a>
            </li>
           <li >
                <a href="/logout">
                    <i class="icon-lock"></i>
                    <span class="<?php echo ($select == 'm6') ? 'active' : 'title'; ?>">Logout</span>
                </a>
            </li>
            
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>