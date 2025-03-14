<button {{ $attributes->merge([
    'type' => 'submit', 
    'class' => 'inline-flex items-center px-4 py-2 
                bg-gray-800 dark:bg-gray-200 
                border border-transparent 
                rounded-md font-semibold text-xs 
                text-white dark:text-gray-900 
                uppercase tracking-widest 
                hover:bg-gray-700 dark:hover:bg-gray-300 
                focus:bg-gray-700 dark:focus:bg-gray-300 
                active:bg-gray-900 dark:active:bg-gray-400 
                focus:outline-none focus:ring-2 focus:ring-indigo-500 
                focus:ring-offset-2 dark:focus:ring-offset-gray-800 
                disabled:opacity-50 disabled:cursor-not-allowed 
                disabled:bg-gray-400 dark:disabled:bg-gray-500 
                transition ease-in-out duration-150'
]) }} {{ $attributes->has('disabled') ? 'disabled' : '' }}>
    {{ $slot }}
</button>
