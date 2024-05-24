@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
<<<<<<< HEAD
SET BIN_TARGET=%~dp0/phpunit
SET COMPOSER_RUNTIME_BIN_DIR=%~dp0
=======
SET BIN_TARGET=%~dp0/../phpunit/phpunit/phpunit
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
php "%BIN_TARGET%" %*
