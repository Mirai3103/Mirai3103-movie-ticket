SETLOCAL
@echo off
SET PHP_VERSION=8.3.0
SET PHP_URL=https://windows.php.net/downloads/releases/php-8.3.4-nts-Win32-vs16-x64.zip
SET PHP_DIR=php_dir
SET PHP_EXE=php.exe

IF NOT EXIST %PHP_DIR% (
    mkdir %PHP_DIR%
    cd %PHP_DIR%
    del php.zip
    echo Downloading PHP %PHP_VERSION%...
    powershell -Command "Invoke-WebRequest %PHP_URL% -OutFile php.zip"
    echo Extracting PHP %PHP_VERSION%...
    tar -xf php.zip 
    @REM del php.zip
    set PHP_EXE=%PHP_DIR%\php.exe
    cd ..
)

echo PHP %PHP_VERSION% is ready to use.

%PHP_EXE% -S localhost:8000
ENDLOCAL