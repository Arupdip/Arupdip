<card class="card p-2" style="max-height: 90vh; overflow: auto;">
            <!-- SIDE NAV -->
            <ul class="side-nav">
                <li class="drop-menu">
                    <span class="drop-menu-head" onclick="toggleSubmenu(this)"><i class="priya-plus"></i> License Management <i class="priya-angle-right drop-icon"></i></span>
                    <ul class="submenu collapse">
                       <li><a href="{{url('/')}}/admin/licensetype/create"> Create</a> </li>
                         <li><a href="{{url('/')}}/admin/licensetype"> List</a> </li>
                    </ul>
                </li>
                <li class="drop-menu">
                    <span class="drop-menu-head" onclick="toggleSubmenu(this)"><i class="priya-plus"></i> Department User <i class="priya-angle-right drop-icon"></i></span>
                    <ul class="submenu collapse">
                        <li><a href="{{url('/')}}/admin/designation/create"> Create</a> </li>
                         <li><a href="{{url('/')}}/admin/designation"> List</a> </li>
                    </ul>
                </li>
                <li class="drop-menu">
                    <span class="drop-menu-head" onclick="toggleSubmenu(this)"><i class="priya-plus"></i> AMC Management <i class="priya-angle-right drop-icon"></i></span>
                    <ul class="submenu collapse">
                       <li><a href="{{url('/')}}/admin/amc/create"> Create</a> </li>
                         <li><a href="{{url('/')}}/admin/amc"> List</a> </li>
                    </ul>
                </li>

                <li class="drop-menu">
                    <span class="drop-menu-head" onclick="toggleSubmenu(this)"><i class="priya-plus"></i> District Management <i class="priya-angle-right drop-icon"></i></span>
                    <ul class="submenu collapse">
                        <li><a href="{{url('/')}}/admin/district/create"> Create</a> </li>
                         <li><a href="{{url('/')}}/admin/district"> List</a> </li>
                    </ul>
                </li>


                
                <li class="drop-menu">
                    <span class="drop-menu-head" onclick="toggleSubmenu(this)"><i class="priya-plus"></i> Mandal Management <i class="priya-angle-right drop-icon"></i></span>
                    <ul class="submenu collapse">
                        <li><a href="{{url('/')}}/admin/mandal/create"> Create</a> </li>
                         <li><a href="{{url('/')}}/admin/mandal"> List</a> </li>
                    </ul>
                </li>
            </ul>
        </card>