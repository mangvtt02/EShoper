@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
<<<<<<< HEAD
SET BIN_TARGET=%~dp0/php-parse
SET COMPOSER_RUNTIME_BIN_DIR=%~dp0
=======
SET BIN_TARGET=%~dp0/../nikic/php-parser/bin/php-parse
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
php "%BIN_TARGET%" %*
