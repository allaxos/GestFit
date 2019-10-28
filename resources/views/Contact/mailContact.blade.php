<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Message de la plateForme GesFit</h2>
<p>Éléments reçu :</p>
<ul>

    <li><strong>Nom</strong> : {{ $contact['name'] }}</li>
    <li><strong>Email</strong> :<a href="mailto:{{ $contact['email'] }}"> {{ $contact['email'] }}</a></li>
    <li><strong>Message</strong> : {{ $contact['message'] }}</li>

</ul>
</body>
</html>