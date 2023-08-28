@props(['id', 'class' => '', 'error' => true, 'input' => null])

<div {{ $attributes->merge(['class' => 'col-span-6 sm:col-span-4']) }}>
    <select id="{{ $id }}" {{ $attributes->merge(['class' => "mt-1 block w-full $class"]) }}
        wire:model="{{ $input }}">
        {{ $slot }}
    </select>
    @if ($error)
        <x-input-error :for="$id" class="mt-2" />
    @endif
</div>
