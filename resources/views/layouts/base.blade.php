<!doctype html>
<html lang="en">
  
         <!-- locaction head-->
        @include('layouts.head')

      <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
          <!--begin::App Wrapper-->
          <div class="app-wrapper">
     
        <!--location: Nav-->
        @include('layouts.nav')
    
        <!--location: sidebar-->
        @include('layouts.sidebar')

        <!--location: main-->
        @yield('content')


          <!--location: footer-->
         @include('layouts.footer')


        </div>
    <!--end::App Wrapper-->
   
<!--location: scripts-->
        @include('layouts.scripts')

    </body>
  <!--end::Body-->
</html>
