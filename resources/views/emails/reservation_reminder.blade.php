<!DOCTYPE html>
<html>
<head>
    <title>Rappel de réservation</title>
</head>
<body>
    <p>Bonjour {{ $reservation->visitor_name }},</p>
    <p>Ce message est un rappel que vous avez réservé le produit suivant :</p>
    <p>Produit: {{ $reservation->product->name }}</p>
    <p>Date de naissance prévue: {{ $reservation->liste->dateBirth->format('d/m/Y') }}</p>
    <p>Merci de votre générosité!</p>
</body>
</html>
