<h1>{{ __('Outdated Browser') }}</h1>
<p>{{ __('For a better experience, keep you browser up to date. Check below for the latest versions.') }}</p>

@TODO: browsers here.

<form action="{{ route('outdated-browser::continue') }}" method="post">
    @csrf

    <button>Continue</button>
</form>
