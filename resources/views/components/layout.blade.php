<!DOCTYPE html>
<html lang="en">
    <head data-theme="light">
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>
            {{ $title ?? "SISPK layanan rekomendasi program studi" }}
        </title>

        {{-- font --}}
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
            rel="stylesheet"
        />

        @stack("script")
        @vite("resources/css/app.css")
    </head>

    <body>
        {{ $slot }}


        @stack('script-bottom')
    </body>
</html>
