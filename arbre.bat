@echo off
REM Script pour récupérer l'arborescence des dossiers et fichiers et la sauvegarder dans un fichier
REM en excluant les dossiers ".vs" et "vendor"

REM Spécifiez le répertoire de départ (le répertoire courant ici, vous pouvez le modifier)
set DIR=%cd%

REM Vérifier si le répertoire est accessible
if not exist %DIR% (
    echo Le répertoire %DIR% est inaccessible.
    pause
    exit /b
)

REM Spécifiez le fichier de sortie où l'arborescence sera enregistrée
set OUTPUT_FILE=arborescence.txt

REM Efface le fichier de sortie s'il existe déjà
if exist %OUTPUT_FILE% del %OUTPUT_FILE%

REM Récupère l'arborescence du répertoire et la sauvegarde dans le fichier
echo Arborescence du répertoire %DIR% > %OUTPUT_FILE%
echo =============================== >> %OUTPUT_FILE%

REM Exécute la commande dir et exclut les dossiers .vs et vendor avec findstr
dir /s /b %DIR% | findstr /v /i "\\.vs\\" | findstr /v /i "\\vendor\\" >> %OUTPUT_FILE%

REM Message de confirmation
echo L'arborescence a été enregistrée dans %OUTPUT_FILE%.
pause
