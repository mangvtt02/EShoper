@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
<<<<<<< HEAD
SET BIN_TARGET=%~dp0/commonmark
SET COMPOSER_RUNTIME_BIN_DIR=%~dp0
=======
SET BIN_TARGET=%~dp0/../league/commonmark/bin/commonmark
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
php "%BIN_TARGET%" %*
