<aside class="sidebar">
    <div class="scrollbar-inner">

        <div class="user">
            <div class="user__info" data-toggle="dropdown">
                <img class="user__img" src="{{ asset('demo/img/profile-pics/8.jpg', $ssl) }}" alt="">
                <div>
                    <div class="user__name">{{ Auth::user()->name }}</div>
                    <div class="user__email">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="dropdown-menu">
                <a class="dropdown-item" href="">View Profile</a>
                <a class="dropdown-item" href="">Settings</a>
                <a class="dropdown-item" href="">Logout</a>
            </div>
        </div>

        <ul class="navigation">
            <li class="navigation__active"><a href="{{ route('dashboard') }}"><i class="zmdi zmdi-home"></i> Home</a></li>
            <li class=""><a href="{{ route('subjects') }}"><i class="zmdi zmdi-collection-text"></i> Subjects</a></li>
            <li class=""><a href="{{ route('topics') }}"><i class="zmdi zmdi-collection-text"></i> Topics</a></li>
            <li class=""><a href="{{ route('questions') }}"><i class="zmdi zmdi-collection-text"></i> Questions</a></li>

            <li class="navigation__sub">
                <a href=""><i class="zmdi zmdi-collection-text"></i> Question(old)</a>
                <ul>
                    <li class="@@formelementactive"><a href="/question/subject"> Subject Lists</a></li>
                    <li class="@@formcomponentactive"><a href="/question/add-subject"> Add Subject</a></li>
                </ul>
            </li>

            <li class="navigation__sub @@tableactive">
                <a href=""><i class="zmdi zmdi-view-list"></i> Student</a>

                <ul>
                    <li class="@@normaltableactive"><a href="html-table.html">HTML Table</a></li>
                    <li class="@@datatableactive"><a href="data-table.html">Data Table</a></li>
                </ul>
            </li>

        </ul>
    </div>
</aside>