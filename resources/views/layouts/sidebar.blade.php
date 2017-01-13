<div class="page-sidebar navbar-collapse collapse">
<?php $menus = Request::segments(); ?>
            <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                <li class="sidebar-toggler-wrapper">
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    <div class="sidebar-toggler">
                    </div>
                    <!-- END SIDEBAR TOGGLER BUTTON -->
                </li>
                <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                <li class="sidebar-search-wrapper">
                    
                </li>
                <li class="start @if(in_array('cash',$menus)|| in_array('trial',$menus) || in_array('balance',$menus) || in_array('income',$menus)) active @endif">
                    <a href="javascript:;">
                    <i class="fa fa-xing-square"></i>
                    <span class="title">Report</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="@if(in_array('cash',$menus)) active @endif">
                            <a href="{{ url($fiscal_id.'/cash') }}">
                            <i class="icon-bar-chart"></i>
                            CashBook</a>
                        </li>
                        <li class="@if(in_array('trial',$menus)) active @endif">
                            <a href="{{ url($fiscal_id.'/trial') }}">
                            <i class="icon-bulb"></i>
                            Trial Balance </a>
                        </li>
                        <li class="@if(in_array('balance',$menus)) active @endif">
                            <a href="{{ url($fiscal_id.'/balance') }}">
                            <i class="icon-graph"></i>
                            Balance Sheet </a>
                        </li>
                        <li class="@if(in_array('income',$menus)) active @endif">
                            <a href="{{ url($fiscal_id.'/income') }}">
                            <i class="icon-graph"></i>
                            Income Statement</a>
                        </li>
                    </ul>
                </li>
                <li class="start @if(in_array('bills',$menus)|| in_array('invoices',$menus)) active @endif">
                    <a href="javascript:;">
                    <i class="fa fa-th-large"></i>
                    <span class="title">Bill/Invoice</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="@if(in_array('bills',$menus)) active @endif">
                            <a href="{{ url($fiscal_id.'/bills') }}">
                            <i class="icon-bar-chart"></i>
                            Bill</a>
                        </li>
                        <li class="@if(in_array('invoices',$menus)) active @endif">
                            <a href="{{ url($fiscal_id.'/invoices') }}">
                            <i class="icon-bulb"></i>
                            Invoice </a>
                        </li>
                       
                    </ul>
                </li>
                 <li class="@if(in_array('accounts',$menus)) active @endif"><a href="{{ url($fiscal_id.'/accounts') }}"><i class="fa fa-money"></i>Account</a></li>

                 <li class="@if(in_array('journal',$menus)) active @endif"><a href="{{ url($fiscal_id.'/journal') }}"><i class="fa  fa-table"></i>Journal</a></li>
                <li class="start @if(in_array('customers',$menus) || in_array('vendors',$menus) ) active @endif">
                    <a href="javascript:;">
                    <i class="icon-speech"></i>
                    <span class="title">Manage</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="@if(in_array('customers',$menus)) active @endif">
                            <a href="{{ url($fiscal_id.'/customers') }}">
                            <i class="icon-bar-chart"></i>
                            Clients</a>
                        </li>
                        <li class="@if(in_array('vendors',$menus)) active @endif">
                            <a href="{{ url($fiscal_id.'/vendors') }}">
                            <i class="icon-bulb"></i>
                            Vendor </a>
                        </li>
                        
                    </ul>
                </li>
                <li class="start ">
                    <a href="javascript:;">
                    <i class="icon-home"></i>
                    <span class="title">Inventory</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li @if(in_array('products',$menus)) active @endif>
                            <a href="{{ url($fiscal_id.'/products') }}">
                            <i class="icon-bar-chart"></i>
                            Products</a>
                        </li>  
                    </ul>
                </li>
                <li class="start @if(in_array('configs',$menus)) active @endif">
                    <a href="{{url($fiscal_id.'/configs')}}">
                    <i class="icon-home"></i>
                    <span class="title">Config</span>
                    
                    </a>
                   
                </li>
                 
                 
             
                
            </ul>
            <!-- END SIDEBAR MENU -->
        </div>