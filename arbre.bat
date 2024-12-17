@echo off
REM Script pour r�cup�rer l'arborescence des dossiers et fichiers et la sauvegarder dans un fichier
REM en excluant les dossiers ".vs" et "vendor"

REM Sp�cifiez le r�pertoire de d�part (le r�pertoire courant ici, vous pouvez le modifier)
set DIR=%cd%

REM V�rifier si le r�pertoire est accessible
if not exist %DIR% (
    echo Le r�pertoire %DIR% est inaccessible.
    pause
    exit /b
)

REM Sp�cifiez le fichier de sortie o� l'arborescence sera enregistr�e
set OUTPUT_FILE=arborescence.txt

REM Efface le fichier de sortie s'il existe d�j�
if exist %OUTPUT_FILE% del %OUTPUT_FILE%

REM R�cup�re l'arborescence du r�pertoire et la sauvegarde dans le fichier
echo Arborescence du r�pertoire %DIR% > %OUTPUT_FILE%
echo =============================== >> %OUTPUT_FILE%

REM Ex�cute la commande dir et exclut les dossiers .vs et vendor avec findstr
dir /s /b %DIR% | findstr /v /i "\\.vs\\" | findstr /v /i "\\vendor\\" >> %OUTPUT_FILE%

REM Message de confirmation
echo L'arborescence a �t� enregistr�e dans %OUTPUT_FILE%.
pause
