#!/bin/bash
cd /Users/nmdev/DEV/nmtechnology
php artisan serve &
npm run dev &
echo "Servers started!"
