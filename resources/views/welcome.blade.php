<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite('resources/css/app.css')
    </head>
    <body class="bg-gray-100 min-h-screen flex flex-col justify-between">
    <div class="flex-grow flex flex-col items-center justify-center">
        <img src="https://ucompensar.edu.co/wp-content/uploads/2021/04/main-logo.svg" alt="Logo" class="w-64 h-64">
        <table class="table-auto border-collapse border border-gray-300 bg-white shadow-lg">
            <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">Datos de estudiante</th>
            </tr>
            </thead>
            <tbody>
            <tr class="text-center">
                <td class="border border-gray-300 px-4 py-2">{{ $user->get()->name }}</td>
            </tr>
            <tr class="text-center">
                <td class="border border-gray-300 px-4 py-2">{{ $user->get()->email }}</td>
            </tr>
            </tbody>
        </table>
    </div>

    <!-- Copyright -->
    <footer class="text-center py-4 bg-gray-800 text-white">
        &copy; {{ date('Y') }} UCompensar. Todos los derechos reservados.
    </footer>
    </body>
</html>
