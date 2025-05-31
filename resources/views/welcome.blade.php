<!DOCTYPE html>
<html lang="en" data-theme="lemonade">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        @vite("resources/css/app.css")
    </head>

    <body>
        <x-header />
        <div class="mx-auto my-4 flex w-[90%] max-w-2xl flex-col gap-4">
            <x-question />
            <x-question />
            <x-question />
            <x-question />

            <button class="btn btn-primary text-white">Simpan</button>
        </div>
    </body>
</html>
