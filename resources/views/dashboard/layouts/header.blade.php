@if(Auth::user()->isAdmin())
    @include('dashboard.admin.layouts.header')
@else
    @include('dashboard.user.layouts.header')
@endif
