function surligne(champ, erreur)
{
    if(erreur)
        champ.style.backgroundColor = "#fba";
    else
        champ.style.backgroundColor = "";
}

function verifPseudo(champ)
{
    if(champ.value.length < 6 || champ.value.length > 25)
    {
        surligne(champ, true);
        alert ("Veuillez introduire 6 caractères au minimum !");
        return false;
    }
    else
    {
        surligne(champ, false);
        return true;
    }
}