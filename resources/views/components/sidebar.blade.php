        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="{{ auth()->user()->photo ? asset('storage/' . (auth()->user()->photo ?? '')) : 'assets/images/faces/face1.jpg' }}" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">{{ auth()->user()->name }}</span>
                  <span class="text-secondary text-small">{{  auth()->user()->role ?? ''}}</span>
                </div>
                <!-- <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i> -->
              </a>
            </li>

                <x-nav-link
                    icon="bi-house"
                    :href="route('index')"
                    :active="request()->routeIs('index')"
                >
                    Dashboard
                </x-nav-link>

                <x-nav-link
                    icon="bi-people"
                    :href="route('user-table')"
                    :active="request()->routeIs('user-table')"
                >
                    Pengguna
                </x-nav-link>

                <x-nav-link
                    icon="bi-bag-plus"
                    :href="route('penyakit.table')"
                    :active="request()->routeIs('penyakit.table')"
                >Penyakit</x-nav-link>

                <x-nav-link
                    icon="bi-book"
                    :href="route('gejala.table')"
                    :active="request()->routeIs('gejala.table')"
                >Gejala</x-nav-link>

                <x-nav-link
                    icon="bi-book"
                    :href="route('basis-pengetahuan')"
                    :active="request()->routeIs('basis-pengetahuan')"
                >Basis Pengetahuan</x-nav-link>

                <x-nav-link
                    icon="bi-person-circle"
                    :href="route('profile')"
                    :active="request()->routeIs('profile')"
                >Profile </x-nav-link>

          </ul>
        </nav>
