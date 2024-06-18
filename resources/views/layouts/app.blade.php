<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{asset('/assets')}}"
  data-template="vertical-menu-template-free">
  <head>
    <x-pages.head/>
    <title>{{ $title ?? 'laravel' }}</title>
  </head>

  <body>
    @include('sweetalert::alert')

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        @if (Auth::user()->hasRole('admin'))
            <x-sidebar.admin/>
        @elseif (Auth::user()->hasRole('staff'))
            <x-sidebar.staff/>
        @elseif (Auth::user()->hasRole('user'))
            <x-sidebar.user/>
        @endif
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
            <x-navbar/>
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row gy-4">
                {{-- isi content --}}
                {{ $slot }}
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <x-pages.footer />
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <x-pages.script />
  </body>
</html>
