<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerF51xx4x\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerF51xx4x/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerF51xx4x.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerF51xx4x\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerF51xx4x\App_KernelDevDebugContainer([
    'container.build_hash' => 'F51xx4x',
    'container.build_id' => '49bd62d6',
    'container.build_time' => 1682112116,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerF51xx4x');
