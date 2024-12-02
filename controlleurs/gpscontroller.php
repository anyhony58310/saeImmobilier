<?php
function normalizeAddress($address) {
    $replacements = [
        ' premier' => ' 1er',
        ' deuxième' => ' 2e',
        ' troisième' => ' 3e',
        ' quatrième' => ' 4e',
        ' cinquième' => ' 5e',
    ];

    return str_ireplace(array_keys($replacements), array_values($replacements), $address);
}

function getCoordinates($address) {
    $address = normalizeAddress($address);
    $encodedAddress = urlencode($address);
    $url = "https://nominatim.openstreetmap.org/search?q=$encodedAddress&format=json&addressdetails=1";

    $context = stream_context_create([
        "http" => [
            "header" => "User-Agent: MyApplication/1.0 (myemail@example.com)"
        ]
    ]);

    $response = file_get_contents($url, false, $context);

    if ($response === FALSE) {
        return ['error' => 'Erreur lors de la requête API'];
    }

    $data = json_decode($response, true);

    if (count($data) > 0) {
        return [
            'latitude' => $data[0]['lat'],
            'longitude' => $data[0]['lon']
        ];
    } else {
        return ['error' => 'Aucune correspondance trouvée pour cette adresse'];
    }
}

$address = "4 rue Albert 1er, Nevers";
$result = getCoordinates($address);

if (isset($result['error'])) {
    echo "Erreur : " . $result['error'];
} else {
    echo "Coordonnées GPS pour '$address':\n";
    echo "Latitude : " . $result['latitude'] . ", Longitude : " . $result['longitude'];
}

?>
