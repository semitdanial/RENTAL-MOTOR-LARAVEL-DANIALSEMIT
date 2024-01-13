@if(Auth::user()->isAdmin())
    @include('dashboard.admin.layouts.sidebar')
@else
    @include('dashboard.user.layouts.sidebar')
@endif
