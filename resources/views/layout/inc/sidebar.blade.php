<aside class="sidebar trans-0-4">
    <button class="btn-hide-sidebar ti-close color0-hov trans-0-4"></button>
    <ul class="menu-sidebar p-t-95 p-b-70">
        <li class="t-center m-b-13">
            <a href="" class="txt19">Home</a>
        </li>

        <li class="t-center m-b-13">
            <a href="/about" class="txt19">About</a>
        </li>
        <li class="t-center m-b-33">
            <a href="/contact" class="txt19">Contact</a>
        </li>
        @if (auth()->user())
            <li class="t-center m-b-33">
                <a href="/dashboard" class="txt19">Dashboard</a>
            </li>
            <li class="t-center m-b-33">
                <a href="/logout" class="txt19">Logout</a>
            </li>
        @else
            <li class="t-center m-b-33">
                <a href="/login" class="txt19">Login</a>
            </li>
            <li class="t-center m-b-33">
                <a href="/register" class="txt19">Register</a>
            </li>
        @endif
        <li class="t-center">
            <a href="/book-appointment" class="btn3 flex-c-m size13 txt11
            trans-0-4 m-l-r-auto p-1">
                Book Appointment
            </a>
        </li>
    </ul>
</aside>
