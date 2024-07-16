<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="../images/logo-dark.png" alt="">
                        <h3><b>Sunny</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('categories.index') }}">
                    <i data-feather="list"></i>
                    <span>Kategoriler</span>
                </a>
            </li>

            <li>
                <a href="{{ route('brands.index') }}">
                    <i data-feather="tag"></i>
                    <span>Markalar</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="box"></i> <span>Ürünler</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.product.create') }}"><i class="ti-more"></i>Ürün ekle</a></li>
                    <li><a href="{{ route('admin.product.index') }}"><i class="ti-more"></i>Ürünler</a></li>
                </ul>
            </li>

            <li>
                <a href="{{ route('slider.index') }}">
                    <i data-feather="image"></i>
                    <span>Slider</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.messages.index') }}">
                    <i data-feather="mail"></i>
                    <span>Mesajlar</span>
                    @php
                    $unreadCount = App\Models\Message::where('is_read', false)->count();
                    @endphp
                    @if ($unreadCount > 0)
                    <span class="badge badge-danger">{{ $unreadCount }}</span>
                    @endif
                </a>
            </li>

            <li class="treeview">
                <a href="">
                    <i data-feather="shopping-cart"></i> <span>Siparişler</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('order.index') }}"><i class="ti-more"></i>Tüm şiparişler</a></li>
                    <li><a href="{{ route('admin.orders.pending') }}"><i class="ti-more"></i>Onay bekleyen </a></li>
                    <li><a href="{{ route('admin.orders.processing') }}"><i class="ti-more"></i>Onaylananlar </a></li>
                    <li><a href="{{ route('admin.orders.shipped') }}"><i class="ti-more"></i>Kargolanan </a></li>
                    <li><a href="{{ route('admin.orders.cancelled') }}"><i class="ti-more"></i>İptal Edilenler</a></li>
                </ul>
            </li>

            <li>
                <a href="auth_login.html">
                    <i data-feather="log-out"></i>
                    <span>Çıkış Yap</span>
                </a>
            </li>
        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>