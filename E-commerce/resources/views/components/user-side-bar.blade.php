<div>

    <div class="account__left--sidebar">
        <h2 class="account__content--title mb-20">Profilim</h2>
        <ul class="account__menu">
            <li class="account__menu--list {{ request()->is('profile') ? 'active' : '' }}">
                <a href="{{ route('profile.edit') }}">
                    <i class="fas fa-user " style=""></i> Hesap
                </a>
            </li>
            <li class="account__menu--list {{ request()->is('user/orders*') ? 'active' : '' }}">
                <a href="{{ route('user.order.index') }}">
                    <i class="fas fa-shopping-bag"></i> Siparişlerim
                </a>
            </li>
            <li class="account__menu--list {{ request()->is('user/adresses*') ? 'active' : '' }}">
                <a href="{{ route('user.address.index') }}">
                    <i class="fas fa-map-marker-alt"></i> Adreslerim
                </a>
            </li>
            <li class="account__menu--list ">
                <a href="{{ route('user.favorites') }}">
                    <i class="fas fa-heart"></i> Favoriler
                </a>
            </li>

            <li class="account__menu--list ">
                <a href="#" id="logout-link">
                    <i class="fas fa-user"></i> Çıkış yap
                </a>
            </li>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            <script>
                $(document).ready(function() {
                    $('#logout-link').click(function(e) {
                        e.preventDefault(); // a etiketinin varsayılan davranışını engelle
                        $('#logout-form').submit(); // formu gönder
                    });
                });
            </script>

        </ul>
    </div>
</div>