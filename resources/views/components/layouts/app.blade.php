<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800 antialiased">
        <flux:sidebar sticky collapsible class="bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
            <flux:sidebar.header>
                <flux:sidebar.brand
                    href="#"
                    logo="https://fluxui.dev/img/demo/logo.png"
                    logo:dark="https://fluxui.dev/img/demo/dark-mode-logo.png"
                    name="Acme Inc."
                />
                <flux:sidebar.collapse class="in-data-flux-sidebar-on-desktop:not-in-data-flux-sidebar-collapsed-desktop:-mr-2" />
            </flux:sidebar.header>

            <flux:sidebar.nav>
                <flux:sidebar.item icon="identification" :href="route('dashboard')" :current="request()->routeIs('dashboard')">{{ __('Player Card') }}</flux:sidebar.item>
                <flux:sidebar.item icon="agenda-card" href="#">{{ __('Agenda Card') }}</flux:sidebar.item>
                <flux:sidebar.item icon="action-card" href="#">{{ __('Action Card') }}</flux:sidebar.item>
                <flux:sidebar.item icon="beaker" href="#">{{ __('Technology') }}</flux:sidebar.item>

            </flux:sidebar.nav>

            <flux:spacer />

            <flux:sidebar.nav>
                <flux:sidebar.item icon="bug-ant" href="#">{{ __('Report Bug') }}</flux:sidebar.item>
            </flux:sidebar.nav>
            <flux:dropdown class="hidden lg:block" position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon:trailing="chevrons-up-down"
                    data-test="sidebar-menu-button"
                />

                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full" data-test="logout-button">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <flux:header class="flex flex-row space-x-1">
            <a href="{{ route('phase.strategy.index') }}" @class([
                'text-sm uppercase tracking-wider shadow-inner rounded-t-xl px-4 py-3',
                'text-zinc-500 dark:text-white/80 hover:text-zinc-800 dark:hover:text-white hover:bg-zinc-800/5 dark:hover:bg-white/10' => !request()->routeIs('phase.strategy.index'),
                'text-zinc-500 dark:text-white/80 hover:text-zinc-800 dark:hover:text-white bg-zinc-50 dark:bg-zinc-900 hover:bg-zinc-100 dark:hover:bg-white/20' => request()->routeIs('phase.strategy.index'),
            ]) wire:navigate>{{ __('Strategy') }}</a>
            <a href="{{ route('phase.action.index') }}" @class([
                'text-sm uppercase tracking-wider shadow-inner rounded-t-xl px-4 py-3',
                'text-zinc-500 dark:text-white/80 hover:text-zinc-800 dark:hover:text-white hover:bg-zinc-800/5 dark:hover:bg-white/10' => !request()->routeIs('phase.action.index'),
                'text-zinc-500 dark:text-white/80 hover:text-zinc-800 dark:hover:text-white bg-zinc-50 dark:bg-zinc-900 hover:bg-zinc-100 dark:hover:bg-white/20' => request()->routeIs('phase.action.index'),
            ]) wire:navigate>{{ __('Action') }}</a>
            <a href="{{ route('phase.status.index') }}" @class([
                'text-sm uppercase tracking-wider shadow-inner rounded-t-xl px-4 py-3',
                'text-zinc-500 dark:text-white/80 hover:text-zinc-800 dark:hover:text-white hover:bg-zinc-800/5 dark:hover:bg-white/10' => !request()->routeIs('phase.status.index'),
                'text-zinc-500 dark:text-white/80 hover:text-zinc-800 dark:hover:text-white bg-zinc-50 dark:bg-zinc-900 hover:bg-zinc-100 dark:hover:bg-white/20' => request()->routeIs('phase.status.index'),
            ]) wire:navigate>{{ __('Status') }}</a>
            <a href="{{ route('phase.agenda.index') }}" @class([
                'text-sm uppercase tracking-wider shadow-inner rounded-t-xl px-4 py-3',
                'text-zinc-500 dark:text-white/80 hover:text-zinc-800 dark:hover:text-white hover:bg-zinc-800/5 dark:hover:bg-white/10' => !request()->routeIs('phase.agenda.index'),
                'text-zinc-500 dark:text-white/80 hover:text-zinc-800 dark:hover:text-white bg-zinc-50 dark:bg-zinc-900 hover:bg-zinc-100 dark:hover:bg-white/20' => request()->routeIs('phase.agenda.index'),
            ]) wire:navigate>{{ __('Agenda') }}</a>
            <flux:spacer />
            <div class="flex flex-row items-center gap-2">
                <span class="flex flex-row bg-slate-200 text-slate-800 border border-solid border-slate-600 shadow-inner rounded-full min-w-20 px-3 py-2 text-sm items-center justify-between">
                    <flux:icon.commodities variant="mini" />
                    <span class="font-bold">0</span>
                </span>
                <span class="flex flex-row bg-yellow-200 text-yellow-800 border border-solid border-yellow-600 shadow-inner rounded-full min-w-20 px-3 py-2 text-sm items-center justify-between">
                    <flux:icon.trade-goods variant="mini" />
                    <span class="font-bold">0</span>
                </span>
            </div>
        </flux:header>

        <flux:main>
            {{ $slot }}
        </flux:main>

        @fluxScripts
    </body>
</html>
