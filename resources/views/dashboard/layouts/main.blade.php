@if(Auth::user()->isAdmin())
    @include('dashboard.admin.layouts.main')
@else
    @include('dashboard.user.layouts.main')
@endif
