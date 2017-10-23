<?php $extends('member/base'); ?>

<?php $block('content'); ?>
    <h1>Connexion:</h1>

    <form method="post" action="member.php?controller=login&action=verify">
        <p>
            <label for="email">Email</label> 
            <input type="email" id="email" name="email">
        </p>
        <p>
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password">
        </p>
        <p><input type="submit" value="Envoyer"></p>

    </form>

    <p>
        Vous n'êtes pas inscrit ? 
        <a href='member.php?controller=signup'>Cliquez ici !</a>
    </p>
<?php $endblock(); ?>
