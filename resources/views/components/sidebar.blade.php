        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="{{ auth()->user()->photo ? asset('storage/' . (auth()->user()->photo ?? '')) : 'assets/img/user2-160x160.jpg' }}" alt="profile">
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
                    icon="mdi-home"
                    :href="route('index')"
                    :active="request()->routeIs('index')"
                >
                    Dashboard
                </x-nav-link>

                <x-nav-link
                    icon="mdi-account-multiple"
                    :href="route('user-table')"
                    :active="request()->routeIs('user-table')"
                >
                    Pengguna
                </x-nav-link>

                <x-nav-link
                    icon="mdi-account"
                    :href="route('profile')"
                    :active="request()->routeIs('profile')"
                >Profile </x-nav-link>

          </ul>
        </nav>
