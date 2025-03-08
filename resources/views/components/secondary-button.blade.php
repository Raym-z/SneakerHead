<button {{ $attributes->merge([
    'type' => 'button', 
    'class' => 'inline-flex items-center px-4 py-2 
                bg-gray-100 dark:bg-gray-800 
                border border-gray-400 dark:border-gray-600 
                rounded-md font-semibold text-xs 
                text-gray-900 dark:text-gray-200 
                uppercase tracking-widest shadow-sm 
                hover:bg-gray-200 dark:hover:bg-gray-700 
                focus:outline-none focus:ring-2 focus:ring-indigo-500 
                focus:ring-offset-2 dark:focus:ring-offset-gray-800 
                active:bg-gray-300 dark:active:bg-gray-600 
                disabled:opacity-50 transition ease-in-out duration-150'
]) }}>
    {{ $slot }}
</button>
