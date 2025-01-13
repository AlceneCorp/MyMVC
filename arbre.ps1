# Nom du fichier de sortie
$outputFile = "arborescence.txt"

# Liste des dossiers à ignorer
$excludeFolders = @(".vs", "vendor")  # Ajoutez ici les noms des dossiers à exclure

# Fonction récursive pour générer l'arborescence
function Get-Tree {
    param (
        [string]$path = ".",
        [int]$level = 0
    )

    $indent = "|" + (" " * 3) * $level
    $items = Get-ChildItem -Path $path

    foreach ($item in $items) {
        if ($item.PSIsContainer) {
            if ($excludeFolders -notcontains $item.Name) {
                "$indent|-- $($item.Name)" | Out-File -FilePath $outputFile -Append
                Get-Tree -path $item.FullName -level ($level + 1)
            }
        } else {
            "$indent|-- $($item.Name)" | Out-File -FilePath $outputFile -Append
        }
    }
}

# Supprimer le fichier de sortie s'il existe déjà
if (Test-Path $outputFile) { Remove-Item $outputFile }

# Appel initial de la fonction avec le répertoire courant
Get-Tree

Write-Host "Arborescence générée dans $outputFile"