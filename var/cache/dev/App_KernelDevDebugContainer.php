<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerDx7YZhr\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerDx7YZhr/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerDx7YZhr.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerDx7YZhr\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerDx7YZhr\App_KernelDevDebugContainer([
    'container.build_hash' => 'Dx7YZhr',
    'container.build_id' => '3a203456',
    'container.build_time' => 1682110386,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerDx7YZhr');
