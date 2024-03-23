<?php

namespace PicPay\CoreDomain\Core;

use Illuminate\Console\Application as Artisan;
use Illuminate\Console\Command;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Str;
use ReflectionClass;
use ReflectionException;
use Symfony\Component\Finder\Finder;

class CommandKernel extends ConsoleKernel
{
    /**
     * @throws ReflectionException
     */
    protected function commands(): void
    {
        $namespace = explode('\\', __NAMESPACE__)[0];
        $basePath = base_path() . "/$namespace";

        foreach ((new Finder())->in($basePath)->files() as $command) {
            $command = $namespace . str_replace(
                ['/', '.php'],
                ['\\', ''],
                Str::after($command->getRealPath(), $basePath)
            );

            if (
                is_subclass_of($command, Command::class) &&
                !(new ReflectionClass($command))->isAbstract()
            ) {
                Artisan::starting(function ($artisan) use ($command) {
                    $artisan->resolve($command);
                });
            }
        }
    }
}
