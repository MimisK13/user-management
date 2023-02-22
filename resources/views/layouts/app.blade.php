<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="{{ asset('user-management/css/app.css') }}" rel="stylesheet">

        <title>User Management</title>
    </head>

    <body class="h-full">
        <div class="min-h-full">
            <nav class="bg-white shadow-sm">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex h-16 justify-between">
                        <div class="flex">
                            <div class="flex flex-shrink-0 items-center mr-4">
                                User Management
                            </div>
                            <div class="hidden sm:-my-px sm:ml-6 sm:flex sm:space-x-8">
                                <a href="{{ route('user-management.users.index') }}"
                                   class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium
                               @if (request()->routeIs('user-management.users.*')) border-indigo-500 text-gray-900
                               @else border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300
                               @endif">
                                    Users
                                </a>

                                <a href="{{ route('user-management.roles.index') }}"
                                   class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium
                               @if (request()->routeIs('user-management.roles.*')) border-indigo-500 text-gray-900
                               @else border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300
                               @endif">
                                    Roles
                                </a>

                                <a href="{{ route('user-management.permissions.index') }}"
                                   class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium
                               @if (request()->routeIs('user-management.permissions.*')) border-indigo-500 text-gray-900
                               @else border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300
                               @endif">
                                    Permissions
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <main>
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="px-4 py-8 sm:px-0">
                        <div class="px-4 sm:px-6 lg:px-8">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
