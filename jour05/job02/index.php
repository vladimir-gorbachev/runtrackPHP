<?php 
function bonjour($jour) {
    if ($jour == TRUE) {
        return "bonjour";
    } else {
        return "bonsoir";
    }
}
?>

<form method="post">
    <style>
    
        form{
            display:flex;
            width: 100%;
            flex-flow:row wrap;
            justify-content:center;
            text-align:center;
            align-self:center;
            align-items:center;
        }

        #submit{
            width:5%;
            align-self:center;
            align-items:center;
        }

    </style>
    <label for="jour">Est-ce le jour ?</label>
    <input type="checkbox" class=checkbox name="jour" value="1">oui
    <input type="checkbox" class=checkbox name="nuit" value="">non
    <input type="submit" id=submit value="Envoyer">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jour = isset($_POST['jour']) ? TRUE : FALSE;
    echo bonjour($jour);
}
?>