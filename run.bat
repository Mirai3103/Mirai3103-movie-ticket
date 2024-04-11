SETLOCAL
@echo off
SET PHP_VERSION=8.1.x
SET PHP_URL=https://windows.php.net/downloads/releases/php-8.1.28-nts-Win32-vs16-x64.zip
SET FULL_PATH=%~dp0
SET PHP_DIR=%FULL_PATH%php_dir
echo %PHP_DIR%
SET PHP_EXE=%PHP_DIR%\php.exe

set COMPOSER_CMD=%PHP_EXE% %PHP_DIR%\composer.phar
IF NOT EXIST %PHP_DIR% (
    echo Php not found, downloading...
    mkdir %PHP_DIR%
    cd %PHP_DIR%
    del php.zip
    echo Downloading PHP %PHP_VERSION%...
    powershell -Command "Invoke-WebRequest %PHP_URL% -OutFile php.zip"
    echo Extracting PHP %PHP_VERSION%...
    tar -xf php.zip 
    @REM del php.zip
    set PHP_EXE=%PHP_DIR%\php.exe
    copy php.ini-development php.ini
    echo extension=./ext/php_openssl.dll >> php.ini
    echo extension=./ext/php_mysqli.dll >> php.ini
    echo extension=./ext/php_curl.dll >> php.ini
    echo extension=./ext/php_gd.dll >> php.ini
    echo extension=./ext/php_mbstring.dll >> php.ini


    php.exe -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php.exe composer-setup.php
    php.exe -r "unlink('composer-setup.php');"

    @REM echo "Nhap ma so sinh vien: "
    @REM set /p mssv=
    cd ..
    echo Install dependencies
    %COMPOSER_CMD% install
)


echo PHP %PHP_VERSION% is ready to use.

%COMPOSER_CMD% update
%COMPOSER_CMD% dump-autoload
echo Starting PHP built-in server...


%PHP_EXE% -S localhost:8000
ENDLOCAL