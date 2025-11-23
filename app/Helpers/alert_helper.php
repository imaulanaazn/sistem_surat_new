<?php
if (!function_exists('alert')) {
    function alert($type = 'info', $message = '')
    {
        if (!$message) return '';

        $color = match($type) {
            'success' => 'bg-green-100 border-green-500 text-green-800',
            'danger'  => 'bg-red-100 border-red-500 text-red-800',
            'warning' => 'bg-yellow-100 border-yellow-500 text-yellow-800',
            'info'    => 'bg-blue-100 border-blue-500 text-blue-800',
            default   => 'bg-gray-100 border-gray-500 text-gray-800',
        };

        return "<div class='p-4 my-4 border-l-4 rounded-r-lg {$color}'>
                    <strong class='font-medium'>$message</strong>
                </div>";
    }
}