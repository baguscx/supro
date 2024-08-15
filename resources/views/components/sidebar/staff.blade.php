        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="/dashboard" class="app-brand-link">
              <span class="app-brand-logo demo me-1">
                <span style="color: var(--bs-primary)">
                    <img src="{{asset('assets/img/logo.png')}}" width="30px" alt="">
                </span>
              </span>
              <span class="app-brand-text demo menu-text fw-semibold ms-2">Proposal</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
              <i class="mdi menu-toggle-icon d-xl-block align-middle mdi-20px"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboards -->
            {{-- <li class="menu-item {{request()->is('staff') ? 'active' : ''}}"">
              <a href="{{route('dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-home-variant-outline"></i>
                <div data-i18n="Icons">Dashboard</div>
              </a>
            </li> --}}
            <li class="menu-item active open">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-file-document-multiple-outline"></i>
                <div data-i18n="Dashboards">Proposal</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item {{request()->is('proposal/list') ? 'active' : ''}}">
                  <a href="{{route('list.proposal')}}" class="menu-link">
                    <div data-i18n="Envelope">Belum Diverifikasi</div>
                  </a>
                </li>
                <li class="menu-item {{request()->is('proposal/history') ? 'active' : ''}}">
                  <a href="{{route('history.proposal')}}" class="menu-link">
                    <div data-i18n="Envelope">Sudah Diverifikasi</div>
                  </a>
                </li>

              </ul>
            </li>
          </ul>
        </aside>
