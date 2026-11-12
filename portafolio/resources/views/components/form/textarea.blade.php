@props([
    'name',
    'label',
    'rows' => 6,
])

<div>
    <label for="{{ $name }}" class="mb-1.5 block text-sm font-medium text-stone-800 dark:text-stone-200">{{ $label }}</label>

    <textarea
        id="{{ $name }}"
        name="{{ $name }}"
        rows="{{ $rows }}"
        @error($name) aria-invalid="true" aria-describedby="{{ $name }}-error" @enderror
        {{ $attributes->class([
            'block w-full rounded-md border bg-white px-3 py-2.5 text-stone-900 transition placeholder:text-stone-400 focus:border-stone-900 focus:outline-none dark:bg-stone-900 dark:text-stone-100 dark:focus:border-stone-300',
            'border-red-500' => $errors->has($name),
            'border-stone-300 dark:border-stone-700' => ! $errors->has($name),
        ]) }}
    >{{ old($name) }}</textarea>

    @error($name)
        <p id="{{ $name }}-error" class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
    @enderror
</div>
