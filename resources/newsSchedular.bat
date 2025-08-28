@echo off
:loop
echo Running Laravel Scheduler at %date% %time%
php C:\xampp\htdocs\my_api_app\artisan schedule:run
timeout /t 43200 >nul  
goto loop
