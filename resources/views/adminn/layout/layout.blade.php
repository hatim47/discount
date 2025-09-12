<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" data-theme="light">

<x-head  style='{{ isset($style) ? $style : " " }}'/>

<body>

    <!-- ..::  header area start ::.. -->
    <x-sidebars />
    <!-- ..::  header area end ::.. -->

    <main class="dashboard-main">

        <!-- ..::  navbar start ::.. -->
        <x-navbar heading='{{ isset($heading) ? $heading : "" }}' />
        <!-- ..::  navbar end ::.. -->
        <div class="dashboard-main-body">
            
            <!-- ..::  breadcrumb  start ::.. -->
            {{-- <x-breadcrumb title='{{ isset($title) ? $title : "" }}' subTitle='{{ isset($subTitle) ? $subTitle : "" }}' /> --}}
            <!-- ..::  header area end ::.. -->

            @yield('content')
        
        </div>
        <!-- ..::  footer  start ::.. -->
        <x-footer />
        <!-- ..::  footer area end ::.. -->

    </main>

    <!-- ..::  scripts  start ::.. -->
    <x-script  script='{!! isset($script) ? $script : "" !!}' />
    <!-- ..::  scripts  end ::.. -->
    @stack('scripts')
</body>

</html>