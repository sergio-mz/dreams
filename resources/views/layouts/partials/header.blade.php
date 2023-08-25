<header>
    <h1>Dreams Glamping</h1>
    <nav>
        <ul>
            <li><a href="{{route('home')}}" class="{{request()->routeIs('home') ? 'active' : ''}}">Home</a>
            </li>
            <li><a href="{{route('caracteristicas.index')}}" class="{{request()->routeIs('caracteristicas.*') ? 'active' : ''}}">Caracteristicas</a>
            </li>
            <li><a href="{{route('clientes.index')}}" class="{{request()->routeIs('clientes.*') ? 'active' : ''}}">Clientes</a>
            </li>
            <li><a href="{{route('metodos.index')}}" class="{{request()->routeIs('metodos.*') ? 'active' : ''}}">Metodos de pago</a>
            </li>
            <li><a href="{{route('servicios.index')}}" class="{{request()->routeIs('servicios.*') ? 'active' : ''}}">Servicios</a>
            </li>
            <li><a href="{{route('domos.index')}}" class="{{request()->routeIs('domos.*') ? 'active' : ''}}">Domos</a>
            </li>
            <li><a href="{{route('planes.index')}}" class="{{request()->routeIs('planes.*') ? 'active' : ''}}">Planes</a>
            </li>
            {{-- <li><a href="{{route('nosotros')}}" class="{{request()->routeIs('nosotros') ? 'active' : ''}}">Nosotros</a>
            </li> --}}
        </ul>
    </nav>
</header>