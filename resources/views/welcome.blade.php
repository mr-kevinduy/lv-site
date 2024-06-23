<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        @include('_head')
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <main class="mt-6">
                        <div>
                            <x-block
                                title="Network Infrastructure"
                                icon="svg.cpu"
                            >
                                <x-table
                                    :columns="['Item', 'Value']"
                                    :records="[
                                        ['Host', $_SERVER['HTTP_HOST']],
                                        ['Host IP', getIPByEndpoint($_SERVER['HTTP_HOST'])],
                                        ['SERVER_ADDR', $_SERVER['SERVER_ADDR']],
                                        ['EC2 Hostname (OS)', getServerHostname().' ('.getServerOS('pretty_name').')'],
                                        ['---------------------------', '------'],
                                        ['VPC CIDR', isset($_SERVER['AWS_VPC']) ? $_SERVER['AWS_VPC'] : ''],
                                        [' - Subnet Public 1', isset($_SERVER['AWS_SUBNET_PUBLIC_1']) ? $_SERVER['AWS_SUBNET_PUBLIC_1'] : ''],
                                        [' - Subnet Public 2', isset($_SERVER['AWS_SUBNET_PUBLIC_2']) ? $_SERVER['AWS_SUBNET_PUBLIC_2'] : ''],
                                        [' - Subnet Private 1', isset($_SERVER['AWS_SUBNET_PRIVATE_1']) ? $_SERVER['AWS_SUBNET_PRIVATE_1'] : ''],
                                        [' - Subnet Private 2', isset($_SERVER['AWS_SUBNET_PRIVATE_2']) ? $_SERVER['AWS_SUBNET_PRIVATE_2'] : ''],

                                        ['AWS EC2 <br/> - Private IP <br/> - Public IP', ' <br/> '.(isset($_SERVER['AWS_EC2_PUBLIC_IP']) ? $_SERVER['AWS_EC2_PUBLIC_IP'] : 'N/A').' <br/> '.(isset($_SERVER['AWS_EC2_PRIVATE_IP']) ? $_SERVER['AWS_EC2_PRIVATE_IP'] : 'N/A')],
                                        ['AWS LB Internal <br/> - Private IP', (isset($_SERVER['AWS_LB_PRIVATE']) ? $_SERVER['AWS_LB_PRIVATE'] : 'N/A').' <br/> '.(isset($_SERVER['AWS_LB_PRIVATE_IP']) ? $_SERVER['AWS_LB_PRIVATE_IP'] : 'N/A')],
                                        ['AWS LB Internet facing <br/> - Public IP', (isset($_SERVER['AWS_LB_PUBLIC']) ? $_SERVER['AWS_LB_PUBLIC'] : 'N/A').' <br/> '.(isset($_SERVER['AWS_LB_PUBLIC_IP']) ? $_SERVER['AWS_LB_PUBLIC_IP'] : 'N/A')],
                                        ['Client Global IP', request()->ip()],
                                    ]"
                                />
                            </x-block>
                        </div>

                        <div class="mt-8 grid gap-6 lg:grid-cols-2 lg:gap-8">
                            <x-block
                                title="Application"
                                icon="svg.global"
                            >
                                <x-table
                                    :columns="['Item', 'Value']"
                                    :records="[
                                        ['Laravel', 'v'.\Illuminate\Foundation\Application::VERSION],
                                        ['PHP', 'v'.PHP_VERSION],
                                        ['Web Server', $_SERVER['SERVER_SOFTWARE']],
                                        ['Server OS', getServerOS('pretty_name')],
                                        ['DB_CONNECTION', isset($_SERVER['DB_CONNECTION']) ? $_SERVER['DB_CONNECTION'] : ''],
                                        ['DB_DATABASE', isset($_SERVER['DB_DATABASE']) ? $_SERVER['DB_DATABASE'] : ''],
                                        ['REQUEST_SCHEME', $_SERVER['REQUEST_SCHEME']],
                                        ['SERVER_PROTOCOL', $_SERVER['SERVER_PROTOCOL']],
                                        ['HTTP_HOST', $_SERVER['HTTP_HOST']],
                                        ['SERVER_NAME', $_SERVER['SERVER_NAME']],
                                        ['SERVER_PORT', $_SERVER['SERVER_PORT']],
                                        ['SERVER_ADDR', $_SERVER['SERVER_ADDR']],
                                        ['REMOTE_PORT', $_SERVER['REMOTE_PORT']],
                                        ['REMOTE_ADDR', $_SERVER['REMOTE_ADDR']],
                                        ['Agent OS', getAgentOS($_SERVER['HTTP_USER_AGENT'])],
                                    ]"
                                />
                            </x-block>

                            <x-block
                                title="Server"
                                icon="svg.marker"
                            >
                                <x-table
                                    :options="getServerOS()"
                                />
                            </x-block>
                        </div>

                        <div class="mt-8">
                            <x-block
                                title="Web Server"
                                icon="svg.lightbulb"
                            >
                                <x-table
                                    :options="$_SERVER"
                                />
                            </x-block>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>
