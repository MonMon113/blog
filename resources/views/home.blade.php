@extends('layouts.app')

@section('content')
    <div id="wrapper">

        <!-- Header -->
        <header id="header">
            <h1><a href="{!! url('home') !!}">My Blog</a></h1>
            <nav class="links">
                @guest
                <ul>
                    <li><a href="{{ route('login') }}">{{ __('Login') }}</li>
                    <li><a href="{{ route('register') }}">{{ __('Register') }}</li>
                </ul>
                @else
                <ul>
                    <li><a href="#">Profile</a></li>
                    <li><a href="{!! url('myblog') !!}">{{ Auth::user()->name }}</a></li>
                    <li><a href="#">New Blog</a></li>
                </ul>
                @endguest
            </nav>
            <nav class="main">
                <ul>
                    <li class="search">
                        <a class="fa-search" href="#search">Search</a>
                        <form id="search" method="get" action="#">
                            <input type="text" name="query" placeholder="Search" />
                        </form>
                    </li>
                    <li class="menu">
                        <a class="fa-bars" href="#menu">Menu</a>
                    </li>
                </ul>
            </nav>
        </header>

        <!-- Menu -->
        <section id="menu">

            <!-- Search -->
            <section>
                <form class="search" method="get" action="#">
                    <input type="text" name="query" placeholder="Search" />
                </form>
            </section>

            <!-- Links -->
            <section>
                <ul class="links">
                    <li>
                        <a href="#">
                            <h3>Lorem ipsum</h3>
                            <p>Feugiat tempus veroeros dolor</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <h3>Dolor sit amet</h3>
                            <p>Sed vitae justo condimentum</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <h3>Feugiat veroeros</h3>
                            <p>Phasellus sed ultricies mi congue</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <h3>Etiam sed consequat</h3>
                            <p>Porta lectus amet ultricies</p>
                        </a>
                    </li>
                </ul>
            </section>

            <!-- Actions -->
            <section>
                <ul class="actions vertical">
                    <li><a href="#" class="button big fit">Log In</a></li>
                </ul>
            </section>
        </section>

        <!-- Main -->
        <div id="main">

            @foreach  ($contents as $content)
            <article class="post">
                <header>
                    <div class="title">
                        <h2><a id = "{{$content->id}}" href="#">{{ $content->subject }}</a></h2>
                        
                    </div>
                    <div class="meta">
                        <time class="published">{{ date('F d, Y', strtotime($content->created_at)) }}</time>
                        <a href="#" class="author"><span class="name">{{ $content->name }}</span><img src="{{ 'images/' . $content->usersUrl }}" alt="" /></a>
                    </div>
                </header>
                @if ($content->url != NULL)
                <a href="#" class="image featured"><img src="{{ 'images/' . $content->url }}" alt="" /></a>
                @endif
                <p>{{ $content->content }}</p>
                <footer>
                </footer>
            </article>
            @endforeach
            {{ $contents->links() }}
        </div>

        <!-- Sidebar -->
        <section id="sidebar">

            <!-- Intro -->
            <section id="intro">
                <a href="#" class="logo"><img src="images/logo.jpg" alt="" /></a>
                <header>
                    <h2>Future Imperfect</h2>
                    <p>Another fine responsive site template by <a href="http://html5up.net">HTML5 UP</a></p>
                </header>
            </section>

            <!-- Mini Posts -->
            <section>
                <div class="mini-posts">
                    @foreach($contents->take(5) as $content)
                    <article class="mini-post">
                        <header>
                            <h3><a href="#{{$content->id}}">{{ $content->subject }}</a></h3>
                            <time class="published">{{ date('F d, Y', strtotime($content->created_at)) }}</time>
                            <a href="#" class="author"><img src="{{ 'images/' . $content->usersUrl }}" alt="" /></a>
                        </header>
                        @if ($content->url != NULL)
                            <a href="#" class="image featured"><img src="{{ 'images/' . $content->url }}" alt="" /></a>
                        @endif
                    </article>
                    @endforeach
                </div>
            </section>

            <!-- About -->
            <section class="blurb">
                <h2>About</h2>
                <p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod amet placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at phasellus sed ultricies.</p>
                <ul class="actions">
                    <li><a href="#" class="button">Learn More</a></li>
                </ul>
            </section>

            <!-- Footer -->
            <section id="footer">
                <ul class="icons">
                    <li><a href="#" class="fa-twitter"><span class="label">Twitter</span></a></li>
                    <li><a href="#" class="fa-facebook"><span class="label">Facebook</span></a></li>
                    <li><a href="#" class="fa-instagram"><span class="label">Instagram</span></a></li>
                    <li><a href="#" class="fa-rss"><span class="label">RSS</span></a></li>
                    <li><a href="#" class="fa-envelope"><span class="label">Email</span></a></li>
                </ul>
                <p class="copyright">&copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a>. Images: <a href="http://unsplash.com">Unsplash</a>.</p>
            </section>
        </section>
    </div>
@endsection