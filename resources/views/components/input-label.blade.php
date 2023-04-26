@props(['disabled' => false, 'field'=>''])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 dark:text-gray-300']) }}>{{ $value ?? $slot }}</label>
@error($field)
<div class="text-red-600 text-sm">{{ $message }}</div>                       
@enderror