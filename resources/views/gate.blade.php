<!doctype html>
<html class="h-full text-gray-500">
<head>
    <meta charset="utf-8">
    <title>{{ trans('outdated-browser::gate.title') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <style>
        body {
            background: radial-gradient(ellipse at center, #ffffff 0%, #e7e7e7 100%);
        }
    </style>
</head>
<body class="h-full">

<div class="flex items-center justify-center h-full">
    <div class="max-w-2xl w-full flex flex-col items-center p-4">
        <svg class="w-64 h-64 md:w-80 md:h-64" viewBox="0 0 350 299" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M263.542 35.41c27.433 16.465 51.68 41.073 61.238 70.283 9.734 29.387 4.778 63.555-6.018 95.598-10.619 31.866-27.256 61.784-52.211 75.062-25.132 13.277-58.582 10.091-89.377 6.55-30.973-3.718-59.114-7.612-85.485-20.536-26.37-12.923-50.794-34.698-63.891-63.024-13.274-28.325-15.221-63.2-.708-87.985 14.69-24.608 45.839-39.301 73.095-55.765 27.256-16.642 50.795-35.053 78.05-40.187 27.079-4.957 57.875 3.54 85.307 20.005z" fill="#DBDBDB"/>
            <mask id="a" maskUnits="userSpaceOnUse" x="17" y="14" width="313" height="272">
                <path d="M263.542 35.41c27.433 16.465 51.68 41.073 61.238 70.283 9.734 29.387 4.778 63.555-6.018 95.598-10.619 31.866-27.256 61.784-52.211 75.062-25.132 13.277-58.582 10.091-89.377 6.55-30.973-3.718-59.114-7.612-85.485-20.536-26.37-12.923-50.794-34.698-63.891-63.024-13.274-28.325-15.221-63.2-.708-87.985 14.69-24.608 45.839-39.301 73.095-55.765 27.256-16.642 50.795-35.053 78.05-40.187 27.079-4.957 57.875 3.54 85.307 20.005z" fill="#DBDBDB"/>
            </mask>
            <g mask="url(#a)">
                <path opacity=".5" d="M314.919 50H36.107v229.51H314.92V50z" fill="url(#paint0_linear)"/>
                <path d="M311.133 54.337H39.357v221.368h271.776V54.337z" fill="#fff"/>
                <path d="M311.133 54.337H39.357v49.372h271.776V54.337z" fill="#AFAFAF"/>
                <path d="M289.475 121.615H61.01v28.757h228.465v-28.757z" fill="#F5F5F5"/>
                <path d="M227.755 172.077H61.01v9.765h166.745v-9.765zM169.285 188.898H61.01v9.765h108.275v-9.765zM203.936 205.713H61.01v9.765h142.926v-9.765zM227.755 222.534H61.01v9.765h166.745v-9.765zM116.772 239.355H61.01v9.765h55.762v-9.765z" fill="#E0E0E0"/>
                <path d="M137.884 131.385H72.919v8.679h64.965v-8.679z" fill="gray"/>
            </g>
            <path d="M311.132 54.337H39.356v49.372h271.776V54.337z" fill="#AFAFAF"/>
            <circle cx="302" cy="61" r="25" fill="#ED9090"/>
            <path d="M305.256 60.875l7.041-6.973 1.435-1.435c.206-.205.206-.547 0-.82l-1.503-1.504c-.274-.206-.616-.206-.821 0L303 58.619l-8.477-8.476c-.205-.206-.546-.206-.82 0l-1.504 1.504c-.205.273-.205.615 0 .82l8.477 8.408-8.477 8.477c-.205.205-.205.546 0 .82l1.504 1.504c.274.205.615.205.82 0L303 63.199l6.973 7.041 1.435 1.436c.205.205.547.205.821 0l1.503-1.504c.206-.274.206-.615 0-.82l-8.476-8.477z" fill="#fff"/>
            <defs>
                <linearGradient id="paint0_linear" x1="141672" y1="141543" x2="141672" y2="36732.5" gradientUnits="userSpaceOnUse">
                    <stop stop-color="gray" stop-opacity=".25"/>
                    <stop offset=".54" stop-color="gray" stop-opacity=".12"/>
                    <stop offset="1" stop-color="gray" stop-opacity=".1"/>
                </linearGradient>
            </defs>
        </svg>

        <h1 class="text-black font-bold text-3xl mt-10 mb-4">{{ trans('outdated-browser::gate.title') }}</h1>
        <p class="max-w-sm text-lg text-center mb-12">{{ trans('outdated-browser::gate.description') }}</p>

        <div class="flex items-center whitespace-nowrap">
            <a href="{{ trans('outdated-browser::gate.update_browser_url') }}" target="_blank" rel="noopener" class="inline-flex items-center px-6 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white transition bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" style="color: #fff; background: #8c8c8c; font-weight: bold;">
                {{ trans('outdated-browser::gate.update_browser_call_to_action') }}
            </a>

            <form action="{{ route('outdated-browser::continue') }}" method="post">
                @csrf

                <button class="flex items-center text-gray-500 focus:outline-none group ml-5">
                    <span class="underline group-hover:no-underline">{{ trans('outdated-browser::gate.skip_action') }}</span>

                    <svg class="w-6 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="currentColor" d="M311.03 131.515l-7.071 7.07c-4.686 4.686-4.686 12.284 0 16.971L387.887 239H12c-6.627 0-12 5.373-12 12v10c0 6.627 5.373 12 12 12h375.887l-83.928 83.444c-4.686 4.686-4.686 12.284 0 16.971l7.071 7.07c4.686 4.686 12.284 4.686 16.97 0l116.485-116c4.686-4.686 4.686-12.284 0-16.971L328 131.515c-4.686-4.687-12.284-4.687-16.97 0z"></path>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
